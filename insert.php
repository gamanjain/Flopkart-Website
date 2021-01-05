<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>

</head>

<body>
    <h1 class="feedback">THANK YOU FOR YOUR FEEDBACK</h1>
    <a href="index.php" class="BUTTON_MCS">Go back to home page</a>
</body>

</html>
<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$messages = $_POST['messages'];
$conn = new mysqli("localhost", "root", "", "checkedplaces");
if ($conn->connect_error) {
    die('connection failed  :' . $conn->connect_error);
} else {

    $stmt = $conn->prepare("insert into feedback(fname,lname,email,messages) values (?,?,?,?)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $messages);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
?>