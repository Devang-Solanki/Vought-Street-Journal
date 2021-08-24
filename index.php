<?php 
session_start();
?>

<?php 
if (isset($_SESSION['name'])) {
    header("Location:http://localhost/project/dashboard.php");
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
            <h1>Welcome to Vought Street Journal</h1>
            <p>Here you can showcase your talnet by writting contents on Current Affairs, Technology, blogs and many more.</p>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                
              
                <div class="container">
                  <label for="uname"><b>Username</b></label>
                  <input type="text" placeholder="Enter Username" name="uname" required>
              
                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" required>
                  <div class="log">
                    <button type="submit" name="SubmitButton">Login</button>
                    <a href="signup.php"><button type="button">Sign Up</button></a>
                  </div>
                </div>                
                <div class="container1">
                  <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                  </label>
                  <span class="psw"><a href="forgot-pss.php" style="color: blue;">Forgot password?</a></span>
                </div>
              </form> 
<?php

 //Get data by post method and store them in variables
if(isset($_POST['SubmitButton'])){

$email = $_POST['uname'];
$pass = $_POST['psw'];

/* Database config */

$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'test'; 

/* End config */

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);

//For validating data

$sql = "SELECT * FROM Users WHERE email = '$email' AND password = '$pass'"; 
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);
//$data = mysqli_fetch_assoc($result);   
if($count == 1){
  
  $_SESSION['name'] = $row['first_name'];
  $_SESSION['email'] = $row['email'];
  
  header("Location:http://localhost/project/dashboard.php"); 
}  
else{  
    echo "<script>
alert('Error: Wrong Credentials');
</script>";
}  

$mysqli->close();
}
?>
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