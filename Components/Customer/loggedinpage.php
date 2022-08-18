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
$error = "";
$done = "";

if (array_key_exists("submit", $_POST)) {

    $link = mysqli_connect("127.0.0.1:3307", "root", "", "jashn");

    if (mysqli_connect_error()) {

        die("Database Connection Error");
    }

    if (!$_POST['name']) {

        $error .= "A name is required<br>";
    }

    if (!$_POST['phone']) {

        $error .= "Phone field is required<br>";
    }

    if (!$_POST['city']) {

        $error .= "City field is required<br>";
    }

    if (!$_POST['occasion']) {

        $error .= "Occasion field is required<br>";
    }
    if (!$_POST['venueType']) {

        $error .= "Venue field is required<br>";
    }
    if (!$_POST['food']) {

        $error .= "Food field is required<br>";
    }
    if (!$_POST['minBudget']) {

        $error .= "MinBudget field is required<br>";
    }
    if (!$_POST['maxBudget']) {

        $error .= "MaxBudget field is required<br>";
    }

    if (!$_POST['noOfGuests']) {

        $error .= "No.of guests field is required<br>";
    }
    if (!$_POST['date']) {

        $error .= "Date field is required<br>";
    }

    if ($error != "") {

        $error = "<p>There were error(s) in your form:</p>" . $error;
    } else {

        $query = "SELECT id FROM `eventForm` WHERE phone = '" . mysqli_real_escape_string($link, $_POST['phone']) . "' LIMIT 1";

        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {

            $error = "That  phone number is already taken.";
        } else {
            $old_date = $_POST['date'];
            $timestamp = strtotime($old_date);
            $mydate = date('Y-m-d', $timestamp);
            $query = "INSERT INTO `eventForm` (`name`, `phone`,`city`, `occasion`, `venueType`, `food`, `minBudget`, `maxBudget`, `noOfGuests`, `eventDate`) VALUES ('" . mysqli_real_escape_string($link, $_POST['name']) . "', '" . mysqli_real_escape_string($link, $_POST['phone']) . "', '" . mysqli_real_escape_string($link, $_POST['city']) . "', '" . mysqli_real_escape_string($link, $_POST['occasion']) . "', '" . mysqli_real_escape_string($link, $_POST['venueType']) . "', '" . mysqli_real_escape_string($link, $_POST['food']) . "', '" . mysqli_real_escape_string($link, $_POST['minBudget']) . "', '" . mysqli_real_escape_string($link, $_POST['maxBudget']) . "', '" . mysqli_real_escape_string($link, $_POST['noOfGuests']) . "', '" . mysqli_real_escape_string($link, $mydate) . "')";

            if (!mysqli_query($link, $query)) {

                $error = "<p>Something went wrong - please try again later.</p>";
            } else  $done = '<h3 style="color:#94618E; font: size 50px;"><strong>Form submitted!</strong></h3>';
        }
    }
}
$error1 = "";
$done1 = "";

