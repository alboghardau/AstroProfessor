

<?php
//deactivate notices
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


if(isset($_SESSION['star1th'])&&isset($_SESSION['star1tm'])&&isset($_SESSION['star1ts']))    
{
    $time = gmmktime($_SESSION['star1th'], $_SESSION['star1tm'], $_SESSION['star1ts'], $_SESSION['month'], $_SESSION['day'], $_SESSION['year']);
    $corr = $_SESSION['timecorr'];
    $corrtime = $time + $_SESSION['timecorr'];
    }
    
    if(isset($_SESSION['star1th'])&&isset($_SESSION['star1tm'])&&isset($_SESSION['star1ts'])&&isset($_SESSION['star1id']))    
    {
        

    $gha2 = find_gha($_SESSION['star1ts'], $_SESSION['star1tm'], $_SESSION['star1th'], $_SESSION['day'], $_SESSION['month'], $_SESSION['year']);
    
            $sha =  find_sha($_SESSION['day'], $_SESSION['month'], $_SESSION['year'], $_SESSION['star1id']);

        if(isset($gha2)&&isset($sha)&&isset($_SESSION['long']))
    {
        $pol1 = polarangle($gha2, $sha, $_SESSION['long']);

        if($pol1 < 0)
        {
            $pol1 = $pol1 +360;
        }
        
        if($pol1 <=180)
        {
            $tippol1 = "Pw";
        }
        
        if($pol1 >180)
        {
            $pol1 = 360-$pol1;
            $tippol1 = "Pe";
        }

    }    
                if(isset($_SESSION['star1id'])&&isset($_SESSION['day'])&&isset($_SESSION['month'])&&isset($_SESSION['year']))
            {
                $star1dec = find_stardec($_SESSION['day'],$_SESSION['month'],$_SESSION['year'],$_SESSION['star1id']);
            }    
}

    if(isset($star1dec)&&isset($_SESSION['lat'])&&isset($pol1))
            {                
                $he1 = calc_he($_SESSION['lat'],$star1dec,$pol1);
                $az1 = calc_az($_SESSION['lat'], $he1, $star1dec, $pol1, $tippol1);
            }

    if(isset($_SESSION['star1h'])&&isset($_SESSION['temp'])&&isset($_SESSION['pressure']))
{
    $star1h = $_SESSION['star1h'];
    $star1hg = $_SESSION['star1h'];

    $sexer = degtonum(0, $_SESSION['sexer'], 0);

    $depr = dip($_SESSION['height']);
  
    $mean = meanrefraction($star1hg);
   
    $t = degtonum(0,tempcorr($star1hg,$_SESSION['temp']),0);
   
    $p = degtonum(0,prescor($star1hg,$_SESSION['pressure']),0);
    
    $corrstarh = $star1h + $sexer -$depr- $mean + $t + $p;
   
    $dh = $corrstarh - $he1;    
}

?>


<?php

include('scripts/dispdata.php');

if(isset($corrtime))
{
echo '<center><table><tr>';
echo '<td class="round">Time: '.date('G',$corrtime+$srvtimecorr).'h '.date('i',$corrtime+$srvtimecorr).'m  '.date('s',$corrtime+$srvtimecorr).'s '.'</td>';
echo '</tr></table></center>';
}

echo '<center><table><tr>';

if(isset($gha2))
{
    echo '<td  class="round">GHA: '.finddeg($gha2).'&deg'.findmin($gha2)."'</td>";
}
if(isset($sha))
{
    echo '<td  class="round">SHA: '.finddeg($sha).'&deg'.findmin($sha)."'</td>";
}
if(isset($pol1)&&isset($tippol1))
{
    echo '<td  class="round">P: '.finddeg($pol1).'&deg'.findmin($pol1)."' ".$tippol1."</td>";
}

if(isset($star1dec))
{
    echo '<td  class="round">Declination: '.finddeg($star1dec).'&deg'.findmin($star1dec)."'</td>";
}

if(isset($az1))
{
    echo '<td  class="round">Az: '.$az1.'&deg</td>';
}

echo "</tr></table></center><center><table><tr>";
if(isset($corrstarh))
{
    echo '<td  class="round">Ha: '.finddeg($corrstarh).'&deg'.findmin($corrstarh)."'</td>";
}
if(isset($he1))
{
    echo '<td  class="round">He: '.finddeg($he1).'&deg'.findmin($he1)."'</td>";
}

if(isset($dh))
{
    echo '<td  class="round">&#x394H: '.finddeg($dh).'&deg'.findmin($dh)."'</td>";
}
echo "</tr></table></center>";



if(isset($_SESSION['star1th'])&&isset($_SESSION['star1tm'])&&isset($_SESSION['star1ts']))    
{
    $gha = find_gha($_SESSION['star1ts'], $_SESSION['star1tm'], $_SESSION['star1th'], $_SESSION['day'], $_SESSION['month'], $_SESSION['year']);
}
?>






<?php

include('settings.php');

    if(isset($_SESSION['day'])&&isset($_SESSION['month'])&&isset($_SESSION['year'])&&isset($gha)&&isset($_SESSION['long']))
    {

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);
    
    $db = mysql_select_db($data, $conn);
    
    $date = gmmktime(12, 0, 0, $_SESSION['month'], $_SESSION['day'], $_SESSION['year']);
    
    $query = "SELECT * FROM stars WHERE startdate<".$date." AND enddate>".$date;
    
    $result = mysql_query($query);
    
    echo '<center><table>';
    
    $a=0;

    while($row = mysql_fetch_array($result))
    {
    
        $polx = polarangle($gha, $row['sha'], $_SESSION['long']);
               
        if($polx >180)
        {
            $polx = 360-$polx;
        }
        
        $hex = calc_he($_SESSION['lat'],$row['declination'],$polx);
                
         
                
                if($a / 6 == 0)
                {
                    echo "<tr>";
                }
              
              
              $query2 = "SELECT * FROM starsname WHERE id=".$row['idstar'];
              
              $result2 = mysql_query($query2);
              
              $row2 = mysql_fetch_array($result2);
              
              echo "<td class='round'>".$row2['name']." ".'<a href="starselect.php?number=1&id='.$row2['id'].'"><img src="img/star.png" alt="star"/></a></td>';
              
              
              if($a % 6 == 5)
                {
                    echo "</tr>";
                }
              $a++;
       
}
    }
    echo '</tr></table></center>';

?>

