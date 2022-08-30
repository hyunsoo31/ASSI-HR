<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href = "/css/style.css">
  <link rel="stylesheet" href = "/css/form.css">
  <link rel="stylesheet" href = "/css/nav.css">
  <link rel="stylesheet" href = "/css2/bootstrap.min.css">


  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <title><?=$title?></title>
</head>
<body>

  <div class="wrapper">
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 100px;">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a class="page-scroll" href="#main">Home</a></li>
            <li><a class="page-scroll" href="#classes">Classes</a></li>
            <li><a class="page-scroll" href="#features">Features</a></li>
            <li><a class="page-scroll" href="#review">Reviews</a></li>
            <li><a class="page-scroll" href="#pricing">Pricing</a></li>
            <li><a class="page-scroll" href="#contact">Contact</a></li>
            <div id="login_box" >
            <?php if ($loggedIn): ?>
              <button type="button" class="btn btn-outline-secondary" onclick="location.href='/employee/detail?id=<?=$author->id ?? null ?>'"><?php echo $_SESSION['userid']; ?></button>
              <button type="button" class="btn btn-outline-secondary" onclick="location.href='/logout'">Sign out</button>
            <?php else: ?>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/login'">Sign in</button>
            <?php endif; ?>
            </div>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar-collapse -->
  </div>

  <section id="wrap">
      <!-- <header id="header_container">
        <h1>ASSI</h1>
        <h2>MARKET</h2>
      </header> -->


<!--
<?php if($loggedIn && $author->hasPermission(\Assi\Entity\Employee::LIST_USER)): ?>
<div id="admin_box">
  <button type="button" class="btn btn-outline-secondary" onclick="location.href='/employees/list'">admin</button>
  </div>
  <?php endif ;?> -->
<!-- <?php if($loggedIn) : ?>
  <button type="button" class="btn btn-outline-secondary" onclick="location.href='/employee/detail?id=<?=$author->id?>'">my page</button>
<?php endif;?> -->

      <!-- <nav>

          <ul>
            <li><a href = "/"> Home </a></li>
            <li><a href = "/joke/list"> 유머 글 목록 </a></li>
            <li><a href = "/joke/edit"> 유머 글 등록</a></li>
            <?php if ($loggedIn): ?>
            <li><a href="/logout">로그아웃</a></li>
            <?php else: ?>
            <li><a href="/login">로그인</a></li>
            <?php endif; ?>
          </ul>

      </nav> -->

      <main>
        <?=$output?>

  </main>

  <footer>
    <div class="row">
      <div class="col align-self-start footer_first_line">
        <ul>
          <li>페이지 소개</li>
          <li>공지사항</li>
          <li>Q/A</li>
          <li>더보기</li>
        </ul>
      </div>

      <div class="col align-self-end footer_social" style="text-align: right;">
         <a href="https://www.facebook.com/" class="face" title="페이스북으로 이동" target="blank"></a>
		  	<a href="https://twitter.com/b" class="twit" title="트위터로 이동" target="blank"></a>
		  	<a href="https://www.instagram.com/" class="instar" title="인스타그램으로 이동" target="blank"></a>
      </div>
    </div>
    <div class="row">
      <div class="col align-self-start footer_second_line">
        <ul>
          <li>회사소개</li>
          <li>이용약관</li>
          <li>개인정보 처리 방침</li>
          <li>사업자 정보 확인</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col align-self-start footer_third_line">
        <ul>
          <li>대표이사 : Assi</li>
          <li>이메일 : assi@gmail.com</li>
          <li>전화번호 : 000-0000-0000</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col align-self-start footer_fourth_line">
        <ul>
          <li>Assi market</li>
          <li>ALL RIGHTS RESERVED</li>
        </ul>
      </div>
    </div>
  </footer>
  </section>


</body>
  <script>
  var current_location = window.location.href;
  var current_location_temp = current_location.slice(21);
  // console.log("현재주소:", current_location);
  // console.log(current_location_temp);
  var list_all = document.getElementsByClassName('nav-link');



  // for (i=0; i<list_all.length; i++) {
  //   console.log(list_all[i].href);
  //   if(list_all[i].href == current_location){
  //     list_all[i].className += " active";
  //   }
  // }

  // for (i=0; i<list_all.length; i++) {
  //   // console.log(list_all[i].href);
  //   if (current_location.length == 20) {
  //     list_all[0].className += " active";
  //   }
  //   else if(current_location.indexOf(list_all[i].href)!= -1){
  //     list_all[0].classList.remove("active");
  //     list_all[i].className += " active";
  //   }
  //   else if (current_location.indexOf("login") != -1) {
  //     list_all[0].classList.remove("active");
  //   }
  //   else if (current_location.indexOf("register") != -1) {
  //     list_all[0].classList.remove("active");
  //   }
  //   else if (current_location.indexOf("detail") != -1) {
  //     list_all[0].classList.remove("active");
  //   }
  // }

  for (i=0; i<list_all.length; i++) {
    // console.log(list_all[i].href);
    if (current_location.indexOf("employee") != -1 && current_location.indexOf("detail") == -1) {
      list_all[3].className += " active";
      list_all[0].classList.remove("active");
      list_all[1].classList.remove("active");
      list_all[2].classList.remove("active");
    }
    else if (current_location.indexOf("login") != -1) {
      list_all[0].classList.remove("active");
      list_all[1].classList.remove("active");
      list_all[2].classList.remove("active");
      list_all[3].classList.remove("active");
    }
    else if (current_location.indexOf("training") != -1) {
      list_all[2].className += " active";
      list_all[0].classList.remove("active");
      list_all[1].classList.remove("active");
      list_all[3].classList.remove("active");
    }
    else if (current_location.indexOf("employee") != -1 && current_location.indexOf("detail") != -1) {
      list_all[1].className += " active";
      list_all[0].classList.remove("active");
      list_all[2].classList.remove("active");
      list_all[3].classList.remove("active");
    }
    else{
      list_all[0].className += " active";
      list_all[1].classList.remove("active");
      list_all[2].classList.remove("active");
      list_all[3].classList.remove("active");
    }
  }


  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
<script src="/js/menu.js"></script>
<!-- <script src="/js/html2canvas.min.js"></script> -->
<script src="/js/html2canvas.js"></script>
</html>
