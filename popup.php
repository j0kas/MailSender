<html>
    <head>
        <link rel="stylesheet" href="css/mailsender.css">
    </head>
    <body>
        <div id="ms-links">
            <a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=<?php $ms->to ?>&su=<?php $ms->subject ?>&body=<?php $ms->body ?>&bcc<?php $ms->bcc ?>&cc<?php $ms->cc ?>&tf=1" class="sprite sprite-gmail"></a>
            <a target="_blank" href="http://compose.mail.yahoo.com/?to=<?php $ms->to ?>&subject=<?php $ms->subject ?>&body=<?php $ms->body ?>&bcc<?php $ms->bcc ?>&cc<?php $ms->cc ?>" class="sprite sprite-yahoo"></a>
            <a target="_blank" href="http://mail.live.com/mail/EditMessageLight.aspx?n=&to=<?php $ms->to ?>&subject=<?php $ms->subject ?>&body=<?php $ms->body ?>&bcc<?php $ms->bcc ?>&cc<?php $ms->cc ?>" class="sprite sprite-hotmail"></a>
            <a target="_blank" href="mailto:<?php $ms->to ?>?subject=<?php $ms->subject ?>&body=<?php $ms->body ?>&bcc<?php $ms->bcc ?>&cc<?php $ms->cc ?>" class="sprite sprite-client"></a>
        </div>
    </body>
</html>