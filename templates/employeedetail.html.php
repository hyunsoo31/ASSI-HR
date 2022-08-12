<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
      <script src="https://kit.fontawesome.com/f26701a32f.js" crossorigin="anonymous"></script>
    <title></title>
  </head>

<?php if ($author->hasPermission(\ASSI\Entity\Employee::EDIT_USER) || $author->id == $employee->id) :?>
<div class="content_box">
<form action="" method="post" id="edit_form">

<input type="hidden" name="employee[id]" value="<?=$employee->id ?? ''?>">
<div id="input_title">
<!-- <div style="margin-bottom: 20px;"><h5 style="font-weight: bold;">ID: <?=$employee->id ?? '' ?></h5> </div> -->
<div style="margin-bottom: 20px;"><span style="font-weight: 500; font-size: 2.6rem; margin-right:20px;">EEID:</span> <span style="font-weight: bold; font-size: 3.3rem;"><?=$employee->EEID ?? '' ?></span> </div>
<div style="margin-bottom: 20px;"><span style="font-weight: 500; font-size: 2.6rem; margin-right:20px;">first name:</span> <span style="font-weight: bold; font-size: 3.3rem;"><?=$employee->firstName ?? '' ?></span> </div>
<!-- <div style="margin-bottom: 20px;"><h5 style="font-weight: bold;">first name: <?=$employee->firstName ?? '' ?></h5> </div> -->
</div>
<div style="margin-bottom: 50px;">
</div>


<div id="input_category">
  <!-- <p style="font-weight: bold;">Training </p> -->
  <!-- <?php foreach ($trainings as $training) : ?>
  <?php if($employee && $employee->hasTraining($training->id)):?>
    <div>#<?=$training->title?></div>
    <?php endif;?>
  <?php endforeach?> -->
  <?php foreach ($employeeTrainings as $employeetraining) : ?>
      <?php if($employee && $employee->EEID == $employeetraining->EE_ID && $employeetraining->result != ""):?>
      <div class="employee-detail" style="margin-bottom:50px;"><span style="font-weight: 650;">Training name: </span><?=$employeetraining->title?>
      <?php if($employeetraining->result == "pass"):?>
       - <span style="font-weight: bold; color: green;"><?=$employeetraining->result?></span>
      <?php elseif($employeetraining->result == "fail"):?>
       - <span style="font-weight: bold; color:red"><?=$employeetraining->result?></span>
      <?php endif;?>
      <p style="margin-bottom:0.5rem; margin-top:1rem;"><span style="font-weight: 650;"> result_date: </span> <?=$employeetraining->result_date?>
       <p><span style="font-weight: 650;"> deadline_date: </span><?=$employeetraining->deadline_date?><p><span style="font-weight:bold;">&nbsp Next training :</span>
      <?php $temp = intval((strtotime($employeetraining->deadline_date)-strtotime(date("Y-m-d",time())))/86400);?>
      <?php if ($temp<=0):?> 
      <span style="color: red;">The deadline is overdue</span><i class="fa-solid fa-exclamation-triangle" style="color:red; margin-left:20px;"></i><p>
      <?php elseif($temp<=30) :?>
      <?=$temp;?> days left<i class="fa-solid fa-exclamation-triangle" style="color:orange; margin-left:20px;"></i><p>
      <?php endif;?>

      <?php if($employeetraining->title == 'T1' && $employeetraining->result == "fail"):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_kor'">T1(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_eng'">T1(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_spn'">T1(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T1' && $employeetraining->result == "pass"):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate1?id=<?=$employee->id?>'">certificate</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T2' && $employeetraining->result == "fail"):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_kor'">T2(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_eng'">T2(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_spn'">T2(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T2' && $employeetraining->result == "pass"):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate2?id=<?=$employee->id?>'">certificate</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T3' && $employeetraining->result == "fail"):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_kor'">T3(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_eng'">T3(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_spn'">T3(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T3' && $employeetraining->result == "pass"):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate3?id=<?=$employee->id?>'">certificate</button>
      <?php endif; ?>
    </div>
      <?php endif;?>
  <?php endforeach?>

  <br>
  <br>
  <p style="font-weight: bold; color:red;"> Not started </p>
    <?php foreach ($employeeTrainings as $employeetraining) : ?>
      <?php if($employee && $employee->EEID == $employeetraining->EE_ID):?>
      <?php if($employeetraining->result == ""):?>
        <div>
        Training name: <?=$employeetraining->title?>
        &nbsp  deadline: <?=$employeetraining->deadline_date?>
        &nbsp
        <?php if($employeetraining->title == 'T1'):?>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_kor'">T1(KOR)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_eng'">T1(ENG)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_spn'">T1(SPN)</button>
        <?php endif; ?>
        <?php if($employeetraining->title == 'T2'):?>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_kor'">T2(KOR)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_eng'">T2(ENG)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_spn'">T2(SPN)</button>
        <?php endif; ?>
        <?php if($employeetraining->title == 'T3'):?>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_kor'">T3(KOR)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_eng'">T3(ENG)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_spn'">T3(SPN)</button>
        <?php endif; ?>
      </div>
      <?php endif;?>
      <?php endif;?>
    <?php endforeach?>
    <div style="margin-top: 50px; text-align: right;">
    <?php if($author->hasPermission(\Assi\Entity\Employee::EDIT_USER_ACCESS)): ?>
    <button type="button" class="btn btn-outline-secondary" onclick="location.href='/employee/detail/edit?id=<?=$employee->id?>'">수정</button>
    <?php endif;?>
    </div>


  <!-- <input type="submit" name="submit" value="save"> -->
</div>
</form>
<?php else:?>

<h2 style="color: black;">You're not allowed to see this page</h2>
<?php endif;?>
</div>
</html>