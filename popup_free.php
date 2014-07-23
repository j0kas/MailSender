<?php
    require_once 'classes/MailSender.php';
    
    $to = $_GET['to'];
    $bcc = $_GET['bcc'];
    $cc = $_GET['cc'];
    $subject = $_GET['subject'];
    $body = $_GET['body'];
    
    $recips = explode(";", $to);
    $BCCs = explode(";", $bcc);
    $CCs = explode(";", $cc);
    
    $ms = new MailSender(null, null, null, $subject, $body);
    
    foreach($recips as $to) {
        $ms->addRecipients($to);
    }
    
    foreach($BCCs as $bcc) {
        $ms->addBCC($bcc);
    }
    
    foreach($CCs as $cc) {
        $ms->addCC($cc);
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="css/mailsender.css">
    </head>
    <body>
        <?php
        echo    '<div id="ms-free" class="ms-link centerize">
                    <div class="ms-bg-img ms-free-bg" title="Free" style="cursor: default;"></div>
                    <i onclick="window.open(\'http://imp.free.fr/horde/imp/compose.php?to=' . $ms->to . '&bcc=' . $ms->bcc . '&cc=' . $ms->cc . '&subject=' . $ms->subject . '&body=' . $ms->body . '\', \'\' ,\'width=1200, height=800, menubar=yes, scrollbars=yes\');window.close()" style="cursor: pointer;">IMP</i>
                    <br><br>
                    <i onclick="window.open(\'https://zimbra.free.fr/?to=' . $ms->to . '&bcc=' . $ms->bcc . '&cc=' . $ms->cc . '&subject=' . $ms->subject . '&body=' . $ms->body . '\', \'\' ,\'width=1200, height=800, menubar=yes, scrollbars=yes\');window.close()" style="cursor: pointer;">Zimbra</i>
                </div>';
        ?>
    </body>
</html>