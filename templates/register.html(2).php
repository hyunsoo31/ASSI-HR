<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){



	$("#EEID").keyup(function(){

    $("#EEID2").val($("#EEID").val());
    $("#EEID3").val($("#EEID").val());
    $("#EEID4").val($("#EEID").val());


	});

});

</script>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
        <!-- Font online-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      
<!--        Animate.css-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
                
                                
        <link rel="stylesheet" href="main.css" >
        
        <!-- Google JQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <script src="form.js"></script>

    </head>
    <body>
        <div>
           <div class="panel shadow1">
                <form class="login-form">
                    <div class="panel-switch animated fadeIn">
                        <button type="button" id="sign_up" class="active-button">Sign Up</button>
                        <button type="button" id="log_in" class="" disabled>Log in</button>
                    </div>
                    <h1 class="animated fadeInUp animate1" id="title-login">Welcome Back !</h1>
                    <h1 class="animated fadeInUp animate1 hidden" id="title-signup">Welcome !</h1>
                    <fieldset id="login-fieldset">
                        <input class="login animated fadeInUp animate2" name="username" type="textbox"  required   placeholder="Username" value="" >
                        <input class="login animated fadeInUp animate3" name="password" type="password" required placeholder="Password" value="">
                    </fieldset>
                    <fieldset id="signup-fieldset" class="hidden">
                        <input class="login animated fadeInUp animate2" name="username" type="textbox"  required   placeholder="Username" value="" >
                        <input class="login animated fadeInUp animate3" name="password" type="password" placeholder="Choose password"  required  value="">
                    </fieldset>
                    <input type="submit" id="login-form-submit" class="login_form button animated fadeInUp animate4" value="Log in">
                    <input type="submit" id="signup-form-submit" class="login_form button animated fadeInUp animate4 hidden" value="Sign up">
                    <p><a id="lost-password-link" href="" class="animated fadeIn animate5">I forgot my  login or password (!)</a></p>
                </form>
            </div>
        </div>
        <script src="form.js"></script>
    </body>
</html>

<style>
  * {
    margin: 0;
    padding: 0;
}

html{
    width: 100%;
    height: 100vh;
}

body {
    background: #e5e5e5;
    width: 100%;
    text-align: center;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    letter-spacing: 1px;
}

.panel{
    width: 450px;
    max-width: 90%;
    height: 700px;
    background:url('https://picsum.photos/1000/1500?image=827')  #fff;
    background-repeat:no-repeat;
    background-position: top center;
    background-size: cover;
    margin:5% auto 0px;
}




.shadow1{
  -webkit-box-shadow:  0 20px 15px -15px rgba(119, 119, 119, 0.85);
     -moz-box-shadow:  0 20px 15px -15px rgba(119, 119, 119, 0.85);
          box-shadow:  0 40px 30px -30px rgba(119, 119, 119, 0.85);
}


form{
    height: 700px;
    padding: 50px;
}

.panel-switch{
    text-align: center;
    margin-top: 30px;
}

.panel-switch button{
    display: inline-block;
    width: 100px;
    height: 40px;
    background: #f03699;
    margin: 0px 10px 50px;
    border: none;
    color: #fff;
    font-family: 'Open Sans', sans-serif;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 2px;
    font-size: 0.8em;
    
    transition: background-color 0.2s , color:0.2s , opacity:0.2s;
}

.panel-switch button:active{
    background: #b52773;
    color: #c9c9c9;
}

.active-button{
    opacity: 0.5;
}

button , .button , a {
    cursor: pointer;
}

form h1{
    color: #fff;
    font-family: 'Open Sans', sans-serif;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 4px;
    margin: 50px 0;
    font-size: 1.7em;
}

fieldset{
    border: none;
}

.animate1 , .animate2 , .animate3 , .animate4{
    -webkit-animation-duration: 2s;
    -moz-animation-duration: 2s;
}

.animate1
{
    -webkit-animation-delay: 0.2s;
    -moz-animation-delay: 0.2s;
}

.animate2
{
    -webkit-animation-delay: 0.7s;
    -moz-animation-delay: 0.7s;
}

