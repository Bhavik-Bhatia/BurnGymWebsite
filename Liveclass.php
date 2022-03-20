<?php

// define variables and set to empty values
$fnameErr = $lnameErr = $mailErr = $mobileErr = $ageErr = $GenderErr = $dateErr = $time_rangeErr = '';
$fname = $lname = $email = $mobile = $age = $Gender = $date = $time_range = '';
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //If any input is empty
    if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["mail"]) || empty($_POST["mobile"])
    || empty($_POST["Gender"]) || empty($_POST["age"]) || empty($_POST["date"]) || empty($_POST["time_range"])) {       
        $status = "empty";
        echo $status;
        
    }
    elseif (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["fname"])) {
        $status = "fname_format";
        echo $status;        
    }
    elseif (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["lname"])) {
        $status = "lname_format";
        echo $status;        
    }
    elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $status = "mail_format";
        echo $status;        
    }
    elseif (!preg_match("/[6-9]{1}[0-9]{9}$/",$_POST["mobile"])) {
        $status = "mobile_format";
        echo $status;        
    }
    elseif (!preg_match("/[0-9]{2,3}$/",$_POST["age"])) {
        $status = "age_format";
        echo $status;        
    }
    else {
        $fname = test_input($_POST["fname"]);  
        $lname = test_input($_POST["lname"]);  
        $email = test_input($_POST["mail"]);  
        $age = test_input($_POST["age"]);  
        $date = test_input($_POST["date"]);  
        $Gender = test_input($_POST["Gender"]);  
        $time_range = test_input($_POST["time_range"]);  
        $mobile = test_input($_POST["mobile"]);  

        //Email sent to user by Burn
        $to_email = $email;
        $subject = "Thanks for signing up"." ".$fname." ".$lname;
        $body = "We will get back to you soon for more information over mail or call";
        $headers = "From: bhavikbhatia9@gmail.com";
        
        if (mail($to_email, $subject, $body, $headers)) {            
            //User requests sent to Burn---If mail is right
            
            $to_email = "bhavikbhatia19@gmail.com";
            $subject = "Live Workout Request by"." ".$fname." ".$lname;
            $body = "Client's name is ".$fname." and he/she is ".$age." year's old ".$Gender.".he/she can start the live workouts 
            from ".$date." in a time slot of ".$time_range.".His/Her contact number is ".$mobile." and email address is
            ".$email.".";
            $headers = "From: bhavikbhatia9@gmail.com";
    
            if (mail($to_email, $subject, $body, $headers)) {
                $status = "submitted";
                echo $status;
            } else {
                $status = "no_request_recieved";
                echo $status;
            }
        }
        else{
            $status = "failed";
            echo $status;            
        }
        
    
        
        
    }
    exit;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>

