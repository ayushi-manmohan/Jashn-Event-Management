<?php

session_start();

$error = "";

// if (array_key_exists("logout", $_GET)) {

//     unset($_SESSION);
//     setcookie("id", "", time() - 60 * 60);
//     $_COOKIE["id"] = "";
// } else if ((array_key_exists("id", $_SESSION) and $_SESSION['id']) or (array_key_exists("id", $_COOKIE) and $_COOKIE['id'])) {

//     header("Location: loggedinpage.php");
// }

if (array_key_exists("submit", $_POST)) {

    $link = mysqli_connect("127.0.0.1:3307", "root", "", "jashn");

    if (mysqli_connect_error()) {

        die("Database Connection Error");
    }

    if (!$_POST['email']) {

        $error .= "An email address is required<br>";
    }

    if (!$_POST['password']) {

        $error .= "A password is required<br>";
    }

    if ($error != "") {

        $error = "<p>There were error(s) in your form:</p>" . $error;
    } else {

        if ($_POST['signUp'] == '1') {

            $query = "SELECT id FROM `planner` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1";

            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {

                $error = "That email address is taken.";
            } else {

                $query = "INSERT INTO `planner` (`email`, `password`) VALUES ('" . mysqli_real_escape_string($link, $_POST['email']) . "', '" . mysqli_real_escape_string($link, $_POST['password']) . "')";

                if (!mysqli_query($link, $query)) {

                    $error = "<p>Could not sign you up - please try again later.</p>";
                } else {

                    $query = "UPDATE `planner` SET password = '" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' WHERE id = " . mysqli_insert_id($link) . " LIMIT 1";

                    mysqli_query($link, $query);

                    $_SESSION['id'] = mysqli_insert_id($link);

                    if ($_POST['stayLoggedIn'] == '1') {

                        setcookie("id", mysqli_insert_id($link), time() + 60 * 60 * 24 * 365);
                    }

                    header("Location: loggedinpage.php");
                }
            }
        } else {

            $query = "SELECT * FROM `planner` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";

            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_array($result);

            if (isset($row)) {

                $hashedPassword = md5(md5($row['id']) . $_POST['password']);

                if ($hashedPassword == $row['password']) {

                    $_SESSION['id'] = $row['id'];

                    if ($_POST['stayLoggedIn'] == '1') {

                        setcookie("id", $row['id'], time() + 60 * 60 * 24 * 365);
                    }

                    header("Location: loggedinpage.php");
                } else {

                    $error = "That email/password combination could not be found.";
                }
            } else {

                $error = "That email/password combination could not be found.";
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Login.css" />
    <title>Planner| Login</title>
</head>

<body>

    <div id="container" class="container">
        <!-- FORM SECTION -->

        <div class="row">
            <!-- SIGN UP -->

            <div class="col align-items-center flex-col sign-up">

                <div class="form-wrapper align-items-center">


                    <div class="form sign-up">
                        <div id="error"><?php echo $error; ?></div>
                        <form method="post">

                            <div class="input-group">
                                <!-- <i class="bx bx-mail-send"></i> -->
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                            </div>
                            <div class="input-group">
                                <i class="bx bxs-lock-alt"></i>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                            </div>
                            <input type="checkbox" name="stayLoggedIn" value=1> Keep me logged in!

                            <input type="hidden" name="signUp" value="1">

                            <!-- <input type="submit" name="submit" value="Sign Up!"> -->
                            <button type="submit" id="submit" name="submit">Sign up</button>
                        </form>
                        <p>
                            <span> Already have an account? </span>
                            <b onclick="toggle()" class="pointer"> Sign in here </b>
                        </p>

                    </div>

                </div>
            </div>
            <!-- END SIGN UP -->
            <!-- SIGN IN -->
            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">

                    <div class="form sign-in">
                        <div id="error"><?php echo $error; ?></div>
                        <form method="post">
                            <div class="input-group">
                                <i class="bx bx-mail-send"></i>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                            </div>
                            <div class="input-group">
                                <i class="bx bxs-lock-alt"></i>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                            </div>
                            <input type="checkbox" name="stayLoggedIn" value=1> Keep me logged in!

                            <input type="hidden" name="signUp" value="0">

                            <!-- <input type="submit" name="submit" value="Log in!"> -->
                            <button type="submit" name="submit">Sign in</button>

                            <p>
                                <b> Forgot password? </b>
                            </p>
                            <p>
                                <span> Don't have an account? </span>
                                <b onclick="toggle()" class="pointer"> Sign up here </b>
                            </p>
                        </form>
                    </div>

                </div>
                <!-- <div class="form-wrapper"></div> -->
            </div>
            <!-- END SIGN IN -->
        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <!-- SIGN IN CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>Welcome</h2>
                </div>
                <div class="img sign-in"></div>
            </div>
            <!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up"></div>
                <div class="text sign-up">
                    <h2>Get Started</h2>
                </div>
            </div>
            <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
    </div>
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

    <script src="Login.js"></script>
</body>

</html>