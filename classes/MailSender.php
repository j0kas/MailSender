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
        
        if (is_string($input)) {
            $input = preg_split("/[\s\n\t\r,;]+/", $input);
        }
        
        if (is_array($input)) {
            foreach ($input as $value) {
                if (filter_var($value, FILTER_VALIDATE_EMAIL))
                    $output .= (($output == "") ?  "" : ";") . $value ;
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
        
        if (!self::isMobile()) {
            return '<div id="ms-container">
                        <p>Acc&eacute;dez directement &agrave; votre messagerie :</p>
                        <div id="ms-links-wrapper">
                            <div id="ms-client" class="ms-link">
                                <a href="mailto:' . $this->to . '?bcc=' . $this->bcc . '&cc=' . $this->cc . '&subject=' . $this->subject . '&body=' . $this->body . '" class="ms-bg-img ms-client-bg" title="Client"></a>
                                <i class="ms-title">Client de messagerie</i>
                            </div>
                            <div id="ms-gmail" class="ms-link">
                                <div onclick="window.open(\'https://mail.google.com/mail/u/0/?view=cm&fs=1&to=' . $this->to . '&bcc=' . $this->bcc . '&cc=' . $this->cc . '&su=' . $this->subject . '&body=' . $this->body . '\', \'\' ,\'width=800, height=600, menubar=yes\')" class="ms-bg-img ms-gmail-bg" title="Gmail"></div>
                                <i class="ms-title">Gmail</i>
                            </div>
                            <div id="ms-orange" class="ms-link">
                                <div onclick="window.open(\'http://webmail.orange.fr/webmail/fr_FR/write.html\', \'\' ,\'width=800, height=600, menubar=yes\')" class="ms-bg-img ms-orange-bg" title="Orange"></div>
                                <i class="ms-title">Orange</i>
                            </div>
                            <div id="ms-sfr" class="ms-link">
                                <div onclick="window.open(\'https://messagerie.sfr.fr/\', \'\' ,\'width=1200, height=600, menubar=yes\')" class="ms-bg-img ms-sfr-bg" title="SFR"></div>
                                <i class="ms-title">SFR</i>
                            </div>
                            <div id="ms-hotmail" class="ms-link">
                                <div onclick="window.open(\'http://mail.live.com/mail/EditMessageLight.aspx?n=&page=Compose&to=' . $this->to . '&bcc=' . $this->bcc . '&cc=' . $this->cc . '&su=' . $this->subject . '&body=' . $this->body . '\', \'\' ,\'width=800, height=600, menubar=yes\')" class="ms-bg-img ms-hotmail-bg" title="Windows Live Hotmail"></div>
                                <i class="ms-title">Hotmail</i>
                            </div>
                            <div id="ms-yahoo" class="ms-link">
                                <div onclick="window.open(\'http://compose.mail.yahoo.com/?to=' . $this->to . '&bcc=' . $this->bcc . '&cc=' . $this->cc . '&su=' . $this->subject . '&body=' . $this->body . '\', \'\' ,\'width=1200, height=600, menubar=yes\')" class="ms-bg-img ms-yahoo-bg" title="Yahoo Mail"></div>
                                <i class="ms-title">Yahoo</i>
                            </div>
                            <div id="ms-free" class="ms-link">
                                <div onclick="window.open(\'http://imp.free.fr/horde/imp/compose.php?to=' . $this->to . '&bcc=' . $this->bcc . '&cc=' . $this->cc . '&subject=' . $this->subject . '&body=' . $this->body . '\', \'\' ,\'width=800, height=600, menubar=yes\')" class="ms-bg-img ms-free-bg" title="Free"></div>
                                <i class="ms-title">Free</i>
                            </div>
                            <div id="ms-laposte" class="ms-link">
                                <div onclick="window.open(\'https://webmailz.laposte.net/mail#1\', \'\' ,\'width=800, height=600, menubar=yes\')" class="ms-bg-img ms-laposte-bg" title="Laposte"></div>
                                <i class="ms-title">Laposte</i>
                            </div>
                            <div id="ms-numericable" class="ms-link">
                                <div onclick="window.open(\'https://webmail.numericable.fr/ncn/mail/send.php?msg_to=' . $this->to . '&msg_bcc=' . $this->bcc . '&msg_cc=' . $this->cc . '&msg_subject=' . $this->subject . '&msg_text=' . $this->body . '\', \'\' ,\'width=800, height=600, menubar=yes\')" class="ms-bg-img ms-numericable-bg" title="Num&eacute;ricable"></div>
                                    <i class="ms-title">Num&eacute;ricable</i>
                            </div>
                            <!--<div id="ms-others">
                            </div>-->
                        </div>
                        <fieldset id="ms-text-proposition">
                            <legend>Proposition de texte</legend>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis viverra tortor imperdiet malesuada adipiscing. Quisque varius placerat diam, in elementum urna aliquam at. Vivamus iaculis eleifend vestibulum. Quisque ac erat leo. Aliquam ultrices et lorem eget convallis. Duis sed ante sed est sollicitudin tempor nec auctor erat. Proin eget risus magna. Aenean vulputate, nibh nec auctor pulvinar, justo quam posuere neque, et fringilla eros turpis et mauris. Phasellus euismod at magna eget porttitor.</p>

                            <p>Mauris ornare lacinia condimentum. Pellentesque interdum elit a dolor vehicula, ac condimentum arcu adipiscing. Mauris in pulvinar libero. Maecenas mauris metus, dignissim eu erat eu, volutpat dictum metus. Integer imperdiet turpis at arcu interdum, scelerisque elementum nulla ultrices. Maecenas semper metus at ligula bibendum, a tempus velit faucibus. Suspendisse mauris ante, tristique sit amet pellentesque nec, vestibulum quis sapien.</p>

                            <p>Proin rhoncus, dolor non facilisis viverra, ligula sapien suscipit purus, et tempor erat justo eget lectus.</p>
                            <!--<div class="centerize">
                                <button class="ms-btn-copy">Copier</button>
                            </div>-->
                        </fieldset>
                        <fieldset id="ms-recipients-proposition">
                            <legend>Destinataires</legend>
                            <p>example01@gmail.com</p>
                            <p>example02@hotmail.com</p>
                            <!--<div class="centerize">
                                <button class="ms-btn-copy">Copier</button>
                            </div>-->
                        </fieldset>
                    </div>';
        } else {
            return '<div id="ms-container">
                        <div id="ms-client" class="ms-link">
                            <a href="mailto:' . $this->to . '?bcc=' . $this->bcc . '&cc=' . $this->cc . '&subject=' . $this->subject . '&body=' . $this->body . '" class="sprite sprite-client" title="Client"></a>
                            <i class="ms-title">Client de messagerie</i>
                        </div>
                    </div>';
        }
        
    }
    
    function isMobile() {

	// Get the user agent

	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	// Create an array of known mobile user agents
	// This list is from the 21 October 2010 WURFL File.
	// Most mobile devices send a pretty standard string that can be covered by
	// one of these.  I believe I have found all the agents (as of the date above)
	// that do not and have included them below.  If you use this function, you 
	// should periodically check your list against the WURFL file, available at:
	// http://wurfl.sourceforge.net/


	$mobile_agents = Array(


		"240x320",
		"acer",
		"acoon",
		"acs-",
		"abacho",
		"ahong",
		"airness",
		"alcatel",
		"amoi",	
		"android",
		"anywhereyougo.com",
		"applewebkit/525",
		"applewebkit/532",
		"asus",
		"audio",
		"au-mic",
		"avantogo",
		"becker",
		"benq",
		"bilbo",
		"bird",
		"blackberry",
		"blazer",
		"bleu",
		"cdm-",
		"compal",
		"coolpad",
		"danger",
		"dbtel",
		"dopod",
		"elaine",
		"eric",
		"etouch",
		"fly " ,
		"fly_",
		"fly-",
		"go.web",
		"goodaccess",
		"gradiente",
		"grundig",
		"haier",
		"hedy",
		"hitachi",
		"htc",
		"huawei",
		"hutchison",
		"inno",
		"ipad",
		"ipaq",
		"ipod",
		"jbrowser",
		"kddi",
		"kgt",
		"kwc",
		"lenovo",
		"lg ",
		"lg2",
		"lg3",
		"lg4",
		"lg5",
		"lg7",
		"lg8",
		"lg9",
		"lg-",
		"lge-",
		"lge9",
		"longcos",
		"maemo",
		"mercator",
		"meridian",
		"micromax",
		"midp",
		"mini",
		"mitsu",
		"mmm",
		"mmp",
		"mobi",
		"mot-",
		"moto",
		"nec-",
		"netfront",
		"newgen",
		"nexian",
		"nf-browser",
		"nintendo",
		"nitro",
		"nokia",
		"nook",
		"novarra",
		"obigo",
		"palm",
		"panasonic",
		"pantech",
		"philips",
		"phone",
		"pg-",
		"playstation",
		"pocket",
		"pt-",
		"qc-",
		"qtek",
		"rover",
		"sagem",
		"sama",
		"samu",
		"sanyo",
		"samsung",
		"sch-",
		"scooter",
		"sec-",
		"sendo",
		"sgh-",
		"sharp",
		"siemens",
		"sie-",
		"softbank",
		"sony",
		"spice",
		"sprint",
		"spv",
		"symbian",
		"tablet",
		"talkabout",
		"tcl-",
		"teleca",
		"telit",
		"tianyu",
		"tim-",
		"toshiba",
		"tsm",
		"up.browser",
		"utec",
		"utstar",
		"verykool",
		"virgin",
		"vk-",
		"voda",
		"voxtel",
		"vx",
		"wap",
		"wellco",
		"wig browser",
		"wii",
		"windows ce",
		"wireless",
		"xda",
		"xde",
		"zte"
	);

	// Pre-set $is_mobile to false.

	$is_mobile = false;

	// Cycle through the list in $mobile_agents to see if any of them
	// appear in $user_agent.

	foreach ($mobile_agents as $device) {

		// Check each element in $mobile_agents to see if it appears in
		// $user_agent.  If it does, set $is_mobile to true.

		if (stristr($user_agent, $device)) {

			$is_mobile = true;

			// break out of the foreach, we don't need to test
			// any more once we get a true value.

			break;
		}
	}

	return $is_mobile;
}
    
}

