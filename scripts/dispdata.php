<?php

echo '<center><table><tr>';

if(isset($_SESSION['lat']))
{
    echo '<td  class="round">E. Latitude: '.finddeg($_SESSION['lat']).'&deg'.findmin($_SESSION['lat'])."'";
    if($_SESSION['lat'] > 0)
    {
        echo " N";
    }
    else
    {
        echo " S";
    }
    echo '</td>';
}

if(isset($_SESSION['long']))
{
    echo '<td  class="round">E. Longitude: '.finddeg($_SESSION['long']).'&deg'.findmin($_SESSION['long'])."'";
        if($_SESSION['long'] > 0)
    {
        echo " E";
    }
    else
    {
        echo " W";
    }
    echo '</td>';
}
if(isset($_SESSION['timecorr']))
{
   
}

echo "</tr></table></center>";

?>