<body style="background-color: #131313;">

    <!-- Form -->
    <!--
         1)First Name
         2)Last Name
         3)Email ID
         4)Phone Number
         5)Age, Gender
         6)When to start - Date
         7)Times available
       -->
    <!-- Live Form Content -->
    <div id="reg_details" class="modal">
        <div class="modal_container">
            <div class="form-container" id="reg-form">
                <center>
                    <form id="form">
                        <h3>First Name</h3>
                        </br>
                        <input type="text" name="fname" id="fname" class="input" pattern="[A-Za-z ]{1,}" title="characters or words only!" placeholder="Henry" required/>
                        </br>
                        <h3>Last Name</h3>
                        </br>
                        <input type="text" name="lname" id="lname" class="input" pattern="[A-Za-z ]{1,}" title="characters or words only!" placeholder=" Mickel" required/>
                        </br>
                        <h3>Email</h3>
                        </br>
                        <input type="email" name="mail" id="mail" class="input" placeholder="Henry@gmail.com" title="Email format only!" required/>
                        </br>
                        <h3>Contact</h3>
                        </br>
                        <input type="tel" name="mobile" id="mobile" pattern="[6-9]{1}[0-9]{9}" class="input" placeholder="xxx-xxxx-xxx"  maxlength="10" size="10" title="Mobile Number only!" required/>
                        </br>
                        <h3>Age</h3>
                        </br>
                        <input type="number" min="12" name="age" id="age" class="input" placeholder="26" pattern="\d{1,}" title="Age" required/>
                        </br>
                        <h3>Gender</h3><span id="Gendermessage" style="color: red;font-weight: 400;"></span>
                        </br>
                        <div style="display: flex;flex-direction: row;align-items: center;flex-wrap: wrap;justify-content: center;">
                            <input type="radio" class="radio" id="Female" name="Gender" value="Female" required>
                            <label for="Female">Female</label><br>
                            <input type="radio" class="radio" id="Male" name="Gender" value="Male" required>
                            <label for="Male">Male</label><br>
                            <input type="radio" class="radio" id="Other" name="Gender" value="Other" required>
                            <label for="Other">Other</label>
                        </div>
                        </br>
                        <h3>Start Date</h3>
                        </br>
                        <input type="date" name="date" id="date" class="input" title="Start Date" required/>
                        </br>
                        <h3>Time</h3>
                        </br>
                        <select name="time_range" id="time_range" class="list" required>
                        <option value="6:00 AM to 8:00 AM">6:00 AM to 8:00 AM</option>
                        <option value="12:00 PM to 2:00 PM">12:00 PM to 2:00 PM</option>
                        <option value="4:00 PM to 6:00 PM">4:00 PM to 6:00 PM</option>
                        </select>
                        </br>
                        <span id="message" style="color: red;font-weight: 400;"></span>
                        </br>
                        <button type="submit" name="register_user" id="submit_button" class="">Register</button></br>
                        
                    </form>
                </center>
            </div>

        </div>
    </div>


    <header>
        <a href="index.html" class="logo"><i class="fas fa-fire-alt"></i>Burn</a>
    </header>

    <div class="blackbgcontainer">
    </div>

    <div class="nav_container">
        <div class="menu_btn">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div class="nav_items">
            <a href="index.html">Home</a>
            <a href="#" style="color: orange;">Live Class</a>
            <a href="AboutUs.html">About Us</a>
            <a href="Testimonial.html">Testimonial</a>
            <a href="Gallery.html">Gallery</a>
        </div>
    </div>

    <div class="nav_items_mobile">
        <a href="index.html">Home</a>
        <a href="#" style="color: orange;">Live Class</a>
        <a href="AboutUs.html">About Us</a>
        <a href="Testimonial.html">Testimonial</a>
        <a href="Gallery.html">Gallery</a>
    </div>


    <section id="Liveclass">
        <div class="container container1">
            <div class="content1">
                <h1>Live Class?</h1>
                <p>Burn also provides live online workouts and fitness <br> consultancy for you to be safe and healthy!</p>
            </div>
            <div class="image">
                <img src="Images/undraw_video_files_fu10.svg" alt="image" id="img_live_video">
            </div>
        </div>

        <div class="container container3">
            <button class="contact">Register</button>
        </div>

    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script async src="Js Files/Liveclass.js"></script>
    <script async src="Js Files/index.js"></script>

    <script>
       $(form).on('submit',function(e) {
        
        $('#form .input').css("border","1.5px solid gray");
        
        document.querySelector('span#Gendermessage').innerText = "";
        document.querySelector('span#message').innerText = "";
        document.getElementById('submit_button').innerText = "Please wait.."
        
        e.preventDefault();
        
        $.ajax({
            url:"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>",
            type:"post",
            data:$(form).serialize(),
            success:function(r){
                
                switch(r){
                    case "empty":
                        document.querySelector('span#message').innerText = "*Fill all details";
                        document.getElementById('submit_button').innerText = "Register"

                        if($("#fname").val() == ""){
                            $('#fname').css("border","1px solid red");
                        }
                        if($("#lname").val() == ""){
                            $('#lname').css("border","1px solid red");
                        }
                        if($("#mail").val() == ""){
                            $('#mail').css("border","1px solid red");
                        }
                        if($("#mobile").val() == ""){
                            $('#mobile').css("border","1px solid red");
                        }
                        if($("#age").val() == ""){
                            $('#age').css("border","1px solid red");
                        }
                        if($("#date").val() == ""){
                            $('#date').css("border","1px solid red");
                        }
                        if(!$('input[name=Gender]:checked').length > 0){
                            document.querySelector('span#Gendermessage').innerText = "Choose a Gender";
                        }
                        break;
                    case "fname_format":
                        $('#fname').css("border","1px solid red");
                        document.querySelector('span#message').innerText = "*Incorrect format";
                        document.getElementById('submit_button').innerText = "Register"
                        break;
                    case "lname_format":
                        $('#lname').css("border","1px solid red");
                        document.querySelector('span#message').innerText = "*Incorrect format";
                        document.getElementById('submit_button').innerText = "Register"
                        break;
                    case "mail_format":
                        $('#mail').css("border","1px solid red");
                        document.querySelector('span#message').innerText = "*Incorrect format";
                        document.getElementById('submit_button').innerText = "Register"
                        break;
                    case "mobile_format":
                        $('#mobile').css("border","1px solid red");
                        document.querySelector('span#message').innerText = "*Incorrect format";
                        document.getElementById('submit_button').innerText = "Register"
                        break;
                    case "age_format":
                        $('#age').css("border","1px solid red");
                        document.querySelector('span#message').innerText = "*Incorrect format";
                        document.getElementById('submit_button').innerText = "Register"
                        break;
                    case "submitted":
                        document.querySelector('span#message').innerText = "Submitted Succesfully";
                        document.getElementById('submit_button').innerText = "Register"
                        $('#message').css('color','green');
                        document.getElementById("form").reset();
                        break;
                    case "no_request_recieved":
                        alert("We did not recieve your mail!")
                        document.getElementById('submit_button').innerText = "Register"
                        break;
                    case "failed":
                        document.querySelector('span#message').innerText = "Mail wasn't sent!";
                        document.getElementById('submit_button').innerText = "Register"
                        $('#message').css('color','red');
                        break;
                    default:
                        document.querySelector('span#message').innerText = "Some Error occured,Please try later";
                        document.getElementById('submit_button').innerText = "Register"
                        $('#message').css('color','red');
                        break;    
                }
            }
        });
       })
    </script>


</body>

</html>
