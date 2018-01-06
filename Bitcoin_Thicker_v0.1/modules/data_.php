<?php

  $url = "https://www.bitstamp.net/api/ticker/";
  $fgc = file_get_contents($url);
  $json = json_decode($fgc, true);
  $last = $json["last"];
  $avg_price = $json["vwap"];

  $high = $json["high"];
  $low = $json["low"];
  //$date_created = $json["created_at"];
  $date_current = date("m-d-Y - h:i:sa");

      if ($high < $last){
      //price  went up
      $indicator ="+";
      $change = $last - $high;
      $percent = $change / $high;
      $percent = percent * 100;
      $percentChange = $indicator.number_format($percent, 2);
      $color = "green";
      }
      if($high > $last){
        //price  went down
        $indicator ="-";
        $change = $high - $last;
        $percent = $change / $high;
        $percent = $percent * 100;
        $percentChange = $indicator.number_format($percent, 2);
        $color = "red";
      }
      if ($last == $high){
        $indicator =" ";
        $change = $last - $high;
        $percent = 100*($change / $high);
        $percentChange = $indicator.number_format($percent, 2);
        $color = "blue";
      }

$table = <<<EOT
<table width = "100%">
<tr>
<td colspan="2" align ="center" id="title">BITCOIN WATCHER</td>
</tr>
<tr>
<td rowspan="4" width="60%" id="lastPrice">Last Price $$last</td>
<td align="right" style="color:$color;"> $percentChange %</td>
</tr>
<tr>
<td align="right">Highest $$high</td>
</tr>
<tr>
<td align="right">Lowest $$low</td>
</tr>
<tr>
<td align="right">Average $avg_price</td>
</tr>
<tr>
<td align="center" id="date_current" colspan="2">Today is $date_current</td>
</tr>
<tr>
<td align="center" id="ticker" colspan="2">Ticker from <a href="bitstamp.net">bitstamp.net</a> </td>
</tr>
</table>
EOT;
echo $table;


?>
