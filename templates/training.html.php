<div style="flex-direction: column; margin: 30px auto;">
<h2 style="text-align: center; color:black;">Training</h2>

<!-- <a href="/training/edit">training 추가</a> -->
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training/edit'">Training Add</button>
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training/uploads'">Training Upload</button>
<p>
<?php foreach($trainings as $training): ?>

    <span hidden>id: <?=$training->id?></span>

<blockquote>

  <p>
  title: <?=htmlspecialchars($training->title, ENT_QUOTES, 'UTF-8')?>

  <a href="/training/edit?id=<?=$training->id?>">Edit</a>
  <div style="width: 200px;">
    date: <?=$training->dateOfUpdated?>
  </div>

  <form action="/training/delete" method="post">
    <input type="hidden" name="id" value="<?=$training->id?>">

    <input type="submit" value="Delete">
  </form>


 <?php if($training->title == "T1"):?>
 <!-- <a href="/review1">preview</a> -->
 <?php endif;?>

 </p>
</blockquote>


<?php endforeach; ?>
<br>
<br>
<br>
KOR:
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_kor'">T1</button>
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_kor'">T2</button>
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_kor'">T3</button>
&nbsp &nbsp &nbsp
ENG:
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_eng'">T1</button>
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_eng'">T2</button>
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_eng'">T3</button>
&nbsp &nbsp &nbsp
SPN:
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training1_spn'">T1</button>
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training2_spn'">T2</button>
<button type="button" class="btn btn-outline-secondary" onclick="location.href='/training3_spn'">T3</button>
</div>
