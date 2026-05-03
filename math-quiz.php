<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BrainArea | Math Quiz</title>
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
  padding:15px 40px;
}

.quiz-box{
  background:#fff;
  width:450px;
  margin:60px auto;
  padding:30px;
  border-radius:10px;
  box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

h2{color:black;margin-bottom:10px;}

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
  <h2>Mathematics Quiz</h2>
</div>

<div class="quiz-box">
  <h2 id="question"></h2>
  <div id="options"></div>
  <button onclick="nextQuestion()">Next</button>
</div>

<script>
const quiz = [
  {
    q: "What is the value of 15 × 4?",
    o: ["40","50","60","70"],
    a: 2
  },
  {
    q: "What is 25 + 35?",
    o: ["50","55","60","65"],
    a: 2
  },
  {
    q: "What is the square of 8?",
    o: ["16","32","64","48"],
    a: 2
  },
  {
    q: "What is 100 ÷ 5?",
    o: ["10","15","20","25"],
    a: 2
  },
  {
    q: "Which number is a prime?",
    o: ["9","15","17","21"],
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
  q.innerText = "Q" + (index+1) + ". " + quiz[index].q;
  opt.innerHTML = "";

  quiz[index].o.forEach((text,i)=>{
    let div = document.createElement("div");
    div.className = "option";
    div.innerText = text;
    div.onclick = ()=>checkAnswer(div,i);
    opt.appendChild(div);
  });
}

function checkAnswer(el,i){
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
    
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "math-result.php";

    const s = document.createElement("input");
    s.type = "hidden";
    s.name = "score";
    s.value = score;

    const t = document.createElement("input");
    t.type = "hidden";
    t.name = "total";
    t.value = quiz.length;

    form.appendChild(s);
    form.appendChild(t);
    document.body.appendChild(form);
    form.submit();
  }
}

loadQuestion();
</script>

</body>
</html>
