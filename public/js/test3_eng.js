
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
  new Question('If no touching occurs, an action does not constitute sexual harassment.', ['a. True', 'b. False',], 'a. True'),
  new Question('If everyone laughs at dirty jokes, it cannot be considered sexual harassment.', ['a. True', 'b. False',], 'a. True'),
  new Question('Use of profane language is not sexual harassment.', ['a. True', 'b. False',], 'a. True'),
  new Question('Can a consensual relationship turn into a sexual harassment claim?', ['a. Not possible because it is consensual.', 'b. It depends on whether the company has a sexual harassment policy.', 'c. Yes; especially if the relationship ends badly.', 'd. Only if the employees work in the same department.'], 'a. Not possible because it is consensual.'),
  new Question('If a co-worker tells you they have been sexually harassed, it is best to…..', ['a. Laugh about the incident and make excuses for the alleged harasser.', 'b. Point out the company policy and tell them they should report it to the HR Manager.', 'c. Contact HR immediately and request the harasser be fired.', 'd. Tell them they are overreacting and then go tell the alleged harasser that their co-worker is making accusations against them.' ], 'a.	Laugh about the incident and make excuses for the alleged harasser.'),
  new Question('Illegal harassment must be…..', ['a. Unwelcome', 'b. Unsolicited', 'c. Both A & B', 'd.	Between a male and female only'], 'a.	Unwelcome'),
  new Question('Making sexual comments and allowing sexual jokes to be passed around the office is called…..', ['a.	Quid Pro Quo harassment', 'b. Hostile environment harassment', 'c. A typical office environment', 'd. Both A & B'], 'a.	Quid Pro Quo harassment'),
  new Question('You witness Mandy making sexual comments towards Mark.  Mark doesn’t appear to like the comments so you ask him about it.  Mark says he doesn’t like it but he is afraid to say anything to management because Mary is a top employee and everyone likes her.  You must…..', ['a. Do nothing and hope the issue resolves itself.', 'b. Write it down and file it away in case it happens again.', 'c. Go to Mandy yourself and tell her to stop making the comments to Mark.', 'd. Report what you have witnessed to your supervisor or the HR Manager.'], 'a.	Do nothing and hope the issue resolves itself.'),
  new Question('Roberta is the department head for EZ Computers and hires Alex as her assistant.  Shortly after Alex starts working at the company, Roberta tells Alex that the only way he can keep his job at EZ Computers is by having sex with her.  Alex is very upset with this demand, but agrees because he doesn’t want to lose his job.', ['a. True', 'b. False',], 'a. True'),
  new Question('One of the best ways to stop sexual harassment is to simply ignore the harasser.', ['a. True', 'b. False',], 'a. True'),
  new Question('Howie, a facilities service supervisor, hangs a calendar featuring nude women in his office.  The calendar:', ['a. Can be left up unless someone complains', 'b. Can contribute to a hostile working environment', 'c. Is protected as a freedom of expression under the First Amendment', 'd. Is nobody’s business but Howie’s.  If someone doesn’t like it they should just not go into his office.'], 'a.	Can be left up unless someone complains'),
  new Question('It’s sexual harassment to tell a co-worker of the opposite sex that he/she looks nice today.', ['a. True', 'b. False',], 'a. True'),
  new Question('Shawna works for Ace Modeling Agency and one of their key clients has sexually harassed her on a business trip.  Shawna reported this behavior to her manager, Jim, but Jim told Shawna to put up with the behavior since the client said he would drop the account if Shawna doesn’t work with him on it.', ['a. Shawna has grounds for a sexual harassment claim since her manager didn’t take action on her complaint.', 'b.	Since so many clients in her industry demand this type of treatment, Shawna should learn to play the game.', 'c. Shawna has no grounds for complaint against Ace Modeling but can pursue a complaint against the client.', 'd. Since Shawna quit the agency, she has no rights to file a sexual harassment complaint.'], 'a. Shawna has grounds for a sexual harassment claim since her manager didn’t take action on her complaint.')
];

var quiz = new Quiz(questions);


function update_quiz(){
  var question = document.getElementById('question');
  var idx = quiz.questionIndex + 1;
  var choice = document.querySelectorAll('.btn_test');

  question.innerHTML = '문제' + idx +') ' + quiz.questions[quiz.questionIndex].text;

  for (var i=0; i<4; i++){
    
    if (quiz.questions[quiz.questionIndex].choice[i] != undefined){
      choice[i].style.display='block';
      choice[i].innerHTML = quiz.questions[quiz.questionIndex].choice[i];
    }
    else {
      choice[i].style.display='none';
    }
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

  var txt = '<h2>결과</h2>' + quiz.score + '/' + quiz.questions.length + '<h2 id="score">당신의 점수: ' +  '<br><br>'+per+'%</h2>';

  quiz_div.innerHTML = txt;

  if(per<60){
    txt += '<h2 style="color:red"><a href="/fail3">FAIL</a></h2>';
    quiz_div.innerHTML = txt;

  } else {
    txt += '<h2 style="color:green"><a href="/pass3">PASS</h2>';
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
