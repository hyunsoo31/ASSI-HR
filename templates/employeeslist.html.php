<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
      <link rel="stylesheet" href="/css/search.css">
      <script src="https://kit.fontawesome.com/f26701a32f.js" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>

<div class="content_box">



    <!-- <form class="" action="">
      <div class="search">
          <input type="text" name="DEPT" value="" placeholder="DEPT을 입력하세요" style="width: 200px;">
          <button type="submit">검색</button>
      </div>
    </form> -->



    <div class="user_list_box">
    <h2>Employees list</h2>
    <div class="storelist">
      <h3>STORE</h3>
    <ul class="store">
        <li class="store_nav"><a href="/employees/list?page=1">ALL</a><li>
        <li class="store_nav"><a href="/employees/list?page=1&store=GA55">GA55</a><li>
        <li class="store_nav"><a href="/employees/list?page=1&store=IL70">IL70</a><li>
        <li class="store_nav"><a href="/employees/list?page=1&store=PA88">PA88</a><li>

    </ul>
    </div>
    <?php if($author->hasPermission(\Assi\Entity\Employee::USER_CREATE)): ?>
    <button type="button" class="btn btn-outline-secondary new_employee_btn" onclick="location.href='/employee/register'">New employee</button>
    <?php endif;?>
    <form action="">
      <div style="display: flex; height: 80px; justify-content: center; align-items: center;">
        <div class="select-box">
        <select id="changeTest" onchange="selectBoxChange(this.value);">
          <option value="fistName">firstName</option>
          <option value="lastName">lastName</option>
          <option value="DEPT">department</option>
          <option value="position">position</option>
        </select>
        </div>

        <div class="search-box">

          <input type="text" id="changeInput" class="search-txt" name="firstName" placeholder="Key word for search">
          <button type="submit" class="search-btn">
            <a class="search-btn">
              <i class="fas fa-search"></i>
            </a>
          </button>
        </div>
     </div>
    </form>
    <div class="user_list">
    <table>
      <thead>
        <th>employeeID</th>
        <th>firstName</th>
        <th>lastName</th>
        <th>gender</th>
        <th>DOLStatus</th>
        <th>DEPT</th>
        <th>position</th>
        <th>hire Date</th>
        <th>rehire Date</th>
        <!-- <th>Termination Date</th> -->
        <th>store</th>
        <th>permissions</th>
        <th>edit</th>
        <th>info</th>
        <?php if ($author->hasPermission(\Assi\Entity\Employee::DELETE_USER)) :?>
         <th>Delete</th>
        <?php endif;?>
      </thead>

      <tbody>
        <?php foreach ($employees as $employee): ?>
          <tr style="text-align:center;">
            <td><a href="/employee/detail?id=<?=$employee->id?>"><?=$employee->EEID;?></td>
            <td><a href="/employee/detail?id=<?=$employee->id?>"><?=$employee->firstName;?></td>
            <td><?=$employee->lastName;?></td>
            <td><?=$employee->gender;?></td>
            <td><?=$employee->DOLStatus;?></td>
            <td><?=$employee->department;?></td>
            <td><?=$employee->position;?></td>
            <td><?=$employee->hireDate;?></td>
            <td><?=$employee->rehireDate;?></td>
            <!-- <td><?=$employee->terminationDate;?></td> -->
            <td><?=$employee->store;?></td>
            <td><?=$employee->permission;?> 
            <?php if ($author->hasPermission(\Assi\Entity\Employee::EDIT_USER_ACCESS)) :?>
            <a href="/employee/permissions?id=<?=$employee->id;?>"><i class="fa-solid fa-pen-to-square"></i></a>
            <?php endif; ?>
            </td>
            <td>

                    <?php if ($author): ?>
                      <?php if ($author->hasPermission(\Assi\Entity\Employee::EDIT_USER)) :?>
                        <a href="/employee/edit?id=<?=$employee->id?>"><i class="fa-solid fa-user-pen"></i></a>
                        <?php endif; ?>
                        <?php endif;?>
                      <!-- <a href="/employee/edit?id=<?=$employee->id?>" style="opacity: 0; pointer-events: none;">Edit</a> -->
                  </td>

                  <td>
                   <?php foreach ($employeeTrainings as $employeetraining) : ?>
                    <?php if($employee->EEID == $employeetraining->EE_ID):?>
                      <?php $temp = intval((strtotime($employeetraining->deadline_date)-strtotime(date("Y-m-d",time())))/86400);?>
                      <?php if($temp < 0):?>
                        <a href="/employee/detail?id=<?=$employee->id?>"> <i class="fa-solid fa-exclamation-triangle" style="color:red;"></i></a>     
            
                      <?php elseif($temp < 30):?>
                        <a href="/employee/detail?id=<?=$employee->id?>"> <i class="fa-solid fa-exclamation-triangle" style="color:orange;"></i></a>     
                      <?php endif;?>  
                    <?php endif;?>
                   <?php endforeach;?>
                  </td>
                  <?php if ($author): ?>
                  <?php if ($author->hasPermission(\Assi\Entity\Employee::DELETE_USER)) :?>
                    <td>
                      <form action="/employee/delete" method="post">
                        <input type="hidden" name="id" value="<?=$employee->id?>">
                        <input type="submit" value="&#xf1f8;" style="font-family: FontAwesome;">
                      </form>
                    </td> 
               <?php endif;?>
              <?php endif;?>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    <div>
    <div class="page_box">
     page:

     <?php

    $numPages = ceil($totalEmployees/10);


    for ($i = 1; $i <= $numPages; $i++):
      if ($i == $currentPage):
    ?>
      <a class="currentpage" href="/employees/list?page=<?=$i?><?=!empty($_GET['store']) ? '&store=' . $_GET['store'] : '' ?>"><?=$i?></a>
    <?php else: ?>
      <a href="/employees/list?page=<?=$i?><?=!empty($_GET['store']) ? '&store=' . $store : '' ?><?=!empty($_GET['firstName']) ? '&firstName=' . $_GET['firstName'] : '' ?>
