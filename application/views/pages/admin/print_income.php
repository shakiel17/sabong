<html>
    <head>
        <title>Income Summary</title>
    </head>
    <body>
    <center>
        <div style="width:768px; text-align:left;">            
            <h2>Income Summary Report</h2>
            <h3>Fight Date: <?=date('m/d/Y',strtotime($rundate));?></h3>
            <table width="100%" border="1" style="border-collapse:collapse;">
                <tr>                    
                    <td align="center" width="8%">Fight #</td>
                    <td align="center" width="20%">Bet Meron</td>
                    <td align="center" width="20%">Bet Wala</td>
                    <td align="center" width="12%">Result</td>
                    <td align="center" width="20%">Total Bet</td>
                    <td align="center" width="20%">Income (15%)</td>
                </tr>
                <?php
                $totalamount=0;
                $totalbet=0;
                foreach($items as $item){
                    $totalamount += ($item['meron_amount']+$item['wala_amount'])*.15;
                    $totalbet += $item['meron_amount']+$item['wala_amount'];
                    echo "<tr>";
                        echo "<td align='center'>#$item[fight_no]</td>";
                        echo "<td align='right'>".number_format($item['meron_amount'],2)."</td>";
                        echo "<td align='right'>".number_format($item['wala_amount'],2)."</td>";
                        echo "<td align='center'>".$item['win_result']."</td>";
                        echo "<td align='right'>".number_format($item['meron_amount']+$item['wala_amount'],2)."</td>";
                        echo "<td align='right'>".number_format(($item['meron_amount']+$item['wala_amount'])*.15,2)."</td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4" align="right"><b>Total </b></td>
                    <td align="right"><?=number_format($totalbet,2);?></td>
                    <td align="right"><?=number_format($totalamount,2);?></td>
                </tr>
            </table>
        </div>
    </center>
    </body>
</html>