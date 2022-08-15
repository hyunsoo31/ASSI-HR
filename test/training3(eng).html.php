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
  // var_export($files);
  // echo count($files);
  ?>

  <body>
  <figure>
    <div class="wrap">
      <div class="slider">
        <div class="slides">

        <?php foreach ($files as $key => $value): ?>
                <div class="img on training-img" id="slide-1"><img src="/uploads/ENG/T3/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
      </div>
    </div>
        <div class="btnNext">
            <button id="btnNextText" class="custom-btn btn-16">NEXT</button>
        </div>
        <div class="btnText">
        </div>
    </div>
  </figure>
  </body>

  <!-- <body>
  <figure>
    <div class="wrap">
      <div class="slider">
        <div class="slides">
          <div class="img on" id="slide-1"><img src="/uploads/T3/1.jpg" alt=""></div>
          <div class="img" id="slide-2"><img src="/uploads/T3/2.jpg" alt=""></div>
          <div class="img" id="slide-3"><img src="/uploads/T3/3.jpg" alt=""></div>
          <div class="img" id="slide-4"><img src="/uploads/T3/4.jpg" alt=""></div>
          <div class="img" id="slide-5"><img src="/uploads/T3/5.jpg" alt=""></div>
        </div>
      </div>
        <div class="btnNext">
            <button id="btnNextText" class="custom-btn btn-16">NEXT</button>
        </div>
        <div class="btnText">
        </div>
    </div>
    <div class="btnPrev">
        <span>PREV</span>
    </div>

  </figure>
  </body> -->
</html>