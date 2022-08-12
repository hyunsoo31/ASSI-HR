
<div class = "signup_box">
    <form action="" method="post">

      <label for="EEID">EEID</label>
      <input name="author[EEID]" id="EEID" type="text" value = "<?=$author['EEID'] ?? ''?>">
      <label for="password">Password</label>
      <input name="author[password]" id="password" type="password" value = "<?=$author['password'] ?? ''?>">

      <label for="firstName">firstName</label>
      <input name="author[firstName]" id="firstName" type="text"value = "<?=$author['firstName'] ?? ''?>">
      <label for="middleName">middleName</label>
      <input name="author[middleName]" id="middleName" type="text"value = "<?=$author['middleName'] ?? ''?>">
      <label for="lastName">lastName</label>
      <input name="author[lastName]" id="lastName" type="text"value = "<?=$author['lastName'] ?? ''?>">

      <label for="gender">gender</label>
      <input name="author[gender]" id="gender" type="text"value = "<?=$author['gender'] ?? ''?>">
      <label for="ethnicity">ethnicity</label>
      <input name="author[ethnicity]" id="ethnicity" type="text" value = "<?=$author['ethnicity'] ?? ''?>">
      <label for="address">address</label>
      <input name="author[address]" id="address" type="text" value = "<?=$author['address'] ?? ''?>">
      <label for="jobStatus">jobStatus</label>
      <input name="author[jobStatus]" id="jobStatus" type="text" value = "<?=$author['jobStatus'] ?? ''?>">
      <label for="department">department</label>
      <input name="author[department]" id="department" type="text" value = "<?=$author['department'] ?? ''?>">
      <label for="position">position</label>
      <input name="author[position]" id="position" type="text" value = "<?=$author['position'] ?? ''?>">
      <label for="dateOfHired">dateOfHired</label>
      <input name="author[dateOfHired]" id="dateOfHired" type="date" value = "<?=$author['dateOfHired'] ?? ''?>">
      <label for="permission">permission</label>
      <input name="author[permission]" id="permission" type="text" value = "<?=$author['permission'] ?? ''?>">
      <label for="store">store</label>
      <input name="author[store]" id="store" type="text" value = "<?=$author['store'] ?? ''?>">
      <div class="submit_button">
      <input type="submit" name="submit" value="Sign up" id="signup_submit">
      </div>
    </form>
</div>
<?php
if(!empty($errors)) :
  ?>
  <div class="errors">
    <p>등록할 수 없습니다. 다음을 확인해 주세요.</p>
    <ul>
      <?php
      foreach ($errors as $error) :
        ?>
        <li><?= $error?></li>
        <?php
        endforeach;?>
    </ul>
  </div>
  <?php
  endif;
  ?>
