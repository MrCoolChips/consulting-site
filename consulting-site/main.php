<!DOCTYPE html>
<html lang = en>
    <head> 
        <meta charset = "utf-8">
        <title>Application Form</title>
        <script src="main.js"></script>
        <link href = "main.css" rel="stylesheet" type="text/css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <br>
        <header class = "header">
            <a><img src = "image/logo.svg" alt = "logo" class = "logo" width = "350" height = "100"></a>
            <input type = "checkbox" id = "check">
            <label for = "check" class = "icons">
                <i class='bx bx-menu' id = "menu-icon"></i>
                <i class='bx bx-x' id = "close-icon"></i>
            </label>
            <nav class = navbar>
                <a href="#" style ="--i:0">About us</a>
                <a href="#" style ="--i:1">Communication</a>
                <a href="#" style ="--i:2">Services</a>
                <a href="#" style ="--i:3">Publications</a>
                <a href="#" style ="--i:4">Create an Appointment</a>
            </nav>
        </header>
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
                
                $sql = "INSERT INTO requests (FirstName, LastName, Phone, Email, Service_option, Gender, Preference, Availability1, Days1, Explications, Report, Send_time) VALUES ('$FirstName', '$LastName', '$Phone', '$Email', '$Service_option', '$Gender',  '$Preference', '$Availability1', '$Days1', '$Explications','$Report', '$Send_time')";
            
                if ($conn->query($sql) === TRUE) {
                    echo "Your form is successfully saved!";
                } 
                else {
                    echo "Error";
                }  
            }
        ?>
    </body>
</html>