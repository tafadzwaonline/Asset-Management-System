<?php
	require('../func/config.php');
      $MethodId = $_GET['DepreciationMethod'];
			$Assetid = $_GET['id'];

			//$id = base64_decode($_GET['id']);
	    $stmt = $db->prepare('SELECT * FROM new_item WHERE Id = :assetId');
	    $stmt->execute(array(':assetId' =>$Assetid));
	    $row = $stmt->fetch();


				$AssetPurchasePrice = $row['PurchasePrice'];

				$OriginalAssetCost =  $row['PurchasePrice'];

				$DepreciationRate = $row['ScrapValue'];

				$ExpectedLifespanInYears = $row['ExpectedAssetLife'];
				
				$PurchaseDate = $row['PurchaseDate'];

                $AssetName = $row['AssetName'];

				//$Date = date("Y-m-d", strtotime($Date));
				// $AssetPurchasePrice = 1000;
				//
				// $OriginalAssetCost =  1000;
				//
				// $SalvageValue = 200;
				//
				// $ExpectedLifespanInYears = 5;


  		if($MethodId=="1"){

				//sum of years depreciationMethod
              $ExpectedLifespanInYears = round((1/$DepreciationRate),2);
			  $start = 1;
			  $end = $ExpectedLifespanInYears;
			 
			  

$date4 = $PurchaseDate;
//$date1 = date( 'Y-01-01', strtotime( $date4) );

$date1= date('Y-12-1', strtotime($date4. ' - 1 year'));

$dateNow=date("Y-m-d");//, strtotime($dateNow));

$date2 = $dateNow;

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year2 - $year1) * 12) + ($month2 - $month1);

//echo $diff;

					$DepreciationRate =$DepreciationRate/100;
					$AssetPurchasePrice = $asset->getPurchasePrice($Assetid);
					$OpeningDepreciation = 0;
					$PeriodDepreciation= ($AssetPurchasePrice*$DepreciationRate)/12;
					$TotalDepreciation=$PeriodDepreciation* $diff;
					$Depreciation = $TotalDepreciation+$OpeningDepreciation = 0;
					$NetBookValue = $AssetPurchasePrice -$Depreciation;
					$whole = floor($ExpectedLifespanInYears);
					$fraction = $ExpectedLifespanInYears -$whole;
					//$EachYear = $diff/12;

 					
echo '<table  class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">'
							.'<thead>';
						echo '<tr>'
										.'<th class="center">'
											.'Month  </th>'.'<th>Cost</th>'
										.'<th>TotalDepreciation</th>'
										.'<th>Accumulated Depreciation</th>' 

										.'<th class="hidden-480">NetBookValue</th>'

									.'</tr>'
								.'</thead>'

							.'<tbody>';
							$x=1;

							// $start1 = $month4 = $ts1;
// $end4 = $ts2;
// while($month4 < $end)
// {
//      // echo date('F Y', $month4), PHP_EOL;
//     
// }

                             
							$month4 = $ts1;
							for ($i = $start; $i < ($diff); $i++) {
								
								 $month4 = strtotime("+1 month", $month4);
								

								//if($x<12){

								if($i == 1){


									$TotalDepreciation = $PeriodDepreciation;
									$Depreciation = $TotalDepreciation + $OpeningDepreciation;
									$NetBookValue = $AssetPurchasePrice -$Depreciation; 
								}

								
								if ( $i > 1) {

								# code...
									$TotalDepreciation = $PeriodDepreciation * $i;
									$Depreciation = $TotalDepreciation + $OpeningDepreciation;
									$NetBookValue = $AssetPurchasePrice -$Depreciation; 
									if($x<12){
									$x++;

								}
								 else {

								 	$x=1;
								 if($NetBookValue < 0)
							    {
								break;
							}
								 	echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">'
							.'<thead>';
						echo '<tr>'
										.'<th class="center">'
											.'Month  </th>'.'<th>Cost</th>'
										.'<th>TotalDepreciation</th>'
										.'<th>Accumulated Depreciation</th>' 

										.'<th class="hidden-480">NetBookValue</th>'

									.'</tr>'
								.'</thead>'

							.'<tbody>';
								}


								}
								


								


				echo 


									'<td>'.date('F Y', $month4), PHP_EOL.'</td>'
										.'<td>'
										. $AssetPurchasePrice
									.'</td>'
									
									.'<td>'.round($TotalDepreciation, 2).'</td>'
									.'<td class="hidden-480">'.round($Depreciation, 2).'</td>'
									.'<td class="hidden-480">'.round($NetBookValue, 2).'</td>'
								.'</tr>';
							}
			



			}else if($MethodId=="2"){
				$ExpectedLifespanInYears = round((1/$DepreciationRate),2);
				$start = 1;
			  $end = $ExpectedLifespanInYears;
			 
			  

$date1 = $PurchaseDate;

$dateNow=date("Y-m-d");//, strtotime($dateNow));

$date2 = $dateNow;

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year2 - $year1) * 12) + ($month2 - $month1);

