
        <?php
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        
        // corectie ora
        
    if(isset($_SESSION['sun1th'])&&isset($_SESSION['sun1tm'])&&isset($_SESSION['sun1ts'])&&isset($_SESSION['month'])&&isset($_SESSION['day'])&&isset($_SESSION['year']))    
{
    $time = gmmktime($_SESSION['sun1th'], $_SESSION['sun1tm'], $_SESSION['sun1ts'], $_SESSION['month'], $_SESSION['day'], $_SESSION['year']);
    $corr = $_SESSION['timecorr'];
    $corrtime = $time + $_SESSION['timecorr'];    
}
        
        //calcul GHA , P

    if(isset($_SESSION['sun1th'])&&isset($_SESSION['sun1tm'])&&isset($_SESSION['sun1ts']))    
{    

    $gha = find_sungha($_SESSION['sun1ts']+$corr, $_SESSION['sun1tm'], $_SESSION['sun1th'], $_SESSION['day'], $_SESSION['month'], $_SESSION['year']);
    
        if(isset($gha)&&isset($_SESSION['long']))
    {      
        $pol1 = $gha+$_SESSION['long'];
        
        if($pol1 < 0)
        {
            $pol1 = $pol1 +360;
        }

        if($pol1 > 360)
        {
            $pol1 = $pol1-360;
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
    //calcul declinatie
    if(isset($_SESSION['day'])&&isset($_SESSION['month'])&&isset($_SESSION['year']))
    {
    $sun1dec = find_sundec($_SESSION['sun1ts'],$_SESSION['sun1tm'],$_SESSION['sun1th'],$_SESSION['day'],$_SESSION['month'],$_SESSION['year']);
    }    
}
     //cakcul az / he
    if(isset($sun1dec)&&isset($_SESSION['lat'])&&isset($pol1))
            {
    
          $he1 = calc_he($_SESSION['lat'],$sun1dec,$pol1);       
          $az1 = calc_az($_SESSION['lat'], $he1, $sun1dec, $pol1, $tippol1);

            }
            
            if(isset($_SESSION['sun1h'])&&isset($_SESSION['temp'])&&isset($_SESSION['pressure']))
{
                
    $sun1h = $_SESSION['sun1h'];
    
    $sexer = degtonum(0, $_SESSION['sexer'], 0);

    

    $depr = dip($_SESSION['height']);

   
    
    $mean = meanrefraction($sun1h);
  
    $t = degtonum(0,tempcorr($sun1h,$_SESSION['temp']),0);    
 
    $p = degtonum(0,prescor($sun1h,$_SESSION['pressure']),0);
    
    $sunsd = sunsd($sun1h,$time,$_SESSION['type']);
 
    $corrsun1h = $sun1h + $sexer - $depr - $mean + $t +$p +$sunsd;

    $dh = $corrsun1h - $he1;

    
}


// display data

if(isset($corrtime))
{
echo '<center><table><tr>';
echo '<td class="round">Time: '.date('G',$corrtime+$srvtimecorr).'h '.date('i',$corrtime+$srvtimecorr).'m  '.date('s',$corrtime+$srvtimecorr).'s '.'</td>';
echo '</tr></table></center>';
}

echo '<center><table><tr>';

if(isset($gha))
{
    
    echo '<td  class="round">GHA: '.finddeg($gha).'&deg'.findmin($gha)."'</td>";
}

if(isset($pol1)&&isset($tippol1))
{
    echo '<td  class="round">P: '.finddeg($pol1).'&deg'.findmin($pol1)."' ".$tippol1."</td>";
}

if(isset($sun1dec))
{
    echo '<td  class="round">Declination: '.finddeg($sun1dec).'&deg'.findmin($sun1dec)."'</td>";
}

if(isset($az1))
{
    echo '<td  class="round">Az: '.$az1.'&deg</td>';
}

echo "</tr></table></center><center><table><tr>";

if(isset($corrsun1h))
{
    echo '<td  class="round">Ha: '.finddeg($corrsun1h).'&deg'.findmin($corrsun1h)."'</td>";
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




        ?>       
        
       
    
        
</tr></table>    </td></tr></table>