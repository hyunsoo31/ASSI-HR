
<script>
//직접 접근 막기
// if(!document.referrer.includes("test1")){
//   location.href = "/";
// }

</script>
<div style="flex-direction:column;">
  <input type="hidden" name="capture_image" value="">
  <input type="button" onclick="capture_html('capture')" value="save certificate" style="text-align: cetner;">
  <!-- <input type="button" onclick="capture_save_server('capture')" value="서버에 이미지 저장"> -->

  <!--캡처 영영-->
  <br><br><br>
  <div id="capture">
    <h3>이미지 캡처 영역</h3>
<br>
<!-- login EEID:
<?php echo $_SESSION['useremail']; ?>

<?php foreach ($employees as $emp): ?>
    <?php if($emp->EEID == $_SESSION['useremail'] ):?>
        <div>id : <?=$emp->id?></div>
        <div>EEID: <?=$emp->EEID?></div>
        <div>fisrtName: <?=$emp->firstName?></div>
    <?php endif;?>

 <?php endforeach?> -->
 <br>
 <br>
 ------------------------------------------------------
 <h4>Training info</h4>

 <?php foreach ($trainings as $training): ?>
    <?php if($training->id == 2):?>
        <div>id : <?=$training->id?></div>
        <div>title: <?=$training->title?></div>
        <div>date: <?=$training->dateOfUpdated?></div>
    <?php endif;?>
 <?php endforeach?>
 <br>
 <br>
 ------------------------------------------------------
 <h4>user training info</h4>

<form action="" method="post" id="edit_form"  class="content_box">
 <?php foreach ($employeeTrainings as $employeetraining): ?>
    <?php if( $employeetraining->EE_ID == $employee->EEID && $employeetraining->title == "T2" ):?>
        <div>EEID : <?=$employee->EEID?></div>
        <div>First Name : <?=$employee->firstName?></div>
        <div>title: <?=$employeetraining->title?></div>
        <div>result : <?=$employeetraining->result?></div>
        <div>result_date: <?=$employeetraining->result_date?></div>
        <div>deadline_date: <?=$employeetraining->deadline_date?></div>
        <input type="hidden" name="employeeTraining[id]" value="<?=$employeetraining->id?>">
        <!-- <input type="text" name="employeeTraining[result]" value="<?=$employeetraining->result ?? 'fail' ?>"> -->
        <input type="hidden" name="employeeTraining[result]" value="pass">
        <input type="hidden" name="employeeTraining[result_date]" value="<?=date("Y-m-d")?>">
        <!-- <label for="employeeTraining[result]"> result: </label>
        <input type="text" name="employeeTraining[result]" value="pass" disabled>
        <label for="employeeTraining[result_date]"> result_date: </label>
        <input type="date" name="employeeTraining[result_date]" value="<?=date("Y-m-d")?>" disabled>
        <br>
        <br>
        <br>
        <br>
        <div>deadline_date: <?=$employeetraining->deadline_date?></div> -->
        <br>
        <br>
        <br>
        <br>
    <?php endif;?>
 <?php endforeach?>
 <!-- <input type="submit" name="submit" value="save"> -->
 <!-- <input type="hidden" name="capture_image" value="">
 <input type="button" onclick="capture_html('capture')" value="save certificate" style="text-align: cetner;"> -->
</form>

</div>
  </div>
<script>
function capture_html(id){
  html2canvas(document.querySelector("#"+id)).then(canvas => {
    capture_save(canvas.toDataURL('img/png'), "<?=$employee->firstName?>_certificate_T2.png");
  });
}

function capture_save(uri, filename) {
  var link = document.createElement('a');
  if(typeof link.download === 'string'){
    link.href = uri;
    link.download = filename;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  } else{
    window.open(uri);
  }
}
// function capture_save_server(id){
//   var form=document.form;
//   var capture_image="";
//   html2canvas(document.querySelector("#"+id)).then(canvas => {
//     capture_image=canvas.toDataURL('image/png');
//   });
//   setTimeout(function(){
//     $.ajax({
//       type: 'post',
//       async: false,
//       url: '../test/form.php',
//       data: {'t': 'capture_save_server', 'capture_image':capture_image},
//       success.function(data){
//         $("#server_img").html(data);
//       }
//     });
//   }, 500);
// }
</script>
