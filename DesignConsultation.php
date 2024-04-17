<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Request Design Consultation Page</title>
        <link rel ="sortcut icon" type="x-icon" href="images/logo1.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="css/additionPage.css">
        <link rel="stylesheet" href="css/Main.css">
        <style>
            
            
            .breadcrumbs{
                padding: 7px 1px;
                list-style: none;
                background-color: #eee;
                font-family: sans-serif;
            }
            
            .bcitem{
               display: inline-block;
            }
            .bcitem a{
                
             display: block;
                text-align: center;
                padding: 1px;
                text-decoration: none;
                font-size: 13px;
                color: #626262;
            }
            
            .breadcrumbklink:hover{
                text-decoration: underline;
            }

            .DesignConsultation {
              display: flex;
              justify-content: center;
              align-items: center;
              height: inherit;
              padding: 20px;
              }

            

        </style>

    </head>
    <body onload="onload()">

        <!--header-->
        <header>
            <div class="logo">
                <a href="Designer.html" accesskey="h">
                    <img src="images/logo.png" alt="logo" height="200" style="float: left; margin-left:200px;">
                  </a>
            </div>
            
            <nav class="nav_links">
        
                <a href="#DesignPortfolio" accesskey="p">Design Portfolio</a>
                 <a href="#ConsultationRequest" accesskey="a">Consultation Requests</a> 
                <a href="Homepage.html" accesskey="t">Log Out</a>
            
          </nav>
             
              </header>
  <!--end header-->

     <!--breadcrumbs-->
     <ul class="breadcrumbs">
         <li class="bcitem"><a href="Designer.html"class="breadcrumbklink" >Homepage ></a></li>
         <li class="bcitem"><a href="DesignConsultation.html"class="breadcrumbklink" >Request Design Consultation</a></li>
       </ul>
       <!--End breadcrumbs-->

        <main>
            <div class="DesignConsultation">
                <form action=DesignConsultation.html method="post">
                    <div class="banner">
                <h1 id="mainH">Design Consultation</h1>
                  </div>
            <br>
            <form name="Consultation" method="post">
            <fieldset>

            <legend >Request Information</legend>
            <label for="cliName">Client Name:</label>
            <p>Sara</p>

            <label for="Room">Room:</label>
           <p>livingRoom</p>
           
           <label for="desCategory">Design Category:</label>
           <p>Modern</p>
       
           <label for="colp">Color Preferences:</label>
           <p>green</p>
       
       
           <label for="date">Date:</label>
           <p>8 feb 2024</p>
        </fieldset>

        <br>

          <fieldset>
            <legend >Consultation</legend>
              <div class="item">
                <label for="name">Consultation<span>*</span></label>
                <textarea id="cons" rows="6" cols="45" placeholder="write your consultation here.."required ></textarea>
              </div>
              
              <div class="item">
                <label for="Image">Image<span>*</span></label>
                <input type="file" id="imageInput" name="image" accept="image/*" required>
            </div>
  
          </fieldset>
          <br/>

          <div class="btn-block">
            <button type="button" id="submitBtn" onclick="submitForm()">Send</button>
        </div>

        </form>
    </main>
    <script>
        function submitForm() {
         var consultation = document.getElementById("cons").value;
         var img = document.getElementById("imageInput").value;

         if (consultation === "") {
           alert("Please write a consultation");
           return;
         }
         if (img === "") {
           alert("Please upload in image");
           return;
         }
       
         alert("Form submitted successfully!");
         window.location.href ="Designer.html";
       }
       </script>

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
                <li><a href="#DesignPortfolio" >Design Portfolio</a></li>
                 <li><a href="DesignConsultation.html">Design Consultation</a></li>
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