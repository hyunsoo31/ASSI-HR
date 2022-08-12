<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/review.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Review page</title>
  </head>
  <?php
  //$dir = __DIR__;
  $dir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/SPN/T3';
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
    <div class="title" onclick="location.href='lastcheck3'">
      <button class="custom-btn btn-4">Go back to the last page</button>
    </div>
  <div class="wrap">
    <div class="slider">
      <div class="slides">
        <?php foreach ($files as $key => $value): ?>
                <div id="slide-<?=$key?>"><img src="/uploads/SPN/T3/<?=$files[$key]?>" alt=""></div>
        <?php endforeach;?>

      </div>
      <?php foreach ($files as $key => $value): ?>
        <a href="#slide-<?=$key?>"><?=$key?></a>
      <?php endforeach;?>
    </div>
  </div>
  </body>
  <script src="../js/main.js"></script>
  <script src="../js/review.js"></script>
</html>
