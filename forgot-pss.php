<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vought Street Journal</title>
    <link rel="stylesheet" href="css.css">
   
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
                    <a href="">Asia</a>
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
                    <a href="">VueJS</a>
                    <a href="">Laravel</a>
                    <a href="">CodeIgniter</a>
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
              <h1>Forgot Your Password?</h1>
              <form action="" method="post">
                  
                
                  <div class="container">
                    <label for="email"><b>E-mail</b></label>
                    <input type="text" placeholder="Enter your E-mail" name="email" required>
                    <label for="npsw"><b> New Password</b></label>
                    <input type="password" placeholder="Enter New Password" name="npsw" required>
                    <label for="cnpsw"><b>Confirm Password</b></label>
                    <input type="password" placeholder="Confirm New Password" name="cnpsw" required>
  
                    <button type="submit" name="SubmitButton">Send</button>
                  
                </form> 
                <?php

if(isset($_POST['SubmitButton'])){

 //Get data by post method and store them in variables

$email = $_POST['email'];
$npsw = $_POST['npsw'];
$cnpsw = $_POST['cnpsw'];

if ($npsw !== $cnpsw) {
    echo "<script>
    alert('Error: Enter Same Password in both field');
    </script>";
    exit();
 }

/* Database config */

$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'test'; 

/* End config */

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

$sql = "SELECT * FROM Users WHERE email = '$email'";  
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);
if($count !== 1){
  echo "<script>
alert('Error: Account with this email does not exist!');
</script>";
exit();
}   

// For adding data

if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());}
$stmt = $mysqli->prepare("UPDATE users SET password = '$npsw' WHERE email = '$email'");
$stmt->execute();
header("Location:http://localhost/project/index.php");

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