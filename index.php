<?php
session_start();
$_SESSION['page']=1;

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
     <center><form action="setpos.php" method="post">
        <table class="start"><tr>
                
                <td class="round">Estimated Latitude</td>
                <td class="space"></td>
                <td class="input">
                <input class="trans" type="text" name="latdeg" value="<?php if(isset($_SESSION['lat'])) { echo only_deg($_SESSION['lat']); }?>"/>
                </td>
                <td class="space">&deg</td>
                <td class="input">
                <input class="trans" type="text" name="latmin" value="<?php if(isset($_SESSION['lat'])) { echo only_min($_SESSION['lat']); }?>"/>
                </td>
                <td class="space">'</td>
                <td class="input">
                <input class="trans" type="text" name="latsec" value="<?php if(isset($_SESSION['lat'])) { echo only_sec($_SESSION['lat']); }?>"/>
                </td>
                <td>"</td>
                <td><input type="radio" value="N" name="latname"
                <?php
                if(isset($_SESSION['lat']))
                {
                    if($_SESSION['lat']>=0)
                    {
                        echo 'checked="checked"';
                    }                    
                }
                else
                {
                    echo 'checked="checked"';
                }
                ?>/>N</td>
                <td><input type="radio" value="S" name="latname"
                <?php
                if(isset($_SESSION['lat']))
                {
                    if($_SESSION['lat']<0)
                    {
                        echo 'checked="checked"';
                    }                    
                }?>           
                />S</td>
                </tr><tr>
                
                
                <td class="round">Estimated Longitude</td>
                <td class="space"></td>
                <td class="input">
                <input class="trans" type="text" name="longdeg" value="<?php if(isset($_SESSION['long'])) { echo only_deg($_SESSION['long']); }?>"/>
                </td>
                <td class="space">&deg</td>
                <td class="input">
                <input class="trans" type="text" name="longmin" value="<?php if(isset($_SESSION['long'])) { echo only_min($_SESSION['long']); }?>"/>
                </td>
                <td class="space">'</td>
                <td class="input">
                <input class="trans" type="text" name="longsec" value="<?php if(isset($_SESSION['long'])) { echo only_sec($_SESSION['long']); }?>"/>
                </td>
                <td>"</td>
                <td><input type="radio" value="E" name="longname" <?php
                if(isset($_SESSION['long']))
                {
                    if($_SESSION['long']>=0)
                    {
                        echo 'checked="checked"';
                    }                    
                }
                else
                {
                    echo 'checked="checked"';
                }
                ?>/>E</td>
                <td><input type="radio" value="W" name="longname"
                <?php
                if(isset($_SESSION['long']))
                {
                    if($_SESSION['long']<0)
                    {
                        echo 'checked="checked"';
                    }                    
                } ?>           
                />W</td>
            </tr>
           
        
        </table>
        <input type="image" src="img/transparent.png" class="submitbt" />
    </form></center>   
    
    
    
    
    
    <center>
    <form action="setdate.php" method="post">
    <table class="start"><tr>
                <td class="space"></td>
                <td class="right">Day</td>
                <td class="input"><input class="transright" type="text" name="day" value="<?php if(isset($_SESSION['day'])) { echo $_SESSION['day'];}?>"/></td>
                <td class="right">Month</td>
                <td class="input"><input class="transright" type="text" name="month" value="<?php if(isset($_SESSION['month'])) { echo $_SESSION['month'];}?>"/></td>
                <td class="right">Year</td>
                <td class="input"><input class="transright" type="text" name="year" value="<?php if(isset($_SESSION['year'])) { echo $_SESSION['year'];}?>"/></td>

                </tr>
        <tr><td class="space"></td>
            <td class="right">Atm. Pressure</td>
            <td class="input"><input class="transright" type="text" name="pressure" value="<?php if(isset($_SESSION['pressure'])) { echo $_SESSION['pressure'];}?>"/></td>
            <td class="right">Temperature</td>
            <td class="input"><input class="transright" type="text" name="temp" value="<?php if(isset($_SESSION['temp'])) { echo $_SESSION['temp'];}?>"/></td>
            <td class="right">Sextant Error(use . )</td>
            <td class="input"><input class="transright"  type ="text" name="sexer" value="<?php if(isset($_SESSION['sexer'])) { echo $_SESSION['sexer'];}?>"/></td>
        </tr><tr>
            <td class="space"></td>
            <td class="right">Time Correction(s)</td>
            <td class="input"><input class="transright" type="text" name="timecorr" value="<?php if(isset($_SESSION['timecorr'])) { echo $_SESSION['timecorr'];}?>"/></td>
            <td class="right">Height of eye</td>
            <td class="input"><input class="transright" type="text" name="height" value="<?php if(isset($_SESSION['height'])) { echo $_SESSION['height'];}?>"/></td>
            <td></td>
              </tr>
    </table>
    <input type="image" src="img/transparent.png" class="submitbt" />
    </form>
    </center>
        
    <center>
    <table><tr>    
    <td><a href="savedata.php" class="savebt"></a></td>
    <td><a href="loaddata.php" class="loadbt"></a></td>
    <td><a href="sessionkill.php" class="resetbt"></a></td>
    </tr></table>
    </center>
    
    <br/>


    </div>
<div id="lowbar" ><center>! Use  1000mb pressure and 10&deg C temperature !</center>
</div>
            <div id="low"></div>
        </div>
 
    </body>
</html>