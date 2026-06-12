<?php
$First_name=$_POST['fname'];
$Middle_name=$_POST['mname'];
$last_name=$_POST['lname'];
$city_name=$_POST['city'];
$Email_add=$_POST['email'];
$Contact_number=$_POST['contact'];
$Gen=$_POST['gender'];
$Aadhar_number=$_POST['aadhar'];
$Pan_number=$_POST['pan'];
$user_name=$_POST['username'];
$Spassword=$_POST['password'];
$SConfirm_password=$_POST['confirm_password'];

$FirstN_pattern="/^[a-zA-Z]+$/";
if(!preg_match($FirstN_pattern,$First_name))
{
     echo "<script>
    alert('only charcters ,no numbers and spaces are not  allowed');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$MiddleN_pattern="/^[a-zA-Z]+$/";
if(!preg_match($MiddleN_pattern,$Middle_name))
{
     echo "<script>
    alert('only charcters,no numbers and spaces are not  allowed');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$LastN_pattern="/^[a-zA-Z]+$/";
if(!preg_match($LastN_pattern,$last_name))
{
     echo "<script>
    alert('only charcters,no numbers and spaces are not  allowed');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$CityN_pattern="/^[a-zA-Z]+$/";
if(!preg_match($CityN_pattern,$city_name))
{
     echo "<script>
    alert('only charcters,no numbers and spaces are not  allowed');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$EmailN_pattern="/^[a-zA-Z0-9.+&_%-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
if(!preg_match($EmailN_pattern,$Email_add))
{
     echo "<script>
    alert('please enter valid email address' ex:Heetruparel12@gmail.com);
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$contactN_pattern="/^[6-9][0-9]{9}$/";
if(!preg_match($contactN_pattern,$Contact_number))
{
    echo "<script>
    alert('please enter indian mobile number ex:9876543210');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$AahdarN_pattern="/^[2-9][0-9]{11}$/";
if(!preg_match($AahdarN_pattern,$Aadhar_number))
{
    echo "<script>
    alert('please enter Aadhar number ex:987655523344');
    window.location='regexfunctions.html';
    </script>";
    exit();
}
$panN_pattern="/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/";
if(!preg_match($panN_pattern,$Pan_number))
{
    echo "<script>
    alert('please enter pan number ex:ABCDE1234F');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$UserN_pattern="/^[a-zA-Z0-9]+$/";
if(!preg_match($UserN_pattern,$user_name))
{
    echo "<script>
    alert('please enter valid username ex:Heet123');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$StrongpassN_pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/";
if(!preg_match($StrongpassN_pattern,$Spassword))
{
    echo "<script>
    alert('please enter valid Strong password atleast one uppercase,one lowercase,one special charcter,one digit,and password must be combination of 8 string');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

$SConfirmpassN_pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/";
if(!preg_match($SconfirmpassN_pattern,$SConfirm_password))
{
    echo "<script>
    alert('please enter valid Strong password atleast one uppercase,one lowercase,one special charcter,one digit,and password must be combination of 8 string');
    window.location='regexfunctions.html';
    </script>";
    exit();
}

    
