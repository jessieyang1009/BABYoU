<?php
  require_once '../includes/DbOperation_del.php';
  $response =array();
  if($_SERVER['REQUEST_METHOD']=='POST'){
      if(
	    isset($_POST['receive1'])and
		  isset($_POST['receive2'])and
		  isset($_POST['note']))
	  {  
	    $db =new DbOperation_del();
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
header("Content-Type:text/html; charset=utf-8");
$weekseconds=24*60*60*7;
$monthseconds=time()+(24*60*60*31);
echo '今天日期是:'.date("Y-m-d").'<br>';
global $rrs;
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
			$notee=$r3;
			if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
	        // mysqli_query($mysqli,"INSERT into getdate(dates,year,month,day,week,note) VALUES ($MONDAY,$yearr,$montth,$dayy,$WEEK,'$rrs[3]')");
				break;
		    case '二':
			    $TUESDAY=$firstday+86400*2;
			    echo date("Y-m-d",$TUESDAY)."<br>";
				$WEEK=date("w",$TUESDAY);
				$yearr=date("Y",$TUESDAY);
				$montth=date("m",$TUESDAY);
				$dayy=date("d",$TUESDAY);
				$notee=$r3;
				if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
		        break;
		    case'三':				
			    $WEDNESDAY=$firstday+86400*3;
				echo ate("Y-m-d",$WEDNESDAY)."<br>";
				$WEEK=date("w",$WEDNESDAY);
				$yearr=date("Y",$WEDNESDAY);
				$montth=date("m",$WEDNESDAY);
				$dayy=date("d",$WEDNESDAY);
		        $notee=$r3;
		        if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
			case '四':
				$THURSDAY=$firstday+86400*4;
				echo date("Y-m-d",$THURSDAY)."<br>";
				$WEEK=date("w",$THURSDAY);
				$yearr=date("Y",$THURSDAY);
				$montth=date("m",$THURSDAY);
				$dayy=date("d",$THURSDAY);
				$notee=$r3;
				if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}	
				break;
			case'五':
				$FRIDAY=$firstday+86400*5;
				echo date("Y-m-d",$FRIDAY)."<br>";
				$WEEK=date("w",$FRIDAY);
				$yearr=date("Y",$FRIDAY);
				$montth=date("m",$FRIDAY);
				$dayy=date("d",$FRIDAY);
		        $notee=$r3;
		        if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
	    	case'六':
				$SATURDAY=$firstday+86400*6;
				echo date("Y-m-d",$SATURDAY)."<br>";
				$WEEK=date("w",$SATURDAY);
				$yearr=date("Y",$SATURDAY);
				$montth=date("m",$SATURDAY);
				$dayy=date("d",$SATURDAY);
		        $notee=$r3;
		        if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
		        break;
			case'天':
				$SUNDAY=$firstday;
				echo date("Y-m-d",$SUNDAY)."<br>";
				$WEEK=date("w",$SUNDAY);
				$yearr=date("Y",$SUNDAY);
				$montth=date("m",$SUNDAY);
				$dayy=date("d",$SUNDAY);
		        $notee=$r3;
		        if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
			case'日':
				$SUNDAY=$firstday;
				echo date("Y-m-d",$SUNDAY)."<br>";
				$WEEK=date("w",$SUNDAY);
				$yearr=date("Y",$SUNDAY);
				$montth=date("m",$SUNDAY);
				$dayy=date("d",$SUNDAY);
		        $notee=$r3;
		       if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
			case "明天":
				$tomorrow=time()+86400;
				echo date("Y-m-d",$tomorrow)."<br>";
				$WEEK=date("w",$tomorrow);
				$yearr=date("Y",$tomorrow);
				$montth=date("m",$tomorrow);
				$dayy=date("d",$tomorrow);
				$notee=$r3;
				if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
			case "後天":
				$twodays=time()+86400*2;
				echo date('Y-m-d',$twodays)."<br>";
				$WEEK=date("w",$twodays);
				$yearr=date("Y",$twodays);
				$montth=date("m",$twodays);
				$dayy=date("d",$twodays);
				$notee=$r3;
				if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
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
				echo date("Y-m-d",$tto)."<br>";  
		        $notee=$r3;
				if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
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
				// echo $rs[3];
				// echo gettype($rs[3]);//STRING
		        $notee=$r3;
		        if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
		        break;
		    case '二':
			    $TUESDAY=$firstday+86400*2;
			    $nextday=$TUESDAY+$weekseconds;
			    echo date("Y-m-d",$nextday)."<br>";
			    $WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
				$notee=$r3;
				if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
		    case'三':
				$WEDNESDAY=$firstday+86400*3;
				$nextday=$WEDNESDAY+$weekseconds;
				echo date("Y-m-d",$nextday)."<br>";
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
		        $notee=$r3;
		        if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
			case '四':
				$THURSDAY=$firstday+86400*4;
				$nextday=$THURSDAY+$weekseconds;
				echo date("Y-m-d",$nextday)."<br>";
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$r3;
			    if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
			case'五':
				$FRIDAY=$firstday+86400*5;
				$nextday=$FRIDAY+$weekseconds;
				echo date("Y-m-d",$nextday)."<br>";
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$r3;
			    if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
		    case'六':
				$SATURDAY=$firstday+86400*6;
				$nextday=$SATURDAY+$weekseconds;
				echo date("Y-m-d",$nextday)."<br>";
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$r3;
			 if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
			case'天':
				$nextday=$firstday+$weekseconds;
				echo date("Y-m-d",$nextday)."<br>";
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$r3;
			    if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;
			case'日':
				$nextday=$firstday+$weekseconds;
				echo date("Y-m-d",$nextday)."<br>";
				$WEEK=date("w",$nextday);
				$yearr=date("Y",$nextday);
				$montth=date("m",$nextday);
				$dayy=date("d",$nextday);
			    $notee=$r3;
			   if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;	
			default:
				$montth=date("m",$monthseconds);
				$days=preg_split("/號/", $r2);
				$dayy=$days[0];
				$yearr=date("Y",time());
				$arr6=$yearr."-".$montth."-".$dayy;
				$ttoo=strtotime($arr6);
				$WEEK=date("w",$ttoo);
				$notee=$r3;
				if($notee=='所有'||$notee=='全部'){
				mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy'");
			}else{
			mysqli_query($mysqli,"Delete FROM getdate where month='$montth' and day='$dayy' and note='$notee'");
			}
				break;

	}
}
?>