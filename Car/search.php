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
   /* universal css */
*{
   margin:0px;
   padding:0px;
}


  .anton-regular {
  font-family: "Anton", sans-serif;
  font-weight:400;
  font-style:normal;
}
.body{
 background-color: #f9f9f9;
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

.container{
  width:100%;
}
/* Universal css */
/* private css */
 .search-section{
        margin-left: 465px;
        margin-top: 100px;   
        width:600px;
 }
 .search-bar input { height:30px; margin-bottom: 10px; }

        .search-bar input[type="text"] { width: 40%; margin-right: 10px; }

        #btn {
           margin-top: 20px;
           padding: 10px 20px;
           background-color: black;
           color: white;
           border: none;
           cursor: pointer;
       }
       #btn:hover {
           background-color:red;
       }
       .message {
           margin-top: 20px;
           margin-left: 20px;
           font-size: 1.1em;
           font-weight:bold;
       }
       .head{
        padding-bottom:5px;
       }
       .bold{
        font-weight:bold;
        margin-bottom:0px;
        padding:0px;
       }
       select {
           width: 243px;
           height: 35px;
           margin-top: 10px;
           padding: 5px;
       }
  </style>
</head>
<body>
           <!-- universal html -->
 <div class="container">
  <div class="navbar">
   <a href="#" class="navbar_start anton-regular ">Car-Lagbe? </a>
   <ul class="navbar_menu">
    <li class="navbar-item"> <a href="index.php " class="navbar-link">Home</a></li>
    <li class="navbar-item"> <a href="register.php " class="navbar-link">Register</a></li>
    <li class="navbar-item"> <a href="request.php " class="navbar-link">Request</a></li>
    <li class="navbar-item"> <a href="search.php " class="navbar-link">Search </a></li>
    <li class="navbar-item"> <a href="admin.php " class="navbar-link">Admin</a></li>

      
   </ul>
  </div>
  <!-- universla html -->
 <!-- private html  -->
          <div class="search-section">
             <h1 class='head'>Search Car</h1>
              <form method= "GET" action="" class="search-bar ">
                <label for="car_type" class = 'bold'>Car Type: </label><br>

                <select name="car_type" id="car_type">
                <option value="Luxury_car">Luxury_car</option>
                <option value="Sedans">Sedans</option>
                <option value="SUVs">SUVs</option>
                <option value="Truck">Truck</option>
                <option value="Hiace">Hiace</option>
                <option value="Electric">Electric</option>

                </select>   
                <br><br>
                   <label for="region" class = 'bold'>Region : </label><br>
                   <input type="text" name="region" id="" placeholder='Lowercase' reqiured >
                   <button type="submit" id="btn">Search</button>

              </form>
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
          if (isset($_GET['car_type']) && isset($_GET['region'])) {
                $car_type = $_GET['car_type'];
                $region = $_GET['region'];

                $sql = "SELECT id, name, car_type, region, contact, created_at FROM car_owner WHERE car_type = '$car_type' AND region = '$region'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='card'>
                                <h3>Car Owner:{$row['name']}</h3>
                                <p><strong>Car Type:</strong> {$row['car_type']}</p>
                                <p><strong>Region:</strong> {$row['region']}</p>
                                <p><strong>Contact:</strong> {$row['contact']}</p>
                                <p><strong>Registered On:</strong> {$row['created_at']}</p>
                                <br>
                              </div>";
                    }
                } else {
                    echo "<p class='message'>No data found</p>";
                }
            }

            $conn->close();
            ?>
          </div>
        

</body>
</html>
