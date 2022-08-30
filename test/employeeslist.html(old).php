<div class="user_list_box">
<h2>직원 목록</h2>
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/employee/register'">직원 등록</button>
<div class="user_list">
<table>
  <thead>
    <th>EEID</th>
    <th>firstName</th>
    <th>lastName</th>
    <th>gender</th>
    <th>jobStatus</th>
    <th>DEPT</th>
    <th>position</th>
    <th>근무 시작</th>
    <th>근무 종료</th>
    <th>권한</th>
    <th>수정</th>
    <th>삭제</th>
  </thead>

  <tbody>
    <?php foreach ($employees as $employee): ?>
      <tr>
        <td><a href="/employee/detail?id=<?=$employee->id?>"><?=$employee->EEID;?></td>
        <td><?=$employee->firstName;?></td>
        <td><?=$employee->lastName;?></td>
        <td><?=$employee->gender;?></td>
        <td><?=$employee->jobStatus;?></td>
        <td><?=$employee->department;?></td>
        <td><?=$employee->position;?></td>
        <td><?=$employee->dateOfHired;?></td>
        <td><?=$employee->dateOfTerminated;?></td>
        <td><?=$employee->permission;?> / <a href="/employee/permissions?id=<?=$employee->id;?>">권한수정</a></td>
        <td>

                <?php if ($author): ?>
                  <?php if ($author->hasPermission(\Assi\Entity\Employee::EDIT_USER)) :?>
                    <a href="/employee/edit?id=<?=$employee->id?>">Edit</a>
                    <?php endif; ?>
                    <?php endif;?>
                  <a href="/employee/edit?id=<?=$employee->id?>" style="opacity: 0; pointer-events: none;">Edit</a>
              </td>
              <td>
                <?php if ($author): ?>
                <?php if ($author->hasPermission(\Assi\Entity\Employee::DELETE_USER)) :?>

                  <form action="/employee/delete" method="post">
                    <input type="hidden" name="id" value="<?=$employee->id?>">
                    <input type="submit" value="delete">
                  </form>

                <?php endif;?>

              <?php endif;?>


      </td>
      </tr>
      <?php endforeach; ?>

  </tbody>
</table>
<div>
</div>
