<?php
    // start session to handle messages
    session_start();
    if (isset($_SESSION['message'])) {
        header('location: index.html');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.
    7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="form-container">
        <h2><?php echo $_SESSION['message']; ?></h2>
        <p><?php echo $_SESSION['type']; ?></p>
        <p>Thank you for registering with us.</p>
        <p>Click the button below to return to the home page.</p>
        <br>
        <a href="index.htnl" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>
<?php
// Clear the messageso it doesn't persist on refresh
unset($_SESSION['message']);
unset($_SESSION['type']);
// Close the database connection
$conn = null;
?>