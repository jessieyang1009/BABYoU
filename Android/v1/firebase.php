<?php
$weekseconds=24*60*60*7;
$monthseconds=time()+(24*60*60*31);
global $rrs;
global $rss;
$r1=$_POST['receive1'];
$r2=$_POST['receive2'];
$response =array();

if($r1=='null'||$r1=='星期'||$r1=='禮拜'){
	$firstday=time()-86400*date('w');
	switch($r2){
		case '一':
		    $MONDAY=$firstday+86400;
	        $WEEK=date("w",$MONDAY);
			$yearr=date("Y",$MONDAY);
			$montth=date("m",$MONDAY);
			$dayy=date("d",$MONDAY);
            array_push($response,array("month"=>$montth,"day"=>$dayy));
			break;
		    case '二':
			    $TUESDAY=$firstday+86400*2;
				$WEEK=date("w",$TUESDAY);
				$yearr=date("Y",$TUESDAY);
				$montth=date("m",$TUESDAY);
				$dayy=date("d",$TUESDAY);
				$notee=$r3;
				array_push($response,array("month"=>$montth,"day"=>$dayy));
		        break;
		    case'三':				
			    $WEDNESDAY=$firstday+86400*3;
				$WEEK=date("w",$WEDNESDAY);
				$yearr=date("Y",$WEDNESDAY);
				$montth=date("m",$WEDNESDAY);
				$dayy=date("d",$WEDNESDAY);
		        array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
			case '四':
				$THURSDAY=$firstday+86400*4;
				$WEEK=date("w",$THURSDAY);
				$yearr=date("Y",$THURSDAY);
				$montth=date("m",$THURSDAY);
				$dayy=date("d",$THURSDAY);
				array_push($response,array("month"=>$montth,"day"=>$dayy));	
				break;
			case'五':
				$FRIDAY=$firstday+86400*5;
				$WEEK=date("w",$FRIDAY);
				$yearr=date("Y",$FRIDAY);
				$montth=date("m",$FRIDAY);
				$dayy=date("d",$FRIDAY);
		        array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
	    	case'六':
				$SATURDAY=$firstday+86400*6;
				$WEEK=date("w",$SATURDAY);
				$yearr=date("Y",$SATURDAY);
				$montth=date("m",$SATURDAY);
				$dayy=date("d",$SATURDAY);
		        array_push($response,array("month"=>$montth,"day"=>$dayy));
		        break;
			case'天':
				$SUNDAY=$firstday;
				$WEEK=date("w",$SUNDAY);
				$yearr=date("Y",$SUNDAY);
				$montth=date("m",$SUNDAY);
				$dayy=date("d",$SUNDAY);
		        array_push($response,array("month"=>$montth,"day"=>$dayy));	
				break;
			case'日':
				$SUNDAY=$firstday;
				$WEEK=date("w",$SUNDAY);
				$yearr=date("Y",$SUNDAY);
				$montth=date("m",$SUNDAY);
				$dayy=date("d",$SUNDAY);
		        array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
			case "明天":
				$tomorrow=time()+86400;
				$WEEK=date("w",$tomorrow);
				$yearr=date("Y",$tomorrow);
				$montth=date("m",$tomorrow);
				$dayy=date("d",$tomorrow);
				array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
			case "後天":
				$twodays=time()+86400*2;
				$WEEK=date("w",$twodays);
				$yearr=date("Y",$twodays);
				$montth=date("m",$twodays);
				$dayy=date("d",$twodays);
				array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;			   
			default:
				$arr= preg_split("/月/", $r2);
				// echo $arr[0]."-";
				$arr2= preg_split("/號/", $arr[1]);
				// echo $arr2[0];
				$montth=$arr[0];
				$dayy=$arr2[0];
				$arr3=time();
				$yearr=date("Y",$arr3);
				$arr4=$yearr."-".$montth."-".$dayy;
				// echo $arr4;
				$tto=strtotime($arr4);
				$WEEK=date("w",$tto);
				// echo $WEEK; 
				array_push($response,array("month"=>$montth,"day"=>$dayy));                
				break;
			}
	}else if($r1="下星期"||$r1="下禮拜"||$r1="下個月"){
		$firstday=time()-86400*date('w');
		switch($r2){
			case '一':
			    $MONDAY=$firstday+86400;
		        $nextday=$MONDAY+$weekseconds;
		        // echo date("Y-m-d",$nextday)."<br>";
		        $WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
		        array_push($response,array("month"=>$montth,"day"=>$dayy));
		        break;
		    case '二':
			    $TUESDAY=$firstday+86400*2;
			    $nextday=$TUESDAY+$weekseconds;
			    $WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
				array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
		    case'三':
				$WEDNESDAY=$firstday+86400*3;
				$nextday=$WEDNESDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
		        array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
			case '四':
				$THURSDAY=$firstday+86400*4;
				$nextday=$THURSDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
			case'五':
				$FRIDAY=$firstday+86400*5;
				$nextday=$FRIDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
		    case'六':
				$SATURDAY=$firstday+86400*6;
				$nextday=$SATURDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
				array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
			case'天':
				$nextday=$firstday+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
				array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
			case'日':
				$nextday=$firstday+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;	
			default:
				$montth=date("m",$monthseconds);
				$days=preg_split("/號/", $r2);
				$dayy=$days[0];
				$yearr=date("Y",time());
				$arr6=$yearr."-".$montth."-".$dayy;
				$ttoo=strtotime($arr6);
				$WEEK=date("w",$ttoo);
				array_push($response,array("month"=>$montth,"day"=>$dayy));
				break;
	   }
  }
  echo json_encode($response);
?>