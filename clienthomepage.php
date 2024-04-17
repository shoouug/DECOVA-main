<?php
session_start();
$conn = mysqli_connect('localhost:3307', 'root', '', 'decovaa');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


function getClientInfo($conn, $clientId) {
    $query = "SELECT * FROM client WHERE id = $clientId";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function getDesigners($conn, $categoryId = null) {
    $query = "SELECT designer.*, GROUP_CONCAT(`designcategory`.`category` SEPARATOR ', ') AS categories
              FROM designer
              LEFT JOIN designerspeciality ON designer.id = designerspeciality.designerID
              LEFT JOIN designcategory ON designerspeciality.designCategoryID = designcategory.`id`";
    if ($categoryId) {
        $query .= " WHERE designcategory.id = $categoryId";
    }
    $query .= " GROUP BY designer.`id`";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getConsultationRequests($conn, $clientId) {
    $query = "SELECT designer.brandName, roomtype.type, designcategory.category, designconsultationrequest.colorPreferences, designconsultationrequest.date, requeststatus.status, designconsultationrequest.roomWidth, designconsultationrequest.roomLength
    FROM designconsultationrequest
    INNER JOIN designer ON designconsultationrequest.designerID = designer.id
    INNER JOIN roomtype ON designconsultationrequest.roomTypeID = roomtype.id
    INNER JOIN designcategory ON designconsultationrequest.designCategoryID = designcategory.id
    INNER JOIN requeststatus ON designconsultationrequest.statusID = requeststatus.id
    WHERE designconsultationrequest.clientID = $clientId";

    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//if (isset($_SESSION['client_id'])) {
   // $clientId = $_SESSION['client_id'];   
    $clientId=3;
    $clientInfo = getClientInfo($conn, $clientId);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['category']) && $_POST['category'] != 'all') {
            $categoryId = $_POST['category'];
            $designers = getDesigners($conn, $categoryId);
        } else {
            $designers = getDesigners($conn);
        }
    } else {
        $designers = getDesigners($conn);
    }
    $consultationRequests = getConsultationRequests($conn, $clientId);
/*    
} else {
    // Redirect to login if client id is not set in session
    header("Location: login.php");
    exit();
}
*/

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/clienthomepage.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div class="logo">
            <a href="clientHomepage.php" accesskey="h">
                <img src="images/logo.png" alt="logo" height="200" style="float: left; margin-left:200px;">
            </a> 
        </div>  
        <nav class="nav_links">
            <a href="Requestdesignconsultation.html" accesskey="a">Request consultation</a>
            <a href="Homepage.html" accesskey="p">Log Out</a>
        </nav>
    </header>
    <!-- End Header -->

    <div id="DesignerHomepage">
        <div class="container">
            <h3 class="leftH" id="welH">Welcome <?php echo $clientInfo['FirstName']; ?></h3> 
        </div>
        <br>
        <div id="infoBox">
            <p>
                <span class="infoTitle">First Name:</span> <span class="infoInputs"><?php echo $clientInfo['FirstName']; ?></span><br>
                <span class="infoTitle">Last Name:</span> <span class="infoInputs"><?php echo $clientInfo['LastName']; ?></span><br>
                <span class="infoTitle">Email:</span> <span class="infoInputs"><?php echo $clientInfo['emailAddress']; ?></span>
            </p>
        </div>

        <div id="tables">
            <h2 class="leftH">Interior Designers</h2>
            <form method="POST" action="clienthomepage.php">
                <button class="rightLink" id="filterButton" type="submit">Filter</button>
                <select id="designerCategoryFilter" class="rightLink" name="category">
                    <option value="all">All Categories</option>
                    <?php
                    // Fetch and display design categories
                    $query = "SELECT * FROM `designcategory`";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['category']}</option>";
                    }
                    ?>
                </select>
                <h3 class="rightLink" id="AddLink">Select Category:</h3> 
            </form>

            <div id="firstTContent">
                <table id="firstT">
                    <caption></caption>
                    <tr>
                        <th>
                            <div class="thS">Designer</div>
                        </th>
                        <th>
                            <div class="thS">Speciality</div>
                        </th>
                    </tr>
                    <?php foreach ($designers as $designer): ?>
                    <tr>
                        <td>
                            <a href="portfolio.html">
                                <img src="<?php echo $designer['logoImgFileName']; ?>" alt="<?php echo $designer['brandName']; ?>">
                                <h1><?php echo $designer['brandName']; ?></h1>
                                </a>
                        </td>
                        <td>
                            <?php echo $designer['categories']; ?>
                        </td>
                        <td class="no-bg">
                            <div class="tlink">
                                <a href="Requestdesignconsultation.html">Request Design Consultation</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div id="secondTContent">
                <h2>Previous Design Consultation Requests</h2>
                <table id="secondT">
                    <caption></caption>
                    <tr>
                        <th>
                            <div class="thS">Designer</div>
                        </th>
                        <th>
                            <div class="thS">Room Type</div>
                        </th>
                        <th>
                            <div class="thS">Room Dimensions</div>
                        </th>
                        <th>
                            <div class="thS">Design Category</div>
                        </th>
                        <th>
                            <div class="thS">Color Preferences</div>
                        </th>
                        <th>
                            <div class="thS">Date Request</div>
                        </th>
                        <th>
                            <div class="thS">Status Request</div>
                        </th>
                    </tr>
                    <?php foreach ($consultationRequests as $request): ?>
                    <tr>
                        <td>
                        <img src="<?php echo $designer['logoImgFileName']; ?>" alt="<?php echo $designer['brandName']; ?>">
                            <h1><?php echo $request['brandName']; ?></h1>
                        </td>
                        <td>
                            <?php echo $request['type']; ?>
                        </td>
                        <td>
                            <?php echo $request['roomWidth'] . "x" . $request['roomLength'] . "m"; ?>
                        </td>
                        <td>
                            <?php echo $request['category']; ?>
                            </td>
                        <td>
                            <?php echo $request['colorPreferences']; ?>
                        </td>
                        <td>
                            <?php echo date('d/m/Y', strtotime($request['date'])); ?>
                        </td>
                        <td>
                            <?php echo $request['status']; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <div class="division"></div>

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
                    <li><a href="Requestdesignconsultation.html">Request consultation</a></li>
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
</body>
</html>