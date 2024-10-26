<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "database2";
    $port = 3307;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["form"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $rating = $_POST["rating"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $sql_query = "INSERT INTO form (name, email, rating, subject, message) VALUES ('$name', '$email', '$rating', '$subject', '$message')";

        if ($conn->query($sql_query) === TRUE) {
            echo "New details inserted successfully";
        } else {
            echo "Error: " . $sql_query . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: index.html");
        exit();
    }

    if(isset($_POST["newsletter"])){
        $newsletter_email = $_POST["newsletter_email"];

        $sql_query ="INSERT INTO  newsletter (email) VALUES ('$newsletter_email')";

        if ($conn->query($sql_query ) === TRUE) {
            echo "Subscription sucessfull";
        }
        else{
            echo "ERROR: ". $sql_query . "<br>". $conn->error;
        }
    }
    $conn->close();
    header("Location: index.html");
    exit();
?>
