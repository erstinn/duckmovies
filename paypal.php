<?php
session_start();
?>

<html>
<style>

.logo{
    position: absolute;
    width: 400px;
    height: 100px;
    opacity: 1;
}
.rectangle{
    position: absolute;
    right: 650px;
    top: 100px;
    width: 400px;
    height: 850px;
    background-color: black;
    border-radius: 5px;
    opacity: 0.8;
    font-family: 'Segoe UI';
    padding: 100px;
    color: #ffffff;
}

body{
    background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url('moviebg.jpg');
}

input[type=submit] {
    width: 400px;
    height: 70px;
    background-color: #feb544;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 25px;
    font-family: Monsterrat, sans-serif;
}

.gcash{
    position: absolute;
    width:120px;
    height:120px;
    top: 660px;
    right: 400px;
}

.paypal{
    position: absolute;
    width:100px;
    height:100px;
    top: 670px;
    right: 330px;
}
p{
    color: #ffd686;
}

input[type=submit]:hover {
background-color: #ffd686;
}

label[for=paypal]{
    font-family: Monsterrat, sans-serif;
    font-size: 20px;
}

input[type=email]{
    width: 400px;
    height: 65px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    background-color: #35393b;
    color: white;
}

input[type=submit] {
    width: 400px;
    height: 70px;
    background-color: #feb544;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 25px;
    font-family: Monsterrat, sans-serif;
}



</style>

<body>
<?php error_reporting(E_ALL ^ E_NOTICE); 

error_reporting(0);


?>

<img class ="logo" src = "logoduckmovies.png"/>


<div class = "rectangle">

<p style="font-size: 25 ; margin : 0; padding-top:0" >Subscribe to Premium</p>
<p style="font-size: 50; margin : 0; padding-top:0">$5.50/month</p><br>

<p style="font-size: 30; margin : 0; padding-top:0; font-weight: 20">✓ Unlimited movies and TV shows</p><br>
<p style="font-size: 30; margin : 0; padding-top:0; font-weight: 20">✓ Maximum of 4 screens you can watch at the same time</p><br>
<p style="font-size: 30; margin : 0; padding-top:0; font-weight: 20">✓ Maximum of 4 phones or tablets you can have downloads on</p><br>
<p style="font-size: 30; margin : 0; padding-top:0; font-weight: 20">✓ Watch on laptop or TV</p><br><br>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<label for="paypal">Email</label><br>
<input type="email" id="number" name="email" placeholder="Account Email" required><br><br>
<label for="paypal">Paypal Email</label><br>
<input type="email" id="number" name="paypal" placeholder="Paypal Email" required>

<input type="submit" name="submit" value="Pay Now">

</div>

<?php
$servername = "localhost";
$username = "mici";
$password = "missy08";
$dbname = "duckmovies";
$port = "3308";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//incomplete (needs to save the currentdate in useraccounts when Pay Now button is clicked)
if (isset($_POST['submit'])) {
        $paypal = $_REQUEST["paypal"];
        $current_date = date('Y-m-d');
        //ERIN HELP SA EXPIRY :')
        $expiry_date = date('Y-m-d', strtotime($current_date. '+ 30 days'));
        $email = $_POST['email'];

        header('location: home.php');
        //save Paypal details of user in DB
        $stmt = "UPDATE useraccounts SET `Payment details` = '$paypal' WHERE `Email` = '$email'";
        $payment = "UPDATE useraccounts SET `Date of Payment` = '$current_date' WHERE `Email` = '$email'";
        $_SESSION['subbed'] = true;
        
        if (mysqli_query($conn, $stmt) && mysqli_query($conn, $payment)) {
            echo "<h4>Data stored in a database successfully.</h4>";
        } else {
            echo "ERROR: Sorry $stmt. "
            . mysqli_error($conn);
        }
        $conn->close();
}

/*TO DO: ERIN HELP
FOR EXPIRED ACCOUNTS:
1. Auto log out for each user acc if current date == expiry date
2. Stuck lang sila sa paypal/gcash page pag di sila nagbayad (free trial) - done
*/

?>

</body>

</html>
</body>
</html>

