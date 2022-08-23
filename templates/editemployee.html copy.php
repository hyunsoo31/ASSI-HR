
<div class="content_box">
<?php if ($author->hasPermission(\ASSI\Entity\Employee::EDIT_USER)) :?>

<form action="" method="post" id="edit_form">

  <input type="hidden" name="employee[id]" value="<?=$employee->id ?? ''?>">
  <label for="EEID"> EEID: </label>
  <input type="text" name="employee[EEID]" disabled value="<?=$employee->EEID ?? '' ?>">
  <label for="firstName"> FirstName: </label>
  <input type="text" name="employee[firstName]" value="<?=$employee->firstName ?? '' ?>">
  <label for="lastName"> lastName: </label>
  <input type="text" name="employee[lastName]" value="<?=$employee->lastName ?? '' ?>">
  <label for="gender"> gender: </label>
  <input type="text" name="employee[gender]" value="<?=$employee->gender ?? '' ?>">
  <label for="phone"> phone: </label>
  <input type="text" name="employee[phone]" value="<?=$employee->phone ?? '' ?>">
  <label for="payType"> payType: </label>
  <input type="text" name="employee[payType]" value="<?=$employee->payType ?? '' ?>">
  <label for="DOLStatus"> DOLStatus: </label>
  <input type="text" name="employee[DOLStatus]" value="<?=$employee->DOLStatus ?? '' ?>">
  <label for="department"> department: </label>
  <input type="text" name="employee[department]" value="<?=$employee->department ?? '' ?>">
  <label for="position"> position: </label>
  <input type="text" name="employee[position]" value="<?=$employee->position ?? '' ?>">
  <label for="birthDate"> birthDate: </label>
  <input type="text" name="employee[birthDate]" value="<?=$employee->birthDate ?? '' ?>">
  <label for="hireDate"> hireDate: </label>
  <input type="text" name="employee[hireDate]" value="<?=$employee->hireDate ?? '' ?>">
  <label for="rehireDate"> rehireDate: </label>
  <input type="text" name="employee[rehireDate]" value="<?=$employee->rehireDate ?? '' ?>">
  <label for="terminationDate"> terminationDate: </label>
  <input type="date" name="employee[terminationDate]" value="<?=$employee->terminationDate ?? NULL ?>">
  <label for="store"> store: </label>
  <input type="text" name="employee[store]" value="<?=$employee->store ?? '' ?>">

    <input type="submit" name="submit" value="save">
  </div>
</form>

<?php else:?>

  <p> 자신이 작성한 글만 수정할 수 있습니다.</p>
<?php endif;?>
</div>
