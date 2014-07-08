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
    
    /**
     * Return object's html code
     * 
     * @return string
     */
    public function getHtml() {
        
        return '<div id="ms-links">
                        <a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=' . $this->to . '&bcc=' . $this->bcc . '&cc=' . $this->cc . '&su=' . $this->subject . '&body=' . $this->body . '&tf=1" class="sprite sprite-gmail" title="Gmail"></a>
                        <a target="_blank" href="http://compose.mail.yahoo.com/?to=' . $this->to . '&bcc=' . $this->bcc . '&cc=' . $this->cc . '&subject=' . $this->subject . '&body=' . $this->body . '" class="sprite sprite-yahoo" title="Yahoo Mail"></a>
                        <a target="_blank" href="http://mail.live.com/mail/EditMessageLight.aspx?n=&page=Compose&to=' . $this->to . '&bcc=' . $this->bcc . '&cc=' . $this->cc . '&subject=' . $this->subject . '&body=' . $this->body . '" class="sprite sprite-hotmail" title="Windows Live Hotmail"></a>
                        <a target="_blank" href="mailto:' . $this->to . '&bcc=' . $this->bcc . '&cc=' . $this->cc . '&subject=' . $this->subject . '&body=' . $this->body . '" class="sprite sprite-client" title="Client"></a>
                    </div>';
        
    }
    
}

