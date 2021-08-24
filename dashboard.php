<?php 
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:http://localhost/project/index.php");
} 
?>

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
          <div class="contact-section">
            <h1>Welcome <?php echo $_SESSION['name'] ?> </h1>
            <div class="border-con"></div>
          </div>
          <br>
          <h2>What's VSJ?</h2>
          <br>
          <div class="newscontent">
                  <h5>Built for readers:- </h5>
                  <h5>
                  We're building a better place on the internet: an ad-free, open platform where the best stories rise to the top.</h5>
                  <h5>Customized for you</h5>
                  <h5>Follow the topics, writers, and publications you care about most. Get the latest delivered to your homepage, app, or inbox</h5>
                  <h5>Unlock the best of VSJ for $5/month</h5>
                    <h5>Upgrade to VSJ membership for unlimited access to locked stories. Directly reward the stories that move you most.</h5>
                  </div>
                  <br>
            <form action="" method="post"> 
            <input type="submit" class="contact-form-btn" value="logout" name="logout">
            <input type="submit" class="contact-form-btn" value="delete account" name="delete">
            </form>


<?php

 //Get data by post method and store them in variables
if(isset($_POST['logout'])){
    session_destroy();
    header("Location:http://localhost/project/index.php");
    exit();
}
?>
<?php

if(isset($_POST['delete'])){

 //Get data by post method and store them in variables

$email = $_SESSION['email'];

/* Database config */

$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'test'; 

/* End config */

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

// For adding data

if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());}
$stmt = $mysqli->prepare("DELETE FROM users WHERE email = '$email'");
$stmt->execute();
session_destroy();
$stmt->close(); //for adding data uncomment this line of code
$mysqli->close();
header("Location:http://localhost/project/index.php");
exit();
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