<?php

$connection = mysqli_connect('localhost','root', '', 'registration');
if($connection->error) {
    echo "Error";
    die();
}

session_start();
if(isset($_POST['submit']))
{   $email = $_POST['email'];
    $name = $_POST['name'];
    $pwd = $_POST['password'];
    if($email!=''&&$pwd!=''&&$name!='')
    {
        $query = $connection->execute_query("select * from student where email=?", [
            $email]);
        $res = $query->fetch_array();
        if(!$res)
        {
            $sql = $connection->execute_query('INSERT INTO student (email, name ,password) VALUES (?,?,?)',[$email, $name, $pwd]);
            echo "registered successfully";
            header('location:Registration_Form.php');
        }
        else
        {
            $_SESSION['error'] = "this email already exists";
            header('location:Registration_Form.php');
        }
    }
    else
    {
        $_SESSION['error'] = "you should fill all the information";
        header('location:Registration_Form.php');
    }
}

//"select * from student where email=? and password=?", [ $email, $pwd ]