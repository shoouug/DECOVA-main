<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <title>Request Design Consultation</title>
  <link rel="stylesheet" href="css\Requestdesignconsultation.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <?php

        error_reporting(E_ALL);
        ini_set('log_errors','1');
        ini_set('display_errors','1');

          $connection= mysqli_connect('localhost','root','root','decovaa');
             $error = mysqli_connect_error();
               if ($error != null) {
                $output = '<p> Unable to connect to database</p>' . $error;
                
                } 
                else {
                $designerID = isset($_GET['designerID']) ? $_GET['designerID'] : null;
     }              
    ?>

  <!--header-->
  <header>
    <div class="logo">
      <a href="clienthomepage.php" accesskey="h">
        <img src="images/logo.png" alt="logo" height="200" style="float: left; margin-left:200px;">
      </a>
    </div>
    
    <nav class="nav_links">
         <a href="clienthomepage.php" accesskey="a">Homepage</a>
         <a href="index.php" accesskey="p">Log Out</a>
  </nav>
     
      </header>
<!--end header-->

  <div id="requestForm" >
    <h2>Request Design Consultation</h2>
    <?php
       echo '<form id="designForm" action= "Requestdesignconsultation.php?clientID=' . $ClientID . '" method="POST">';
                    ?>

      <label for="roomType">Room Type:</label>
      <?php
                echo "<select name='roomtype' id='roomtype'>";

                  $result= mysqli_query($connection, "SELECT * From roomtype");

                        if(isset($result)){        
                            while($row= mysqli_fetch_assoc($result)){
                                echo "<option value=".$row['id'].">".$row['type']."</option>";        
                            }
                        }

                echo "</select><br>";
       ?>
      
      <?php
             echo '<input type="hidden" name="desId" value="' . $_GET['designerID'] . '">';
        ?>

      <label for="roomWidth">Room Width (m):</label>
      <input type="text" id="roomWidth" name="roomWidth" required>

      <label for="roomLength">Room Length (m):</label>
      <input type="text" id="roomLength" name="roomLength" required>

      <label for="designCategory">Design Category:</label>
      <?php

                echo "<select name='designcategory' id='designcategory'>";

                        $result= mysqli_query($connection, "SELECT * From designcategory");

                        if(isset($result)){        
                            while($row= mysqli_fetch_assoc($result)){
                                echo "<option value=".$row['id'].">".$row['category']."</option>";        
                            }
                        }
                echo "</select><br>";
       ?>

      <label for="colorPreferences">Color Preferences:</label>
      <input type="text" id="colorPreferences" name="colorPreferences">

      <label for="date">Date:</label>
      <input type="date" id="date" name="date">

      <button type="submit" id="submitBtn">Submit</button>

    </form>
  </div>

  <?php

// Check if designer id is sent in the query string
// i should put client and designer id here from the session variabale

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Process form submission
    
    $roomType = $_POST['roomType'];
    $roomWidth = $_POST['roomWidth'];
    $roomLength = $_POST['roomLength'];
    $designCategory = $_POST['designCategory'];
    $colorPreferences = $_POST['colorPreferences'];
    $date = $_POST['date'];
    
    // Perform database insertion

    $status = 'pending'; // Initial status

    $sql = "INSERT INTO designconsultationrequest (designCategoryID,roomWidth, roomLength, colorPreferences, date, statusID) VALUES ($roomType, $designCategory, $roomWidth, $roomLength,$colorPreferences,$date, $status)";
    mysqli_query($connection, $sql);

    // Redirect the user to the client's homepage
      echo "<script>alert('Form submitted successfully!');</script>";
      echo "<script>window.location.href = 'clientHomepage.php';</script>";
}
?>
  </div>

<!--footer-->
<footer>
  <div class="footer-row">
      <div class="footer-col">
          <img src="images/logo.png"  alt="Logo" class="footer-logo">
         
  
      </div>
      

      <div class="footer-col">
          <h2>Contact Us</h2>
          <p>Phone:+966538294472</p>
          <p>Telephone:+111937629638</p>
          <p>Email:Docova@gmail.com</p>
      </div>
      <div class="footer-col">
          <h2>Quick Links</h2>
          <ul>
              <li><a href="clienthomepage.php">Homepage</a></li>
          </ul>
        
          
      </div>
      <div class="footer-col">
          <h2>follow us on social media</h2>
          <div class="footer-icons">
              <i class="fab fa-facebook"></i>
          <i class="fab fa-twitter"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-linkedin"></i>
          <i class="fab fa-youtube"></i>
          </div>
          
      </div>

  </div>
  <hr>
  <p class="copyright"> Docova &copy; - All rights resesrved</p>
</footer>
<!--end footer-->

</body>
</html>