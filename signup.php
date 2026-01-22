<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <style>
:root {
  --primary: #c0392b;
  --primary-dark: #a93226;
  --secondary: #43cd08;
  --bg-gradient: linear-gradient(135deg, #e8b4b4, #f3d0d0);
  --glass-bg: rgba(255, 255, 255, 0.28);
  --text-dark: #2c2c2c;
  --shadow-soft: 0 12px 35px rgba(0, 0, 0, 0.15);
  --radius: 14px;
}
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
  text-align: center;
  animation: fadeIn 1s ease-in;
}
nav {
  background: linear-gradient(90deg, var(--secondary), #2ecc71);
  padding: 15px 20px;
  box-shadow: var(--shadow-soft);
  position: sticky;
  top: 0;
  z-index: 100;
}

nav a {
  color: #fff;
  text-decoration: none;
  margin: 0 15px;
  font-weight: 600;
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


h2 {
  margin: 30px 0 20px;
  font-size: 2.1rem;
  color: var(--primary);
  letter-spacing: 1px;
}

form {
  background: var(--glass-bg);
  backdrop-filter: blur(14px);
  width: 380px;
  margin: 0 auto 20px;
  padding: 30px;
  border-radius: var(--radius);
  box-shadow: var(--shadow-soft);
  animation: slideUp 0.8s ease;
}


input,
select {
  width: 100%;
  padding: 12px;
  margin: 12px 0;
  border-radius: 8px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  font-size: 15px;
  transition: border 0.3s ease, box-shadow 0.3s ease;
}

input:focus,
select:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.25);
}

.radio {
  text-align: center;
  margin: 15px 0;
  font-size: 15px;
}

.radio input {
  margin-right: 6px;
  transform: scale(1.1);
}

button {
  width: 100%;
  padding: 14px;
  margin-top: 10px;
  background: linear-gradient(135deg, var(--primary), #e74c3c);
  color: white;
  border: none;
  border-radius: var(--radius);
  cursor: pointer;
  font-size: 17px;
  box-shadow: var(--shadow-soft);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

button:hover {
  transform: translateY(-2px);
  box-shadow: 0 18px 40px rgba(0, 0, 0, 0.25);
}
p {
  margin-top: 15px;
  font-weight: 600;
}

@media (max-width: 480px) {
  form {
    width: 90%;
  }

  h2 {
    font-size: 1.8rem;
  }

  nav a {
    display: block;
    margin: 10px 0;
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
<h2>Donor Registration</h2>
<form method="POST">
  <input type="text" name="name" placeholder="Name" required>
  <input type="text" name="phone" placeholder="Phone" required>
  <input type="email" name="email" placeholder="Email" required>
  <div class="radio">
    Gender:
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female"> Female
  </div>
  <input type="text" name="pincode" placeholder="Pincode" required>
  <select name="blood" required>
    <option value="">Blood Group</option>
    <option>A+</option><option>B+</option><option>O+</option><option>AB+</option>
    <option>A-</option><option>B-</option><option>O-</option><option>AB-</option>
  </select>

  <button type="submit" name="submit">Register</button>
</form>

<?php
if (isset($_POST['submit'])) {

  $name   = $_POST['name'];
  $phone  = $_POST['phone'];
  $email  = $_POST['email'];
  $gender = $_POST['gender'];
  $pin    = $_POST['pincode'];
  $blood  = $_POST['blood'];

  $sql = "INSERT INTO `dos`( `name`, `phone`, `email`, `gender`, `pincode`, `blood_group`) VALUES ('$name','$phone ','$email','$gender','$pin','$blood')";

  if (mysqli_query($conn, $sql)) {
    echo "<p style='color:green;'>✅ Donor Registered Successfully</p>";
  } else {
    echo "<p style='color:red;'> Error</p>";
  }
}
?>

</body>
</html>
