<?php

class MailSender
{
    public $to;
    public $cc;
    public $bcc;
    public $subject;
    public $body;
    
    function __construct($to = null, $cc = null, $bcc = null, $subject = null, $body = null) {
        
        $this->to = self::checkFormat($to);
        $this->cc = self::checkFormat($cc);
        $this->bcc = self::checkFormat($bcc);
        $this->subject = $subject;
        $this->body = $body;
        
    }
    
    public function addRecipients($recipients) {
        
        $this->to = $this->to . self::checkFormat($recipients);
        
    }
    
    public function addCC($cc) {
        
        $this->cc = $this->cc . self::checkFormat($cc);
        
    }
    
    public function addBCC($bcc) {
        
        $this->bcc = $this->bcc . self::checkFormat($bcc);
        
    }
    
    /**
     * Format data (string or array) to single string with valid emails only, semicolons-delimited
     * 
     * @static
     * @access private
     * @param string|array $input
     * @return string
     */
    static private function checkFormat($input) {
        
        $output = "";
        
        if (is_string($input))
            $input = preg_split("/[\s\n\t\r,;]+/", $input);

        if(is_array($input)) {
            foreach ($input as $value) {
                if (filter_var($value, FILTER_VALIDATE_EMAIL))
                    $output == "" ? $output = $value . ";" : $output = $output . $value . ";";
            }
        }
        
        return $output;
        
    }
    
}

