<?php
session_start();
$_SESSION['page']=4;

require_once("functions.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
    <head>
         <title>Astro Demo</title>
         <link rel="stylesheet" href="style/style.css" type="text/css" />
    </head>
    <body>
   
        <div id="main">

<div id="topbar">
    
<?php include("menu.php"); ?>

</div>
<div id="contentmain">
 <center>
   
 <?php 
 include('starsdb.php');
 echo '<br/>';
 include('sundb.php');
 echo "<br/>";

 ?>
    </center>
</div>
<div id="lowbar">


     <br/>



          <center>Version: 1.6.0</center>
     </div>
 <div id="low"></div>
        </div>
    </body>
</html>