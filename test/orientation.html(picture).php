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
<!-- <?php
  if(strpos($_SERVER['REQUEST_URI'], "eng")){
 
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/ENG/Orientation';

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
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/SPN/Orientation';
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
    $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/KOR/Orientation';
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

  <div class="slider">
  <?php sort($files);?>
  <?php if(strpos($_SERVER['REQUEST_URI'], "eng")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/ENG/Orientation/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(strpos($_SERVER['REQUEST_URI'], "spn")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/SPN/Orientation/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
        <?php if(strpos($_SERVER['REQUEST_URI'], "kor")): ?>
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/KOR/Orientation/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>
        <?php endif;?>
  </div>

</body> -->

<?php if(strpos($_SERVER['REQUEST_URI'], "eng")): ?>
  <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSTqVY27s-mwg9PzwvWTja2cibm7yS77KVPw3moV1wcUHSdYeos4d4TRFZ6Xckokuu7IcVaF4L24Okb/embed?start=false&loop=false&delayms=3000" frameborder="0" width="1080" height="649" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
<?php endif;?>
<?php if(strpos($_SERVER['REQUEST_URI'], "spn")): ?>
  <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSJC1TuPELzYLBcioRIZ8Ajx5gjS0rPLdNnvnEP-PqRq5Kcq5Jd_dCkCcqPEZucIQeyX_W3ZxLj7eBt/embed?start=false&loop=false&delayms=3000" frameborder="0" width="1080" height="649" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
<?php endif;?>
<?php if(strpos($_SERVER['REQUEST_URI'], "kor")): ?>
  <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTDH7LGVeQKB2TcXeW4vKfzFE2dSpDM-Q3ACUUG0TgjbDxeKrmsuio3QJHmm46OmksVKx8pr1Qnh0Q5/embed?start=false&loop=false&delayms=3000" frameborder="0" width="1080" height="649" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
<?php endif;?>

<style>
  main{
    align-items: center;
  }
</style>
</html>