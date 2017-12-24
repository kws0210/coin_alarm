<?php

    include_once('templates/layouts/top.php');
    include_once('templates/registration/sign_up.html');
    include_once('templates/layouts/bottom.html');

    $error = $_GET['error'];

    if($error == 1) echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    else if ($error == 2) echo "<script>alert('아이디가 이미 존재합니다.');</script>";
    else if ($error == 3) echo "<script>alert('올바른 형식의 핸드폰 번호가 아닙니다.');</script>";
    else if ($error == 4) echo "<script>alert('회원가입에 실패했습니다. 다시 시도해주세요');</script>";

?>
