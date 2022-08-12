<header id="header_container">
  <h1 style="text-align: center; margin-bottom: 100px;">ASSI PLAZA</h1>
  <!-- <h1>ASSI</h1>
  <h2>PLAZA</h2> -->
</header>
<div class="home_container">
    <h2>TRAINING</h2>
    <h1>for EMPLOYEES</h1>
    <!-- <input type="button" value="인쇄하기" id="print" onclick="window.print()"/> -->

</div>
<!--
<body>
  <form name="form" action="<?=$_SERVER[PHP_SELF]?>" method="post">
    <input type="hidden" name="capture_image" value="">
    <input type="button" onclick="capture_html('capture')" value="내 pc에 이미지 저장"> -->
    <!-- <input type="button" onclick="capture_save_server('capture')" value="서버에 이미지 저장"> -->

    <!--캡처 영영-->
    <!-- <br><br><br>
    <div id="capture" style="background:green; width:600px; height:600px;">
      이미지 캡처 영역 <?=date("s")?>
    </div>
  </form>
</body> -->
<script>
// function capture_html(id){
//   html2canvas(document.querySelector("#"+id)).then(canvas => {
//     capture_save(canvas.toDataURL('img/png'), "capture_img.png");
//   });
// }
//
// function capture_save(uri, filename) {
//   var link = document.createElement('a');
//   if(typeof link.download === 'string'){
//     link.href = uri;
//     link.download = filename;
//     document.body.appendChild(link);
//     link.click();
//     document.body.removeChild(link);
//   } else{
//     window.open(uri);
//   }
// }
// function capture_save_server(id){
//   var form=document.form;
//   var capture_image="";
//   html2canvas(document.querySelector("#"+id)).then(canvas => {
//     capture_image=canvas.toDataURL('image/png');
//   });
//   setTimeout(function(){
//     $.ajax({
//       type: 'post',
//       async: false,
//       url: '../test/form.php',
//       data: {'t': 'capture_save_server', 'capture_image':capture_image},
//       success.function(data){
//         $("#server_img").html(data);
//       }
//     });
//   }, 500);
// }
</script>
