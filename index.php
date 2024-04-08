<?php
session_start();

// Initialize session variables if not set
if (!isset($_SESSION['expression'])) {
    $_SESSION['expression'] = '';
}

// Handle number and operator inputs
if (isset($_POST['input'])) {
    $_SESSION['expression'] .= $_POST['input'];
} 

if (isset($_POST['operator'])) {
    $_SESSION['expression'] .= ' ' . $_POST['operator'] . ' ';
} 

// Handle dot input
if (isset($_POST['dot'])) {
    $_SESSION['expression'] .= '.';
}

// Clear the calculator
if (isset($_POST['clear'])) {
    $_SESSION['expression'] = '';
}

// Calculate the result
if (isset($_POST['equal'])) {
    $result = eval('return ' . $_SESSION['expression'] . ';');
    $_SESSION['expression'] = $result;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <!-- Your CSS styles here -->
    <style>
        body{
            background-image: url(images.jpg);
            background-size:cover;
            background-position:center;
            background-repeat:repeat;
            font-family: Consolas, monospace;
        }
        .calc{
            text-align:center;
            margin: auto;
            background-color: transparent;
            border:5px solid black;
            width: 30.5%;
            height: 650px; /* Increased height to accommodate the display */
            border-radius: 25px;
            box-shadow: 0 5px 40px black;
        }
        .maininput{
            margin-top:80px;
            background-color: darkgreen;
            border: 1px solid gray;
            height: 60px; /* Adjusted height to fit inside the border */
            width: 89%; /* Adjusted width to fit inside the border */
            font-size: 50px;
            text-align:right;
            color: whitesmoke;
            font-weight: 00;
            padding: 10px;
            margin: 10px auto; /* Center the display horizontally */
            border-radius: 5px;
            pointer-events: none;
            border:5px solid black;
            border-radius:15px;
        }
        .numbtn{
            padding: 25px 30px;
            border-radius: 10px;
            font-weight: 500;
            background-color: #E1D9D1;
            color:black;
        }
        .numbtn:hover{
            background-color: #DCD7C8;
            color: black;
        }
        .calbtn{
            padding: 25px 30px;
            border-radius: 10px;
            font-weight: 500;
            background-color: #2C2D2D;
            color:white;
            float:right;
        }
        .calbtn:hover{
            background-color: black;
            color: white;
        }
        .c{
            padding: 25px 30px;
            border-radius: 10px;
            font-weight: 500;
            background-color: red;
            color:black;
            float:right;     
        }
        .c:hover{
            background-color: rgb(237, 45, 45);
            color: whitesmoke;
        }
        .equal{
            padding: 25px 30px;
            border-radius: 10px;
            font-weight: 500;
            background-color: #2C2D2D;
            color:white;
        }
        .equal:hover{
            background-color: black;
            color: white;
        }
        h2{
            color:white;
            font-size:x-large;
            text-align:center;
            margin-top:10px;
            margin-bottom:20px;
            border:2px solid black;
            width:60%;
            margin-left:72px;
            text-align:center;
            margin-top:35px;
            border-radius:5px;
        }

        .numbtn,
        .calbtn,
        .c,
        .equal {
            padding: 25px 30px;
            border-radius: 15px;
            font-weight: 500;
            font-size: medium;
            transition: transform 0.2s ease;
            margin: 5px; /* Added spacing between buttons */
        }
        .numbtn:hover,
        .calbtn:hover,
        .c:hover,
        .equal:hover {
            transform: translateY(2px);
        }
        .numbtn:active,
        .calbtn:active,
        .c:active,
        .equal:active {
            transform: translateY(4px);
        }
    </style>
</head>
<body>
<div class="calc">
    <h2>Basic Calculator</h2>
    <form action="" method="post">
        <input type="text" class="maininput" name="expression" value="<?php echo @$_SESSION['expression'] ?>" disabled><br><br>
        <input type="submit" class="c" name="clear" value="c"><br><br><br><br><br>
        <input type="submit" class="numbtn" name="input" value="7">
        <input type="submit" class="numbtn" name="input" value="8">
        <input type="submit" class="numbtn" name="input" value="9">
        <input type="submit" class="calbtn" name="operator" value="/"><br>
        <input type="submit" class="numbtn" name="input" value="4">
        <input type="submit" class="numbtn" name="input" value="5">
        <input type="submit" class="numbtn" name="input" value="6">
        <input type="submit" class="calbtn" name="operator" value="*"><br>
        <input type="submit" class="numbtn" name="input" value="1">
        <input type="submit" class="numbtn"name="input" value="2">
        <input type="submit" class="numbtn"name="input" value="3">
        <input type="submit" class="calbtn"name="operator" value="-"><br>
        <input type="submit" class="numbtn" name="input" value="0">
        <input type="submit" class="equal" name="dot" value=".">
        <input type="submit" class="equal" name="equal" value="=">
        <input type="submit" class="calbtn" name="operator" value="+">
    </div>
    </form>
</body>
</html>
