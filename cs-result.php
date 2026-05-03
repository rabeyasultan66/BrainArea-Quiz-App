<?php
session_start();

$score = $_POST['score'] ?? 0;
$total = $_POST['total'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Quiz Result</title>
  <style>
    body{
      font-family:Segoe UI;
      background:#f2f6ff;
      display:flex;
      justify-content:center;
      align-items:center;
      height:100vh;

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
    .box{
      background:#fff;
      padding:40px;
      border-radius:10px;
      box-shadow:0 10px 25px rgba(0,0,0,.1);
      text-align:center;
    }
    h1{color:#3f7efc;}
    a{
      display:inline-block;
      margin-top:20px;
      text-decoration:none;
      background:#3f7efc;
      color:#fff;
      padding:10px 20px;
      border-radius:6px;
    }
  </style>
</head>
<body>

<div class="box">
  <h1>CS-Quiz Finished 🎉</h1>
  <h2>Your Score</h2>
  <h3><?php echo $score . " / " . $total; ?></h3>

    <a href="dashboard.php">Back to Dashboard</a>
  <a href="cs-quiz.php">Try Again</a>
</div>

</body>
</html>
