<?php
session_start();
include('../db.php');
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $student = $db->delete('users', 'user_id=' . $id);
    $_SESSION['delete'] = '<div class="toast">
    <div class="alert alert-info">
        <span>Deleted Successfully!</span>
    </div>
    </div>';
    header('location: ./manage');
    exit();
}
?>
