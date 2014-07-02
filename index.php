<?php
    require_once 'classes/MailSender.php';
    $to = "example01@gmail.com;example02@hotmail.com";
    $subject = "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet";
    $body = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque nisi non sollicitudin elementum. Proin ac nisi volutpat, blandit ligula in, accumsan metus. Maecenas et blandit mi. Donec eget velit sapien. Integer commodo feugiat nisi ac vehicula. Praesent auctor euismod hendrerit. Sed dolor elit, ornare a purus sed, faucibus accumsan ipsum. Proin et tempus neque. Curabitur quam purus, consequat non ligula a, porttitor sagittis dui. Proin tristique libero egestas tincidunt vulputate. Nulla pulvinar at enim ut vulputate. Donec sit amet molestie massa. Pellentesque pulvinar, nibh vel iaculis tristique, ipsum odio convallis massa, eu tempus tellus elit sed est. Pellentesque eget eros id augue cursus faucibus dignissim in lorem. Nulla vel nibh non elit suscipit imperdiet id et elit. Vestibulum in mi sed metus congue aliquam.
                <br><br>
                Ut in dictum lectus. Maecenas at consequat risus. Etiam iaculis leo ante, ac pretium dolor posuere sagittis. Nullam sed viverra erat. Phasellus vel cursus augue, quis condimentum nisl. Nunc accumsan est ac aliquet porttitor. Phasellus mattis congue sodales. Duis lobortis dolor felis, eu auctor nunc viverra id.
                <br><br>
                Mauris ante felis, dictum facilisis tortor a, venenatis euismod sem. Etiam ut risus eros. Suspendisse dapibus, risus dictum aliquet fringilla, velit justo viverra mi, quis pulvinar odio tortor et urna. Phasellus scelerisque in felis ac bibendum. Donec dictum hendrerit leo, vel porta lacus rutrum at. Mauris congue enim at arcu ornare malesuada. Curabitur eget bibendum velit. Aenean in dictum urna. Vestibulum cursus justo ut nunc pharetra, eu posuere nulla hendrerit. Nunc eu facilisis eros, a venenatis eros. Phasellus ut libero quam.";            
    $ms = new MailSender();
    $ms->to = $to;
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
                $("#ms-links").hide();
                $("input[name='int-style']").click(function() {
                    if($("input[name='int-style']:checked").val() == "direct") {
                        $("#ms-links").fadeIn();
                        $("#ms-input").hide();
                    } 
                    else if($("input[name='int-style']:checked").val() == "popup") {
                            $("#ms-input").attr("onclick", "window.open('popup.php','mailclient', 'height=50, width=325, top=100, left=100, toolbar=no, menubar=yes, location=no, resizable=yes, scrollbars=no, status=no'); return false;");
                            $("#ms-input").show();
                            $("#ms-links").fadeOut();
                        }
                        else { 
                            $("#ms-links").hide();
                            $("#ms-input").fadeIn();
                            $("#ms-input").attr("onclick", "");
                        }
                });
                $("#ms-input").click(function() {
                    if($("input[name='int-style']:checked").val() == "toggle")
                        $("#ms-links").slideToggle("slow");
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
                        <?php echo "&ldquo;" . $body . "&rdquo;"; ?>
                    </p>
                    <button id="ms-input">Send</button>
                    <div id="ms-links">
                        <a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=<?php $ms->to ?>&su=<?php $ms->subject ?>&body=<?php $ms->body ?>&bcc<?php $ms->bcc ?>&cc<?php $ms->cc ?>&tf=1" class="sprite sprite-gmail"></a>
                        <a target="_blank" href="http://compose.mail.yahoo.com/?to=<?php $ms->to ?>&subject=<?php $ms->subject ?>&body=<?php $ms->body ?>&bcc<?php $ms->bcc ?>&cc<?php $ms->cc ?>" class="sprite sprite-yahoo"></a>
                        <a target="_blank" href="http://mail.live.com/mail/EditMessageLight.aspx?n=&to=<?php $ms->to ?>&subject=<?php $ms->subject ?>&body=<?php $ms->body ?>&bcc<?php $ms->bcc ?>&cc<?php $ms->cc ?>" class="sprite sprite-hotmail"></a>
                        <a target="_blank" href="mailto:<?php $ms->to ?>?subject=<?php $ms->subject ?>&body=<?php $ms->body ?>&bcc<?php $ms->bcc ?>&cc<?php $ms->cc ?>" class="sprite sprite-client"></a>
                    </div>
                </fieldset>
            </div>
        </div>
    </body>
</html>