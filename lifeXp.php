<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome - lifeXP</title>
  <link rel="stylesheet" href="XP.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mystery+Quest&display=swap" rel="stylesheet">
  <style>
    .welcome-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      flex-direction: column;
      gap: 20px;
    }
    .welcome-box {
      text-align: center;
      background: rgba(255, 255, 255, 0.527);
      padding: 60px;
      border-radius: 10px;
      box-shadow: 0 0px 10px rgba(0,0,0,0.1);
      max-width: 600px;
    }
    .welcome-box h1 {
      color: #000000ce;
      font-size: 48px;
      margin-bottom: 20px;
      font-family: 'Mystery Quest', system-ui;
    }
    .welcome-box p {
      color: #000000;
      font-size: 24px;
      margin-bottom: 30px;
      font-family: 'Mystery Quest', system-ui;
    }
    .logout-btn {
      padding: 12px 30px;
      background: #2d995e;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      font-family: 'Mystery Quest', system-ui;
      transition: background 0.3s;
    }
    .logout-btn:hover {
      background: #1f6b40;
    }
  </style>
</head>
<body>
  <div class="welcome-container">
    <div class="welcome-box">
      <h1>Coming Soon</h1>
      <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
      <button class="logout-btn" onclick="logout()">Logout</button>
    </div>
  </div>

  <script>
    function logout() {
      window.location.href = 'logout.php';
    }
  </script>
</body>
</html>
