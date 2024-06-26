<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car-Rental</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poetsen+One&display=swap" rel="stylesheet">
    <style>
        /* Universal */
        .anton-regular {
            font-family: "Anton", sans-serif;
            font-weight:400;
            
        }
        .navbar_start{
            color:white;
            text-decoration:none;
        }
        .navbar{
            display: flex;
            align-items:center;
            justify-content:space-around;
            background-color:black;
            height:60px;
            margin:30px 60px;
            border-radius:20px;
        }
        .navbar_menu{
            display: flex;
            gap: 10px;
            list-style-type:none;
            margin-left:100px;
        }
        .navbar-item{
            margin-left:40px;
        }
        .navbar-link{
            text-decoration:none;
            color:white;
        }
        .navbar-link:hover {
           color: #d91e36;
       }
        /* Universal */

        /* Form */
        .form-section {
           background-color: #ffffff;
           padding: 20px;
           max-width: 500px;
           margin: 20px auto;
           border-radius: 10px;
           box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
       }
       input, select {
           width: 100%;
           height: 30px;
           margin-top: 10px;
           padding: 5px;
       }
       #car_type{
        width:514px;
        height:43px;
       }
       label {
           display: block;
           margin-top: 10px;
       }
       #btn {
           margin-top: 20px;
           padding: 10px 20px;
           background-color: black;
           color: white;
           border: none;
           cursor: pointer;
       }
       #btn:hover {
           background-color: red;
       }
    /* Form */
    .message {
           text-align: center;
           margin-top: 20px;
           font-size: 1.1em;
           font-weight:bold;
       }
    </style>
</head>
<body>
    <div class="container">
        <!-- Universal -->
        <div class="navbar">
            <a href="#" class='navbar_start anton-regular'>Car-Lagbe?</a>
            <ul class='navbar_menu'>
                <li class='navbar-item'><a href="index.php" class='navbar-link'>Home</a></li>
                <li class="navbar-item"> <a href="register.php " class='navbar-link'>Register</a></li>
                <li class="navbar-item"> <a href="request.php " class='navbar-link'>Request</a></li>
                <li class="navbar-item"> <a href="search.php " class='navbar-link'>Search </a></li>
                <li class="navbar-item"> <a href="admin.php " class='navbar-link'>Admin</a></li>
            </ul>
        </div>
        <!-- Universal -->
        <!-- Form -->
    <div class="form-section">
        <h2>Register as a Car Owner : </h2>
        <form action="" method="POST">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" required>
        <label for="car_type">Car Type: </label>

        <select name="car_type" id="car_type">
        <option value="Luxury_car">Luxury_car</option>
        <option value="Sedans">Sedans</option>
        <option value="SUVs">SUVs</option>
        <option value="Truck">Truck</option>
        <option value="Hiace">Hiace</option>
        <option value="Electric">Electric</option>

        </select>
        <label for="region">Region : </label>
        <input type="text" name="region" id="region" placeholder='Lowercase' required>
        <label for="car_number">Car Number: </label>
        <input type="text" name="car_number" id="car_number" required>
        <label for="contact">Contact : </label>
        <input type="text" name="contact" id="contact ">
        <button id="btn">submit</button>

        </form>
    </div>
    <!-- Form -->



<!-- phpconnect -->
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "car_rent";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $car_type = $_POST['car_type'];
    $region = $_POST['region'];
    $car_number = $_POST['car_number'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO car_owner (name, car_type, region,car_number, contact) VALUES ('$name', '$car_type', '$region','$car_number', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='message'>New record created successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</div>
        
</body>
</html>