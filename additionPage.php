<?php
// Start the session
session_start();

// Check if the designer ID is provided in the URL
if(isset($_GET['designer_id'])) {
    $_SESSION['designerID'] = $_GET['designer_id'];
//} else {
    // Redirect to the homepage or display an error message
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Hotel Reservation Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="additionPage.css">
    <link rel="stylesheet" href="Main.css">

  </head>
  <body>

        <!--header-->
        <header>
            <div class="logo">
              <a href="index.html" accesskey="h">
                <img src="images/logo.png" alt="logo" height="200" style="float: left; margin-left:200px;">
              </a>
            </div>
            
            <nav class="nav_links">
        

                <a href="#DesignDetails" accesskey="c">New Project Details</a>
                <a href="Homepage.html" accesskey="t">Log-out</a>
            
          </nav>
             
              </header>
  <!--end header-->



    <div class="additionPage">
    <form action="add_project.php" method="post" enctype="multipart/form-data">
      <div class="banner">
        <h1 id="mainH">Design Portfolio</h1>
          </div>
      <br/>
      <fieldset>
        <legend id="DesignDetails">Design Details</legend>
        <div class="columns">
          <div class="item">
            <label for="name">Project's name<span>*</span></label>
            <input id="name" type="text" name="name" />
          </div>
          <div class="item">
            <label for="Image">Image<span>*</span></label>
            <input type="file" id="imageInput" name="image" accept="image/*">
        </div>
          <div class="item">
            <label for="Category">Design Category<span>*</span></label>
            <select id="category" name="category">
            <option value="modern">Modern</option>
            <option value="traditional">Traditional</option>
            <option value="minimalist">Minimalist</option>
            <option value="farmhouse">Farmhouse</option>
            <option value="transitional">Transitional</option>
            </select>
          </div>
          <div class="item">
            <label for="designDescription">Design Description<span>*</span></label>
            <textarea id="designDescription" name="designDescription" rows="4" cols="50"></textarea>
          </div>

        
      </fieldset>
      <br/>
      
      <div class="btn-block">
      <button type="submit" href="Designer.html">Submit</button>
      </div>
    </form>
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
                <li><a href=".html">Page1</a></li>
                <li><a href=".html">Page2</a></li>
            <li><a href=".html">Page3</a></li>
            <li><a href=".html">Page4</a></li>
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