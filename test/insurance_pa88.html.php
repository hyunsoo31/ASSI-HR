<html>
<head>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <link rel="stylesheet" href="../css/review.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

  <script>
    $(document).ready(function(){
      $('.slider').bxSlider();
    });
  </script>

</head>
<?php
  if(strpos($_SERVER['REQUEST_URI'], "eng")){
    //$dir = __DIR__;
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/ENG/Insurance/PA88';
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
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/SPN/Insurance/PA88';
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
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/KOR/Insurance/PA88';
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
  <div class="title lastcheck" onclick="location.href='insurance_form_pa88'">
    <button class="custom-btn btn-4">Start filling insurance form</button>
  </div>
  <div class="slider">
  <?php sort($files);?>
  <?php if(strpos($_SERVER['REQUEST_URI'], "eng")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/ENG/Insurance/PA88/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(strpos($_SERVER['REQUEST_URI'], "spn")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/SPN/Insurance/PA88/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(strpos($_SERVER['REQUEST_URI'], "kor")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/KOR/Insurance/PA88/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
  </div>

</body>
</html>