<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DocOffice</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
    <link href="./style.css" rel="stylesheet" />
</head>

<body>

    <left>
    <?PHP
      include 'index.php';
      include 'connection.php';
      echo "These are the current appointments";
      $sql1 = "SELECT * FROM Appointments";
      $result1 = mysqli_query($link,$sql1);
      print "<pre>";
      print "<table border=1>";
      print "<tr><td>Appointment ID </td><td> Doctor Last Name </td><td> Patient Last Name </td><td> Patient ID </td><td> Date </td>";
      
      while ($row = mysqli_fetch_array($result1, MYSQLI_BOTH)) {
        print "\n";
        print "<tr><td>$row[App_ID] </td><td> $row[Doc_Name]  </td><td> $row[Pat_Name]  </td><td> $row[Patient_ID]  </td><td> $row[App_Date]  </td></tr>";
      }
      print "</table>";
      print "</pre>";

      mysqli_free_result($result1);
      mysqli_close($link);

    ?>
    </left>    
</body>

</html>