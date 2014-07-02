<html>
    <head>
        <link rel="stylesheet" href="css/mailsender.css">
    </head>
    <body>
        <div id="ms-links">
            <a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=<?php echo $_GET['to'] ?>&bcc=<?php $_GET['bcc'] ?>&cc=<?php $_GET['cc'] ?>&su=<?php echo $_GET['subject'] ?>&body=<?php echo $_GET['body'] ?>&tf=1" class="sprite sprite-gmail" title="Gmail"></a>
            <a target="_blank" href="http://compose.mail.yahoo.com/?to=<?php echo $_GET['to'] ?>&bcc=<?php $_GET['bcc'] ?>&cc=<?php $_GET['cc'] ?>&subject=<?php $_GET['subject'] ?>&body=<?php echo $_GET['body'] ?>" class="sprite sprite-yahoo" title="Yahoo Mail"></a>
            <a target="_blank" href="http://mail.live.com/mail/EditMessageLight.aspx?n=&to=<?php echo $_GET['to'] ?>&bcc=<?php $_GET['bcc'] ?>&cc=<?php $_GET['cc'] ?>&subject=<?php $_GET['subject'] ?>&body=<?php echo $_GET['body'] ?>" class="sprite sprite-hotmail" title="Windows Live Hotmail"></a>
            <a target="_blank" href="mailto:<?php echo $_GET['to'] ?>?&bcc=<?php echo $_GET['bcc'] ?>&cc=<?php $_GET['cc'] ?>&subject=<?php echo $_GET['subject'] ?>&body=<?php echo $_GET['body'] ?>" class="sprite sprite-client" title="Client"></a>
        </div>
    </body>
</html>