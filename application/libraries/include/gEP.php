<?php

/** 
 * Error Processing Class
 *
 * @version 1.0
 * @copyright Gorath 
 * @since 03 10 2004
 * 
 **/

/** 
 * Error handling, logging and processing class
 **/
class gEP
{
	/**
	 * Specifies default action for errors: to print or not to print :)
     * 
     * @access   public
     * @see      gEP::error()
	 **/
    var $printErrors = true;
	
	/**
	 * User-defined error processing function.
     * 
     * @access   protected
     * @see      gEP::setProcFunction()
	 **/
    var $procFunction = null;
	
	/**
	 * Error codes and descriptions.
     * 
     * @access   public
     * @see      gEP::errorMessage()
	 **/
    var $errorMessages = array();
	
	/**
	 * Array of all raised errors.
     * 
     * @access   public
     * @see      gEP::error()
	 **/
    var $errorLog = array();
	
	/**
	 * Filter array of error types allowed.
     * 
     * @access   public
     * @see      gEP::phpError()
	 **/
    var $phpErrorFilter = array();
	
	/**
	 * PHP-generated error description format.
     * 
     * @access   protected
     * @see      gEP::setPhpErrorFormat()
	 **/
    var $phpErrorFormat = "<b>%s:</b> %s <br/>\n<b>File:</b> %s <br/>\n<b>Line:</b> %d";
	
    /**
     * Constructor : Registers user-defined functions
     * and fills basic error codes.
     * 
     * @access   public
     * @param    function  $procFunction    User-defined error processing function.
     * @param    bool      $defaultHandler  If true Register gEP::error() as default error handler.
     * @see      gEP::error()
     * @see      gEP::setProcFunction()
     */
    function gEP($procFunction = null, $defaultHandler = false)
    {
        $this->errorMessages["OK"] = "Done";
        $this->errorMessages["ERROR"] = "Error";
        $this->errorMessages["PHPERROR"] = "";
        
        $this->phpErrorFilter[] = E_ERROR;
        $this->phpErrorFilter[] = E_WARNING;
        $this->phpErrorFilter[] = E_PARSE;
        //$this->phpErrorFilter[] = E_NOTICE;
        $this->phpErrorFilter[] = E_CORE_ERROR;
        $this->phpErrorFilter[] = E_CORE_WARNING;
        $this->phpErrorFilter[] = E_COMPILE_ERROR;
        $this->phpErrorFilter[] = E_COMPILE_WARNING;
        $this->phpErrorFilter[] = E_USER_ERROR;
        $this->phpErrorFilter[] = E_USER_WARNING;
        //$this->phpErrorFilter[] = E_USER_NOTICE;
        //$this->phpErrorFilter[] = E_STRICT;
        
        $this->setProcFunction($procFunction);
        
        if ($defaultHandler !== false) {
            set_error_handler($defaultHandler);
        }
    }

    /**
     * Return a textual error message for an error code.
     * 
     * @access  public
     * @param   string $code Error code.
     * @param   string $value Additional info for report.
     * @return  string Error message, or deafult if the error code was not recognized.
     */
    function errorMessage($code = "ERROR", $value = false)
    {
        $res = "<b>" . (isset($this->errorMessages[$code]) ? $this->errorMessages[$code] : $this->errorMessages["ERROR"]);
        
        $res .= ($value != false) ? ":</b> $value" : "</b>";
        
        if (($code == "PHPERROR") && ($value !== false)) {
            $res = $value;
        }
        
        if (($code == "MYSQL") && ($value !== false)) {
            $res = "<b>" . $this->errorMessages["MYSQL"] . ":</b> <br/>\n" . $value;
        }
        
        return $res;
    }
    
    /**
     * Registers user-defuned error processing function.
     * It can control printing of error messages and do some maintenance tasks.
     * If it return true, this will mean that "error processed" and no message will be printed.
     * However error log will be appended.
     * 
     * @access   public
     * @param    function  $function  User-defined error processing function.
     *                                It can read two parameters: Error Code and Error Value.
     **/
    function setProcFunction($function = null)
    {
        $this->procFunction = $function;
    }
    
