<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Donors</title>
<style>
/* =========================
   THEME VARIABLES
========================= */
:root {
  --primary: #c0392b;
  --primary-dark: #a93226;
  --secondary: #14da2e;
  --bg-gradient: linear-gradient(135deg, #e7b3b3, #f7dada);
  --glass-bg: rgba(255, 255, 255, 0.35);
  --text-dark: #2d2d2d;
  --shadow-soft: 0 12px 35px rgba(0, 0, 0, 0.18);
  --radius: 16px;
}

/* =========================
   RESET & BASE
========================= */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Arial, sans-serif;
}

body {
  min-height: 100vh;
  background: var(--bg-gradient);
  color: var(--text-dark);
  animation: fadeIn 1s ease-in;
}

/* =========================
   NAVBAR
========================= */
nav {
  background: linear-gradient(90deg, var(--secondary), #2ecc71);
  padding: 15px 20px;
  text-align: center;
  box-shadow: var(--shadow-soft);
  position: sticky;
  top: 0;
  z-index: 100;
}

nav a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  margin: 0 15px;
  font-size: 17px;
  position: relative;
}

nav a::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -6px;
  width: 0%;
  height: 2px;
  background: white;
  transition: width 0.3s ease;
}

nav a:hover::after {
  width: 100%;
}

/* =========================
   PAGE TITLE
========================= */
h2 {
  text-align: center;
  margin: 35px 0 30px;
  font-size: 2.2rem;
  color: var(--primary);
  letter-spacing: 1px;
}

/* =========================
   CARD CONTAINER (GRID)
========================= */
body > .card {
  animation: slideUp 0.6s ease;
}

/* =========================
   DONOR CARD
========================= */
.card {
  background: var(--glass-bg);
  backdrop-filter: blur(14px);
  max-width: 520px;
  margin: 20px auto;
  padding: 25px;
  border-radius: var(--radius);
  box-shadow: var(--shadow-soft);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  overflow: hidden;
}

.card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, var(--primary), #e74c3c);
}

.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 22px 45px rgba(0, 0, 0, 0.28);
}

/* =========================
   CARD CONTENT
========================= */
.card h3 {
  margin-bottom: 10px;
  color: var(--primary-dark);
  font-size: 1.5rem;
}

.card p {
  margin: 7px 0;
  font-size: 15px;
  line-height: 1.6;
}

/* =========================
   BLOOD GROUP BADGE
========================= */
.card p:first-of-type {
  display: inline-block;
  background: linear-gradient(135deg, var(--primary), #e74c3c);
  color: white;
  padding: 6px 14px;
  border-radius: 20px;
  font-weight: 600;
  margin-bottom: 12px;
}

/* =========================
   EMPTY STATE
========================= */
p {
  text-align: center;
  font-size: 18px;
  color: #555;
  margin-top: 40px;
}

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 768px) {
  nav a {
    display: block;
    margin: 10px 0;
  }

  h2 {
    font-size: 1.9rem;
  }

  .card {
    width: 90%;
  }
}

/* =========================
   ANIMATIONS
========================= */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideUp {
  from {
    transform: translateY(30px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}
</style>


  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="donors.php">Donors</a>
  <a href="signup.php">Signup</a>
  <a href="contact.php">Contact</a>
</nav>

<h2>Available Donors</h2>

<?php
$sql = "SELECT * FROM dos";

if (isset($_GET['pincode']) && isset($_GET['blood'])) {
  $sql .= " WHERE pincode='{$_GET['pincode']}'
            AND blood_group='{$_GET['blood']}'";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
    echo "<div class='card'>
            <h3>{$row['name']}</h3>
            <p>Blood Group: {$row['blood_group']}</p>
            <p>Gender: {$row['gender']}</p>
            <p>Email: {$row['email']}</p>
            <p>Phone: {$row['phone']}</p>
            <p>Pincode: {$row['pincode']}</p>
          </div>";
  }
} else {
  echo "<p>No donors found</p>";
}
?>
</body>
</html>
