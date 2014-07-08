<?php
    require_once 'classes/MailSender.php';
    
    $to = $_GET['to'];
    $bcc = $_GET['bcc'];
    $cc = $_GET['cc'];
    $subject = $_GET['subject'];
    $body = $_GET['body'];
    
    $ms = new MailSender($to, $bcc, $cc, $subject, $body);
    $ms->addBCC("example03@yahoo.com");
    $ms->addCC("example04@laposte.net");
?>

<html>
    <head>
        <link rel="stylesheet" href="css/mailsender.css">
    </head>
    <body>
        <?php echo $ms->getHtml(); ?>
    </body>
</html>