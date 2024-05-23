<?php
    if(isset($_POST['submit_button'])) {
        function check_undefined($valeur)
        {
            if (isset($_POST[$valeur]))
            {
                return $_POST[$valeur];
            }
            else
            {
                return "";
            }

        }

        $result = "";

        foreach ($_POST['days'] as $value)
        {
            $result = $result. " ". $value;
        }

        $filename = "";
        
        if (isset($_FILES['report']))
        {
            $f = $_FILES['report'];
            if (($f['error'] == 0) && ($f['size'] <= 1000000))
            {
                $infosfichier = pathinfo($f['name']);
                $extension = $infosfichier['extension'];
                $extensions_autorisees = array('pdf', 'jpg', 'jpeg', 'png');
                if (in_array($extension, $extensions_autorisees))
                {
                    if (move_uploaded_file($f['tmp_name'], 'uploads/'. $f['name']))
                        $filename = $f['name'];
                    else
                        echo "error";
                }
                else
                {
                    echo "Pls try to uplode pdf, jpg, jpeg, png file";
                }

            }
        }

        $FirstName = $_POST['name'];
        $LastName = $_POST['lname'];
        $Phone = $_POST['phone'];
        $Email = $_POST['email'];
        $Service_option = $_POST['cservice'];
        $Gender = $_POST['gender'];
        $Preference = $_POST['preference'];
        $Availability1 = check_undefined("timeline1"). " ". check_undefined("timeline2"). " ". check_undefined("timeline3");
        $Days1 = $result;
        $Explications = $_POST['multiligne'];
        $Report = $filename;
        $Send_time =  date("d/m/Y H:i:s");

        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "appointment";
    
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    
        if ($conn->connect_error) {
            echo "incorrect username or password";
            die("error: " . $conn->connect_error);
        }
        else {
        echo "Connection to MYSQL successful";
        }
    
        $sql = "INSERT INTO requests (FirstName, LastName, Phone, Email, Service_option, Gender, Preference, Availability1, Days1, Explications, Report, Send_time) VALUES ('$FirstName', '$LastName', '$Phone', '$Email', '$Service_option', '$Gender',  '$Preference', '$Availability1', '$Days1', '$Explications','$Report', '$Send_time')";
    
        if ($conn->query($sql) === TRUE) {
        echo "Your form is successfully saved!";
    } else {
        echo "Error";
    }
    }