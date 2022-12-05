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
    <div class=title-home>
        <h1>Keystone Medical Wellness</h1>
    <left>
    <?PHP
      include 'index.php';
      include 'connection.php';
      echo "These are our available Offices";
      $sql1 = "SELECT * FROM Office";
      $result = mysqli_query($link,$sql1);
      print "<pre>";
      print "<table border=1>";
      print "<tr><td>Office ID </td><td> Locations </td><td>";
      while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        print "\n";
        print "<tr><td>$row[Office_ID] </td><td> $row[Location] ";
      }
      print "</table>";
      print "</pre>";
  
      mysqli_free_result($result);
      mysqli_close($link);

    ?>
    </left>
    </div>
</body>

</html>