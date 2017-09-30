<?php
session_start();

 ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); 
define ('DB_HOST' , 'us-cdbr-iron-east-05.cleardb.net');

define ('DB_UNAME' , 'bdb069f3a03f14');

define ('DB_PASSWORD' , '14099455');

define ('DB_NAME' , 'heroku_cc8454bcfb5c8fa');

 $conn = mysqli_connect('us-cdbr-iron-east-05.cleardb.net', 'bdb069f3a03f14', '14099455', 'heroku_cc8454bcfb5c8fa');

$_SESSION['LAST_ACTIVITY'] = time();
/*if(empty($_SESSION['e'])){
     header('Location: clientlogin.php');
     exit;
    echo $_SESSION['e'];
    }*/
if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
} else if (time() - $_SESSION['created'] > 5400) {
    // session started more than 30 minutes ago
    //session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    session_destroy();
    $_SESSION['created'] = time();  // update creation time
     header('Location: index.php');
     exit;
}
/*function session_set()
{
    if(empty($_SESSION['e'])){
     header('Location: clientlogin.php');
    echo $_SESSION['e'];
    }
}
	/*ini_set("session.cookie_lifetime","300");

   if(!isset($_SESSION["timeout"])){
     $_SESSION['timeout'] = time();
   };
   $st = $_SESSION['timeout'] + 300; //session time is 1 minute


  if(time() < $st){
    session_destroy();
  }

/*if($conn) {
	echo "connected to db";
	} else {
		echo "not connected to db";
		}
	
?>*/
?>


