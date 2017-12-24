<?php

    session_start();
    $loggedin = array_key_exists('user_id', $_SESSION);

?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="" style="height: 100%; overflow: hidden;">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GAZUALARM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="shortcut icon" href="">

<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--
<script src="respond.min.js"></script>
-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body style="height: 100%;">
<nav class="container navbar bd-navbar navbar-inverse navbar-dark navbar-static-top" style="position: absolute; z-index: 10; left: 0; right: 0; margin-top: 10;">
        <a class="navbar-brand" href="/">GAZUALARM</a>
        <div class="navbar-nav flex-row ml-auto d-flex">
            <?php if ($loggedin) { ?>
            <div class="dropdown">
                <a href="#" class="nav-link active" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_name'] ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="position: absolute; left: -100px;">
                    <a class="dropdown-item" href="/mypage.php">내 페이지</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/PHP/logout.php">로그아웃</a>
                </div>
            </div>
            <?php } else { ?>
            <a href="login.php" class="nav-link active">로그인</a>
            <?php } ?>
        </div>
</nav>
<div class="bd-content" style="height: 100%;">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="height: 100%;">
        <div class="carousel-inner" style="height: 100%;">
            <div class="carousel-item active" style="height: 100%;">
                <img style="display: block; width: 100%; height: 100%; object-fit: cover;" src="imgs/b1.jpg" alt="First slide">
                <div style="font-size: 9vh; position: absolute; bottom: 40px; left: 15px; z-index: 20; color: #FFFFFF;"><b>Bitcoin으로<br />인생 한방 가즈아!</b></div>
            </div>
            <div class="carousel-item" style="height: 100%;">
                <img style="display: block; width: 100%; height: 100%; object-fit: cover;" src="imgs/b2.jpg" alt="Second slide">
                <div style="font-size: 9vh; position: absolute; bottom: 100px; left: 15px; z-index: 20; color: #FFFFFF;"><b>Bitcoin의 변동을<br />실시간 문자로 받아보세요!</b></div>
            </div>
            <div class="carousel-item" style="height: 100%;">
                <img style="display: block; width: 100%; height: 100%; object-fit: cover;" src="imgs/b3.jpg" alt="Third slide">
                <div style="font-size: 7vh; position: absolute; bottom: 20px; left: 15px; z-index: 20; color: #FFFFFF;"><b>전문가를 고용한 것과 같은<br />효과를 누려보세요!</b></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
