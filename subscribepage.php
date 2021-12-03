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
    right: 700px;
    top: 100px;
    width: 400px;
    height: 600px;
    background-color: black;
    border-radius: 5px;
    opacity: 0.7;
    font-family: 'Segoe UI';
    padding: 100px;
    color: #ffffff;
}

body{
    background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url('moviebg.jpg');
}

input[type=text],
input[type=number],
input[type=email],
input[type=password],
select {
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

label[for=mail], 
label[for=sub], 
label[for=pass]{
    font-family: Monsterrat, sans-serif;
    font-size: 20px;
}

label[for=signin]{
    font-family: Monsterrat, sans-serif;
    font-size: 20px;
    color: #ffd686;
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
<p style="font-size: 30; margin : 0; padding-top:0; font-weight: 20">✓ Watch on laptop or TV</p><br>

<p style="font-size:20">Choose your payment method</p>

<a href="gcash.php"><img src="gcash.png" alt="" class="gcash"></a><br>
<a href="paypal.php"><img src="paypal.png" alt="" class="paypal"></a><br>


</div>


</body>

</html>
</body>
</html>

