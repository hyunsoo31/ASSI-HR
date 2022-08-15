<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/training1.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script defer src="/js/training.js"></script>
    <title></title>
  </head>
  <?php
  if(strpos($_SERVER['REQUEST_URI'], "eng")){

    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/ENG/T1';
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

  } elseif (strpos($_SERVER['REQUEST_URI'], "spn")) {
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/SPN/T1';
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
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/KOR/T1';
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
 <?php 
 ?>
  <body>
  <figure>
    <div class="wrap">
      <div class="slider">
        <div class="slides">

        <?php if(strpos($_SERVER['REQUEST_URI'], "eng")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div class="img on training-img" id="slide-<?=$key?>"><img src="/uploads/ENG/T1/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(strpos($_SERVER['REQUEST_URI'], "spn")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div class="img on training-img" id="slide-<?=$key?>"><img src="/uploads/SPN/T1/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(strpos($_SERVER['REQUEST_URI'], "kor")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div class="img on training-img" id="slide-<?=$key?>"><img src="/uploads/KOR/T1/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>


      </div>
     
    </div>
        <div class="btnNext">
            <button id="btnNextText" class="custom-btn btn-16">NEXT</button>
        </div>
        <div class="btnText">
        </div>
        <!-- <div class="btnPrev">
            <button id="btnPrevText" class="custom-btn btn-16">PREVIOUS</button>
        </div> -->
    </div>
  </figure>
  </body>


  <!-- <body>
  <figure>
    <div class="wrap">
      <div class="slider">
        <div class="slides">
          <div class="img on" id="slide-1"><img src="/uploads/T1/1.jpg" alt=""></div>
          <div class="img" id="slide-2"><img src="/uploads/T1/2.jpg" alt=""></div>
          <div class="img" id="slide-3"><img src="/uploads/T1/3.jpg" alt=""></div>
          <div class="img" id="slide-4"><img src="/uploads/T1/4.jpg" alt=""></div>
          <div class="img" id="slide-5"><img src="/uploads/T1/5.jpg" alt=""></div>
        </div>
      </div>
        <div class="btnNext">
            <button id="btnNextText" class="custom-btn btn-16">NEXT</button>
        </div>
        <div class="btnText">
        </div>
    </div>
  </figure>
  </body> -->
</html>
