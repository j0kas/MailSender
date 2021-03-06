<?php
    /** ma deuxiÃƒÂ¨me contrib pour 2 faux (Flo) **/
    require_once 'classes/MailSender.php';
    $to = "example01@gmail.com";
    $subject = "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet";
    $body = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.";
    //for($i=1;$i<7000;$i++){$body.= "x";}
    $ms = new MailSender();
    $ms->to = $to;
    $ms->addRecipients("example02@hotmail.com");
    $ms->addBCC("example03@yahoo.com");
    $ms->addCC("example04@laposte.net");
    $ms->subject = $subject;
    $ms->body = $body;
?>

<html>
    <head>
        <title>MailSender - Test Layout</title>
        <link rel="stylesheet" href="css/mailsender.css">
        <style>
            #ms-wrapper{
                text-align: center;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }
            #example{
                text-align: left;
                margin-left: auto;
                margin-right: auto;
                margin-top: 30px;
            }
        </style>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                to = "<?php if($ms->to) echo $ms->to;?>";
                bcc = "<?php if($ms->bcc) echo $ms->bcc;?>";
                cc = "<?php if($ms->cc) echo $ms->cc;?>";
                subject = "<?php if($ms->subject) echo $ms->subject;?>";
                body = "<?php if($ms->body) echo $ms->body;?>";
                
                $("#ms-container").hide();
                $("input[name='int-style']").click(function() {
                    if($("input[name='int-style']:checked").val() == "direct") {
                        $("#ms-container").fadeIn();
                        $("#ms-input").hide();
                    } 
                    else if($("input[name='int-style']:checked").val() == "popup") {
                            $("#ms-input").attr("onclick", "window.open('popup.php?to=" + to + "&subject=" + subject + "&body=" + body + "&bcc=" + bcc + "&cc=" + cc + "','webmails', 'height=600, width=800, top=100, left=100, toolbar=no, menubar=yes, location=no, resizable=yes, scrollbars=no, status=no'); return false;");
                            $("#ms-input").show();
                            $("#ms-container").fadeOut();
                        }
                        else { 
                            $("#ms-container").hide();
                            $("#ms-input").fadeIn();
                            $("#ms-input").attr("onclick", "");
                        }
                });
                $("#ms-input").click(function() {
                    if($("input[name='int-style']:checked").val() == "toggle")
                        $("#ms-container").slideToggle("slow");
                });
            })
        </script>
    </head>
    <body>
        <div id="ms-wrapper">
            <span style="display: block; font-weight: bold; font-size: 2em;">MailSender</span>
            <span style="font-size: 12px;">Helps autocomplete emails headers & bodies to ease their sending</span>
            <p style="font-style: italic; font-size: 20px; margin-top: 30px; margin-bottom: 10px;">Integration style :</p>
            <input type= "radio" name="int-style" value="direct"> direct links
            <input type= "radio" name="int-style" value="toggle" checked> toggle
            <input type= "radio" name="int-style" value="popup"> pop-up
            <div id="example">
                <fieldset>
                    <legend><h5>Example</h5></legend>
                    <p>Here are two different email addresses :</p>
                    <ul>
                        <li>example01@gmail.com</li> 
                        <li>example02@hotmail.com</li> 
                    </ul> 
                    <p>The following text will be sent to those addresses :</p>
                    <p style="font-style: italic; font-size: small">
                        <?php echo "&ldquo;" . $ms->body . "&rdquo;"; ?>
                    </p>
                    <button id="ms-input">Send</button>
                    <?php echo $ms->getHtml(); ?>
                </fieldset>
            </div>
        </div>
    </body>
</html>
