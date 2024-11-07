<?php
    // start session to handle messages
    session_start();

    // include the database connection
    require_once 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // get the form data and sanitize
        $firstName = htmlspecialchars(trim($_POST['firstName']));
        $lastName = htmlspecialchars(trim($_POST['lastName']));
        $gender = $_POST['gender'];
        $regNumber = htmlspecialchars(trim($_POST['regNumber']));
        $phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
        $emailAddress = htmlspecialchars(trim($_POST['emailAddress']));
        $hostelStatus = $_POST['hostelStatus'];
        $studentAddress = htmlspecialchars(trim($_POST['studentAddress']));

        // serverside validation
        $errors = [];
        if (empty($firstName)) {
            $errors[] = "First name is required";
        }
        if (empty($lastName)) {
            $errors[] = "Last name is required";
        }
        if (empty($regNumber)){
            $errors[] = "reNumber is required";
        }
        if (strlen($regNumber) != 8) {
            $errors[] = "Registration number must be 8 characters";
        }
        if (empty($phoneNumber)) {
            $errors[] = "Phone number is required";
        }
        if (!preg_match('/^\d{10}$/', $phoneNumber)) {
            $errors[] = "Phone number must be 10 characters";
        }
        if (empty($emailAddress)){
            $errors[] = "Email Address is required";
        }
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address";
        }
        if (empty($studentAddress)) {
            $errors[] = "Student address is required";
        }
        if (empty($gender)) {
            $errors[] = "Gender is required";
        }
        if (empty($hostelStatus)) {
            $errors[] = "Hostel status is required";
        }
        // if no errors, insert the data into the database and parameters
        
        if (empty($errors)) {
            try{
                $stmt = $conn->prepare("INSERT INTO students (
                    first_name, last_name, gender, 
                    reg_number, phone_number, email_address, 
                    hostel_status, student_address) 
                    VALUES (:firstName, :lastName, :gender, :regNumber, :phoneNumber, emailAddress, :hostelStatus, :studentAddress)");
                $stmt->bindParam(':firstName', $firstName);
                $stmt>bindParam(':lastName',$lastName);
                $stmt->bindParam(':gender',$gender);
                $stmt->bindParam(':reNumber',$regNumber);
                $stmt->bindParam(':phoneNumber',$phoneNumber);
                $stmt->bindParam(':emailAddress',$emailAddress);
                $stmt->bindParam(':hostelStatus',$hostelStatus);
                $stmt->bindParam(':studentAddress',$studentAddress);
                
                // execute the query
                $stmt->execute();

                // redirect to configure page
                $_SESSION['message'] = "Student added successfully";
                $_SESSION['type'] = "success";
                header('location: configure.php');
                exit();
            } catch (PDOException $e) {
                $errors[] = "Error: " . $e->getMessage();
                $_SESSION['message'] = "Error adding student";
                $_SESSION['type'] = "danger";
                header('location: addStudent.php');
                exit();
                
            }
        }
        // if there are errors, store them in the session and redirect to the add student page
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('location: index.html');
            exist();
        }
    }else{
        // if the script is accessed without a post method, redirect to the index page
        header('location: index.html');
        exit();
        // close the database connection
        $conn = null;
    }
?>