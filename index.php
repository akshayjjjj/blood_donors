<!DOCTYPE html>
<html>
<head>
  <title>Blood Donation</title>
<style>
/* =========================
   CSS VARIABLES (THEME)
========================= */
:root {
  --primary: #c0392b;
  --primary-dark: #a93226;
  --secondary: #42ce0a;
  --bg-gradient: linear-gradient(135deg, #f5c6c6, #e8b4b4);
  --glass-bg: rgba(255, 255, 255, 0.25);
  --text-dark: #2c2c2c;
  --shadow-soft: 0 10px 30px rgba(0, 0, 0, 0.15);
  --radius: 12px;
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
  text-align: center;
  color: var(--text-dark);
  animation: fadeIn 1s ease-in;
}

/* =========================
   NAVBAR
========================= */
nav {
  background: linear-gradient(90deg, var(--secondary), #2ecc71);
  padding: 15px 20px;
  box-shadow: var(--shadow-soft);
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
  width: 0%;
  height: 2px;
  bottom: -5px;
  left: 0;
  background: white;
  transition: width 0.3s ease;
}

nav a:hover::after {
  width: 100%;
}

/* =========================
   HEADING
========================= */
h1 {
  margin: 30px 0 20px;
  color: var(--primary);
  font-size: 2.2rem;
  letter-spacing: 1px;
}

/* =========================
   LOCATION BUTTON
========================= */
button {
  background: linear-gradient(135deg, var(--primary), #e74c3c);
  color: white;
  border: none;
  padding: 14px 22px;
  margin: 10px 0;
  font-size: 16px;
  border-radius: var(--radius);
  cursor: pointer;
  box-shadow: var(--shadow-soft);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

button:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
}

/* =========================
   LOCATION TEXT
========================= */
#location {
  margin: 15px auto;
  padding: 10px;
  width: fit-content;
  background: var(--glass-bg);
  backdrop-filter: blur(8px);
  border-radius: var(--radius);
  font-weight: 600;
}

/* =========================
   FORM (GLASSMORPHISM)
========================= */
form {
  background: var(--glass-bg);
  backdrop-filter: blur(12px);
  width: 360px;
  margin: 25px auto;
  padding: 25px;
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
  border: 1px solid rgba(0, 0, 0, 0.15);
  font-size: 15px;
  transition: border 0.3s ease, box-shadow 0.3s ease;
}

input:focus,
select:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.2);
}

form button {
  width: 100%;
  margin-top: 15px;
  font-size: 17px;
}

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 500px) {
  form {
    width: 90%;
  }

  nav a {
    display: block;
    margin: 10px 0;
  }

  h1 {
    font-size: 1.8rem;
  }
}

/* =========================
   ANIMATIONS
========================= */
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

<h1>🩸 Blood Donation Website</h1>

<button onclick="getLocation()">📍 Use My Location</button>
<p id="location"></p>

<form action="donors.php" method="GET">
  <input type="text" name="pincode" placeholder="Enter Pincode" required>

  <select name="blood" required>
    <option value="">Select Blood Group</option>
    <option>A+</option><option>B+</option><option>O+</option><option>AB+</option>
    <option>A-</option><option>B-</option><option>O-</option><option>AB-</option>
  </select>

  <button type="submit">Search</button>
</form>

<script>
function getLocation() {
  if (!navigator.geolocation) {
    alert("Geolocation not supported");
    return;
  }

  navigator.geolocation.getCurrentPosition(
    async pos => {
      const lat = pos.coords.latitude;
      const lon = pos.coords.longitude;

      document.getElementById("location").innerHTML =
        "Latitude: " + lat + "<br>Longitude: " + lon;

      const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;

      const res = await fetch(url);
      const data = await res.json();

      const city = data.address.city || data.address.town || data.address.village;
      const pincode = data.address.postcode;

      document.getElementById("location").innerHTML +=
        `<br>City: ${city}<br>Pincode: ${pincode}`;


      document.querySelector("input[name='pincode']").value = pincode;


      saveLocation(lat, lon, city, pincode);
    },
    () => alert("Location permission denied")
  );
}

function saveLocation(lat, lon, city, pincode) {
  fetch("save_location.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      latitude: lat,
      longitude: lon,
      city: city,
      pincode: pincode
    })
  })
  .then(res => res.json())
  .then(resp => console.log(resp.message))
  .catch(err => console.error("Error:", err));
}
</script>


</body>
</html>
