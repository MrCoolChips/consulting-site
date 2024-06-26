<?php include("main.php"); ?>

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
                <a href="about-us.html" style ="--i:0">About us</a>
                <a href="#" style ="--i:1">FAQ</a>
                <a href="#" style ="--i:2">Services</a>
                <a href="#" style ="--i:3">Publications</a>
                <a href="aplication.php" style ="--i:4">Create an Appointment</a>
            </nav>
        </header>
        <br>
        <br>
        <form method="post" action="main.php" class = "form" enctype = "multipart/form-data">
            <fieldset>
                <legend>Personal Informations</legend>
                <br>
                <div class = "question">
                    <i class='bx bxs-user'></i>
                    <input type =  "text" id = "name" name = "name" maxlength="100" placeholder= "Name" size = "25" required>
                </div>
                <div class = "question">
                    <i class='bx bxs-user'></i>
                    <input type =  "text" id = "lname" name = "lname" maxlength="100" placeholder= "Last Name" size="25" required>
                </div>
                <br>
                <div class = "question">
                    <i class='bx bxs-phone'></i>
                    <input type =  "tel" id = "phone" name = "phone" maxlength="100" placeholder="Phone Number" required>
                </div>
                <div class = "question">
                    <i class='bx bxl-gmail'></i>
                    <input type =  "email" id = "email" name = "email" maxlength="100" placeholder="Email Adress" required>
                </div>
                <br>
            </fieldset>
            <fieldset class = "filedset2">
                <legend>Psychological Information</legend>
                <br>
                <div class="radio-group">
                    <label class="q1">What kind of consulting service do you need?</label>
                    <br>
                    <input type =  "radio" id = "ot" name = "cservice" value="online_therapy" checked><label for="ot"> Online Therapy</label><br>
                    <input type =  "radio" id = "cat" name = "cservice" value="child_adolescent_therapy"><label for="cat"> Child and Adolescent Therapy</label><br>
                    <input type =  "radio" id = "it" name = "cservice" value="individual_therapy"><label for="it"> Individual Therapy</label><br>
                    <input type =  "radio" id = "fct" name = "cservice" value="family_couple_therapy"><label for="fct"> Family and Couple Therapy</label><br>
                </div>
                <br>
                <div class = "group">
                    <label class="q1">Please choose your gender :</label>
                    <select name = "gender">
                        <option value="man">Man</option>
                        <option value="woman">Woman</option>
                        <option value="other">Other</option>
                    </select>
                    <br>
                    <br>
                    <label class="q1">Please choose your sexual preference</label>
                    <select name = "preference">
                        <option value="hetero">Heterosexuel</option>
                        <option value="homo">Homosexuel</option>
                        <option value="other">Other</option>
                    </select>
                    <br>
                    <br>
                    <label class="q1">The most suitable time interval for you ?</label>
                    <br>
                    <input type = "checkbox" name = "timeline1" value = "morning">
                    <label for = morning>Morning</label>
                    <br>
                    <input type = "checkbox" name = "timeline2" value = "afternoon">
                    <label for = afternoon>Afternoon</label>
                    <br>
                    <input type = "checkbox" name = "timeline3" value = "evening">
                    <label for = evening>Evening</label>
                    <br>
                    <br>
                    <label class="q1">What days of the week are you available ?</label>
                </div>
                <br>
                <div class = "options">
                    <select name="days[]" id = "days" multiple size="5" required>
                        <option value = "monday"> Monday</option>
                        <option value = "tuesday"> Tuesday</option>
                        <option value = "wednesday"> Wednesday</option>
                        <option value = "thursday"> Thursday</option>
                        <option value = "friday"> Friday</option>
                        <option value = "saturday"> Saturday</option>
                        <option value = "sunday"> Sunday</option>
                    </select>
                </div>
                <br>
                <div class = "group">
                    <label class="q1">What would you like to get support for?</label>
                </div>
                <br>
                <textarea name = "multiligne" id = "multiligne" rows = "10" cols = "50" maxlength="300">Explain your reason in 300 letters</textarea>
                <br>
                <div class = "group">
                <label class="q1">Your patient report or health report, if you have one ?</label>
                <br>
                </div>
                <input type = "file" name = "report"> 
            </fieldset>
            <br>
            <br>
            <button type="submit" name="submit_button">Submit the Form</button>
            <button type="reset" name="reset_button">Reset the Form</button>
        </form>
    </body>
</html>