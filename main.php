<?php

    include('database.php');
    
    session_start();
    //$_SESSION['userID']="ccc";

    if(isset($_POST['signUp'])) signUp();
    if(isset($_POST['login'])) login();
    if(isset($_GET['logout'])) logout();
    if(isset($_POST['addBook'])) addBook();

    function signUp(){
        global $conn;
        extract($_POST);

        $emailCheck = "select * from user where email = '$email'";
        $result = mysqli_query($conn, $emailCheck);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $_SESSION['message'] = "Email already exists";
            header('location: index.php');
        }else{
            $reg = "insert into user (fname , lname , email , password) values('$fname' , '$lname' , '$email' , '$password')";
            mysqli_query($conn, $reg);
            $_SESSION['message'] = "Account has been created successfully !";
            header('location: index.php#login');
        }
    }

    function login(){
        global $conn;
        extract($_POST);

        $userCheck = "select * from user where email = '$loginEmail' && password = '$loginPassword' LIMIT 1";
        $result = mysqli_query($conn, $userCheck);
        $num = mysqli_num_rows($result);
        if($num == 1){
            foreach($result->fetch_assoc() as $key=>$row){
                if($key=="user_ID")         $_SESSION['userID'] = $row;
                else if($key=="fname")      $_SESSION['firstName'] = $row;
                else if($key=="lname")      $_SESSION['lastName'] = $row;
                else if($key=="email")      $_SESSION['email'] = $row;
                else if($key=="password")   $_SESSION['password'] = $row;
            }
            header('location: dashboard.php');
        }
        else {
            $_SESSION['message'] = "Incorrect email address or password";
            header('location: index.php#login');
        }
    }

    function logout(){
        session_unset();
        session_destroy();
        header('location: index.php');
    }

    function addBook(){
        global $conn;
        extract($_POST);

        $userID = $_SESSION['userID'];
        $img_name = $_FILES['cover']['name'];
        $tmp_name = $_FILES['cover']['tmp_name'];
        $error = $_FILES['cover']['error'];

        if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'assets/img/covers/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $add = "insert into book (users_ID, title, cover, author, language, genre, publication_date, price, description) values ('$userID', '$bookTitle', '$new_img_name', '$bookAuthor', '$bookLanguage', '$bookGenre', '$bookPublicationDate', '$bookPrice', '$bookDescription')";
                echo $add;
                
                mysqli_query($conn, $add);
                
                $_SESSION['book_message'] = "The book has been added successfully !";
                header('location: books.php');
            }else{
                $_SESSION['book_message'] = "You can't upload this type of files in cover";
                header('location: addbook.php');
            }

        }else{
            $_SESSION['book_message'] = "Unknown error occurred !";
            header('location: addbook.php');
        }
    }

?>