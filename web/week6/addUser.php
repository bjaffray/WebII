<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <title>Document</title>
</head>



<body>
<div class="w3-container w3-dark-grey w3-round-xlarge w3-margin">
    <span class="w3-xxxlarge w3-allerta"> Update User Table </span>
</div> 

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="toGroup" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Group Table">
        <input type="submit" name="toEvent" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Event Table">
    </div>
</div> 
</form>



</body>
</html>