<?php

    $filename = __DIR__ . '/file.txt';
    $text = file_get_contents($filename);

    $to      = 'vld.85@inbox.ru';
    $subject = 'the subject';
    $message = 'hello';
    $headers = 'From: webmaster@example.com'       . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $text, $headers);

    echo  ' <a style="color: #808000;" ><b>'.$text.'</b></a> ';


?>