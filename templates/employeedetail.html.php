<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
      <link rel="stylesheet" href="/css/profile.css">
      <script src="https://kit.fontawesome.com/f26701a32f.js" crossorigin="anonymous"></script>
    <title></title>
  </head>

<?php if ($author->hasPermission(\ASSI\Entity\Employee::EDIT_USER) || $author->id == $employee->id) :?>
<div class="content_box">
<form action="" method="post" id="edit_form">

<input type="hidden" name="employee[id]" value="<?=$employee->id ?? ''?>">
<div id="input_title">
<!-- <div style="margin-bottom: 20px;"><h5 style="font-weight: bold;">ID: <?=$employee->id ?? '' ?></h5> </div> -->
<div class="profile_box"><img class="profile" src="../profile/<?=$employee->EEID?>.jpg"></div>
<div style="margin-bottom: 20px;"><span style="font-weight: 500; font-size: 1.6rem; margin-right:20px;">EEID:</span> <span style="font-weight: bold; font-size: 3.3rem;"><?=$employee->EEID ?? '' ?></span> </div>
<div style="margin-bottom: 20px;"><span style="font-weight: 500; font-size: 1.6rem; margin-right:20px;">FIRST NAME:</span> <div style="font-weight: bold; font-size: 3.3rem;"><?=$employee->firstName ?? '' ?></div> </div>
<div>
</div>

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
      <div class="employee-detail" style="margin-bottom:50px;"><span style="font-weight: 650;">TRAINING NAME: </span>
      <?php foreach ($trainings as $training) : ?>
        <?php if($employeetraining->title == $training->title):?>
        <?=$training->name?>
        <?php endif;?>
      <?php endforeach;?>
      <?php if($employeetraining->result == "pass"):?>
       - <span style="font-weight: bold; color: green;"><?=$employeetraining->result?></span>
      <?php elseif($employeetraining->result == "fail"):?>
       - <span style="font-weight: bold; color:red"><?=$employeetraining->result?></span>
      <?php endif;?>
      <p style="margin-bottom:0.5rem; margin-top:1rem;"><span style="font-weight: 650;"> RESULT DATE: </span> <?=$employeetraining->result_date?>
       <p><span style="font-weight: 650;"> DEADLINE: </span><?=$employeetraining->deadline_date?><p><span style="font-weight:bold;">NEXT TRAINING :</span>
      <?php $temp = intval((strtotime($employeetraining->deadline_date)-strtotime(date("Y-m-d",time())))/86400);?>
      <?php if ($temp>30):?>       
      <?=$temp;?> days left
      <?php endif;?>
      <?php if($temp<=30 && $temp>0) :?>
      <?=$temp;?> days left<i class="fa-solid fa-exclamation-triangle" style="color:orange;"></i><p>
      <?php endif;?>
      <?php if ($temp<=0):?> 
      <span style="color: red;">The deadline is overdue</span><i class="fa-solid fa-exclamation-triangle" style="color:red;"></i><p>
    
      <?php endif;?>

      <?php if(($employeetraining->title == 'T1' && $employeetraining->result == "fail") || ($employeetraining->title == 'T1' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_kor'">T1(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_eng'">T1(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_spn'">T1(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T1' && $employeetraining->result == "pass" && $temp>30):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate1?id=<?=$employee->id?>'">certificate</button>
      <?php endif; ?>
      <?php if(($employeetraining->title == 'T2' && $employeetraining->result == "fail") || ($employeetraining->title == 'T2' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_kor'">T2(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_eng'">T2(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_spn'">T2(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T2' && $employeetraining->result == "pass" && $temp>30):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate2?id=<?=$employee->id?>'">certificate</button>
      <?php endif; ?>
      <?php if(($employeetraining->title == 'T3' && $employeetraining->result == "fail") || ($employeetraining->title == 'T3' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_kor'">Sexual Harassment Training(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_eng'">Sexual Harassment Training(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_spn'">Sexual Harassment Training(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T3' && $employeetraining->result == "pass" && $temp>30):?>
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
        Training: <?=$employeetraining->title?>
                <?php $temp = intval((strtotime($employeetraining->deadline_date)-strtotime(date("Y-m-d",time())))/86400);?>
                <?php if ($temp<=0):?> 
                <i class="fa-solid fa-exclamation-triangle" style="color:red;"></i>
                <?php elseif($temp<=30 && $temp>0) :?>
                <i class="fa-solid fa-exclamation-triangle" style="color:orange;"></i>
                <?php endif;?>
        &nbsp  deadline: <?=$employeetraining->deadline_date?>

        &nbsp
        <?php foreach ($trainings as $training) : ?>
        <?php if($employeetraining->title == "T1" && $training->title == 'T1'):?>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_kor'">
            <?=$training->name?>
            (KOR)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_eng'">
            <?=$training->name?>
            (ENG)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_spn'">
            <?=$training->name?>
            (SPN)</button>
            <?php endif; ?>
      
            <?php if($employeetraining->title == "T2" && $training->title == 'T2'):?>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_kor'">
            <?=$training->name?>
            (KOR)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_eng'">
            <?=$training->name?>
            (ENG)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_spn'">
            <?=$training->name?>
            (SPN)</button>
            <?php endif; ?>
            <?php if($employeetraining->title == "T3" && $training->title == 'T3'):?>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_kor'">
            <?=$training->name?>
            (KOR)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_eng'">
            <?=$training->name?>
            (ENG)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_spn'">
            <?=$training->name?>
            (SPN)</button>
            <?php endif; ?>
        <?php endforeach?>
      </div>
      <?php endif;?>
      <?php endif;?>
      
    <?php endforeach?>


    <!-- <?php foreach ($employeeTrainings as $employeetraining) : ?>
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
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_kor'">Sexual Harassment Training(KOR)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_eng'">Sexual Harassment Training(ENG)</button>
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_spn'">Sexual Harassment Training(SPN)</button>
        <?php endif; ?>
      </div>
      <?php endif;?>
      <?php endif;?>
    <?php endforeach?> -->
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