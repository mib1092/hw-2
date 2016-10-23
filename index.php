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
            <input type="text" name="name" required placeholder="Name"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="tel" name="tel" placeholder="Phone"><br>
            <textarea name="msg" cols="22" rows="5" placeholder="Message"></textarea><br>
            <input type="hidden" name="date" value="<?php echo date('H:i:s d/m/Y'); ?>">
            <input type=submit value="Submit">
        </form>
    </div>
</body>
</html>