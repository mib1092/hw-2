<?php

require 'vendor/autoload.php';

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Homework #2, PHP - GeekHub, 6 season</title>
</head>

<body>
    <div style="text-align: center;">
        <h1>Simple Contact Form</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <input type="text" name="name" required placeholder="Name" value="<?php echo $_POST['name']; ?>"><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $_POST['email']; ?>"><br>
            <input type="tel" name="tel" placeholder="Phone" value="<?php echo $_POST['tel']; ?>"><br>
            <textarea name="msg" cols="22" rows="5" placeholder="Message"><?php echo $_POST['msg']; ?></textarea><br>
            <input type="hidden" name="date" value="<?php echo date('H:i:s d/m/Y'); ?>">
            <input type=submit value="Submit">
        </form>

        <?php
            if ($_POST) {
                require './vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'mazdze@gmail.com';
                $mail->Password = 'Lptwbyf1009';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('hw2@example.com', 'Advanced PHP');
                $mail->addAddress('mazurenko.ihor@gmail.com', 'Ihor');
                if ($_POST['email']) $mail->addReplyTo($_POST['email'], $_POST['name']);

                $mail->isHTML(true);

                $mail->Subject = 'Homework 2, new message';
                $mail->Body = "Name: {$_POST['name']}<br/>\r\nEmail: {$_POST['email']}<br/>\r\nPhone: {$_POST['tel']}<br/>\r\nDate: {$_POST['date']}<br/>\r\nMessage: {$_POST['msg']}";

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }
            }
        ?>

    </div>
</body>
</html>