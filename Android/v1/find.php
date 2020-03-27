<?php
$mysqli=new mysqli("localhost","admin","00000000","input");//連結伺服器
mysqli_query($mysqli,"SET NAMES 'utf8'");//以utf8讀取資料，讓資料可以讀取中文
$datas=mysqli_query($mysqli,"select * from getdate");//從contact資料庫中選擇所有的資料表
$dataa=mysqli_query($mysqli,"select * from find");//從contact資料庫中選擇所有的資料表
header("Content-Type:text/html; charset=utf-8");
$weekseconds=24*60*60*7;
$monthseconds=time()+(24*60*60*31);
global $rrs;
global $rss;
$response =array();
for($k=1;$k<=mysqli_num_rows($dataa);$k++){
	$rrs=mysqli_fetch_row($dataa);
}
for($j=1;$j<=mysqli_num_rows($datas);$j++){
	$rss=mysqli_fetch_row($datas);
}
if($rrs[1]=='null'||$rrs[1]=='星期'||$rrs[1]=='禮拜'){
	$firstday=time()-86400*date('w');
	switch($rrs[2]){
		case '一':
		    $MONDAY=$firstday+86400;
	        $WEEK=date("w",$MONDAY);
			$yearr=date("Y",$MONDAY);
			$montth=date("m",$MONDAY);
			$dayy=date("d",$MONDAY);
			$notee=$rrs[3];
			$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
             while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				}
				break;
		    case '二':
			    $TUESDAY=$firstday+86400*2;
				$WEEK=date("w",$TUESDAY);
				$yearr=date("Y",$TUESDAY);
				$montth=date("m",$TUESDAY);
				$dayy=date("d",$TUESDAY);
				$notee=$rrs[3];
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				 }
		        break;
		    case'三':				
			    $WEDNESDAY=$firstday+86400*3;
				$WEEK=date("w",$WEDNESDAY);
				$yearr=date("Y",$WEDNESDAY);
				$montth=date("m",$WEDNESDAY);
				$dayy=date("d",$WEDNESDAY);
		        $notee=$rrs[3];
		        $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				}
				break;
			case '四':
				$THURSDAY=$firstday+86400*4;
				$WEEK=date("w",$THURSDAY);
				$yearr=date("Y",$THURSDAY);
				$montth=date("m",$THURSDAY);
				$dayy=date("d",$THURSDAY);
				$notee=$rrs[3];
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
					 }	
				break;
			case'五':
				$FRIDAY=$firstday+86400*5;
				$WEEK=date("w",$FRIDAY);
				$yearr=date("Y",$FRIDAY);
				$montth=date("m",$FRIDAY);
				$dayy=date("d",$FRIDAY);
		        $notee=$rrs[3];
		        $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
					 }
				break;
	    	case'六':
				$SATURDAY=$firstday+86400*6;
				$WEEK=date("w",$SATURDAY);
				$yearr=date("Y",$SATURDAY);
				$montth=date("m",$SATURDAY);
				$dayy=date("d",$SATURDAY);
		        $notee=$rrs[3];
		        $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				 }
		        break;
			case'天':
				$SUNDAY=$firstday;
				$WEEK=date("w",$SUNDAY);
				$yearr=date("Y",$SUNDAY);
				$montth=date("m",$SUNDAY);
				$dayy=date("d",$SUNDAY);
		        $notee=$rrs[3];
		        $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				}	
				break;
			case'日':
				$SUNDAY=$firstday;
				$WEEK=date("w",$SUNDAY);
				$yearr=date("Y",$SUNDAY);
				$montth=date("m",$SUNDAY);
				$dayy=date("d",$SUNDAY);
		        $notee=$rrs[3];
		        $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				 }
				break;
			case "明天":
				$tomorrow=time()+86400;
				$WEEK=date("w",$tomorrow);
				$yearr=date("Y",$tomorrow);
				$montth=date("m",$tomorrow);
				$dayy=date("d",$tomorrow);
				$notee=$rrs[3];
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				}
				break;
			case "後天":
				$twodays=time()+86400*2;
				$WEEK=date("w",$twodays);
				$yearr=date("Y",$twodays);
				$montth=date("m",$twodays);
				$dayy=date("d",$twodays);
				$notee=$rrs[3];
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				}
				break;
			case "null":
			   $notee=$rrs[3];
			   $result=mysqli_query($mysqli,"SELECT `month`,`day` FROM `getdate` WHERE note='$notee'");
	           while($row = mysqli_fetch_array($result)){
                  array_push($response,array("month"=>$row[0],"day"=>$row[1]));
		       }
               break;			   
			default:
				$arr= preg_split("/月/", $rrs[2]);
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
		        $notee=$rrs[3];
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				}                 
				break;
			}
			echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}else if($rrs[1]="下星期"||$rrs[1]="下禮拜"||$rrs[1]="下個月"){
		$firstday=time()-86400*date('w');
		switch($rrs[2]){
			case '一':
			    $MONDAY=$firstday+86400;
		        $nextday=$MONDAY+$weekseconds;
		        // echo date("Y-m-d",$nextday)."<br>";
		        $WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
				// echo $rs[3];
				// echo gettype($rs[3]);//STRING
		        $notee=$rrs[3];
		        $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			     while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				 }
		        break;
		    case '二':
			    $TUESDAY=$firstday+86400*2;
			    $nextday=$TUESDAY+$weekseconds;
			    $WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
				$notee=$rrs[3];
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				}
				break;
		    case'三':
				$WEDNESDAY=$firstday+86400*3;
				$nextday=$WEDNESDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
		        $notee=$rrs[3];
		        $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
			     }
				break;
			case '四':
				$THURSDAY=$firstday+86400*4;
				$nextday=$THURSDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$rrs[3];
			    $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				}
				break;
			case'五':
				$FRIDAY=$firstday+86400*5;
				$nextday=$FRIDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$rrs[3];
			    $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
				 }
				break;
		    case'六':
				$SATURDAY=$firstday+86400*6;
				$nextday=$SATURDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$rrs[3];
			 //    mysqli_query($mysqli,"select * from getdate where month=$montth");
				// mysqli_query($mysqli,"select * from getdate where day=$dayy");
				// mysqli_query($mysqli,"select * from getdate where week=$WEEK");
				// mysqli_query($mysqli,"select * from getdate where note=$notee");
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
					 }
				break;
			case'天':
				$SUNDAY=strtotime("Sunday");
				$nextday=$SUNDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$rrs[3];
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
					 }
				break;
			case'日':
				$SUNDAY=strtotime("Sunday");
				$nextday=$SUNDAY+$weekseconds;
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$rrs[3];
			    $result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
					 }
				break;	
			default:
				$montth=date("m",$monthseconds);
				$days=preg_split("/號/", $rs[2]);
				$dayy=$days[0];
				$yearr=date("Y",time());
				$arr6=$yearr."-".$montth."-".$dayy;
				$ttoo=strtotime($arr6);
				$WEEK=date("w",$ttoo);
				$notee=$rrs[3];
				$result=mysqli_query($mysqli,"SELECT `note` FROM `getdate` WHERE month='$montth' and day='$dayy'");
			      while($row = mysqli_fetch_array($result)){
                     array_push($response,array("note"=>$row[0]));
					 }
				break;
	   }
	   echo json_encode($response, JSON_UNESCAPED_UNICODE);
  }
