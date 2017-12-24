<?php

function send_munja($mtype, $name, $phone, $msg, $callback, $contents, $reserve="", $reserve_time="", $etc1="", $etc2="") {

	$host 	= "www.sendgo.co.kr";
	$id		= "kws0210";
	$pass	= "pa442pa";

	$param = "remote_id=".$id;
	$param .= "&remote_pass=".$pass;
	$param .= "&remote_reserve=".$reserve;
	$param .= "&remote_reservetime=".$reserve_time;
	$param .= "&remote_name=".$name;
	$param .= "&remote_phone=".$phone;
	$param .= "&remote_callback=".$callback;
	$param .= "&remote_msg=".$msg;
	$param .= "&remote_contents=".$contents;
	$param .= "&remote_etc1=".$etc1;
	$param .= "&remote_etc2=".$etc2;

	if($mtype == "lms") {
		$path = "/Remote/RemoteMms.html";
	} else {
		$path = "/Remote/RemoteSms.html";
	}

	$fp = @fsockopen($host,80,$errno,$errstr,30);

	$return = "";

	if(!$fp) {
		die($_err.$errstr.$errno);
	} else {
		fputs($fp, "POST ".$path." HTTP/1.1\r\n");
		fputs($fp, "Host: ".$host."\r\n");
		fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
		fputs($fp, "Content-length: ".strlen($param)."\r\n");
		fputs($fp, "Connection: close\r\n\r\n");
		fputs($fp, $param."\r\n\r\n");

		while(!feof($fp)) $return .= fgets($fp,4096);

	}

	fclose($fp);

	$_temp_array	= explode("\r\n\r\n", $return);
	$_temp_array2	= explode("\r\n", $_temp_array[1]);

	if(sizeof($_temp_array2) > 1) {
		$return_string = $_temp_array2[1];
	} else {
		$return_string = $_temp_array2[0];
	}

	return $return_string;
}

if($_SERVER['REQUEST_METHOD']=='POST'){
 
	$name		= "GazuAlarm";
 	$market		= $_POST['market'];
 	$coin 		= $_POST['coin'];
 	$price		= $_POST['price'];
 	$bound		= $_POST['bound'];
	$msg;
	$callback 	= "01040200630";


	$conn = mysqli_connect('localhost','root','kjw0102','Bitcoin');

 	$select_sql = "SELECT u.user_phone FROM USER u INNER JOIN Alarm a ON u.idx = a.user_idx WHERE a.market ='$market' AND a.coin = '$coin' AND a.price";

 	if($callback == '0') {
		$msg = $price." 이하 도달";
		$select_sql .= " < '$price'";
	} else {
		$msg = $price." 이상 도달";
		$select_sql = $select_sql." > '$price'";
	}

 	$select_result = mysqli_query($conn, $select_sql);

	$result = mysqli_query($conn, $select_sql);
    
 	while($row_phone_no = $result->fetch_assoc()) {
 		$result = send_munja($mtype, $name, $row_phone_no, $msg, $callback, $contents);

		$tok = strtok($result, '|');
		if($tok == '0000') {
			$data = array(
 				'resultCd'=>'1',
 				'alertMsg'=>'문자 전송 완료');
		} else {
			$data = array('resultCd'=>'4');
		}
 	}

	echo json_encode($data);

 	mysqli_close($conn);
	
}

?>