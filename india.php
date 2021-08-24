<?php 
session_start();
if (!isset($_SESSION['name'])) {
  echo "<script>
  alert('Login to access this page!');
window.location='http://localhost/project/index.php';
</script>";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vought Street Journal</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
   
</head>
<body>
    <div class="contain">
        <header>
            <img src="images/logo3.png" alt="Logo for Vought Street Journal" class="logoH">
        </header>
        <nav class="navigation-menu">
            <a href="index.php">Home</a>
            <div class="d">
              <button class="d-btn">World</button>
              <div class="d-content">
                <div class="row">
                  <div class="column">
                    <h4>Region</h4>
                    <a href="">Africa</a>
                    <a href="">Middle-East Asia</a>
                    <a href="">Canada</a>
                  </div>
                  <div class="column">
                    <h3></h3>
                    <a href="">China</a>
                    <a href="">Europe</a>
                    <a href="">U.S</a>
                  </div>
                  <div class="column">
                    <h3></h3>
                    <a href="">Germany</a>
                    <a href="">Russia</a>
                    <a href="">U.k</a>
                  </div>
                </div>
              </div>
            </div>               
            <a href="india.php">India</a>
            <a href="#">Politics</a>
            <a href="#">Economy</a>
            <a href="#">Business</a>
            <a href="#">Tech</a>
            <a href="#">Opinion</a>
            <a href="#">Blogs</a>
            <a href="contact.php">Contact Us</a>
            </nav>
        <main>
          <div class="container">
            <div class="newscontent">
              <h5><a href="n1.html">India to face COVID-19 vaccine shortage till July, says SII chief Adar Poonawalla</a></h5>
            </div>
            <div class="newscontent">
              <h5><a href="n2.html">COVID alert! Second wave of infections comes with THESE symptoms, Here’s how to catch early signs.</a></h5>
            </div>
            <div class="newscontent">
              <h5>"Nandigram Official Said Recounting Order May Risk Life": Mamata Banerjee</h5>
            </div>
            <div class="newscontent">
              <h5>New corona strain doesn't give you fear instead turns human into vampire</h5>
            </div>
            <div class="newscontent">
              <h5>India going to take revenge by releasing Radhe in china</h5>
            </div>
            <div class="newscontent">
              <h5>Researchers at MIT said DBMS is best subject to learn</h5>
            </div>
          </div>
        </main>
        <footer>
            <div class="footer-container">
                <div class="left-col">
                  <img src="images/logo3.png" alt="" class="logo">
                  <div class="social-media">
                    <a href="https://www.instagram.com/dhruv_solanki_?r=nametag"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/WSJ"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/devangsolanki_/?r=nametag"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCK7tptUDHh-RYDsdxO1-5QQ"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </div>
                  <p class="rights-text">© 2020 Created By Dhruv & Devang All Rights Reserved.</p>
                </div>
        
                <div class="right-col">
                  <h1>Subscribe To Our Newsletter</h1>
                  <div class="border"></div>
                  <p>Enter Your Email to get our news and updates.</p>
                  <form action="" class="newsletter-form">
                    <input type="text" class="txtb" placeholder="Enter Your Email">
                    <input type="submit" class="btn" value="submit">
                  </form>
                </div>
              </div>
           
        </footer>
    </div>
</body>
</html>