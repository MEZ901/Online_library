<?php

    include('database.php');
    
    session_start();

    if(isset($_POST['signUp']))           signUp();
    if(isset($_POST['login']))            login();
    if(isset($_GET['logout']))            logout();
    if(isset($_POST['addBook']))          addBook();
    if(isset($_POST['deleteBook']))       deleteBook();
    if(isset($_POST['editBook']))         editBook();
    if(isset($_POST['removeAccount']))    removeAccount();

    function signUp(){
        global $conn;
        extract($_POST);

        $emailCheck = "select * from user where email = '$email'";
        $result = mysqli_query($conn, $emailCheck);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $_SESSION['F-messages'] = "Email already exists";
            header('location: index.php?signup#signUp');
        }else{
            $reg = "insert into user (fname , lname , email , password) values('$fname' , '$lname' , '$email' , '$password')";
            mysqli_query($conn, $reg);
            $_SESSION['S-message'] = "Account has been created successfully !";
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
            $_SESSION['F-message'] = "Incorrect email or password";
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
            $allowed_exs = array("jpg", "jpeg", "jfif", "pjpeg", "pjp", "png", "svg", "webp");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'assets/img/covers/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $add = "insert into book (users_ID, title, cover, author, language, genre, publication_date, price, description) values ('$userID', '$bookTitle', '$new_img_name', '$bookAuthor', '$bookLanguage', '$bookGenre', '$bookPublicationDate', '$bookPrice', '$bookDescription')";
                $result = mysqli_query($conn, $add);
                
                if($result){
                    $_SESSION['S-message'] = "The book has been added successfully !";
                    header('location: books.php');
                }else{
                    $_SESSION['F-message'] = "Something went wrong please try again";
                    header('location: addBook.php');
                }
                
                
            }else{
                $_SESSION['F-message'] = "You can't upload this type of files in cover";
                header('location: addBook.php');
            }

        }else{
            $_SESSION['F-message'] = "Unknown error occurred !";
            header('location: addBook.php');
        }
    }

    function showBooks($pre){
        global $conn;
        $userID = $_SESSION['userID'];
        
        if($pre == 0) $sql = "select * from book where users_ID = $userID order by book_ID desc";
        else $sql = "select * from book where users_ID = $userID order by book_ID desc limit 3";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            while($row = $result->fetch_assoc()){
                $cover = $row["cover"];
                $title = $row['title'];
                $author = $row["author"];
                $language = $row["language"];
                $genre = $row["genre"];
                $publication_date = $row["publication_date"];
                $price = $row["price"];
                $description = $row["description"];
                $id = $row["book_ID"];

                $pr = "'".$title."','".$author."','".$genre."','".$price."','".$language."','".$publication_date."','".$description."','".$id."','".$cover."'";
                
                echo 
                '<div class="lg-col-3" style="width: 14rem;" data-bs-toggle="modal" data-bs-target="#bookInfo" onclick="bookInfo('.$pr.');">
                    <img class="img-thumbnail" src="assets/img/covers/'.$cover.'" alt="book cover">
                </div>';
            }
        }else{
            if($pre == 0) echo "You didn't add any book yet.";
            
        }
    }

    function booksCounter(){
        global $conn;
        $userID = $_SESSION['userID'];

        $count = "select * from book where users_ID = $userID";
        $result = mysqli_query($conn, $count);
        $num = mysqli_num_rows($result);

        echo $num;
    } 

    function deleteBook(){
        global $conn;
        extract($_POST);

        $delete = "delete from book where book_ID = $bookId";
        mysqli_query($conn, $delete);
        
        $coverPath = "assets/img/covers/".$bookCover;
        unlink($coverPath);
        $_SESSION['S-message'] = "The book has been deleted successfully.";
        header("location: books.php");
        
    }

    function editBook(){
        global $conn;
        extract($_POST);

        if($_FILES['cover']['name'] == ""){
            $update = "update book set title='$bookTitle', language='$bookLanguage', publication_date='$bookPublicationDate', author='$bookAuthor', genre='$bookGenre', price='$bookPrice', description='$bookDescription' where book_ID='$bookId'";
            mysqli_query($conn, $update);
            $_SESSION['S-message'] = "The book has been updated successfully.";
            header("location: books.php");
        }else{
            $img_name = $_FILES['cover']['name'];
            $tmp_name = $_FILES['cover']['tmp_name'];
            $error = $_FILES['cover']['error'];

            if($error === 0){
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "jfif", "pjpeg", "pjp", "png", "svg", "webp");

                if(in_array($img_ex_lc, $allowed_exs)){
                    $cover_name = $_SESSION['tmpBookCover'];
                    $img_upload_path = 'assets/img/covers/'.$cover_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    $update = "update book set title='$bookTitle', language='$bookLanguage', publication_date='$bookPublicationDate', author='$bookAuthor', genre='$bookGenre', price='$bookPrice', description='$bookDescription', cover='$cover_name' where book_ID='$bookId'";
                    $result = mysqli_query($conn, $update);
                    
                    if($result){
                        $_SESSION['S-message'] = "The book has been added successfully !";
                        header('location: books.php');
                    }else{
                        $_SESSION['F-message'] = "Something went wrong please try again";
                        header('location: addBook.php');
                    }
                    
                    
                }else{
                    $_SESSION['F-message'] = "You can't upload this type of files in cover";
                    header("location: addBook.php?id=$bookId");
                }

            }else{
                $_SESSION['F-message'] = "Unknown error occurred !";
                header('location: addBook.php');
            }
        }
    }

    function removeAccount(){
        global $conn;
        $id = $_SESSION['userID'];

        $imageQuery = "select `cover` from book where users_ID = $id";
        $result = mysqli_query($conn, $imageQuery);
        while($row = mysqli_fetch_assoc($result)){
            $coverPath = "assets/img/covers/".$row['cover'];
            unlink($coverPath);
        }

        $booksQuery = "delete from book where users_ID = $id";
        $bookResult = mysqli_query($conn, $booksQuery);

        $accountQuery = "delete from user where user_ID = $id";
        $accountResult = mysqli_query($conn, $accountQuery);
        logout();
    }
    
?>