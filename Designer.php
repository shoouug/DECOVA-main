<?php
//working
session_start();

error_reporting(E_ALL);
ini_set('log_errors','1');
ini_set('display_errors','1');

$connection=mysqli_connect('localhost','root','root','decova');
if(mysqli_connect_errno())
die(''. mysqli_connect_error());


?>


<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="DesignerHomepage.CSS">
        <link rel="stylesheet" href="Main.css">
        <title>Designer Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <style>

footer{
    margin-top: 200px;
}



        </style>

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
        
                <a href="#DesignPortfolio" accesskey="p">Design Portfolio</a>
                 <a href="#ConsultationRequest" accesskey="a">Consultation Requests</a>
                <a href="Homepage.html" accesskey="c">Log-Out</a>
            


          </nav>
          
              </header>
  <!--end header-->



        <div id="DesignerHomepage">

        <!---------------------------------------------------infobox------------------------------------------------------------>
        <div class="flix">
        <h3 class="leftH" id="welH">Welcom Sara</h3> 
       </div>
       <?php

$designerID = $_SESSION['user_id'];




// Query to retrieve designer information based on designer ID
$sql = "SELECT * FROM Designer WHERE id = '$designerID'";

// Check if the query was successful and if data was retrieved
if ($result = mysqli_query($connection, $sql)) 
    $row = mysqli_fetch_assoc($result);
    
    // Extract the values
    $name = $row['FirstName'] . ' ' . $row['LastName'];
    $email = $row['emailAddress'];
    $brandName = $row['brandName'];
    $logoImgFileName = $row['logoImgFileName'];
?>

<div id="infoBox">
    <p>
        <span class="infoTitle">Name:</span>
        <span class="infoInputs" id="NameSpan"><?php echo $name; ?></span><br>
        <span class="infoTitle">Email:</span>
        <span class="infoInputs" id="emailSpan"><?php echo $email; ?></span><br>
        <span class="infoTitle">Brand Name:</span>
        <span class="infoInputs" id="brandNameSpan"><?php echo $brandName; ?></span><br>
        <span class="infoInputs">
            <img src="uploads/<?php echo $logoImgFileName; ?>" alt="Logo" id="brandLogoImge" width="100" height="100">
        </span>
    </p>
</div>

        <!---------------------------------------------------------------------------------------------------------------------->


 

        <div id="tabels">
            <a href="additionPage.php?designer_id=<?php echo $designerID; ?>" id="addNewaLink">Add New Project</a>
<div id="firstTContent">
            <h2 class="header2" class="leftH" id="DesignPortfolio">Design Portfolio</h2>








            <table id="firstT">
    <caption></caption>
    <tr>
        <th>
            <div class="thS"> Project name </div>
        </th>
        <th>
            <div class="thS"> Image </div>
        </th>
        <th>
            <div class="thS"> Design Category </div>
        </th>
        <th>
            <div class="thS"> Description </div>
        </th>

    </tr>

    <?php
    // Retrieve data from the database based on the designer ID
    $sql = "SELECT * FROM DesignPortoflioProject WHERE designerID = '$designerID'";
    $result = mysqli_query($connection, $sql);

    // Check if there are any rows returned
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['projectName']; ?></td>
                <td><img class="proImg" src="uploads/<?php echo $row['projectImgFileName']; ?>" alt="<?php echo $row['projectName']; ?>"></td>
                <td><?php echo $row['designCategoryID']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td class="no-bg">
                    <div class="tlink">
                    <a href="UpdatePage.html?project_id=<?php echo $row['id']; ?>">Edit</a>
                    </div>
                </td>
                <td class="no-bg">
                    <div class="tlink">
                    <a href="delete_project.php?project_id=<?php echo $row['id']; ?>">Delete</a>
                    </div>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='6'>No projects found.</td></tr>";
    }
    ?>
</table>
</div>


<div id="secondTContent">
<h2 class="header2" id="ConsultationRequest">Design Consultation Requests</h2>
<?php
// Retrieve the designer ID from the session variable
//$designerID = $_SESSION['designerID'];

// Query to retrieve data for the DesignConsultationRequest table
// Query to retrieve data for the DesignConsultationRequest table with status "pending consultation"
$sql = "SELECT DesignConsultationRequest.id AS requestID, 
               Client.firstName AS clientFirstName, 
               Client.lastName AS clientLastName, 
               RoomType.type AS roomType, 
               DesignCategory.category AS designCategory, 
               DesignConsultationRequest.roomWidth, 
               DesignConsultationRequest.roomLength, 
               DesignConsultationRequest.colorPreferences, 
               DesignConsultationRequest.date,
               DesignConsultationRequest.statusID
        FROM DesignConsultationRequest
        INNER JOIN Client ON DesignConsultationRequest.clientID = Client.id
        INNER JOIN RoomType ON DesignConsultationRequest.roomTypeID = RoomType.id
        INNER JOIN DesignCategory ON DesignConsultationRequest.designCategoryID = DesignCategory.id
        INNER JOIN RequestStatus ON DesignConsultationRequest.statusID = RequestStatus.id
        WHERE DesignConsultationRequest.designerID = '$designerID'
        AND RequestStatus.status = 'pending consultation'";


$result = mysqli_query($connection, $sql);
?>

<table id="secondT">
    <caption></caption>
    <tr>
        <th>
            <div class="thS">Client</div>
        </th>
        <th>
            <div class="thS">Room</div>
        </th>
        <th>
            <div class="thS">Dimensions</div>
        </th>
        <th>
            <div class="thS">Design Category</div>
        </th>
        <th>
            <div class="thS">Color Preferences</div>
        </th>
        <th>
            <div class="thS">Date</div>
        </th>
    </tr>

    <?php
    // Fetch data from the result set and generate table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['clientFirstName']} {$row['clientLastName']}</td>";
        echo "<td>{$row['roomType']}</td>";
        echo "<td>{$row['roomWidth']}x{$row['roomLength']}</td>";
        echo "<td>{$row['designCategory']}</td>";
        echo "<td>{$row['colorPreferences']}</td>";
        echo "<td>{$row['date']}</td>";
        echo "<td class='no-bg'><div class='tlink'><a href='designConsultaion.php?statusID={$row['statusID']}'>Provide Consultation</a></div></td>";
        echo "<td class='no-bg'><div class='tlink'><a href='declineConsultation.php?statusID={$row['statusID']}'>Decline Consultation</a></div></td>";
        echo "</tr>";
    }
    ?>

</table>
</div>


        </div>



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




