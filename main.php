<?php

    include('database.php');

    session_start();

    if(isset($_POST['signUp'])) signUp();
    if(isset($_POST['login'])) login();

    function signUp(){
        global $conn;
        extract($_POST);

        $emailCheck = "select * from user where email = '$email'";
        $result = mysqli_query($conn, $emailCheck);
        $num = mysqli_num_rows($result);
        if($num == 1){
            echo "email already exists";
        }else{
            $reg = "insert into user (fname , lname , email , password) values('$fname' , '$lname' , '$email' , '$password')";
            mysqli_query($conn, $reg);
            $_SESSION['firstName'] = $fname;
            header('location: dashboard.php');
        }
    }

    function login(){
        global $conn;
        extract($_POST);

        $userCheck = "select * from user where email = '$loginEmail' && password = '$loginPassword'";
        $result = mysqli_query($conn, $userCheck);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $_SESSION['firstName'] = $result->fetch_assoc()['fname'];
            header('location: dashboard.php');
        }
        else header('location: index.php#login');
    }

?>