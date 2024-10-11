<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('location: ./error');
}
include('db.php');
session_start();
#-------------------------------------------------Register-----------------------------------------------------#
if (isset($_POST['fullname']) && isset($_POST['idnumber']) && isset($_POST['section']) && isset($_POST['email']) && isset($_POST['password'])) {
    $full_name = $_POST["fullname"];
    $id_number = $_POST["idnumber"];
    $section = $_POST["section"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $newUserData = [
        'full_name' => $full_name,
        'id_number' => $id_number,
        'section' => $section,
        'email' => $email,
        'password' => $password
    ];
    $insertId = $db->insert('users ', $newUserData);
  $_SESSION['success'] = 'Registered Successfully';
    header('location: ./'); 
    exit();
}
#-------------------------------------------------Student-Profile-----------------------------------------------------#
if (isset($_POST['fullName']) && isset($_POST['section']) && isset($_POST['gender']) && isset($_POST['address']) && isset($_POST['dob']) && isset($_POST['age']) && isset($_POST['civilStatus'])) {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $civilStatus = $_POST['civilStatus'];
    $student_profile = [
        'full_name' => $fullName,
        'section' => $section,
        'gender' => $gender,
        'address' => $address,
        'date_of_birth' => $dob,
        'age' => $age,
        'civil_status' => $civilStatus
    ];
    $insertId = $db->insert('student_profile', $student_profile);
     $_SESSION['edit'] = 'Edit Successfully';
}
#-------------------------------------------------Register-----------------------------------------------------#


$db->closeConnection();
