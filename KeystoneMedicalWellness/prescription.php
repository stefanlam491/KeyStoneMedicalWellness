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
      echo "These are the medicine we have available in Office";
      $sql1 = "SELECT M.Med_name, D.Lname FROM Medicine M
      LEFT OUTER JOIN Doctor D ON M.Prescribed_by = D.Doctor_ID ";
      $sql2 = "SELECT Med_ID, Med_name FROM Medicine";
      $result = mysqli_query($link,$sql2);

      print "<pre>";
      print "<table border=1>";
      print "<tr><td>Medicine ID </td><td> Medicine Name </td>";

      while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        print "\n";
        print "<tr><td>$row[Med_ID] </td><td> $row[Med_name]  </td></tr>";
      }

      print "</table>";
      print "</pre>";
  
      mysqli_free_result($result);
      mysqli_close($link);

    ?>
    </left>
</body>

</html>