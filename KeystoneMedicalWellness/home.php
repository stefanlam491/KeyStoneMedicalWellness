<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DocOffice</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
    <link href="./style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>

    <!-- <div class=container4>
        <p>Discover the best doctors in your area.</p>
    </div> -->
    <div class="container ht-5">
        <div class=title-home>
            <h1>Keystone Medical Wellness</h1>
        </div>
        <div class="topnav">
            <a href="home.php">HOME</a>
            <a href="doctor.php">DOCTOR</a>
            <a href="appointment.php">APPOINTMENT</a>
            <a href="prescription.php">PRESCIPTION</a>
            <a href="location.php">LOCATION</a>
            <a href="test.php">TEST</a>
            <a href="about.php">ABOUT US</a>
        </div>
        <h1>Add Patient</h1>
        <form action="home.php" method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter your first name" name="iFname" />
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter your last name" name="iLname" />
            </div>

            <div class="form-group">
                <label>Doctor Name</label>
                <select class="form-control" placeholder= "Select Doctor" name="iDoctor">
                    <option value="Jones">
                       Bob Jones
                    </option>
                    <option value="Irwin">
                       Steve Irwin
                    </option>
                    <option value="Stevens">
                       Robert Stevens
                    </option>
                    
                </select>
            </div>
            <div class="form-group">
                <label>Appointment</label>
                <input type="date" class="form-control" placeholder="Date" name="idate">
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-danger" name="btn">
            </div>
        </form>
    </div>




    <!-- <div class=gif>
        <img src="./images/healthpeople.gif" alt="health people">
    </div> -->
    <!-- <div class=home>
        <div class="background"></div>
    </div> -->

    <left>
        <?PHP
        // include 'index.php';
        include 'connection.php';
        // $link = mysqli_connect('127.0.0.1', 'root', 'Potato123');

        // if (!$link) {
        //     die("Cannot pull up all doctor information! " . mysqli_error());
        // } else {
        //     echo "Here are all the doctors serving this office! <br>";
        // }
        if(isset($_POST["btn"])) {
            include "connection.php";
            $Patient_ID ='P'. mt_rand(1111,9999);
            $App_ID = 'A' . mt_rand(1111,9999);
            $Fname_name=$_POST['iFname'];
            $Lname=$_POST['iLname'];
            $Doctor=$_POST['iDoctor'];
            $date=$_POST['idate'];
      
  
            $q="INSERT INTO Appointments(App_ID,Doc_Name,Pat_Name,Patient_ID,App_Date)
                VALUES('$App_ID','$Doctor','$Lname','$Patient_ID','$date')";
  
            mysqli_query($link,$q);
            header("location:appointment.php");
        }

        ?>
    </left>
</body>

</html>