if (array_key_exists("submit1", $_POST)) {

    $link = mysqli_connect("127.0.0.1:3307", "root", "", "jashn");

    if (mysqli_connect_error()) {

        die("Database Connection Error");
    }

    if (!$_POST['name']) {

        $error1 .= "A name is required<br>";
    }

    if (!$_POST['phone']) {

        $error1 .= "Phone field is required<br>";
    }

    if (!$_POST['city']) {

        $error1 .= "City field is required<br>";
    }

    if (!$_POST['location']) {

        $error1 .= "Location field is required<br>";
    }
    if (!$_POST['noOfpeople']) {

        $error1 .= "Food field is required<br>";
    }

    if ($error1 != "") {

        $error1 = "<p>There were error(s) in your form:</p>" . $error1;
    } else {

        $query = "SELECT id FROM `ngoform` WHERE phone = '" . mysqli_real_escape_string($link, $_POST['phone']) . "' LIMIT 1";

        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {

            $error1 = "That phone number is already taken.";
        } else {

            $query = "INSERT INTO `ngoform` (`name`, `phone`,`city`, `location`, `noOfpeople`) VALUES ('" . mysqli_real_escape_string($link, $_POST['name']) . "', '" . mysqli_real_escape_string($link, $_POST['phone']) . "', '" . mysqli_real_escape_string($link, $_POST['city']) . "', '" . mysqli_real_escape_string($link, $_POST['location']) . "', '" . mysqli_real_escape_string($link, $_POST['noOfpeople']) . "')";

            if (!mysqli_query($link, $query)) {

                $error1 = "<p>Something went wrong - please try again later.</p>";
            } else  $done1 = '<h3 style="color:#94618E; font: size 50px;"><strong>Form submitted!</strong></h3>';
        }
    }
}
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
    <link rel="stylesheet" href="css/customer_style.css" />
    <style>
        .jumbotron {
            background-image: url(https://images.unsplash.com/photo-1623788452350-4c8596ff40bb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: relative;
            height: 100%;
            text-align: center;
            color: white;
            padding-top: 10rem;
            padding-bottom: 10rem;
        }
    </style>

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
                        <a class="nav-link" href="#donateUs">Donate Us</a>
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
        <h1 class="display-4" style="color:blanchedalmond;"><strong>JASHN</strong></h1>
        <hr class="my-4" style="color: transparent;" />
        <p class="lead" style="color:blanchedalmond;"> <b>Welcome Customer!</b></p>
        <hr class="my-4" style="color: transparent;" />

        <p id="info" style="color:blanchedalmond; font-weight: 50px;">The ultimate place where imagination meets reality!!!</p>
        <a class="btn btn-primary btn-lg" href="#planEvent" role="button">Explore</a>
    </div>
    <!-- End Banner =========================================== -->




    <!-- =====================================
     ==== Start Hero -->
    <section class="hero section-padding">
        <div class="containQuote" id="planEvent">
            <p style="color:#94618E;"><strong>“AN EVENT SHOULDN'T BE JUST AN EXPERIENTIAL THING, IT SHOULD BE AN EMOTIONAL THING.”</strong> – <em>Amit Kalantri</em>
                <br />
            </p>
        </div>

        <div class="card">
            <div class="card-header" style="text-align: center; color:#94618E ;">
                <h4 ">Let us plan your Event!</h4>
            </div>
        </div>

        <div class=" container" style="margin-top: 50px;">
                    <div id="error"><?php echo $error; ?></div>


                    <form method="post" class="row g-3">
                        <div class="col-md-4">
                            <label for="inputName" class="form-label">Name</label>
                            <input name="name" placeholder="Enter your name" type="text" class="form-control" id="name">
                        </div>
                        <div class="col-md-4">
                            <label for="inputPhone" class="form-label">Phone Number</label>
                            <input name="phone" placeholder="Enter your phone number" type="text" class="form-control" id="phone">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">City</label>
                            <select class="form-control form-select" id="sel1" name="city">
                                <option value="">Select your city</option>
                                <option value="Lucknow">Lucknow</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Kolkata">Kolkata</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Varanasi">Varanasi</option>
                                <option value="Noida">Noida</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="inputOccasion" class="form-label">Occasion</label>
                            <select class="form-control form-select" id="sel1" name="occasion">
                                <option value="">Select occasion</option>
                                <option value="Wedding">Wedding</option>
                                <option value="Reception">Reception</option>
                                <option value="Birthday">Birthday</option>
                                <option value="Corporate Event">Corporate Event</option>
                                <option value="Seminar">Seminar</option>
                                <option value="Pool Party">Pool Party</option>
                                <option value="Cocktail Party">Cocktail Party</option>
                                <option value="Exhibition">Exhibition</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="inputVenueType" class="form-label">Venue Type</label>
                            <select class="form-control form-select" id="sel1" name="venueType">
                                <option value="">Select venue type</option>
                                <option value="Banquet Hall">Banquet Hall</option>
                                <option value="Restaurant">Restaurant</option>
                                <option value="Restaurant">Bar and Pub</option>
                                <option value="Lawn">Lawn</option>
                                <option value="Farmhouse">Farmhouse</option>
                                <option value="Resort">Resort</option>
                                <option value="Rooftop">Rooftop</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="inputFood" class="form-label">Food Selection</label>
                            <select class="form-control form-select" id="sel1" name="food">
                                <option value="">Select type of catering</option>
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Non-Veg">Non-Vegetarian</option>
                                <option value="Liquor">Liquor</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputBudget" class="form-label">Budget Range</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control form-select" id="sel1" name="minBudget">
                                <option value="">Min Budget</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                                <option value="700">700</option>
                                <option value="1000">1000</option>
                                <option value="1200">1200</option>
                                <option value="1500">1500</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control form-select" id="inputmxB" name="maxBudget">
                                <option value="">Max Budget</option>
                                <option value="2000">2000</option>
                                <option value="2500">2500</option>
                                <option value="5000">5000</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">No. of Guests</label>
                            <select class="form-control form-select" id="inputGuests" name="noOfGuests">
                                <option value="">Select no. of guests</option>
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                                <option value="800">800</option>
                                <option value="1000">1000</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="inputDate" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="EventDate" name="date">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="submit" style="background-color: #94618E;">Submit</button>
                        </div>
                        <div id="done"><?php echo $done; ?></div>
                    </form>

            </div>
            <div class="containQuote" id="donateUs">
                <p style="color:#94618E; margin-top: 50px;"><strong>“AN EVENT SHOULDN'T BE JUST AN EXPERIENTIAL THING, IT SHOULD BE AN EMOTIONAL THING.”</strong> – <em>Amit Kalantri</em>
                    <br />
                </p>
            </div>

            <div class="card" style="margin-top: 50px" id="donateUs">
                <div class="card-header" style="text-align: center; color:#94618E ;">

                    <h4>Have any food Left? Donate Us</h4>
                </div>
            </div>

            <div class=" container" style="margin-top: 50px;">
                <div id="error1"><?php echo $error1; ?></div>


                <form method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Name</label>
                        <input name="name" placeholder="Enter your name" type="text" class="form-control" id="name">
                    </div>

                    <div class="col-md-6">
                        <label for="inputPhoneNo" class="form-label">Phone no.</label>
                        <input name="phone" placeholder="Enter your phone no." type="text" class="form-control" id="phoneNo">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <select class="form-control form-select" id="sel1" name="city">
                            <option value="">Select your city</option>
                            <option value="Lucknow">Lucknow</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Kolkata">Kolkata</option>
                            <option value="Candigarh">Chandigarh</option>
                            <option value="Varanasi">Varanasi</option>
                            <option value="Noida">Noida</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputLocation" class="form-label">Location</label>
                        <input name="location" placeholder="Enter your Location" type="text" class="form-control" id="Location">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Food Amount</label>
                        <select class="form-control form-select" id="inputFoodAmount" name="noOfpeople">
                            <option value="">For no. of people </option>
                            <!-- <option>10</option>
                                <option>50</option>
                                <option>100</option> -->
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="80">80</option>
                            <!-- <option value="100">100</option> -->
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="submit1" style="background-color: #94618E;">Submit</button>
                    </div>
                    <div id="done1"><?php echo $done1; ?></div>
                </form>

            </div>
    </section>
    <!-- End Hero ====
      ======================================= -->



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