<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-video-catalog.css">
    <style>
        .u1{
            list-style-type: none;
            margin: auto;
            padding: 10px;
            overflow: hidden;
        }
        li{
            list-style-type:none;
            float:left;
        }
        li a{
            display: block;
            color:antiquewhite;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .a1:hover:not(.active){
            background-color: #DBD3BF;
        }

        .a1{
            padding: 3px;
            color:dimgray;
            border-radius: 10px;
        }
        hr{
            border: 2px solid #fee4b3;
        }
    </style>
</head>


<body>
    <?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
    }
    $email = $_SESSION['email'];

    $conn = mysqli_connect('localhost', 'mici', 'missy08', 'duckmovies');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ".$conn->connect_error);
    }


    $sql = mysqli_query($conn, "select * from useraccounts where Email ='".$email."'");
    $email = $password = $date = $payment = "";
    while($data = mysqli_fetch_array($sql)){
        $email = $data['Email'];
        $password = $data['Password'];
        $date = $data['Date of payment'];
        $payment = $data['Payment details'];
    }

    $date = date('M d, Y', strtotime($date));
    $nextdate = date('M d, Y', strtotime($date. ' + 1 month'));
    ?>
	<div class="tm-page-wrap mx-auto">
		<div class="position-relative">
			<div class="potition-absolute tm-site-header">
				<div class="container-fluid position-relative">
					<div class="row">						
                        <div class="col-7 col-md-4">
                            <a href="home.php" class="tm-bg-black text-center tm-logo-container">
                                <i class="fas fa-video tm-site-logo mb-3"></i>
                                <h1 class="tm-site-name"><img src='logoduckmovies.png' height='50px'></h1>
                            </a>
                        </div>
                        <div class="col-5 col-md-8 ml-auto mr-0">
                            <div class="tm-site-nav">
                                <nav class="navbar navbar-expand-lg mr-0 ml-auto" id="tm-main-nav">
                                    <button class="navbar-toggler tm-bg-black py-2 px-3 mr-0 ml-auto collapsed" type="button"
                                        data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbar-nav"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span>
                                            <i class="fas fa-bars tm-menu-closed-icon"></i>
                                            <i class="fas fa-times tm-menu-opened-icon"></i>
                                        </span>
                                    </button>
                                    <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                                        <ul class="navbar-nav text-uppercase">
                                        <li class="nav-item">
                                                <a class="nav-link tm-nav-link" href="home.php">Movies</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link tm-nav-link" href="profile.php">Account<span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link" href="logout.php">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<div class="tm-welcome-container tm-fixed-header tm-fixed-header-2">
				<div class="text-center">
					<p class="pt-5 px-3 tm-welcome-text tm-welcome-text-2 mb-1 mt-lg-0 mt-5 text-white mx-auto">Your Account</p>                	
				</div>                
            </div>

            <div id="tm-fixed-header-bg"></div> <!-- Header image -->
		</div>

		<!-- Page content -->
		<div class="container-fluid">
			<div class="mx-auto tm-content-container">
				<main>
					<div class="row mb-5 pb-4">
						<div class="col-12">
							<!-- Header -->
							<h3 class="mb-4">Welcome to your Account Profile and Information</h3>
                            <hr><br>
                            <h4 class="mb-4">Your Information: </h4>
                            <?php
                            echo "<p><b>Email Address:</b> $email <br></p>";
                            echo "<p><b>Last Date of Payment:</b> $date <br></p>";
                            echo "<p><b>Next Date of Payment:</b> $nextdate <br></p>";
                            echo "<br><hr><br>";
                            ?>

                            <h4>Account Settings</h4>
                            <ul class="u1">
                                <li><a href='emailchange.php' class='a1'><b><u>Change Email Address</u>&nbsp;&nbsp;&nbsp;</b></a></li>
                                <li><a href='passchange.php' class='a1'><b>&nbsp;<u>Change Password</u></b>&nbsp;&nbsp;&nbsp;</a></li>
                                <li><a href='deleteacc.php' class='a1'><b>&nbsp;<u>Delete Account</u></b>&nbsp;&nbsp;&nbsp;</a></li>
                                <br><br>
                            </ul>
                        </div>
					
				</main>


                <footer class="row pt-5">
                    <div class="col-12">
                        <p class="text-right">Copyright 2020 The Duckmovies Company</p>
                    </div>
                </footer>
			</div>
		</div>
	</div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>