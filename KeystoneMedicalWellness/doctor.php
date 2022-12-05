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
      echo "Here are the Doctors currently Employed";
      $sql = "SELECT D.Doctor_ID,D.Fname,D.Lname,S.Spec_Name FROM Doctor D
      LEFT OUTER JOIN Specialty S ON D.Doctor_ID = S.Spec_ID";
      $result = mysqli_query($link,$sql);
      print "<pre>";
      print "<table border=1>";
      print "<tr><td>Doctor ID </td><td> First Name </td><td> Last Name </td><td> Specialty </td>";
      while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        print "\n";
        print "<tr><td>$row[Doctor_ID] </td><td> $row[Fname]  </td><td> $row[Lname]  </td><<td> $row[Spec_Name]  </td></tr>";
      }
      print "</table>";
      print "</pre>";
  
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
    </left>
</body>

</html>