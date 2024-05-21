<?php
if(isset($_POST['submit_button'])) {
    $identification = $_POST['test'];

    $servername = "FXserver";
    $username_db = "root";
    $password_db = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    if ($conn->connect_error) {
        die("error: " . $conn->connect_error);
    }

    $sql = "INSERT INTO test (test) VALUES ('$identification')";

    if ($conn->query($sql) === TRUE) {
        echo "No problemo";
    } else {
        echo "Problemo: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>