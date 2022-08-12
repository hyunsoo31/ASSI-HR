<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	// 입력란에 입력을 하면 입력내용에 내용이 출력

	// 1. #data 공간에서 keyup이라는 이벤트가 발생했을 때

	$("#EEID").keyup(function(){

		// 2. #out 공간에 #data의 내용이 출력된다.

		//$("#out").text($("#data").val());
    //$("#out2").text($("#data").val());
    //$('input[name=employeeTraining[EE_ID]]').attr('value', $("#EEID").val());
    $("#EEID2").val($("#EEID").val());
    $("#EEID3").val($("#EEID").val());
    $("#EEID4").val($("#EEID").val());

		// #out의 위치에 text로 데이터를 받는다.(setter)

		// 들어가는 데이터는 #data의 값(.val())이다. (getter)

		// 메서드 괄호 안에 아무것도 없으면 getter, 파라미터가 있으면 setter이다.

	});

});

</script>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
		<div class="content_box">
    <div class = "signup_box" "style=display:flex;">
        <form action="" method="post">
          <div style="display:flex;">
            <div style="display-direction: row;">
                <label for="EEID">EEID</label>
                <input name="author[EEID]" id="EEID" type="text" value = "<?=$author['EEID'] ?? ''?>">
                <label for="password">Password</label>
                <input name="author[password]" id="password" type="password" value = "<?=$author['password'] ?? ''?>">

                <label for="firstName">firstName</label>
                <input name="author[firstName]" id="firstName" type="text"value = "<?=$author['firstName'] ?? ''?>">
                <label for="lastName">lastName</label>
                <input name="author[lastName]" id="lastName" type="text"value = "<?=$author['lastName'] ?? ''?>">
                <label for="gender">gender</label>
                <input name="author[gender]" id="gender" type="text"value = "<?=$author['gender'] ?? ''?>">
                <label for="phone">phone</label>
                <input name="author[phone]" id="phone" type="text"value = "<?=$author['phone'] ?? ''?>">
                <label for="birthDate">birthDate</label>
                <input name="author[birthDate]" id="birthDate" type="date" value = "<?=$author['birthDate'] ?? ''?>">
                <label for="payType">payType</label>
                <input name="author[payType]" id="payType" type="text" value = "<?=$author['payType'] ?? ''?>">
                <label for="DOLStatus">DOLStatus</label>
                <input name="author[DOLStatus]" id="DOLStatus" type="text" value = "<?=$author['DOLStatus'] ?? ''?>">
                <label for="department">department</label>
                <input name="author[department]" id="department" type="text" value = "<?=$author['department'] ?? ''?>">
                <label for="position">position</label>
                <input name="author[position]" id="position" type="text" value = "<?=$author['position'] ?? ''?>">
                <label for="hireDate">hireDate</label>
                <input name="author[hireDate]" id="hireDate" type="date" value = "<?=$author['hireDate'] ?? ''?>">
                <label for="permission">permission</label>
                <input name="author[permission]" id="permission" type="text" value = "<?=$author['permission'] ?? ''?>">
                <label for="store">store</label>
                <input name="author[store]" id="store" type="text" value = "<?=$author['store'] ?? ''?>">
                <div class="submit_button">
                <input type="submit" name="submit" value="Sign up" id="signup_submit">
              </div>
            </div>

            <div style="flex-direction: row;">

              <input name="employeeTraining[id]" id="id" type="hidden" value = "<?=$employeeTraining['id'] ?? ''?>">
              <label for="EEID">EEID</label>
              <input name="employeeTraining[EE_ID]" id="EEID2" type="text" value = "<?=$employeeTraining['EE_ID'] ?? ''?>">
              <!-- <label for="password">TRID</label> -->
              <input name="employeeTraining[TR_ID]" id="TRID" type="hidden" value = "<?=$employeeTraining['TR_ID'] ?? '1'?>">
              <label for="title">Title</label>
              <input name="employeeTraining[title]" id="title" type="text" value = "<?=$employeeTraining['title'] ?? 'T1'?>" >
              <label for="deadline_date">deadline_date</label>
              <input name="employeeTraining[deadline_date]" style="margin-bottom:20px;" id="title" type="date" value = "<?=$employeeTraining['deadline_date'] ?? ''?>">

              <input name="employeeTraining2[id]" id="id" type="hidden" value = "<?=$employeeTraining2['id'] ?? ''?>">
              <label for="EEID">EEID</label>
              <input name="employeeTraining2[EE_ID]" id="EEID3" type="text" value = "<?=$employeeTraining2['EE_ID'] ?? ''?>">
              <!-- <label for="password">TRID</label> -->
              <input name="employeeTraining2[TR_ID]" id="TRID" type="hidden" value = "<?=$employeeTraining2['TR_ID'] ?? '2'?>">
              <label for="title">Title</label>
              <input name="employeeTraining2[title]" id="title" type="text" value = "<?=$employeeTraining2['title'] ?? 'T2'?>">
              <label for="deadline_date">deadline_date</label>
              <input name="employeeTraining2[deadline_date]" id="title" style="margin-bottom:20px;" type="date" value = "<?=$employeeTraining2['deadline_date'] ?? ''?>">

              <input name="employeeTraining3[id]" id="id" type="hidden" value = "<?=$employeeTraining3['id'] ?? ''?>">
              <label for="EEID">EEID</label>
              <input name="employeeTraining3[EE_ID]" id="EEID4" type="text" value = "<?=$employeeTraining3['EE_ID'] ?? ''?>">
              <!-- <label for="password">TRID</label> -->
              <input name="employeeTraining3[TR_ID]" id="TRID" type="hidden" value = "<?=$employeeTraining3['TR_ID'] ?? '3'?>">
              <label for="title">Title</label>
              <input name="employeeTraining3[title]" id="title" type="text" value = "<?=$employeeTraining3['title'] ?? 'T3'?>">
              <label for="deadline_date">deadline_date</label>
              <input name="employeeTraining3[deadline_date]" id="title" type="date" value = "<?=$employeeTraining3['deadline_date'] ?? ''?>">
            </div>

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
		</div>
  </body>
</html>
