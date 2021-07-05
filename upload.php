<?php
session_start();

require_once  'database.php';

$_SESSION['name-error']= " ";
$_SESSION['lastname-error']= " ";
$_SESSION['address-error'] = " ";
$_SESSION['phone-error'] = " ";
$_SESSION['date-error'] = " ";
$_SESSION['gender-error'] = " ";
$_SESSION['email-error'] = " ";
$_SESSION['password-error'] = " ";
$_SESSION['repeat-password-error'] = " ";
$_SESSION['length-validate-error'] = " ";
$_SESSION['check-password-error'] = " ";
$_SESSION['name-validate-error'] = " ";
$_SESSION['lastname-validate-error'] = " ";
$_SESSION['number-validate-error'] = " ";
$_SESSION['email-validate-error'] = " ";




$_SESSION['old_name'] = " ";
$_SESSION['old_lastname'] = " ";
$_SESSION['old_phone'] = " ";
$_SESSION['old_email'] = " ";
$_SESSION['old_address'] = " ";
$_SESSION['old_date'] = " ";
$_SESSION['old_password'] = " ";
$_SESSION['old_repeat_password'] = " ";

$empty_error_arr = ['*მიუთითეთ თქვენი სახელი!','*მიუთითეთ თქვენი გვარი!','*მიუთითეთ თქვენი მისამართი!',
'*მიუთითეთ თქვენი ტელეფონის ნომერი!', '*მონიშნეთ თქვენი დაბადების თარიღი!',
'*მონიშნეთ თქვენი სქესი!','*მიუთითეთ თქვენი ემაილი!','*მიუთითეთ თქვენი პაროლი!',
'*გაიმეორეთ თქვენი პაროლი!'];


$validate_error_arr =['*დასაშვებია მხოლოდ ასოების გამოყენება!','*დასაშვებია მხოლოდ რიცხვების გამოყენება!',
'*მითითებული ნომრის სიგრძე არ შეესაბამება დასაშვებს!','*თქვენ მიერ შეყვანილი ემაილი არ შეესაბამება სტანდარტებს!',
'*აუცილებელია 6 სიმბოლო!','*ნომერი უნდა შედგებოდეს 9 ციფრისგან!'];

$name= $_POST['firstname'];
$lastname =$_POST['lastname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$gender = $_POST['gender'];
$email= $_POST['email'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat-password'];



$reg_page =  header('location: http://localhost/DogHug/registration.php');

function input_filter($input){
    $input= htmlspecialchars($input);
    $input= trim($input);
    $input= str_replace("/", " ", $input);

    return $input;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($name)){
        $_SESSION['name-error'] = $empty_error_arr[0];
    }elseif($name){
        if(!preg_match("/^[a-zA-Z]*$/",$name)){
            $_SESSION['name-validate-error'] = $validate_error_arr[0];
            $_SESSION['old_name'] = $name;
        }else{
          echo (input_filter($name)) ; 
        }
    }
    
    if(empty($lastname)){
        $_SESSION['lastname-error'] = $empty_error_arr[1];
    }elseif($lastname){
        if(!preg_match("/^[a-zA-Z]*$/",$lastname)){
            $_SESSION['lastname-validate-error'] = $validate_error_arr[0];
            $_SESSION['old_lastname'] = $lastname;
        }else{
          echo (input_filter($lastname)) ; 
        }
    }

    if(empty($address )){
        $_SESSION['address-error'] = $empty_error_arr[2];
        $_SESSION['old_address'] = $address;
        }else{
       echo (input_filter($address));
    }

    if(empty($phone)){
        $_SESSION['phone-error'] = $empty_error_arr[3];
        $reg_page;
    }elseif($phone){
    if(!preg_match('/^[0-9]*$/', $phone)){
        $_SESSION['number-validate-error'] = $validate_error_arr[1];
        $_SESSION['old_phone'] = $phone;
        $reg_page;
    }elseif(strlen($phone)!=9){
        $_SESSION['number-validate-error'] =$validate_error_arr[5];
    }else{
       echo(input_filter($phone));
        }
    }

    if(empty($date)){
        $_SESSION['date-error'] = $empty_error_arr[4];
        $_SESSION['old_date'] = $date;
        $reg_page;
    } else{
       echo (input_filter($date));
    }

    if(empty($gender)){
        $_SESSION['gender-error'] = $empty_error_arr[5];
        $reg_page;
    }else{
        echo(input_filter($gender));
    }

    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 
    if(empty($email)){
        $_SESSION['email-error'] = $empty_error_arr[6];
        $reg_page;
    }elseif($email){
    if(!preg_match($pattern, $email)){
        $_SESSION['email-validate-error'] = $validate_error_arr[3];
        $_SESSION['old_email'] = $email;
    } else{
       echo (input_filter($email));
        }
    }

    if(empty($password)){
        $_SESSION['password-error'] = $empty_error_arr[7];
        $reg_page;
     }elseif($password){
     if(strlen($password) <6){   
        $_SESSION['length-validate-error'] = $validate_error_arr[4];
        $_SESSION['old_password'] = $password;
        $reg_page;
    }else{
      echo( input_filter($password));
        }
    }

    if(empty($repeat_password)){
        $_SESSION['repeat-password-error'] = $empty_error_arr[8];
        $_SESSION['old_repeat_password'] = $password;
        $reg_page;
    }elseif($password === $repeat_password){
       echo(input_filter($repeat_password));
        $reg_page;
    }else{
        $_SESSION['check-password-error'] = "*პაროლი არ ემთხვევა!";
    }

// if($empty_error_arr || $validate_error_arr){
// $_SESSION['old_name'] = $name;
// $_SESSION['old_lastname'] = $lastname;
// $_SESSION['old_phone'] = $phone;
// $_SESSION['old_email'] = $email;
// $_SESSION['old_address'] = $address;
// $_SESSION['old_date'] = $date;
// $_SESSION['old_password']= $password;
// }else{
// $_SESSION['old_name'] = " ";
// $_SESSION['old_lastname'] = " ";
// $_SESSION['old_phone'] = " ";
// $_SESSION['old_email'] = " ";
// $_SESSION['old_address'] = " ";
// $_SESSION['old_date'] = " ";
// $_SESSION['old_password'] = " ";
// }

}

$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE) or 
die("მონაცემები ვერ გაიგზავნა".mysqli_error($connect));

$insert = "INSERT INTO personal_users(firstname, lastname, address, phone, date, gender, email, password)
VALUE ('$name', '$lastname', '$address','$phone','$date','$gender','$email','$password') ";

$result = mysqli_query($connect, $insert) or die("ვერ იგზავნება".mysqli_error($connect));   
    








?>