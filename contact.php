<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/* ======================
   THEME VARIABLES
====================== */
:root {
  --primary: #c0392b;
  --secondary: #14da2e;
  --bg-gradient: linear-gradient(135deg, #e8b4b4, #f5d0d0);
  --glass-bg: rgba(255, 255, 255, 0.25);
  --text-dark: #2b2b2b;
  --shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  --radius: 12px;
}

/* ======================
   RESET & BASE
====================== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Arial, sans-serif;
}

body {
  min-height: 100vh;
  background: var(--bg-gradient);
  text-align: center;
  color: var(--text-dark);
  animation: fadeIn 1s ease-in;
}

/* ======================
   NAVBAR
====================== */
nav {
  background: linear-gradient(90deg, var(--secondary), #2ecc71);
  padding: 15px 20px;
  box-shadow: var(--shadow);
  position: sticky;
  top: 0;
  z-index: 100;
}

nav a {
  color: white;
  margin: 0 15px;
  text-decoration: none;
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

/* ======================
   HEADING
====================== */
h2 {
  margin: 35px 0 20px;
  font-size: 2rem;
  color: var(--primary);
  letter-spacing: 1px;
}

/* ======================
   CONTACT CARD
====================== */
p {
  font-size: 16px;
  margin: 10px 0;
}

.contact-card {
  background: var(--glass-bg);
  backdrop-filter: blur(12px);
  width: 360px;
  margin: 20px auto;
  padding: 25px;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  animation: slideUp 0.8s ease;
}

.contact-card p {
  font-weight: 500;
}

/* ======================
   BUTTON (OPTIONAL)
====================== */
button {
  background: linear-gradient(135deg, var(--primary), #e74c3c);
  color: white;
  border: none;
  cursor: pointer;
  padding: 12px 20px;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

button:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
}

/* ======================
   RESPONSIVE
====================== */
@media (max-width: 480px) {
  h2 {
    font-size: 1.7rem;
  }

  .contact-card {
    width: 90%;
  }
}

/* ======================
   ANIMATIONS
====================== */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
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
</head>
<body>
  <nav>
    <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="donors.php">Donors</a>
  <a href="signup.php">Signup</a>
  <a href="contact.php">Contact</a>
</nav>
    <div class="contact-card">
  <p>Email: support@blooddonation.com</p>
  <p>Phone: +91-XXXXXXXXXX</p>
</div>
</body>
</html>