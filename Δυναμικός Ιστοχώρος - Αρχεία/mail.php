<?php

if (isset($_POST['submit'])) {
    $sender = $_POST['sender'];
    $theme = $_POST['theme'];
    $text = $_POST['text'];

    $mailto = "mariannfk@csd.auth.gr";
    $headers = "From: ".$sender;
    $txt = "\n\n".$text;
    

    mail($mailto, $theme, $txt, $headers);
}

?>