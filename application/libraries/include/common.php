<?php
  /**
 * This file contains the common class file.
 *
 * @author Laurence
 * @version  01/23/2013  
 */
 
class gCMSCommon
{
	 function __construct()
    {
		
    }
	
	function doDestory()
	{    
		session_unset();
		session_destroy();
	}  
    
    function toString($subject)
    {           
        global $CONSTANTS;
        $ret = "";
         
        $CONSTANTS["symbol"] = array(
        SYMBOL1, SYMBOL2, SYMBOL3, SYMBOL4, SYMBOL5, SYMBOL6, SYMBOL7, SYMBOL8, SYMBOL9, 
        SYMBOL10, SYMBOL11, SYMBOL12, SYMBOL13, SYMBOL14, SYMBOL15, SYMBOL16, SYMBOL17, SYMBOL18, SYMBOL19, 
        SYMBOL20, SYMBOL21, SYMBOL22, SYMBOL23, SYMBOL24, SYMBOL25, SYMBOL26, SYMBOL27, SYMBOL28, SYMBOL29, 
        SYMBOL30, SYMBOL31, SYMBOL32);
 
        foreach($CONSTANTS["symbol"] as $key)
        {  
           //$ret = str_replace("\"", sprintf($key, ""), $subject);            
        }
        
        for ($i=0; $i < strlen($subject); $i++)
        {   
            $code = "";
            switch ($subject[$i]){
               case SYMBOL1:$code = CODE1;break; 
               case SYMBOL2:$code = CODE2;break;
               case SYMBOL3:$code = CODE3;break; 
               case SYMBOL4:$code = CODE4;break; 
               case SYMBOL5:$code = CODE5;break; 
               case SYMBOL6:$code = CODE6;break; 
               case SYMBOL7:$code = CODE7;break; 
               case SYMBOL8:$code = CODE8;break; 
               case SYMBOL9:$code = CODE9;break; 
               case SYMBOL10:$code = CODE10;break; 
               case SYMBOL11:$code = CODE11;break; 
               case SYMBOL12:$code = CODE12;break; 
               case SYMBOL13:$code = CODE13;break; 
               case SYMBOL14:$code = CODE14;break; 
               case SYMBOL15:$code = CODE15;break; 
               case SYMBOL16:$code = CODE16;break; 
               case SYMBOL17:$code = CODE17;break; 
               case SYMBOL18:$code = CODE18;break; 
               case SYMBOL19:$code = CODE19;break; 
               case SYMBOL20:$code = CODE20;break; 
               case SYMBOL21:$code = CODE21;break; 
               case SYMBOL22:$code = CODE22;break; 
               case SYMBOL23:$code = CODE23;break; 
               case SYMBOL24:$code = CODE24;break; 
               case SYMBOL25:$code = CODE25;break; 
               case SYMBOL26:$code = CODE26;break; 
               case SYMBOL27:$code = CODE27;break; 
               case SYMBOL28:$code = CODE28;break;
               case SYMBOL29:$code = CODE29;break; 
               case SYMBOL30:$code = CODE30;break; 
               case SYMBOL31:$code = CODE31;break; 
               case SYMBOL32:$code = CODE32;break;
               default: $code="";break;                 
            }
            
            if ($code == ""){
               $ret .= $subject[$i]; 
            } else {
               $ret .= sprintf($code, "");
            }
        }
        return $ret;
    }
    
    function getLabel($key, $code)
    {
        global $LANGUAGE;
        $lng  = new gLNG(APPPATH . 'libraries/languages', $code . "/label", $code . "/label");                
        $value = $lng->translate($key);        
        return $value;
    }
    
    function getMessage($key, $code)
    {
        global $LANGUAGE;
        $lng  = new gLNG(APPPATH . 'libraries/languages', $code . "/message", $code . "/message");     
        $value = $lng->translate($key);        
        return $value;
    }
}

?>