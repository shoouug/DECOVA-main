<!DOCTYPE html>
<html>
  <head>
    <title>Update form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/UpdatePage.css">
    <link rel="stylesheet" href="css/Main.css">

  </head>
  <body>

        <!--header-->
        <header>
            <div class="logo">
              <a href="Designer.html" accesskey="h">
                <img src="images/logo.png" alt="logo" height="200" style="float: left; margin-left:200px;">
              </a>
            </div>
            
            <nav class="nav_links">
        
                <a href="#a" accesskey="p">designed project</a>
                <a href="#b" accesskey="a">update design</a>
                <br>
                <a href="Homepage.html" accesskey="c">Log Out</a>
          </nav>
             
              </header>
  <!--end header-->

    <div class="project-info" id="a">
        <h2>Project Name:</h2>
        <p>CULTDECO</p>
      
        <h2>Project Image:</h2>
        <img src="images/CULTDECO.png" alt="Project Image" width="200" height="200">
      
        <h2>Project Category:</h2>
        <p>modern</p>
      
        <h2 class="design-description">Design Description:</h2>
        <p>*Lighting:* Strategically placed lighting fixtures add warmth and ambiance. Whether it's pendant lights, floor lamps, or recessed lighting, each element contributes to a well-lit and inviting environment.</p>
      </div>




    <div class="additionPage" id="b">
        <form action="Designer.html" method="post">      <div class="banner">
        <h1 id="mainH">Design Portfolio</h1>
          </div>
      <br/>
      <fieldset>
        <legend>Update Design Details</legend>
        <div class="columns">
          <div class="item">
            <label for="fname">Project's name<span>*</span></label>
            <input id="fname" type="text" name="fname" />
          </div>
          <div class="item">
            <label for="lname">Image<span>*</span></label>
            <input type="file" id="imageInput" name="image" accept="image/*">
        </div>
          <div class="item">
            <label for="address">Design Category<span>*</span></label>
            <select>
            <option value="modern">Modern</option>
            <option value="contemporary">Contemporary</option>
            <option value="traditional">Traditional</option>
            <option value="minimalist">Minimalist</option>
            <option value="industrial">Industrial</option>
            <option value="midCenturyModern">Mid-Century Modern</option>
            <option value="scandinavian">Scandinavian</option>
            <option value="bohemian">Bohemian</option>
            <option value="rustic">Rustic</option>
            <option value="farmhouse">Farmhouse</option>
            <option value="transitional">Transitional</option>
            <option value="eclectic">Eclectic</option>
            <option value="coastal">Coastal</option>
            <option value="mediterranean">Mediterranean</option>
            <option value="vintage">Vintage</option>
            <option value="artDeco">Art Deco</option>
            <option value="asianInspired">Asian Inspired</option>
            <option value="tropical">Tropical</option>
            <option value="shabbyChic">Shabby Chic</option>
            <option value="urbanModern">Urban Modern</option>
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
          <a href="index.html" accesskey="h">
            <img src="images/logo.png"  alt="Logo" class="footer-logo">
          </a>
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
            <li><a href="#a" accesskey="p">designed project</a></li>
            <li><a href="#b" accesskey="a">update design</a></li>
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