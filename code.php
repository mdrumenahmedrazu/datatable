<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

	$sl = mysqli_real_escape_string($con, $_POST['sl']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dep = mysqli_real_escape_string($con, $_POST['dep']);
    $reg = mysqli_real_escape_string($con, $_POST['reg']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$room = mysqli_real_escape_string($con, $_POST['room']);

    $query = "UPDATE students SET sl='$sl', name='$name', dep='$dep', reg='$reg', mobile='$mobile', room='$room' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
	$sl = mysqli_real_escape_string($con, $_POST['sl']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dep = mysqli_real_escape_string($con, $_POST['dep']);
    $reg = mysqli_real_escape_string($con, $_POST['reg']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$room = mysqli_real_escape_string($con, $_POST['room']);

    $query = "INSERT INTO students (sl,name,dep,reg,mobile,room) VALUES ('$sl','$name','$dep','$reg','$mobile','$room')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>