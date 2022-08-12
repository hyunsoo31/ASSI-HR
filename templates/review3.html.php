<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/review.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Review page</title>
    <script>
      window.scrollTo(0,0);
    </script>
  </head>
  <?php
  if(strpos($_SERVER['REQUEST_URI'], "eng")){
    //$dir = __DIR__;
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/ENG/T3';
    //echo $dir;
    $handle = opendir($dir);
    $files = array();

    while(($filename = readdir($handle)) !== false) {
      if($filename == '.' || $filename == '..'){
        continue;
      }
      if(is_file($dir . "/" . $filename)){
        $files[] = $filename;
      }
    }
  }elseif (strpos($_SERVER['REQUEST_URI'], "spn")) {
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/SPN/T3';
    $handle = opendir($dir);
    $files = array();

    while(($filename = readdir($handle)) !== false) {
      if($filename == '.' || $filename == '..'){
        continue;
      }
      if(is_file($dir . "/" . $filename)){
        $files[] = $filename;
      }
    }
  } else{
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/KOR/T3';
    $handle = opendir($dir);
    $files = array();

    while(($filename = readdir($handle)) !== false) {
      if($filename == '.' || $filename == '..'){
        continue;
      }
      if(is_file($dir . "/" . $filename)){
        $files[] = $filename;
      }
    }
  }
  ?>


  <body>
    <!-- <div class="title" onclick="location.href='lastcheck'">
      <button class="custom-btn btn-4">Go back to the last page</button>
    </div> -->
  <div class="wrap">
    <div class="slider">
      <div class="slides">
        <?php if(strpos($_SERVER['REQUEST_URI'], "eng")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/ENG/T3/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(strpos($_SERVER['REQUEST_URI'], "spn")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/SPN/T3/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(strpos($_SERVER['REQUEST_URI'], "kor")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/KOR/T3/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
      </div>
      <?php foreach ($files as $key => $value): ?>
        <a class="slide-img" href="#slide-<?=$key?>"><?=$key?></a>
      <?php endforeach;?>
    </div>
  </div>
  <?php if(strpos($_SERVER['REQUEST_URI'], "eng")): ?>
  <div class="title" onclick="location.href='lastcheck3_eng'">
    <button class="custom-btn btn-4">Go back to the last page</button>
  </div>
  <?php endif;?>
  <?php if(strpos($_SERVER['REQUEST_URI'], "spn")): ?>
  <div class="title" onclick="location.href='lastcheck3_spn'">
    <button class="custom-btn btn-4">Go back to the last page</button>
  </div>
  <?php endif;?>
  <?php if(strpos($_SERVER['REQUEST_URI'], "kor")): ?>
  <div class="title" onclick="location.href='lastcheck3_kor'">
    <button class="custom-btn btn-4">Go back to the last page</button>
  </div>
  <?php endif;?>
  </body>
  <script src="../js/main.js"></script>
  <script src="../js/review.js"></script>
  <!-- <script>
  $('.slide-img').click(function (e) {
        //Cancel the link behavior
        $(window).scrollTop(0);
    });    
  </script> -->
</html>
