<?php

$connection = mysqli_connect('localhost','root', '', 'registration');
if($connection->error) {
    echo "Error";
    die();
}

session_start();
if(isset($_POST['submit']))
{
    $name = $_POST['email'];
    $pwd = $_POST['password'];
    if($name!=''&&$pwd!='')
    {
        $query = $connection->execute_query("select * from student where email=? and password=?", [
            $name, $pwd
        ]);
        $res = $query->fetch_array();
        if($res)
        {
            $_SESSION['name'] = $res["name"];
            header('location:welcome.php');
        }
        else
        {
            $_SESSION['error'] = "Email or password are incorrect";
            header('location:Login_Form.php');
        }
    }
    else
    {
        $_SESSION['error'] = "Both email and password are required";
        header('location:Login_Form.php');
    }
}