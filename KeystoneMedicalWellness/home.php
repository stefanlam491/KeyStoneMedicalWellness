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
    </div>
    <div class=home>
        <div class="background"></div>
    </div>
    
    <left>
        <?PHP
            include 'index.php';
            include 'connection.php';
            $link = mysqli_connect('127.0.0.1', 'root', 'Potato123');

            if (!$link) {
                die("Cannot pull up all doctor information! " . mysqli_error());
            } else {
                echo "Here are all the doctors serving this office! <br>";
            }

            ?>
    </left>
</body>

</html>