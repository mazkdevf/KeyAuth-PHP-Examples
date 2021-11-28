<?php

session_start();

if (!isset($_SESSION['userdata']))
{
        header("Location: ../");
        exit();
}

//ALL From API
foreach ($_SESSION["user_data"]["info"]->subscriptions->subscriptions as $sdata) {
    $expiryx = $sdata->expiry;//Expiry Date
    $subscriptionx = $sdata->subscription;//Sub name
    $timeleft = $sdata->timeleft;//Sub name
    //$ded = $sdata->key; //Key Name
}

$ded = $_SESSION["user_data"]["info"]->username; //IP-ADDRESS From KeyAuth
$ip = $_SESSION["user_data"]["info"]->ip; //IP-ADDRESS From KeyAuth
$createdon = $_SESSION["user_data"]["info"]->subscriptions->createdate; //Key Creationdate
$lastlogin = $_SESSION["user_data"]["info"]->subscriptions->lastlogin; //Key Last Login
$submsg = $_SESSION["submessage"];
$substatus = $_SESSION["substatus"];
// END


if(isset($_POST['logout']))
{
	session_destroy();
	header("Location: ../");
    exit();
}

/*
if ($subscriptionx == "FiveM")
{
    //Your script :D
}
*/

?>
<html>
<head>
<title>Dashboard</title>
<script src="https://cdn.keyauth.com/dashboard/unixtolocal.js"></script>
</head>
<body>
<form method="post"><button name="logout">Logout</button></form>
<li>Logged in as <?php echo $ded; ?>
<li>
Expiry: <script>document.write(convertTimestamp(<?php echo $expiryx; ?>));</script>
<li>
TimeLeft: <script>document.write(convertTimestamp(<?php echo $timeleft; ?>));</script> <-- If 1970 then KeyAuth Problem
<li>
Last Login: <script>document.write(convertTimestamp(<?php echo $lastlogin; ?>));</script>
<li>
License Generated on: <script>document.write(convertTimestamp(<?php echo $createdon; ?>));</script>
<li>
Subscription: <?php echo $subscriptionx; ?>
<li>
IP-Address: <?php echo $ip; ?>
</body>
</html>
