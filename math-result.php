<?php
session_start();

if (!isset($_POST['score']) || !isset($_POST['total'])) {
    header("Location: dashboard.php");
    exit();
}

$score = $_POST['score'];
$total = $_POST['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BrainArea | Math Result</title>
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

.result-box{
  background:#fff;
  width:380px;
  margin:80px auto;
  padding:30px;
  text-align:center;
  border-radius:10px;
  box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

h1{color:#3f7efc;margin-bottom:10px;}

.score{
  font-size:38px;
  margin:15px 0;
  color:#3f7efc;
}

p{color:#555;margin-bottom:15px;}

a{
  display:block;
  margin-top:10px;
  padding:12px;
  background:#3f7efc;
  color:#fff;
  text-decoration:none;
  border-radius:6px;
}
a:hover{background:#2f6be0;}
</style>
</head>

<body>

<div class="result-box">
  <h1>Math Quiz Completed 🎉</h1>
  <p>Your Score</p>

  <div class="score">
    <?php echo $score . " / " . $total; ?>
  </div>

  <a href="dashboard.php">Back to Dashboard</a>
  <a href="math-quiz.php">Try Again</a>
</div>

</body>
</html>
