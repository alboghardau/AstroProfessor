<?php
session_start();
$_SESSION['page']=2;

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
  
    <center><form action="setday.php" method="post">
        <table class="start"><tr>
                <td class="space"></td>
                <td class="round">Sun's Altitude</td>
                <td class="input"><input class="trans" type="text" name="sun1deg" value="<?php if(isset($_SESSION['sun1h'])) { echo only_deg($_SESSION['sun1h']); }?>"/></td>
                <td class="round">&deg</td>
                <td class="input"><input class="trans" type="text" name="sun1min" value="<?php if(isset($_SESSION['sun1h'])) { echo only_min($_SESSION['sun1h']); }?>"/></td>
                <td class="round">'</td>
                <td class="input"><input class="trans" type="text" name="sun1sec" value="<?php if(isset($_SESSION['sun1h'])) { echo only_sec($_SESSION['sun1h']); }?>"/></td>

                <td class="round">"</td>
                <td class="space"></td>
                <td><img style="border: 1px solid #9A9DA2;" src="img/day/sunl.png" alt="sunl"><input type="radio" name="type" value="l" <?php if(isset($_SESSION['type'])&&($_SESSION['type']=="l")) { echo 'checked="checked"';}?>/></td>
                <td class="space"></td>
                <td><img style="border: 1px solid #9A9DA2;" src="img/day/sunu.png" alt="sunl"><input type="radio" name="type" value="u" <?php if(isset($_SESSION['type'])&&($_SESSION['type']=="u")) { echo 'checked="checked"';}?>/></td>
            
            </tr>
            
            <tr>
                <td class="space"></td>
                <td class="round">Time</td>
                <td class="input"><input class="trans" type="text" name="sun1th" value="<?php if(isset($_SESSION['sun1th'])) { echo $_SESSION['sun1th']; }?>"/></td>
                <td class="round">h</td>
                <td class="input"><input class="trans" type="text" name="sun1tm" value="<?php if(isset($_SESSION['sun1tm'])) { echo $_SESSION['sun1tm']; }?>"/></td>
                <td class="round">m</td>
                <td class="input"><input class="trans" type="text" name="sun1ts" value="<?php if(isset($_SESSION['sun1ts'])) { echo $_SESSION['sun1ts']; }?>"/></td>
                <td class="round">s</td>

            </tr>
               
            </table>
            <input type="image" src="img/transparent.png" class="submitbt" />
        </form></center><br/>
                    </div>                 
                    
<div id="lowbar">
    <?php include('scripts/dispdata.php');?>
    <?php include('dayresult.php');?>
    
</div>
 <div id="low"></div>
        </div>
    </body>
</html>