<?php
  require_once '../includes/DbOperation.php';
  $response =array();
  if($_SERVER['REQUEST_METHOD']=='POST'){
      if(
	    isset($_POST['receive1'])and
		  isset($_POST['receive2'])and
		  isset($_POST['note']))
	  {  
	    $db =new DbOperation();
		if($db->putday(
		      $_POST['receive1'],
			  $_POST['receive2'],
			  $_POST['note'])){
		      $response['error'] = false;
	          $response['message'] = "succesful";
	    }else{
			$response['error'] = true;
		    $response['message'] = "failed";
			}
	  
	  }else{
	     $response['error'] = true;
	     $response['message'] = "Required fields are missing";
	  }
  }else{
     $response['error'] = true;
	 $response['message'] = "Invalid Request";
  }
 ?>
<?php
$mysqli=new mysqli("localhost","admin","00000000","input");//連結伺服器
mysqli_query($mysqli,"SET NAMES 'utf8'");//以utf8讀取資料，讓資料可以讀取中文
//$data=mysqli_query($mysqli,"select * from users");//從contact資料庫中選擇所有的資料表
//$datas=mysqli_query($mysqli,"select * from getdate");//從contact資料庫中選擇所有的資料表
?>
<?php
$weekseconds=24*60*60*7;
$monthseconds=time()+(24*60*60*31);
header("Content-Type:text/html; charset=utf-8");
global $arr;
global $arr2;
global $arr3;
global $rs;
global $rss;
$r1=$_POST['receive1'];
$r2=$_POST['receive2'];
$r3=$_POST['note'];
if($r1=='null'||$r1=='星期'||$r1=='禮拜'){
			$firstday=time()-86400*date('w');
			switch($r2){
				case '一':
				    $MONDAY=$firstday+86400;
			        echo date("Y-m-d",$MONDAY)."<br>";
			        $WEEK=date("w",$MONDAY);
					$yearr=date("Y",$MONDAY);
					$montth=date("m",$MONDAY);
					$dayy=date("d",$MONDAY);
					$MONDAYS=$MONDAY*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($MONDAYS,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
			    case '二':
				    $TUESDAY=$firstday+86400*2;
				    echo date("Y-m-d",$TUESDAY)."<br>";
					$WEEK=date("w",$TUESDAY);
					$yearr=date("Y",$TUESDAY);
					$montth=date("m",$TUESDAY);
					$dayy=date("d",$TUESDAY);
					$TUESDAYS=$TUESDAY*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($TUESDAYS,$yearr,$montth,$dayy,$WEEK,'$r3')");				
			        break;
			    case'三':				
				    $WEDNESDAY=$firstday+86400*3;
					echo ate("Y-m-d",$WEDNESDAY)."<br>";
					$WEEK=date("w",$WEDNESDAY);
					$yearr=date("Y",$WEDNESDAY);
					$montth=date("m",$WEDNESDAY);
					$dayy=date("d",$WEDNESDAY);
					$WEDNESDAYS=$WEDNESDAY*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($WEDNESDAYS,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case '四':
					$THURSDAY=$firstday+86400*4;
					echo date("Y-m-d",$THURSDAY)."<br>";
					$WEEK=date("w",$THURSDAY);
					$yearr=date("Y",$THURSDAY);
					$montth=date("m",$THURSDAY);
					$dayy=date("d",$THURSDAY);
					$THURSDAYS=$THURSDAY*1000;
					mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($THURSDAYS,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case'五':
					$FRIDAY=$firstday+86400*5;
					echo date("Y-m-d",$FRIDAY)."<br>";
					$WEEK=date("w",$FRIDAY);
					$yearr=date("Y",$FRIDAY);
					$montth=date("m",$FRIDAY);
					$dayy=date("d",$FRIDAY);
					$FRIDAYS=$FRIDAY*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($FRIDAYS,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
		    	case'六':
					$SATURDAY=$firstday+86400*6;
					echo date("Y-m-d",$SATURDAY)."<br>";
					$WEEK=date("w",$SATURDAY);
					$yearr=date("Y",$SATURDAY);
					$montth=date("m",$SATURDAY);
					$dayy=date("d",$SATURDAY);
					$SATURDAYS=$SATURDAY*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($SATURDAYS,$yearr,$montth,$dayy,$WEEK,'$r3')");
			        break;
				case'天':
					$SUNDAY=$firstday;
					echo date("Y-m-d",$SUNDAY)."<br>";
					$WEEK=date("w",$SUNDAY);
					$yearr=date("Y",$SUNDAY);
					$montth=date("m",$SUNDAY);
					$dayy=date("d",$SUNDAY);
					$SUNDAYS=$SUNDAY*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($SUNDAYS,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case'日':
					$SUNDAY=$firstday;
					echo date("Y-m-d",$SUNDAY)."<br>";
					$WEEK=date("w",$SUNDAY);
					$yearr=date("Y",$SUNDAY);
					$montth=date("m",$SUNDAY);
					$dayy=date("d",$SUNDAY);
					$SUNDAYS=$SUNDAY*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($SUNDAYS,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case "明天":
					$tomorrow=time()+86400;
					echo date("Y-m-d",$tomorrow)."<br>";
					$WEEK=date("w",$tomorrow);
					$yearr=date("Y",$tomorrow);
					$montth=date("m",$tomorrow);
					$dayy=date("d",$tomorrow);
					$tomorrows=$tomorrow*1000;
					mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($tomorrows,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case "後天":
					$twodays=time()+86400*2;
					echo date('Y-m-d',$twodays)."<br>";
					$WEEK=date("w",$twodays);
					$yearr=date("Y",$twodays);
					$montth=date("m",$twodays);
					$dayy=date("d",$twodays);
					$twoday=$twodays*1000;
					mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($twoday,$yearr,$montth,$dayy,$WEEK,'$r3')");
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
					// echo date("Y-m-d",$tto)."<br>";  
					$too=$tto*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($too,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				}
		}else if($r1="下星期"||$r1="下禮拜"||$r1="下個月"){
			switch($r2){
				case '一':
				    if(date("w")>1){
					    $MONDAY=strtotime("Monday")-(24*60*60*7);
				    }else{
					    $MONDAY=strtotime("Monday");
				    }
			        $nextday=$MONDAY+$weekseconds;
			        // echo date("Y-m-d",$nextday)."<br>";
			        $WEEK=date("w",$nextday);
					$yearr=date("Y",$nextday);
					$montth=date("m",$nextday);
					$dayy=date("d",$nextday);
					// echo $rs[3];
					// echo gettype("$WEEK");
					// echo gettype($rs[3]);//STRING
					$nextdays=$nextday*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($nextdays,$yearr,$montth,$dayy,$WEEK,'$r3')");
			        break;
			    case '二':
				    if(date("w")>2){
					    $TUESDAY=strtotime("Tuesday")-(24*60*60*7);
				    }else{
					    $TUESDAY=strtotime("Tuesday");
				    }
				    $nextday=$TUESDAY+$weekseconds;
				    echo date("Y-m-d",$nextday)."<br>";
				    $WEEK=date("w",$nextday);
					$yearr=date("Y",$nextday);
					$montth=date("m",$nextday);
					$dayy=date("d",$nextday);
					$nextdays=$nextday*1000;
					mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($nextdays,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
			    case'三':
					if(date("w")>3){
						$WEDNESDAY=strtotime("Wednesday")-(24*60*60*7);
					}else{
						$WEDNESDAY=strtotime("Wednesday");
					}
					$nextday=$WEDNESDAY+$weekseconds;
					echo date("Y-m-d",$nextday)."<br>";
					$WEEK=date("w",$nextday);
					$yearr=date("Y",$nextday);
					$montth=date("m",$nextday);
					$dayy=date("d",$nextday);
					$nextdays=$nextday*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($nextdays,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case '四':
					if(date("w")>4){
						$THURSDAY=strtotime("Thursday")-(24*60*60*7);
					}else{
						$THURSDAY=strtotime("Thursday");
					}
					$nextday=$THURSDAY+$weekseconds;
					echo date("Y-m-d",$nextday)."<br>";
					$WEEK=date("w",$nextday);
					$yearr=date("Y",$nextday);
					$montth=date("m",$nextday);
					$dayy=date("d",$nextday);
					$nextdays=$nextday*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($nextdays,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case'五':
					if(date("w")>5){
						$FRIDAY=strtotime("Friday")-(24*60*60*7);
					}else{
						$FRIDAY=strtotime("Friday");
					}
					$nextday=$FRIDAY+$weekseconds;
					echo date("Y-m-d",$nextday)."<br>";
					$WEEK=date("w",$nextday);
					$yearr=date("Y",$nextday);
					$montth=date("m",$nextday);
					$dayy=date("d",$nextday);
					$nextdays=$nextday*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($nextdays,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
		    	case'六':
					if(date("w")>6){
						$SATURDAY=strtotime("Saturday")-(24*60*60*7);
					}else{
						$SATURDAY=strtotime("Saturday");
					}
					$nextday=$SATURDAY+$weekseconds;
					echo date("Y-m-d",$nextday)."<br>";
					$WEEK=date("w",$nextday);
					$yearr=date("Y",$nextday);
					$montth=date("m",$nextday);
					$dayy=date("d",$nextday);
					$nextdays=$nextday*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($nextdays,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case'天':
					$nextday=$firstday+$weekseconds;
					echo date("Y-m-d",$nextday)."<br>";
					$WEEK=date("w",$nextday);
					$yearr=date("Y",$nextday);
					$montth=date("m",$nextday);
					$dayy=date("d",$nextday);
					$nextdays=$nextday*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($nextdays,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;
				case'日':
					$nextday=$firstday+$weekseconds;
					echo date("Y-m-d",$nextday)."<br>";
					$WEEK=date("w",$nextday);
					$yearr=date("Y",$nextday);
					$montth=date("m",$nextday);
					$dayy=date("d",$nextday);
					$nextdays=$nextday*1000;
			        mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($nextdays,$yearr,$montth,$dayy,$WEEK,'$r3')");
					break;	
				default:
						$montth=date("m",$monthseconds);
						$days=preg_split("/號/", $r2);
						$dayy=$days[0];
						$yearr=date("Y",time());
						$arr6=$yearr."-".$montth."-".$dayy;
						$ttoo=strtotime($arr6);
						$WEEK=date("w",$ttoo);
						$oto=$ttoo*1000;
						mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($oto,$yearr,$montth,$dayy,$WEEK,'$r3')");	
			    }
	}

?>