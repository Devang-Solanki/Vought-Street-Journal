<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vought Street Journal</title>
    <link rel="stylesheet" href="contact.css">
   
</head>
<body>
    <div class="contain">
        <header>
            <img src="images/logo3.png" alt="Logo for Vought Street Journal" class="logoH">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
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
                    <a href="">Middle-east Asia</a>
                    <a href="">Canada</a>
                  </div>
                  <div class="column">
                    <h3></h3>
                    <a href="">China</a>
                    <a href="">France</a>
                    <a href="">U.S</a>
                  </div>
                  <div class="column">
                    <h3></h3>
                    <a href="">Germany</a>
                    <a href="">Russia</a>
                    <a href="">U.K</a>
                  </div>
                </div>
              </div>
            </div>               
            <a href="#">India</a>
            <a href="#">Politics</a>
            <a href="#">Economy</a>
            <a href="#">Business</a>
            <a href="#">Tech</a>
            
            <a href="#">Opinion</a>
            <a href="#">Blogs</a>
            <a href="contact.php">Contact Us</a>
            </nav>
        <main>
          <div class="contact-section">

            <h1>GET IN TOUCH...</h1>
            <p>WE CHERISH ALL INTERACTIONS</p>
            <div class="border-con"></div>
            <form class="contact-form" action="" method="post">
              <input type="text" class="contact-form-text" placeholder="     Your Name" name="name">
              <input type="email" class="contact-form-text" placeholder="Your Email" name="email">
              <input type="text" class="contact-form-text" placeholder="     Your Phone" name="phone">
              <textarea class="contact-form-text" placeholder="Your Message" name="text"></textarea>
              <input type="submit" class="contact-form-btn" value="Send" name="cont">
            </form>
            <?php

if(isset($_POST['cont'])){

 //Get data by post method and store them in variables

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$text= $_POST['text'];

/* Database config */

$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'test'; 

/* End config */

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

   

// For adding data

if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());}
$stmt = $mysqli->prepare("insert into contact (email, phone, name, message) values('$email', '$phone', '$name', '$text')");
$stmt->execute();

$stmt->close(); //for adding data uncomment this line of code
$mysqli->close();
}

?>
        </main>
        <footer>
            <div class="footer-container">
                <div class="left-col">
                  <img src="images/logo3.png" alt="" class="logo">
                  <div class="social-media">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </div>
                  <p class="rights-text">© 2020 Created By Dhruv & Devang All Rights Reserved.</p>
                </div>
        
                <div class="right-col">
                  <h1>Subscribe To Our Newsletter</h1>
                  <div class="border"></div>
                  <p>Enter Your Email to get our news and updates.</p>
                  <form action="" class="newsletter-form"  method="post">
                    <input type="text" class="txtb" placeholder="Enter Your Email" name="newsemail">
                    <input type="submit" class="btn" value="submit" name="newsletter">
                  </form>
                  <?php

if(isset($_POST['newsletter'])){

 //Get data by post method and store them in variables

$email = $_POST['newsemail'];

/* Database config */

$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'test'; 

/* End config */

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

$sql = "SELECT * FROM newsletter WHERE email = '$email'";  
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);
if($count === 1){
  echo "<script>
alert('This email already exist in our newsletter!');
</script>";
exit();
}  

// For adding data

if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());}
$stmt = $mysqli->prepare("insert into newsletter (email) values ('$email')");
$stmt->execute();

$stmt->close(); //for adding data uncomment this line of code
$mysqli->close();
}

?>
                </div>
              </div>
           
        </footer>
    </div>
</body>
</html>