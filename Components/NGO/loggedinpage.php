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
// Create connection
$conn = new mysqli("127.0.0.1:3307", "root", "", "jashn");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, phone, city, location , noOfpeople FROM ngoform";
$result = $conn->query($sql);


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
    <link rel="stylesheet" href="css/ngo_style.css" />

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
                        <a class="nav-link" href="#planEvent">Donation</a>
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
        <p class="lead" style="color:blanchedalmond;"><strong>Welcome NGO!</strong></p>
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
            <p style="color:#e0c333; padding-top:60px;"><strong>“ALWAYS GIVE WITHOUT REMEMBERING AND ALWAYS RECEIVE WITHOUT FORGETTING."</strong> – <em>Brian Tracy</em>
                <br />
            </p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="hero-img mb-md50">
                        <img src="photo1.jpg" alt="">
                    </div>
                </div>
                <div class="column right col-lg-6">
                    <div class="content">

                        <h4 style="color:#ca8c8a;" class="title title-left">About Us</h4>


                        <p>"Find out how much God has given you and from it take what you need; the remainder is needed by others." Saint Augustine </p>
                        <p>Through this initiative we aim at solving the very prevalent issue of hunger. The leftover food from the events are distributed to various orphanages and old age homes. Details of the people wishing to donate food will be shown to every registered NGO. With the help of contact details provided the NGO can contact the host of his/her choice. </p>
                       
                        <p>We have started this initiative with the vision that “If you want to eliminate hunger, everybody has to be involved.” </p>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <section class="hero section-padding">
        <div class="card">
            <div class="card-header" style="text-align: center; color:#e0c333 ;">
                <h4>Let us donate food!</h4>
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
                echo '<h3 class="card-title" style="color:#e0c333">' . $row["city"] . '</h3>';
                echo '<p class="card-text" style="margin-bottom:0px; color:#a3a3a3">For no of people: ' . $row["noOfpeople"] . '</p>';
                echo '<h5 style="color:#e0c333">Contact Details:</h5>';
                echo '<p class="card-text" style="margin-bottom:0px;color:#a3a3a3">Name: ' . $row["name"] . '</p>';
                echo '<p class="card-text" style="margin-bottom:0px;color:#a3a3a3">Phone: ' . $row["phone"] . '</p>';
                echo '<p class="card-text" style="margin-bottom:7px;color:#a3a3a3">Location: ' . $row["location"] . '</p>';
                // echo '<a href="" class="btn btn-success" style="background-color:#e0c333">Accept</a>';
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