//echo $diff;

					$DepreciationRate =$DepreciationRate/100;
					$AssetPurchasePrice = $asset->getPurchasePrice($Assetid);
					$OpeningDepreciation = 0;
					$PeriodDepreciation= ($AssetPurchasePrice*$DepreciationRate)/12;
					$TotalDepreciation=$PeriodDepreciation* $diff;
					$Depreciation = $TotalDepreciation+$OpeningDepreciation = 0;
					$NetBookValue = $AssetPurchasePrice -$Depreciation;
					$whole = floor($ExpectedLifespanInYears);
					$fraction = $ExpectedLifespanInYears -$whole;
					//$EachYear = $diff/12;

 					
echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">'
							.'<thead>';
						echo '<tr>'
										.'<th class="center">'
											.'Month  </th>'.'<th>Cost</th>'
										.'<th>TotalDepreciation</th>'
										.'<th>Accumulated Depreciation</th>' 

										.'<th class="hidden-480">NetBookValue</th>'

									.'</tr>'
								.'</thead>'

							.'<tbody>';
							$x=1;

							// $start1 = $month4 = $ts1;
// $end4 = $ts2;
// while($month4 < $end)
// {
//      // echo date('F Y', $month4), PHP_EOL;
//     
// }

							$month4 = $ts1;
							for ($i = $start; $i < ($diff); $i++) {
								
								 $month4 = strtotime("+1 month", $month4);
								

								//if($x<12){

								if($i == 1){


									$TotalDepreciation = $PeriodDepreciation;
									$Depreciation = $TotalDepreciation + $OpeningDepreciation;
									$NetBookValue = $AssetPurchasePrice -$Depreciation; 
								}

								
								if ( $i >1) {

								# code...
									$TotalDepreciation = $PeriodDepreciation * $i;
									$Depreciation = $TotalDepreciation + $OpeningDepreciation;
									$NetBookValue = $AssetPurchasePrice -$Depreciation; 
									if($x<12){
									$x++;
								}

								 else {

								 	$x=1;

								if($NetBookValue < 0)
							    {
								break;
							}

								 	echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">'
							.'<thead>';
						echo '<tr>'
										.'<th class="center">'
											.'Month  </th>'.'<th>Cost</th>'
										.'<th>TotalDepreciation</th>'
										.'<th>Accumulated Depreciation</th>' 

										.'<th class="hidden-480">NetBookValue</th>'

									.'</tr>'
								.'</thead>'

							.'<tbody>';
								}


								}
								


								


				echo 


									'<td>'.date('F Y', $month4), PHP_EOL.'</td>'
										.'<td>'
										.$AssetPurchasePrice
									.'</td>'
									
									.'<td>'.round($TotalDepreciation, 2).'</td>'
									.'<td class="hidden-480">'.round($Depreciation, 2).'</td>'
									.'<td class="hidden-480">'.round($NetBookValue, 2).'</td>'
								.'</tr>';
							}
			}


			 
			else if($MethodId=="3"){

            

                  
             if($AssetName =="CDS SYSTEM" || $AssetName =="ATS SYSTEM")
             {
             	 
                 
             	$DepreciationRate=0.04594999;
             }
             elseif ($AssetName =="CELL TRADE SYSTEMS") {
             	$DepreciationRate=0.04595167;
             }
             else
             {

             	$DepreciationRate =$DepreciationRate/100;
             }

			         $end = $ExpectedLifespanInYears;
					
					$AssetPurchasePrice = $asset->getPurchasePrice($Assetid);
					$OpeningDepreciation = 0;
					$PeriodDepreciation= ($AssetPurchasePrice*$DepreciationRate)/12;
					$TotalDepreciation=   $PeriodDepreciation* 12;
					$Depreciation = $TotalDepreciation+$OpeningDepreciation = 0;
					$NetBookValue = $AssetPurchasePrice -$Depreciation;
					$date1 = $PurchaseDate;
					$whole = floor($ExpectedLifespanInYears);
					$fraction = $ExpectedLifespanInYears -$whole;

                   // $d = date_format(new DateTime($date1, "Y")); //for Display Year
                    $date4 = new DateTime($date1);
                    if($AssetName =="CDS SYSTEM" || $AssetName =="ATS SYSTEM" || $AssetName =="CELL TRADE SYSTEM")
                    {

                    	 $start = date_format($date4, "Y")+1;
                    }
                    else
                    {
                    	$start = date_format($date4, "Y");
                    }
                    
                    $wadi = date('Y') - 1;
                    $r = $start + $end;
                    
                    $dateNow=date("Y-m-d");//, strtotime($dateNow));


                   
 					echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">'
							.'<thead>';
						echo '<tr>'
										.'<th class="center">'
											.'Year </th>'.'<th>Cost</th>'.'<th> Opening Depreciation'
										.'</th>'
										.'<th>Period Depreciation</th>'
										.'<th>Total Depreciation</th>'
										.'<th>Closing Depreciation</th>' 

										.'<th class="hidden-480">NetBookValue</th>'

									.'</tr>'
								.'</thead>'

							.'<tbody>';

							for ($i = $start; $i <= $wadi; $i++) {
								
								if($AssetName=="CDS SYSTEM" || $AssetName=="ATS SYSTEM" )
								{
									if ($i == $start){


									$NetBookValue= $AssetPurchasePrice - $TotalDepreciation;
									$OpeningDepreciation= 0;

								}

								else if ($i > $start)
								{
									if($i == $wadi)
									{

										
										$AssetPurchaePrice = $asset->getPurchasePrice($Assetid);
										$DepreciationRate =0.05;
                                         $PeriodDepreciation= ($AssetPurchasePrice*$DepreciationRate)/12;
                                         $TotalDepreciation=   $PeriodDepreciation* 12;
                                         $NetBookValue= round(($NetBookValue-$TotalDepreciation),1);
								        $OpeningDepreciation=375468.03;
								         $Depreciation = $TotalDepreciation+$OpeningDepreciation;

									}
									else
									{
										$NetBookValue= $NetBookValue-$TotalDepreciation;

								$OpeningDepreciation =$OpeningDepreciation+$TotalDepreciation;
								$Depreciation = $TotalDepreciation+$OpeningDepreciation;

									}


								
							    }
							    if($NetBookValue < 0)
							    {
								break;

							    }

								}
								else if($AssetName=="CELL TRADE SYSTEM")
								{
									if ($i == $start){


									$NetBookValue= $AssetPurchasePrice - $TotalDepreciation;
									$OpeningDepreciation= 0;

								}

								else if ($i > $start)
								{
									if($i == $wadi)
									{

										
										$AssetPurchaePrice = $asset->getPurchasePrice($Assetid);
										$DepreciationRate =0.05;
										$OpeningDepreciation=187742.00;
                                         $PeriodDepreciation= ($AssetPurchasePrice*$DepreciationRate)/12;
                                         $TotalDepreciation=   $PeriodDepreciation* 12;
                                         $NetBookValue= 1106044;
								        
								         $Depreciation = $TotalDepreciation+$OpeningDepreciation;

									}
									else
									{
										$NetBookValue= $NetBookValue-$TotalDepreciation;

								$OpeningDepreciation =$OpeningDepreciation+$TotalDepreciation;
								$Depreciation = $TotalDepreciation+$OpeningDepreciation;

									}


								
							    }
							    if($NetBookValue < 0)
							    {
								break;

							    }

								}


								else
								{
									if ($i == $start)
									{


									$NetBookValue= $AssetPurchasePrice - $TotalDepreciation;
									$OpeningDepreciation= 0;

								    }

								else if ($i > $start)
									{


								$NetBookValue= $NetBookValue-$TotalDepreciation;

								$OpeningDepreciation =$OpeningDepreciation+$TotalDepreciation;
								$Depreciation = $TotalDepreciation+$OpeningDepreciation;
							}
							if($NetBookValue < 0)
							{
								break;

							}
								}
								


							

							
				echo 					'<td>'.$i.'</td>'.
										'<td>'
										.$AssetPurchasePrice
									.'</td>'
									.'<td>'.round($OpeningDepreciation, 2).'</td>'
									.'<td>'.round($PeriodDepreciation, 2).'</td>'
									.'<td>'.round($TotalDepreciation, 2).'</td>'
									.'<td class="hidden-480">'.round($Depreciation, 2).'</td>'
									.'<td class="hidden-480">'.round($NetBookValue, 2).'</td>'
								.'</tr>';
			}
			                        $OpeningDepreciation=$OpeningDepreciation+$TotalDepreciation;
			                        
									$TotalDepreciation =$PeriodDepreciation *floor($fraction*12);


							    $NetBookValue= $NetBookValue-$TotalDepreciation;
							    if($NetBookValue < 0)
							    {
							    	 $NetBookValue=0;
							    	 $OpeningDepreciation=0;
							    	 $TotalDepreciation=0;
							    	 $Depreciation=0;
							    	 $PeriodDepreciation=0;
							    }
							    else
							    {
							    	$Depreciation=$TotalDepreciation+$OpeningDepreciation;


			echo 					'<td>'.floor($fraction*12).'<p>'."(Months)".'</p>'.'</td>'.
										'<td>'
										.$AssetPurchasePrice
									.'</td>'
									.'<td>'.round($OpeningDepreciation, 2).'</td>'
									.'<td>'.round($PeriodDepreciation, 2).'</td>'
									.'<td>'.round($TotalDepreciation, 2).'</td>'
									.'<td class="hidden-480">'.round($Depreciation, 2).'</td>'
									.'<td class="hidden-480">'.round($NetBookValue, 2).'</td>'
								.'</tr>';
							    }

								
		}

 // Connection Closed
?>
