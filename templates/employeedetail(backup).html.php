
<form action="" method="post" id="edit_form">

<input type="hidden" name="employee[id]" value="<?=$employee->id ?? ''?>">
<div id="input_title">
<div style="margin-bottom: 20px;"><h5 style="font-weight: bold;">id: <?=$employee->id ?? '' ?></h5> </div>
<div style="margin-bottom: 20px;"><h5 style="font-weight: bold;">EEID: <?=$employee->EEID ?? '' ?></h5> </div>
<div style="margin-bottom: 20px;"><h5 style="font-weight: bold;">firstName: <?=$employee->firstName ?? '' ?></h5> </div>
</div>
<div style="margin-bottom: 50px;">
</div>


<div id="input_category">
  <p style="font-weight: bold;">Training </p>
  <!-- <?php foreach ($trainings as $training) : ?>
  <?php if($employee && $employee->hasTraining($training->id)):?>
    <div>#<?=$training->title?></div>
    <?php endif;?>
  <?php endforeach?> -->
  <?php foreach ($employeeTrainings as $employeetraining) : ?>
      <?php if($employee && $employee->EEID == $employeetraining->EE_ID):?>
      <div>Training name: <?=$employeetraining->title?> : <?=$employeetraining->result?>
      <?php if($employeetraining->title == 'T1' && $employeetraining->result == "fail"):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1'">T1</button>
      <?php endif; ?>
      <?php if($employeetraining->title == 'T2' && $employeetraining->result == "fail"):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2'">T2</button>
      <?php endif; ?> 
      </div>
      <?php endif;?>
  <?php endforeach?>
  <br>
  <br>
  <p style="font-weight: bold;"> Not started </p>
    <?php foreach ($trainings as $training) : ?>
      <!-- <?php if(!$employee->hasTraining($training->id)):?> -->
    <div>#<?=$training->title?>
       <?php if($training->title == 'T1'):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1'">T1</button>
      <?php endif; ?>
      <?php if($training->title == 'T2'):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2'">T2</button>
      <?php endif; ?>
      <?php if($training->title == 'T3'):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1'">T3</button>
      <?php endif; ?>
      <?php if($training->title == 'T4'):?>
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1'">T4</button>
      <?php endif; ?>
    <?php endif;?>
    </div>
  <?php endforeach?>
        <!--  -->

  <!-- <input type="submit" name="submit" value="save"> -->
</div>
</form>
