<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "Decovaa";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">
    <title> Portofolio | Interiot designer </title>

    <!-- Bootstrap -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alice|Open+Sans:400,300,700">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 40px;

            text-align: center;
        }

        .dfh {
            margin: 0px 555px;
            width: 80%;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #F5F5DC;
            color: #000;
        }
    </style>
</head>
<header>
    <div class="logo">
        <a href="clienthomepage.html" accesskey="h">
            <img src="images/logo.png" alt="logo" height="200" style="float: left; margin-left:200px;">
        </a>
    </div>

    <nav class="nav_links">

        <a href="#a" accesskey="p">Brand Logo</a>
        <a href="#b" accesskey="a">art by designer</a>
        <br>
        <a href="Homepage.html" accesskey="c">Log Out</a>
    </nav>

</header>

<body>

    <div class="dfh">
        <table>
            <tr>
                <th>Project Name</th>
                <th>Image</th>
                <th>Design Category</th>
                <th>Description</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td><img src='" . $row["image_path"] . "' alt='Project Image' width='100'></td>";
                    echo "<td>" . $row["category"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No projects found</td></tr>";
            }
            ?>
        </table>
    </div>

    <footer>
        <div class="footer-row">
            <div class="footer-col">
                <a href="clienthomepage.html" accesskey="h">
                    <img src="images/logo.png" alt="Logo" class="footer-logo">
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
                    <li><a href="#a" accesskey="p">Brand Logo</a></li>
                    <li><a href="#b" accesskey="a">art by designer</a></li>
                    <li><a href="Homepage.html" accesskey="c">Log Out</a></li>
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

<?php
$conn->close();
?>