    /**
     * Sets PHP-generated error format
     * 
     * @access   public
     * @param    string $format Format, according to sprintf() syntax
     *                          the order of arguments: ErrorCode, ErrorDescription, BadFile, BadLine.
     **/
    function setPhpErrorFormat($format = false)
    {
        if ($format !== false) {
            $this->phpErrorFormat = $format;
        }
    }
    
    /**
     * Add user-defined error code.
     * 
     * @access   public
     * @param    string   $code       Error code.
     * @param    string   $value      Additional info for report.
     **/
    function addErrorCode($code, $value)
    {
        if (($code != '')&&($value != '')) {
            $this->errorMessages[$code] = $value;
        }
    }
    
    /**
     * Prints error log
     * 
     * @param    bool  $codes  Print error codes.
     * @param    bool  $values  Print error values.
     * @param    bool  $messages  Print error messages. If $codes=false and $values=false, then $messages is always true.
     * @access   public
     **/
    function reportErrors($codes = true, $values = true, $messages = false)
    {
        if (!$codes && !$values) {
            $messages = true;
        }
        
        $res = "<table border=1 cellpadding=5><tr>";
        $colspan = 0;
        if ($codes) {
            $res .= "<th>Codes</th>";
            $colspan++;
        }
        if ($values) {
            $res .= "<th>Values</th>";
            $colspan++;
        }
        if ($messages) {
            $res .= "<th>Messages</th>";
            $colspan++;
        }
        $res .= "</tr>";

        if (count($this->errorLog) > 0) {
            foreach($this->errorLog as $errorRow){
                $res .= "<tr>";
                if ($codes) {
                    $res .= "<td>".$errorRow["CODE"]."</td>";
                }
                if ($values) {
                    $res .= "<td>".$errorRow["VALUE"]."</td>";
                }
                if ($messages) {
                    $res .= "<td>".$errorRow["MESSAGE"]."</td>";
                }
                $res .= "</tr>";
            }
            
            $res .= "</table>";
        } else {
            $res .= "<tr><td colspan=$colspan><center>There was no errors.<center></td></tr></table>";
        }
        echo $res;
    }
    
    /**
     * Handler for PHP-generated errors.
     * Parameters are useless for common tasks.
     * 
     * @access  protected
     **/
    function phpError($errno, $errstr, $errfile, $errline)
    {
        $errorDescription = array (
                E_ERROR           => "Error",
                E_WARNING         => "Warning",
                E_PARSE           => "Parsing Error",
                E_NOTICE          => "Notice",
                E_CORE_ERROR      => "Core Error",
                E_CORE_WARNING    => "Core Warning",
                E_COMPILE_ERROR   => "Compile Error",
                E_COMPILE_WARNING => "Compile Warning",
                E_USER_ERROR      => "User Error",
                E_USER_WARNING    => "User Warning",
                E_USER_NOTICE     => "User Notice",
                E_STRICT          => "Strict Notice"
                );
        //print_r($this->phpErrorFilter);
        if (in_array($errno, $this->phpErrorFilter) ) {
            $this->error("PHPERROR", sprintf($this->phpErrorFormat, $errorDescription[$errno], $errstr, $errfile, $errline));
        }
    }
    
    /**
     * Main error handling function
     * 
     * @param   string   $code    Error code.
     * @param   string   $value   Additional info for report.
     * @param   bool     $print   If false, error message will not be printed to output.
     * @access  public
     **/
    function error($code = "ERROR", $value = false, $print = "default")
    {
        if (is_callable($this->procFunction)) {
            if (call_user_func($this->procFunction, $code, $value)) {
                $print = false;
            };
        }
        
        $message = $this->errorMessage($code, $value) . "<br/><br/>\n";
        if ($print == "default") {
            $print = $this->printErrors;
        }

        if ($print) {
            echo $message;
        }
        
        $this->errorLog[] = array("CODE" =>  $code, "VALUE" => $value, "MESSAGE" => $message);
    }
    
}



/**
 * Static gEP handler wrapper for PHP-generated errors.
 * Parameters are useless for common tasks.
 **/
function errorHandler($errno, $errstr, $errfile, $errline)
{
    global $EP;
    $EP->phpError($errno, $errstr, $errfile, $errline);
}

// Creating main instance of gEP class - EP object.
// You don't need to change this code or create new gEP object.
// Just use this..

	

$EP = new gEP(null, "errorHandler");

?>