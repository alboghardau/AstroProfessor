<?php
session_start();
$_SESSION['page']=3;

include("functions.php");
include("settings.php");


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
  
        <center><form action="setnight.php" method="post">
        <table class="start"><tr>
                <td class="space"></td>
                <td class="round">Star's Altitude:</td>
                <td class="input"><input class="trans" type="text" name="star1deg" value="<?php if(isset($_SESSION['star1h'])) { echo only_deg($_SESSION['star1h']); }?>"/></td>
                <td class="round">&deg</td>
                <td class="input"><input class="trans" type="text" name="star1min" value="<?php if(isset($_SESSION['star1h'])) { echo only_min($_SESSION['star1h']); }?>"/></td>
                <td class="round">'</td>
                <td class="input"><input class="trans" type="text" name="star1sec" value="<?php if(isset($_SESSION['star1h'])) { echo only_sec($_SESSION['star1h']); }?>"/></td>
                <td class="round">"</td>
                <td>
   
                                       
 
                    
                </td>
            </tr><tr>
                <td class="space"></td>
                <td class="round">Time:</td>
                <td class="input"><input class="trans" type="text" name="star1th" value="<?php if(isset($_SESSION['star1th'])) { echo $_SESSION['star1th']; }?>"/></td>
                <td class="round">h</td>
                <td class="input"><input class="trans" type="text" name="star1tm" value="<?php if(isset($_SESSION['star1tm'])) { echo $_SESSION['star1tm']; }?>"/></td>
                <td class="round">m</td>
                <td class="input"><input class="trans" type="text" name="star1ts" value="<?php if(isset($_SESSION['star1ts'])) { echo $_SESSION['star1ts']; }?>"/></td>
                <td class="round">s</td>
            </tr></table>
         
            <input type="image" src="img/transparent.png" class="submitbt" />
        </form></center>
</div>
<div id="lowbar">
    
    <?php include("nightresult.php");?>
    
</div>
             <div id="low"></div>
        </div>
    </body>
</html>