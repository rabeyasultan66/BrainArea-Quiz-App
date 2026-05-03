<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BrainArea | General Knowledge Quiz</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:"Segoe UI",sans-serif;}
    body{
  background-image: url("img/pg.jpg"); /* path ঠিক করো */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  min-height: 100vh;
  position: relative;
}

/* dark overlay */
body::before{
  content:"";
  position:fixed;
  inset:0;
  background:rgba(0,0,0,0.4);
  z-index:-1;
}

.navbar{
  background:#3f7efc;
  color:#fff;
  padding:8px 20px;
}

.quiz-box{
  background:#fff;
  width:450px;
  margin:60px auto;
  padding:30px;
  border-radius:10px;
  box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

h2{color:black;
  margin-bottom:15px;}

.option{
  border:1px solid #ccc;
  padding:10px;
  border-radius:6px;
  margin:10px 0;
  cursor:pointer;
}

.option:hover{background:#eef3ff;}
.correct{background:#c8f7c5;}
.wrong{background:#f7c5c5;}

button{
  margin-top:15px;
  width:100%;
  padding:12px;
  background:#3f7efc;
  border:none;
  color:#fff;
  border-radius:6px;
  cursor:pointer;
}
</style>
</head>

<body>

<div class="navbar">
  <h2>General Knowledge Quiz</h2>
</div>

<div class="quiz-box">
  <h2 id="question"></h2>
  <div id="options"></div>
  <button onclick="nextQuestion()">Next</button>
</div>


<form id="resultForm" method="POST" action="gk-result.php">
  <input type="hidden" name="score" id="score">
  <input type="hidden" name="total" id="total">
</form>

<script>

const quiz = [
  {
    q: "What is the capital of Bangladesh?",
    o: ["Chittagong","Khulna","Dhaka","Rajshahi"],
    a: 2
  },
  {
    q: "Which is the largest ocean in the world?",
    o: ["Indian","Atlantic","Pacific","Arctic"],
    a: 2
  },
  {
    q: "Who is known as the Father of the Nation of Bangladesh?",
    o: ["Ziaur Rahman","Sheikh Mujibur Rahman","Tajuddin Ahmad","Ershad"],
    a: 1
  },
  {
  q: "Who is the national poet of Bangladesh?",
  o: ["Rabindranath Tagore","Kazi Nazrul Islam","Jasimuddin","Michael Madhusudan Dutt"],
  a: 1
},
{
  q: "Which is the longest river in the world?",
  o: ["Amazon","Padma","Nile","Yangtze"],
  a: 2
},
{
  q: "How many continents are there in the world?",
  o: ["5","6","7","8"],
  a: 2
}
];

let index = 0;
let score = 0;
let lock = false;

const q = document.getElementById("question");
const opt = document.getElementById("options");


function loadQuestion(){
  lock = false;
  q.innerText = "Q" + (index + 1) + ". " + quiz[index].q;
  opt.innerHTML = "";

  quiz[index].o.forEach((text, i) => {
    let div = document.createElement("div");
    div.className = "option";
    div.innerText = text;
    div.onclick = () => checkAnswer(div, i);
    opt.appendChild(div);
  });
}


function checkAnswer(el, i){
  if(lock) return;
  lock = true;

  let correct = quiz[index].a;
  let options = document.querySelectorAll(".option");

  if(i === correct){
    el.classList.add("correct");
    score++;
  }else{
    el.classList.add("wrong");
    options[correct].classList.add("correct");
  }
}


function nextQuestion(){
  if(index < quiz.length - 1){
    index++;
    loadQuestion();
  }else{
    submitQuiz();
  }
}


function submitQuiz(){
  document.getElementById("score").value = score;
  document.getElementById("total").value = quiz.length;
  document.getElementById("resultForm").submit();
}

loadQuestion();
</script>

</body>
</html>
