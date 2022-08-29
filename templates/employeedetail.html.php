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

<div class="container">
  <div class="grid-7 element-animation">
    <!--card-1-->
    <div class="card color-card">
      <!-- <ul>
        <li><i class="fas fa-arrow-left i-l w"></i></li>
        <li><i class="fas fa-ellipsis-v i-r w"></i></li>
        <li><i class="far fa-heart i-r w"></i></li>
      </ul> -->
   
      <img class="profile" src="../profile/<?=$employee->EEID?>.jpg">
      
      <h1 class="title"><?=$employee->firstName?></h1>
      <p class="job-title"> POSITION:  <?=$employee->position?></p>
      <p class="job-title"> DEPT: <?=$employee->department?></p>
      <div class="desc top">
        <p>HIRE DATE: <?=$employee->hireDate?></p>
        <p>BIRTH DATE: <?=$employee->birthDate?></p>
      </div>
      <?php  if ($author->hasPermission(\ASSI\Entity\Employee::EDIT_USER)):?>
      <button type="button" class="btn2 color-a top" onclick="location.href='/employee/edit?id=<?=$employee->id ?? null ?>'">EDIT</button>
      <?php else: ?>
      <button type="button" class="btn2 color-a top" onclick="location.href='/employee/view?id=<?=$employee->id ?? null ?>'">VIEW</button>
      <?php endif;?>
      <hr>
      <div class="container">
        <div class="content">
          <div class="grid-2">
            <button class="color-b circule" disabled> <i class="fas fa-store fa-2x"></i></button>
            <p class="followers"><?=$employee->store?></p>
          </div>
          <div class="grid-2">
            <button class="color-c circule" disabled> 
              <i class="fas fa-dollar-sign fa-2x"></i>
            </button>
            <p class="followers"><?=$employee->payType?></p>
          </div>
          <div class="grid-2">
            <button class="color-d circule" disabled>
            <?php if($employee->DOLStatus == "Part-Time"):?>
              <i class="fas fa-user-clock fa-2x"></i>
            <?php endif;?>
            <?php if($employee->DOLStatus == "Full-Time"):?>
              <i class="fas fa-user fa-2x"></i>
            <?php endif;?>
            <?php if($employee->DOLStatus == "Commission Only"):?>
              <i class="fas fa-user-check fa-2x"></i>
            <?php endif;?>
            </button>
            <p class="followers"><?=$employee->DOLStatus?></p>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!--card-2-->

      <div class="grid-10 element-animation">
        <div class="card2 color-card-2">
        <?php foreach ($employeeTrainings as $employeetraining) : ?>
      <?php if($employee && $employee->EEID == $employeetraining->EE_ID):?>
      <div style="margin: 35px auto;"><span style="font-weight: 650;">TRAINING NAME: </span>
      <?php foreach ($trainings as $training) : ?>
        <?php if($employeetraining->title == $training->title):?>
        <?=$training->name?>
        <?php endif;?>
      <?php endforeach;?>
      <?php if($employeetraining->result == "pass"):?>
       - <span style="font-weight: bold; color: green;"><?=ucfirst($employeetraining->result)?></span>
      <?php elseif($employeetraining->result == "fail"):?>
       - <span style="font-weight: bold; color: red"><?=ucfirst($employeetraining->result)?></span>
      <?php elseif($employeetraining->result == ""):?>
       - <span style="font-weight: bold; color: grey">Not started</span>
      <?php endif;?>
      <p style="margin-bottom:0.5rem; margin-top:1rem;"><span style="font-weight: 650;"> RESULT DATE: </span> <?=$employeetraining->result_date ?? 'No result'?>
       <p><span style="font-weight: 650;"> DEADLINE: </span><?=$employeetraining->deadline_date?><p><span style="font-weight:bold;">NEXT TRAINING :</span>
      <?php $temp = intval((strtotime($employeetraining->deadline_date)-strtotime(date("Y-m-d",time())))/86400);?>
      <?php if ($temp>30):?>       
      <?=$temp;?> days left<p>
      <?php endif;?>
      <?php if($temp<=30 && $temp>0) :?>
      <?=$temp;?> days left<i class="fa-solid fa-exclamation-triangle" style="color:orange;"></i><p>
      <?php endif;?>
      <?php if ($temp<=0):?> 
      <span style="color: red;">Deadline overdue</span><i class="fa-solid fa-exclamation-triangle" style="color:red;"></i><p>
    
      <?php endif;?>

      <?php if(($employeetraining->title == 'T1' && $employeetraining->result == "fail") || ($employeetraining->title == 'T1' && $employeetraining->result == "") || ($employeetraining->title == 'T1' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_kor'">T1(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_eng'">T1(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_spn'">T1(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T1' && $employeetraining->result == "pass" && $temp>30):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate1?id=<?=$employee->id?>'">Certificate</button>
      <?php endif; ?>
      <?php if(($employeetraining->title == 'T2' && $employeetraining->result == "fail") || ($employeetraining->title == 'T2' && $employeetraining->result == "")  || ($employeetraining->title == 'T2' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_kor'">T2(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_eng'">T2(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_spn'">T2(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T2' && $employeetraining->result == "pass" && $temp>30):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate2?id=<?=$employee->id?>'">Certificate</button>
      <?php endif; ?>
      <?php if(($employeetraining->title == 'T3' && $employeetraining->result == "fail") || ($employeetraining->title == 'T3' && $employeetraining->result == "")  || ($employeetraining->title == 'T3' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_kor'">T3(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_eng'">T3(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_spn'">T3(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T3' && $employeetraining->result == "pass" && $temp>30):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate3?id=<?=$employee->id?>'">Certificate</button>
      <?php endif; ?>
    </div>
    <hr class="hr-2">
      <?php endif;?>
  <?php endforeach?>

          <!-- <p class="job-title"> SENIOR PRODUCT DESIGNER</p>
          <div class="desc top">
            <p>Create usable interface and designs @GraphicSpark</p>
          </div>
          <button class="btn2 color-a top"> Hire me</button> -->

          <!-- <hr class="hr-2">
          <div class="container">
            <div class="content">
              <div class="grid-2">
                <button class="color-b circule"> <i class="fab fa-dribbble fa-2x"></i></button>
                <h2 class="title-2">12.3k</h2>
                <p class="followers">Followers</p>
              </div>
              <div class="grid-2">
                <button class="color-c circule"><i class="fab fa-behance fa-2x"></i></button>
                <h2 class="title-2">16k</h2>
                <p class="followers">Followers</p>
              </div>
              <div class="grid-2">
                <button class="color-d circule"><i class="fab fa-github-alt fa-2x"></i></button>
                <h2 class="title-2">17.8k</h2>
                <p class="followers">Followers</p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </form>
    <?php else:?>
    <h2 style="color: black;">You're not allowed to see this page</h2>
    <?php endif;?>
  </div>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">


<!-- <?php if ($author->hasPermission(\ASSI\Entity\Employee::EDIT_USER) || $author->id == $employee->id) :?>
<div class="content_box">
<form action="" method="post" id="edit_form">

<input type="hidden" name="employee[id]" value="<?=$employee->id ?? ''?>">
<div id="input_title">

  <div class="profile_box"><img class="profile" src="../profile/<?=$employee->EEID?>.jpg"></div>
  <div style="margin-bottom: 20px;"><span style="font-weight: 500; font-size: 1.6rem; margin-right:20px;">EEID:</span> <span style="font-weight: bold; font-size: 3.3rem;"><?=$employee->EEID ?? '' ?></span> </div>
  <div style="margin-bottom: 20px;"><span style="font-weight: 500; font-size: 1.6rem; margin-right:20px;">FIRST NAME:</span> <div style="font-weight: bold; font-size: 3.3rem;"><?=$employee->firstName ?? '' ?></div> </div>
</div>
<div style="margin-bottom: 50px;">
</div>


<div id="input_category">
  <?php foreach ($employeeTrainings as $employeetraining) : ?>
      <?php if($employee && $employee->EEID == $employeetraining->EE_ID && $employeetraining->result != ""):?>
      <div class="employee-detail" style="margin-bottom:50px;"><span style="font-weight: 650;">TRAINING NAME: </span>
      <?php foreach ($trainings as $training) : ?>
        <?php if($employeetraining->title == $training->title):?>
        <?=$training->name?>
        <?php endif;?>
      <?php endforeach;?>
      <?php if($employeetraining->result == "pass"):?>
       - <span style="font-weight: bold; color: green;"><?=ucfirst($employeetraining->result)?></span>
      <?php elseif($employeetraining->result == "fail"):?>
       - <span style="font-weight: bold; color: red"><?=ucfirst($employeetraining->result)?></span>
      <?php endif;?>
      <p style="margin-bottom:0.5rem; margin-top:1rem;"><span style="font-weight: 650;"> RESULT DATE: </span> <?=$employeetraining->result_date?>
       <p><span style="font-weight: 650;"> DEADLINE: </span><?=$employeetraining->deadline_date?><p><span style="font-weight:bold;">NEXT TRAINING :</span>
      <?php $temp = intval((strtotime($employeetraining->deadline_date)-strtotime(date("Y-m-d",time())))/86400);?>
      <?php if ($temp>30):?>       
      <?=$temp;?> days left<p>
      <?php endif;?>
      <?php if($temp<=30 && $temp>0) :?>
      <?=$temp;?> days left<i class="fa-solid fa-exclamation-triangle" style="color:orange;"></i><p>
      <?php endif;?>
      <?php if ($temp<=0):?> 
      <span style="color: red;">Deadline overdue</span><i class="fa-solid fa-exclamation-triangle" style="color:red;"></i><p>
    
      <?php endif;?>

      <?php if(($employeetraining->title == 'T1' && $employeetraining->result == "fail") || ($employeetraining->title == 'T1' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_kor'">T1(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_eng'">T1(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_spn'">T1(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T1' && $employeetraining->result == "pass" && $temp>30):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate1?id=<?=$employee->id?>'">Certificate</button>
      <?php endif; ?>
      <?php if(($employeetraining->title == 'T2' && $employeetraining->result == "fail") || ($employeetraining->title == 'T2' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_kor'">T2(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_eng'">T2(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_spn'">T2(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T2' && $employeetraining->result == "pass" && $temp>30):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate2?id=<?=$employee->id?>'">Certificate</button>
      <?php endif; ?>
      <?php if(($employeetraining->title == 'T3' && $employeetraining->result == "fail") || ($employeetraining->title == 'T3' && $employeetraining->result == "pass" && $temp<=30)):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_kor'">T3(KOR)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_eng'">T3(ENG)</button>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_spn'">T3(SPN)</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T3' && $employeetraining->result == "pass" && $temp>30):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/certificate3?id=<?=$employee->id?>'">Certificate</button>
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
        &nbsp  Deadline: <?=$employeetraining->deadline_date?>

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
      
    <?php endforeach?> -->


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
    <button type="button" class="btn btn-outline-secondary" onclick="location.href='/employee/detail/edit?id=<?=$employee->id?>'">EDIT</button>
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