.animate3
{
    -webkit-animation-delay: 1.1s;
    -moz-animation-delay: 1.1s;
}

.animate4
{
    -webkit-animation-delay: 1.5s;
    -moz-animation-delay: 1.5s;
}

.animate5
{
    -webkit-animation-delay: 2.2s;
    -moz-animation-delay: 2.2s;
}

@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

fieldset input{
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 5em;
    height: 20px;
    width: 80%;
    margin: 10px 0;
    padding: 5px;
    text-indent: 10px;
    color: #fff;
    font-weight: 600;
}

fieldset input::placeholder {
    color: #c7c6c6;
}


fieldset input:focus {
    outline:;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 5em;
    margin: 9px 0;
}

.login_form{
    position: relative;
    bottom:0;
    width: 70%;
    height: 4em;
    margin-top: 150px;
    border: none;
    border-radius: 10em;
    background: #f03699;
    color: #fff;
    font-family: 'Open Sans', sans-serif;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 2px;
    z-index: 1;
    
    transition: background-color 0.2s , color:0.2s;
}

#login-form-submit:active{
    background: #b52773;
    color: #c9c9c9;
}

p , a{
    margin: 0;
    padding: 0;
}

a{
    color: #898787;
    font-size: 0.7em;
    text-decoration: none;
}

.hidden{
    display: none;
}

/*MEDIA QUERIES     */

@media (max-height:800px) {

    body{
        max-height: 100vh;
    }

  .panel{
        width: 450px;
        max-width: 90%;
        background-size: cover;
        margin: 1% auto;
    }
    
}

