<?php
session_start();
if (!isset($_SESSION['user_id'])) {
   header("Location: ../login.html");

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BrainArea | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:"Segoe UI",sans-serif;
    }
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
      display:flex;
      justify-content:space-between;
      align-items:center;
    }

    .navbar h2{
      font-size:22px;
    }

    .navbar a{
      color:#fff;
      text-decoration:none;
      margin-left:20px;
      font-weight:500;
    }

    .container{
      padding:40px;
      max-width:1000px;
      margin:auto;
    }

    h1{
      color:black;
      margin-bottom:10px;
    }

    .welcome{
      margin-bottom:30px;
      color:black;
      font-size:15px;
    }

    .cards{
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
      gap:20px;
    }

    .card{
      background:#fff;
      padding:25px;
      border-radius:10px;
      box-shadow:0 10px 25px rgba(0,0,0,0.1);
      text-align:center;
    }

    .card h3{
      margin-bottom:10px;
    }

    .card p{
      font-size:14px;
      color:#555;
      margin-bottom:15px;
    }

    .card a{
      display:inline-block;
      padding:10px 18px;
      background:#3f7efc;
      color:#fff;
      border-radius:6px;
      text-decoration:none;
      font-size:14px;
    }

    footer{
      text-align:center;
      padding:15px;
      font-size:13px;
      color:#555;
      margin-top:40px;
    }
  </style>
</head>
<body>


<div class="navbar">
  <h2>BrainArea</h2>
  <div>
    <a href="dashboard.php">Dashboard</a>
    <a href="auth/logout.php">Logout</a>
  </div>
</div>


<div class="container">
  <h1>Quiz Dashboard</h1>
  <p class="welcome">
    Welcome, <strong><?php echo htmlspecialchars($_SESSION['name']); ?></strong> 👋  
    Choose a quiz category to begin.
  </p>

  <div class="cards">

    <div class="card">
      <h3>General Knowledge</h3>
      <p>Test your basic knowledge</p>
      <a href="gk-quiz.php">Start Quiz</a>
    </div>

    <div class="card">
      <h3>Computer Science</h3>
      <p>Programming & fundamentals</p>
      <a href="cs-quiz.php">Start Quiz</a>
    </div>

    <div class="card">
      <h3>Mathematics</h3>
      <p>Logic & problem solving</p>
      <a href="math-quiz.php">Start Quiz</a>
    </div>

  </div>
</div>

<footer>
  © 2025 BrainArea — Quiz Learning Platform
</footer>

</body>
</html>
