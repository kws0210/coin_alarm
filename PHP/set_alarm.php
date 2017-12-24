<?php 
 
	if($_SERVER['REQUEST_METHOD']=='POST'){
 
 		$user_idx	= $_POST['user_idx'];
 		$market 	= $_POST['market'];
 		$coin 		= $_POST['coin'];
 		$price		= $_POST['price'];
 		$bound		= $_POST['bound'];
 
 		$conn = mysqli_connect('localhost','root','kjw0102#1','Bitcoin');

		$sql = "INSERT INTO USER(user_idx, market, coin, price, bound) VALUES ('$user_idx','$market','$coin','$price','$bound')";
		
 		if(mysqli_query($conn,$sql)){
 			$data = array(
 			'resultCd'=>'0');
			
 		}else{
 			$data = array(
 			'resultCd'=>'4');
 		}
 		echo json_encode($data);

		mysqli_close($conn);
	}
?>