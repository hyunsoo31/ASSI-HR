
  function Question(text, choice, answer){
    this.text = text;
    this.choice = choice;
    this.answer = answer;
  }
  function Quiz(questions){
    this.score = 0;
    this.questions = questions;
    this.questionIndex = 0;
  }

  Quiz.prototype.correctAnswer = function(answer){
    return answer == this.questions[this.questionIndex].answer;
  }

  var questions = [
  new Question('1.If no touching occurs, an action does not constitute sexual harassment.', ['True', 'False'], 'True'),
  new Question('5.If a co-worker tells you they have been sexually harassed, it is best to…..', ['a.Not possible because it is consensual.', 'b.	It depends on whether the company has a sexual harassment policy.', 'c.	Yes; especially if the relationship ends badly.', 'd.	Only if the employees work in the same department.'], 'a.Not possible because it is consensual.'),
  new Question('명령어 기반의 인터페이스를 의미하는 용어는?', ['GUI','CLI','HUD','SI'],'CLI'),
  new Question('CSS속성 중 글자의 굵기를 변경하는 속성은?', ['font-size', 'font-style', 'font-weight', 'font-variant'], 'font-weight'),
  new Question('명령어 기반의 인터페이스를 의미하는 용어는?', ['GUI','CLI','HUD','SI'],'CLI'),
  new Question('CSS속성 중 글자의 굵기를 변경하는 속성은?', ['font-size', 'font-style', 'font-weight', 'font-variant'], 'font-weight'),
  new Question('명령어 기반의 인터페이스를 의미하는 용어는?', ['GUI','CLI','HUD','SI'],'CLI'),
  new Question('CSS속성 중 글자의 굵기를 변경하는 속성은?', ['font-size', 'font-style', 'font-weight', 'font-variant'], 'font-weight')
];

var quiz = new Quiz(questions);

function update_quiz(){
  var question = document.getElementById('question');
  var idx = quiz.questionIndex + 1;
  var choice = document.querySelectorAll('.btn_test');

  question.innerHTML = '문제' + idx +') ' + quiz.questions[quiz.questionIndex].text;

  for (var i=0; i<quiz.questions[quiz.questionIndex].choice.length; i++){
    choice[i].innerHTML = quiz.questions[quiz.questionIndex].choice[i];
  }
  progress();
}

var btn = document.querySelectorAll('.btn_test')
function progress(){
  var progress = document.getElementById('progress');
  progress.innerHTML = '문제 '+ (quiz.questionIndex+1) + ' /'+ quiz.questions.length;
}

function result(){
  var quiz_div = document.getElementById('quiz');

  var per = parseInt((quiz.score*100)/quiz.questions.length);

  var txt = '<h2>결과</h2>' + '<h2 id="score">당신의 점수: ' + quiz.score + '/' + quiz.questions.length + '<br><br>'+per+'점</h2>';

  quiz_div.innerHTML = txt;

  if(per<60){
    txt += '<h2 style="color:red"><a href="/fail1">FAIL</a></h2>';
    quiz_div.innerHTML = txt;

  } else {
    txt += '<h2 style="color:green"><a href="/pass1">PASS</h2>';
    quiz_div.innerHTML = txt;

  }
}

function checkAnswer(i){
  btn[i].addEventListener('click', function(){
    var answer = btn[i].innerText;

    if(quiz.correctAnswer(answer)){
      // alert('정답입니다');
      quiz.score++;
    }else{
      // alert('틀렸습니다')
    };

    if(quiz.questionIndex < quiz.questions.length-1){
      quiz.questionIndex++;
      update_quiz();
    } else {
      result();
    }
  });
}
for(var i=0; i<btn.length; i++){
  checkAnswer(i);
}
update_quiz();
