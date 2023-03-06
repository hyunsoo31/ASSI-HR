<div class="login_box">
  <?php
  if(isset($error)):
    echo '<div class="errors">' . $error . '</div>';
  endif;
  ?>
  <form method="post" action="">
    <label for="EEID">EEID</label>
    <input type="text" id="EEID" name="EEID">

    <label for="password">Password</label>
    <input type="password" id="password" name="password">

    <input type="submit" name="login" value="Sign in" id="login_submit">
  </form>

</div>