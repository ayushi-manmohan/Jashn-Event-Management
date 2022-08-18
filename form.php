<?php include('try.php') ?>
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
    <link rel="stylesheet" href="Components/Customer/css/customer_style.css" />

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
        <h1 class="display-4" style="color:seashell;"><strong>WELCOME</strong></h1>
        <p class="lead" style="color:blanchedalmond;">One stop for <b>Sharmaji ka Function!</b></p>
        <hr class="my-4" style="color: transparent;" />
        <hr class="my-4" style="color: transparent;" />
        <p id="info" style="color:blanchedalmond;">The ultimate place where imagination meets reality!!!</p>
        <a class="btn btn-primary btn-lg" href="#planEvent" role="button">Explore</a>
    </div>
    <!-- End Banner =========================================== -->




    <!-- =====================================
     ==== Start Hero -->
    <section class="hero section-padding">
        <div class="containQuote" id="planEvent">
            <p style="color:#94618E;"><strong>“AN EVENT IS NOT OVER UNTIL EVERYONE IS TIRED OF TALKING ABOUT IT.”</strong> – <em>Mason Cooley</em>
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
                            <input name="phone" placeholder="Enter your name" type="number" class="form-control" id="phone">
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
                                <option value="Corporate Gathering">Corporate Gathering</option>
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