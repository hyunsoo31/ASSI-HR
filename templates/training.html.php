<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="/css/training1.css"> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script defer src="/js/training.js"></script> -->
    <title></title>
  </head>
  
<?php if(strpos($_SERVER['REQUEST_URI'], "training1") && strpos($_SERVER['REQUEST_URI'], "kor")): ?>
  <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRRd_P_561d_ZmzIkmpwEOqx3eLU_ieNOpTdztKayWkLPLcsjz3gY6svHQfnUUhojlGGlI39nACpHfo/embed?start=false&loop=false&delayms=3000" frameborder="0" width="1080" height="649" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test1_kor'">TEST</button>
<?php endif;?>
<?php if(strpos($_SERVER['REQUEST_URI'], "training1") && strpos($_SERVER['REQUEST_URI'], "eng")): ?>
  <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRwGSaKcfBbGYeqGD_ucvuxciOJ_DsuvWuCCNA0FSQBaXy_S2Ozh-Sdg9ZK028Te2xiJZzHpG8Z11YZ/embed?start=false&loop=false&delayms=3000" frameborder="0" width="1080" height="649" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test1_eng'">TEST</button>
<?php endif;?>
<?php if(strpos($_SERVER['REQUEST_URI'], "training1") && strpos($_SERVER['REQUEST_URI'], "spn")): ?>
  <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTqxxhZDGiFbjQhIocPmYJ7Hc8xNdpNcXkMDc10fTpS44eHCkTy6aTNa6wKaVCngUHuJbR7OVRuhvvZ/embed?start=false&loop=false&delayms=3000" frameborder="0" width="1080" height="649" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test1_spn'">TEST</button>
<?php endif;?>



<?php if(strpos($_SERVER['REQUEST_URI'], "training2") && strpos($_SERVER['REQUEST_URI'], "kor")): ?>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test2_kor'">TEST</button>
<?php endif;?>
<?php if(strpos($_SERVER['REQUEST_URI'], "training2") && strpos($_SERVER['REQUEST_URI'], "eng")): ?>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test2_eng'">TEST</button>
<?php endif;?>
<?php if(strpos($_SERVER['REQUEST_URI'], "training2") && strpos($_SERVER['REQUEST_URI'], "spn")): ?>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test2_spn'">TEST</button> 
<?php endif;?>

<?php if(strpos($_SERVER['REQUEST_URI'], "training3") && strpos($_SERVER['REQUEST_URI'], "kor")): ?>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test3_kor'">TEST</button>
<?php endif;?>
<?php if(strpos($_SERVER['REQUEST_URI'], "training3") && strpos($_SERVER['REQUEST_URI'], "eng")): ?>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test3_eng'">TEST</button>
<?php endif;?>
<?php if(strpos($_SERVER['REQUEST_URI'], "training3") && strpos($_SERVER['REQUEST_URI'], "spn")): ?>
    <h3 style="color: black;">When you are ready for the test, click the button to take the test.</h3>
    <button type="button" class="btn btn-outline-secondary test_button" onclick="location.href='/test3_spn'">TEST</button>
<?php endif;?>

</html>

<style>
  main{
    width: 100%;
    align-items: center;
  }
  .test_button{
        width: 200px;
        height: 50px;
        margin: 20px;
    }
</style>