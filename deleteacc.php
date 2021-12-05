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
        $id = $data['ID'];
        $email = $data['Email'];
        $password = $data['Password'];
        $date = $data['Date of payment'];
        $payment = $data['Payment details'];
    }

    
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
							<h3 class="mb-4">Are you sure you want to delete your account?</h3>
                            <li style="float:right"><a href='profile.php' class='a1'><b><u>Back</u>&nbsp;&nbsp;&nbsp;</b></a></li><br>
                            <p>To delete your account, please enter your email address and password.</p>
                            <table>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                <tr><td>Enter Email: </td><td><input type="email" name="emailadd" required>&nbsp;&nbsp;</td></tr>

                                <tr><td>Enter Password: </td><td><input type="password" name="pw" required>&nbsp;&nbsp;</td></tr>

            
                            </table>
                            <br><button type="submit" name="submit" class="btn rounded-0 btn-primary tm-btn-small">Confirm Account Deletion</button><br>

                        </form>

                        <?php
                        if(isset($_POST['submit'])){
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $emailadd = $_POST['emailadd'];
                                $pw = $_POST['pw'];

                                $record = mysqli_query($conn, "SELECT * FROM useraccounts WHERE Email='".$emailadd."' AND Password='".$pw."'");
                                if($record->num_rows > 0){
                                    while($row = mysqli_fetch_array($record)){
                                        $del = "DELETE FROM useraccounts WHERE Email='".$emailadd."' AND Password='".$pw."'";
                                        if ($conn->query($del)){
                                            ?><script type="text/javascript">location.href = 'deleted.php';</script><?php
                                        }
                                        else{
                                            echo "There was a problem with the deletion of your account. Please try again...";
                                        }
                                    }
                                }
                                else{
                                    echo "Wrong email/password...<br>";
                                } 
                            }
                        }
                        
                        ?>

                        </div>
					<!-- </div>
					<div class="row mb-5 pb-5">
						<div class="col-xl-8 col-lg-7">
							Video description
							<div class="tm-video-description-box">
								<p>Account Information</p>
							</div>							
						</div>
						
					<div class="row pt-4 pb-5">
						hatdog
					</div> -->
				</main>

                <!-- COMMENT OUT KO MUNA TO -->
				<!-- Subscribe form and footer links -->
                <!-- <div class="row mt-5 pt-3">
                    <div class="col-xl-6 col-lg-12 mb-4">
                        <div class="tm-bg-gray p-5 h-100">
                            <h3 class="tm-text-primary mb-3">Do you want to get our latest updates?</h3>
                            <p class="mb-5">Please subscribe our newsletter for upcoming new videos and latest information about our
                                work. Thank you.</p>
                            <form action="" method="GET" class="tm-subscribe-form">
                                <input type="text" name="email" placeholder="Your Email..." required>
                                <button type="submit" class="btn rounded-0 btn-primary tm-btn-small">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="p-5 tm-bg-gray">
                            <h3 class="tm-text-primary mb-4">Quick Links</h3>
                            <ul class="list-unstyled tm-footer-links">
                                <li><a href="#">Duis bibendum</a></li>
                                <li><a href="#">Purus non dignissim</a></li>
                                <li><a href="#">Sapien metus gravida</a></li>
                                <li><a href="#">Eget consequat</a></li>
                                <li><a href="#">Praesent eu pulvinar</a></li>
                            </ul>    
                        </div>                        
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="p-5 tm-bg-gray h-100">
                            <h3 class="tm-text-primary mb-4">Our Pages</h3>
                            <ul class="list-unstyled tm-footer-links">
                                <li><a href="#">Our Videos</a></li>
                                <li><a href="#">License Terms</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Privacy Policies</a></li>
                            </ul>
                        </div>                        
                    </div>
                </div> row -->

                <footer class="row pt-5">
                    <div class="col-12">
                        <p class="text-right">Copyright 2020 The Duckmovies Company</p>
                    </div>
                </footer>
			</div> <!-- .tm-content-container -->
		</div>
	</div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>