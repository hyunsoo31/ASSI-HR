<!-- <header id="header_container">
  <h1 style="text-align: center; margin-bottom: 100px;">ASSI PLAZA</h1>
</header>
<div class="home_container">
    <h2>TRAINING</h2>
    <h1>for EMPLOYEES</h1>

</div> -->


<!-- <header id="header_container">
  <h2 style="text-align: center; margin-bottom: 30px; font-size: 4rem;">HR Training for Assi Employees</h2>
</header>
<div class="home_container">
 

</div> -->



<!-- <header id="header_container">
  <h2 style="text-align: center; margin-bottom: 30px; font-size: 4rem;">HR Training for Assi Employees</h2>
</header> -->
<div id="slide" val="1" mx="3">

      <li id="img1"><img src="https://cdn.pixabay.com/photo/2022/08/15/02/07/park-7386978_960_720.jpg" alt=""></li>
      <li id="img2"><img src="https://cdn.pixabay.com/photo/2021/11/16/15/35/electronics-6801339_960_720.jpg" alt=""></li>
      <li id="img3"><img src="https://cdn.pixabay.com/photo/2022/06/12/22/48/futuristic-7258997_960_720.png" alt=""></li>
  
</div>
<style>

#slide{
position:relative;
width: 100%;
height: 800px;

}

#slide li{

/* position:absolute; */
top:0;
left:0;
display:none;
-webkit-display:block;
list-style: none;

}

#slide img{
width:100%;
height: 800px;
} 

</style>

<script>
imgslide(); //페이지가 로딩될때 함수를 실행합니다

function imgslide(){

  $val = $("#slide").attr("val"); //현재 이미지 번호를 가져옵니다

  $mx = $("#slide").attr("mx"); //총 이미지 개수를 가져옵니다

	$("#img"+$val).hide(); //현재 이미지를 사라지게 합니다.

	if( $val == $mx ){ $val = 1; } //현재이미지가 마지막 번호라면 1번으로 되돌립니다.

	else{ $val++; } //마지막 번호가 아니라면 카운트를 증가시켜줍니다

	$("#img"+$val).fadeIn(2500); //변경된 번호의 이미지영역을 나타나게 합니다.괄호 안에 숫자는 페이드인 되는 시간을 나타냅니다.\


	$("#slide").attr('val',$val); //변경된 이미지영역의 번호를 부여합니다.

	setTimeout('imgslide()',5000); //1초 뒤에 다시 함수를 호출합니다.(숫자값 1000당 1초)

}
</script>