@media (max-width:500px) {

    html, body{
        background:url(https://picsum.photos/3695/5543?image=827)  #fff;
        background-repeat:no-repeat;
        background-position: top center;
        background-size: cover;
        height: 100vh;
        margin: 0px;
        padding: 0px;
        position: fixed;
    }
    
    .panel{
        background: none;
        box-shadow: none;
    }
    
    
    form{
        padding: 50px;
    }

    .panel-switch{
        margin-top: 30px;
    }

    .panel-switch button{
        display: inline-block;
        width: 80px;
        margin: 0px 10px 50px;
        font-weight: 600;
        font-size: 0.7em;
    }
    
    form h1{
        font-size: 1.5em;
    }
    
    .login_form{
        bottom:0;
        width: 70%;
        margin-top: 100px;
    }
    
}
</style>

<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
		<div class="content_box">


    <div class = "signup_box" style="display:flex;">
        <form action="" method="post">
          <div style="display:flex;">
            <div style="display-direction: row;">
                <label for="EEID">EEID</label>
                <input name="author[EEID]" id="EEID" type="text" value = "<?=$author['EEID'] ?? ''?>">
                <label for="password">Password</label>
                <input name="author[password]" id="password" type="password" value = "<?=$author['password'] ?? ''?>">

                <label for="firstName">First Name</label>
                <input name="author[firstName]" id="firstName" type="text"value = "<?=$author['firstName'] ?? ''?>">
                <label for="lastName">Last Name</label>
                <input name="author[lastName]" id="lastName" type="text"value = "<?=$author['lastName'] ?? ''?>">
                <label for="gender">Gender</label>
  
                <select name="author[gender]" id="gender" required>
                 <option value="" disabled selected>Gender</option>
                  <option value="<?=$author['gender'] ?? 'Male'?>">Male</option>
                  <option value="<?=$author['gender'] ?? 'Female'?>">Female</option>
                  <option value="<?=$author['gender'] ?? 'N/A'?>">N/A</option>
                </select>
                <label for="phone">Phone</label>
                <input name="author[phone]" id="phone" type="text"value = "<?=$author['phone'] ?? ''?>">
                <label for="birthDate">Birth Date</label>
                <input name="author[birthDate]" id="birthDate" type="date" value = "<?=$author['birthDate'] ?? ''?>">
                <label for="payType">Pay Type</label>
        
                <select name="author[payType]" id="payType" required>
                 <option value="" disabled selected>Pay Type</option>
                  <option value="<?=$author['payType'] ?? 'Hourly'?>">Hourly</option>
                  <option value="<?=$author['payType'] ?? 'Salary'?>">Salary</option>
                </select>
                <label for="DOLStatus">DOL Status</label>
     
                <select name="author[DOLStatus]" id="DOLStatus" required>
                  <option value="" disabled selected>DOL Status</option>
                  <option value="<?=$author['payType'] ?? 'Full-Time'?>">Full-Time</option>
                  <option value="<?=$author['payType'] ?? 'Part-Time'?>">Part-Time</option>
                </select>
                <label for="department">Department</label>
                <input name="author[department]" id="department" type="text" value = "<?=$author['department'] ?? ''?>">
                <label for="position">Position</label>
                <input name="author[position]" id="position" type="text" value = "<?=$author['position'] ?? ''?>">
                <label for="hireDate">Hire Date</label>
                <input name="author[hireDate]" id="hireDate" type="date" value = "<?=$author['hireDate'] ?? ''?>">
   
                <label for="store">Store</label>
      
                <select name="author[store]" id="store" required>
                  <option value="" disabled selected>Store</option>
                  <option value="<?=$author['store'] ?? 'GA55'?>">GA55</option>
                  <option value="<?=$author['store'] ?? 'IL70'?>">IL70</option>
                  <option value="<?=$author['store'] ?? 'PA88'?>">PA88</option>
                  <option value="<?=$author['store'] ?? 'HQ'?>">HQ</option>
                </select>
                <div class="submit_button">
                <input type="submit" name="submit" value="Sign up" id="signup_submit">
              </div>
            </div>

            <div style="flex-direction: row;">

              <input name="employeeTraining[id]" id="id" type="hidden" value = "<?=$employeeTraining['id'] ?? ''?>">
              <label for="EEID">EEID</label>
              <input name="employeeTraining[EE_ID]" id="EEID2" type="text" value = "<?=$employeeTraining['EE_ID'] ?? ''?>">
            
              <input name="employeeTraining[TR_ID]" id="TRID" type="hidden" value = "<?=$employeeTraining['TR_ID'] ?? '1'?>">
              <label for="title">Title</label>
              <input name="employeeTraining[title]" id="title" type="text" value = "<?=$employeeTraining['title'] ?? 'T1'?>" >
              <label for="deadline_date">Deadline</label>
              <input name="employeeTraining[deadline_date]" style="margin-bottom:20px;" id="title" type="date" value = "<?=$employeeTraining['deadline_date'] ?? ''?>">

              <input name="employeeTraining2[id]" id="id" type="hidden" value = "<?=$employeeTraining2['id'] ?? ''?>">
              <label for="EEID">EEID</label>
              <input name="employeeTraining2[EE_ID]" id="EEID3" type="text" value = "<?=$employeeTraining2['EE_ID'] ?? ''?>">
       
              <input name="employeeTraining2[TR_ID]" id="TRID" type="hidden" value = "<?=$employeeTraining2['TR_ID'] ?? '2'?>">
              <label for="title">Title</label>
              <input name="employeeTraining2[title]" id="title" type="text" value = "<?=$employeeTraining2['title'] ?? 'T2'?>">
              <label for="deadline_date">Deadline</label>
              <input name="employeeTraining2[deadline_date]" id="title" style="margin-bottom:20px;" type="date" value = "<?=$employeeTraining2['deadline_date'] ?? ''?>">

              <input name="employeeTraining3[id]" id="id" type="hidden" value = "<?=$employeeTraining3['id'] ?? ''?>">
              <label for="EEID">EEID</label>
              <input name="employeeTraining3[EE_ID]" id="EEID4" type="text" value = "<?=$employeeTraining3['EE_ID'] ?? ''?>">
              
              <input name="employeeTraining3[TR_ID]" id="TRID" type="hidden" value = "<?=$employeeTraining3['TR_ID'] ?? '3'?>">
              <label for="title">Title</label>
              <input name="employeeTraining3[title]" id="title" type="text" value = "<?=$employeeTraining3['title'] ?? 'T3'?>">
              <label for="deadline_date">Deadline</label>
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
</html> -->

<style>
  select option[value=""][disabled]{
    display: none;
  }
</style>