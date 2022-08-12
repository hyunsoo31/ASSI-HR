
<style>
  main{
    justify-content: center;
  }
</style>
<div style="margin: 30px auto;">
<form action="" method="post">
  <label for="training[title]">training name: </label>
  <input type="text" id="training[title]" name="training[title]" value="<?=$training->title ?? ''?>"/>
  <label for="training[dateOfUpdated]">date of updated: </label>
  <input type="date" id="training[dateOfUpdated]" name="training[dateOfUpdated]" value="<?=$training->dateOfUpdated ?? ''?>"/>
  <input type="submit" name="submit" value="save">
</form>
</div>
<!-- <form method="post" action="upload-multiple.php" enctype="multipart/form-data">
        <input type="file" name="upload[]" multiple>
        <input type="submit" value="send">
</form> -->