<?=!empty($_GET['DEPT']) ? '&DEPT=' . $_GET['DEPT'] : '' ?><?=!empty($_GET['lastName']) ? '&lastName=' . $_GET['lastName'] : '' ?>
<?=!empty($_GET['position']) ? '&position=' . $_GET['position'] : '' ?>"><?=$i?></a>
    <?php endif; ?>
    <?php endfor; ?>

    </div>
    </div>
  </div>
  </body>

  <script type="text/javascript">
    var selectBoxChange = function(value){
      $("#changeInput").attr("name", value);
      $("#changeInput").attr("placeholder", value);
      //$("#changeInput").val(value);
    }
  </script>

  <script>
  var current_location = window.location.href;
  var current_location_temp = current_location.slice(21);
   //console.log("현재주소:", current_location);
   //console.log(current_location_temp);
  var list_all = document.getElementsByClassName('store_nav');

  for (i=0; i<list_all.length; i++) {
    // console.log(list_all[i].href);
    if (current_location.indexOf("GA55") != -1) {
      list_all[1].className += " active";
      list_all[0].classList.remove("active");
      list_all[2].classList.remove("active");
      list_all[3].classList.remove("active");
    }
    else if (current_location.indexOf("IL70") != -1) {
      list_all[2].className += " active";
      list_all[0].classList.remove("active");
      list_all[1].classList.remove("active");
      list_all[3].classList.remove("active");
    }
    else if (current_location.indexOf("PA88") != -1) {
      list_all[3].className += " active";
      list_all[0].classList.remove("active");
      list_all[1].classList.remove("active");
      list_all[2].classList.remove("active");
    }
    else{
      list_all[0].className += " active";
      list_all[1].classList.remove("active");
      list_all[2].classList.remove("active");
      list_all[3].classList.remove("active");
    }
  }


  </script>
</html>
