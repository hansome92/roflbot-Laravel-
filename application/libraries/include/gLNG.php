<?php

/**
 * gLNG language inclusion system
 *
 * @version 1.0
 * @copyright Gorath
 * @since 28 11 2004
 * 
 **/

require_once("gEP.php");

$EP->addErrorCode("LNG_LOAD_FILE_ERROR", 'Can\'t load language file');

/** 
 * Language inclusion class
 *
 **/
class gLNG{
	/**
	 * Replacement array
     * 
     * @access   protected
     * @see      gLNG::__construct()
	 **/
    var $replacementTable = null;
	
	/**
	 * Encoding
     * 
     * @access   protected
     * @see      gLNG::encoding()
	 **/
    var $encoding = null;
    
	/**
	 * Language element left tag
     * 
     * @access   public
     * @see      gLNG::parse()
	 **/
    var $leftTag = "[";
	
	/**
	 * Language element right tag
     * 
     * @access   public
     * @see      gLNG::parse()
	 **/
    var $rightTag = "]";
	
	/**
     * Constructor : Loads language file
     * 
     * @access   public
     * @param    string $langDir       Langpacks base directory
     * @param    string $language      Preferred language
     * @param    string $baseLanguage  Base language - used in additional to preferred language
     */
	function gLNG($langDir, $language, $baseLanguage = false)
    {
        global $EP;
        
        // Add trailing slash if missed
        if ($langDir[strlen($langDir)-1] != "/") {
            $langDir .= "/";
        }
        $file = $langDir . $language . ".php";
        
        if (!file_exists($file)) {
            $EP->error("LNG_LOAD_FILE_ERROR", "<br/>".$file);
            exit;
        }
        
        // Load file
        require($file);
        $this->replacementTable = $LANGUAGE["table"];
        
        $this->encoding = $LANGUAGE["encoding"];
        
        // Once again, for base language
        if ($baseLanguage) {
            $file = $langDir . $baseLanguage . ".php";
            
            if (!file_exists($file)) {
                $EP->error("LNG_LOAD_FILE_ERROR", "<br/>".$file);
                exit;
            }
            
            require($file);
            $this->replacementTable += $LANGUAGE["table"];
        }
    }
    
    /**
     * Parses text and replaces language elements
     * 
     * @access public
     * @param  string $text Input text
     * @return string Output text
     **/
    function parse($text)
    {
        $res = $text;
        if ($this->replacementTable) {
            foreach($this->replacementTable as $langKey => $langVal)
            {
                $key = $this->leftTag . $langKey . $this->rightTag;
                $res = str_replace($key, $langVal, $res);
            }
        }
        return $res;
    }
    
    /**
     * Provides simple access to translation table
     * 
     * @access public
     * @param  string $element Language element
     * @return string Translation
     **/
    function translate($element)
    {
        return $this->replacementTable[$element];
    }
    
}

?>