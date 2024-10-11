<?php
include '../db.php';
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    extract($_POST);

    $data = [
        'title' => $title,
        'purpose' => $purpose,
        'description' =>  $description
    ];
$db->insert('events',$data);
$_SESSION['notif'] = '<div class="toast">
  <div class="alert alert-success">
    <span>Message sent Successfully.</span>
  </div>
</div>';
header('location: ./notification');
exit;
}
header('location: ./notification');
?>