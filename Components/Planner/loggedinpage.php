<?php

session_start();

if (array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id'];
}

if (array_key_exists("id", $_SESSION)) {

    // echo "<p>Logged In! <a href='../LogSign.html?logout=1'>Log out</a></p>";
} else {

    header("Location: Login.php");
}
// $num = "";
// Create connection
$conn = new mysqli("127.0.0.1:3307", "root", "", "jashn");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT name, phone, city, occasion, venueType, food, minBudget, maxBudget, noOfGuests, eventDate FROM eventForm";
$result = $conn->query($sql);
$link = mysqli_connect("127.0.0.1:3307", "root", "", "jashn");
$id = "";
// $id=$row["id"];
if (isset($_POST['submit'])) {
    echo "Form Accepted";
    // echo $num; 
    // $sql = "UPDATE persons SET email='peterparker_new@mail.com' WHERE id=1";
    // if(mysqli_query($link, $sql)){
    //     echo "Records were updated successfully.";
    // } else {
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    // }
    // $query = "SELECT id FROM `eventForm` WHERE phone = '" . mysqli_real_escape_string($link, $num) . "'";
    // $query = "UPDATE `planner` SET password = '" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' WHERE id = " . mysqli_insert_id($link) . " LIMIT 1";

    $query = "UPDATE `eventForm` SET submit = 1 WHERE id = $id ";

    // $submit = mysqli_query($jashn, "update eventForm set submit=1 where phone='$num'");
    // header("location:cities.php");

}
// if ($_POST['accept']) {

// $query = "SELECT id FROM `eventForm` WHERE email = '" . mysqli_real_escape_string($link, $row["phone"] ) . "' LIMIT 1";
// $query = "UPDATE `planner` SET password = '" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' WHERE id = " . mysqli_insert_id($link) . " LIMIT 1";

// $query = "UPDATE `eventForm` SET accept = 1 WHERE id = " . mysqli_insert_id($link) . " LIMIT 1";

// }
// }
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/73dc61bd9b.js" crossorigin="anonymous"></script>
    <title>JASHN</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100i,300,400,600,700" rel="stylesheet">

    <!-- Plugins -->
    <!-- <link rel="stylesheet" href="css/plugins.css" /> -->
    <!-- Core Style Css -->
    <link rel="stylesheet" href="css/planner_style.css" />

</head>

<body>
    <!-- =====================================
    ==== Start Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">



            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"><i class="fas fa-bars"></i></span>
            </button>

            <!-- navbar links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent ">
                <ul class="navbar-nav ml-auto justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#planEvent">Plan Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../LogSign.html?logout=1">Log-out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar ====
    ======================================= -->


    <!-- Banner Start =========================================== -->
    <div class="jumbotron" id="jumbotron" data-scroll-index="0">
        <hr class="my-4" style="color: transparent;" />
        <hr class="my-4" style="color: transparent;" />
        <h1 class="display-4" style="color:seashell;"><strong>JASHN</strong></h1>
        <p class="lead" style="color:blanchedalmond;"><strong>Welcome Planner!</strong></p>
        <!--<hr class="my-4" style="color: transparent;" />
        <hr class="my-4" style="color: transparent;" />-->
        <a class="btn btn-primary btn-lg" href="#planEvent" role="button">Explore</a>
        <hr class="my-4" style="color: transparent;" />
        <hr class="my-4" style="color: transparent;" />
    </div>
    <!-- End Banner =========================================== -->




    <!-- =====================================
     ==== Start Hero -->
    <section class="hero section-padding">
        <div class="containQuote" id="planEvent">
            <p style="color:#94618E; padding-top:60px;"><strong>“ALONE WE CAN DO SO LITTLE; TOGETHER WE CAN DO SO MUCH.”</strong> – <em>Helen Keller</em>
                <br />
            </p>
        </div>

        <div class="card">
            <div class="card-header" style="text-align: center; color:#94618E ;">
                <h4>Want to plan an Event?</h4>
            </div>
        </div>

    </section>
    <!-- End Hero ====
      ======================================= -->

    <section>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<div class="container">';
            echo '<div class="row">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-sm-3" style="padding-bottom: 30px;">';
                echo '<div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">';
                echo '<div class="card-body">';
                echo '<h3 class="card-title" style="color:#94618E">' . $row["occasion"] . '</h3>';
                echo '<p class="card-text" style="margin-bottom:0px; color:#a3a3a3">Venue: ' . $row["venueType"] . '</p>';
                echo '<p class="card-text" style="margin-bottom:0px; color:#a3a3a3">Food: ' . $row["food"] . '</p>';
                echo '<p class="card-text" style="margin-bottom:0px; color:#a3a3a3">Budget: ' . $row["minBudget"] . '-' . $row["maxBudget"] . '</p>';
                echo '<p class="card-text" style="margin-bottom:0px; color:#a3a3a3">Guests expected: ' . $row["noOfGuests"] . '</p>';
                echo '<p class="card-text" style="color:#a3a3a3">Date: ' . $row["eventDate"] . '</p>';
                echo '<h5 style="color:#94618E;margin-top:7px;margin-bottom:0px">Contact Details:</h5>';
                echo '<p class="card-text" style="margin-bottom:0px;color:#a3a3a3">Name: ' . $row["name"] . '</p>';
                echo '<p class="card-text" style="margin-bottom:0px;color:#a3a3a3">Phone: ' . $row["phone"] . '</p>';
                $num = $row["phone"];
                echo '<p class="card-text" style="margin-bottom:7px;color:#a3a3a3">City: ' . $row["city"] . '</p>';

                // echo '<form method="post"><button type="submit" class="btn btn-success" id="submit" name="submit" style="background-color:#94618E">Interested</button></form>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        } else {
            echo "0 results";
        }

        ?>
    </section>

    <!-- =====================================
      ==== Start Footer -->
    <footer class="footer">
        <p style="color:seashell;">Copyright &copy; All Rights Reserved.</p>
    </footer>
    <!-- End Footer ====
      ======================================= -->
    <!-- jQuery -->
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- custom scripts -->
    <script src="js/scripts.js"></script>
    <!-- scrollIt -->
    <script src="js/scrollIt.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>