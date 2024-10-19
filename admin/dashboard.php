<?php 
session_start();
if (!isset($_SESSION['logged'])) {
    header("location: ../");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../src/icon.png" type="image/png">
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="script.js" defer ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Dashboard</title>
  </head>
  <body class="m-0 bg-zinc-900">
    <div class="flex">
      <ul class="menu bg-base-200 gap-5 h-full w-[20%] flex flex-col items-center justify-center bg-zinc-900 fixed z-50">
        <div class="flex justify-center flex-col items-center gap-3 mt-5">
          <img src="../src/usg.jpg" class="rounded-full w-[100px]">
          
        </div>
        <li class="bg-gray-800 rounded-sm w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Dashboard">
            <i class="bi bi-house "></i><h1 class="hidden md:block ">Dashboard</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="./qrcode.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="QR code">
            <i class="bi bi-qr-code "></i><h1 class="hidden md:block ">Qr Code Scanner</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="./attendance.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Attendance">
            <i class="bi bi-file-earmark-check-fill "></i><h1 class="hidden md:block ">View Attendance</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="./manage.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Student Profile">
            <i class="bi bi-person-circle "></i><h1 class="hidden md:block ">Manage User</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="./notification.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Notification">
            <i class="bi bi-bell-fill "></i><h1 class="hidden md:block ">Manage Notification</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="../logout" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Logout">
            <i class="bi bi-box-arrow-left "></i><h1 class="hidden md:block ">Logout</h1>
          </a>
        </li>
      </ul>
      
      <div class="flex-1 ml-[20%] p-5 w-full h-full bg-slate-800">
        
        <!-----------------navbar------------------>

        <div class="navbar bg-base-100 rounded-3xl">
          <div class="flex-1">
            <a class="btn btn-ghost text-xl"><img src="../src/ustp.jpg" class="w-[40px] rounded-full"></a>
            <p>University of Science & Technology of Southern Philippines</p>
          </div>
          <div class="flex-none">
           
            <div class="dropdown dropdown-end">
              <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                  <img src="<?php echo $_SESSION['profile_pic']?>" />
                </div>
              </div>
              <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                  <a class="justify-between">
                    Profile
                    <span class="badge">New</span>
                  </a>
                </li>
                <li><a>Settings</a></li>
                <li><a href="../logout">Logout</a></li>
              </ul>
            </div>
          </div>
          
        </div>
<!------------------------------------------>
<?php
include '../db.php';

// Fetch total users
$totaluser = $db->selectWithWhere('users', '*');
$totals = count($totaluser);

// Fetch total time ins
$totaltimein = $db->selectWithWhere('record', 'time_in');
$totalt = count($totaltimein);

// Fetch total time outs
$totaltimeout = $db->selectWithWhere('record', 'time_out');
$totalto = count($totaltimeout);
?>
<div class="flex justify-center items-center mt-10">
    <div class="flex flex-col gap-7 bg-[#151C39] items-center px-5 py-6 rounded-3xl outline outline-1 outline-slate-500 lg:flex-row lg:gap-32 lg:px-40">
        <div class="flex gap-5 items-center flex-row lg:flex-col">
            <h1 class="text-lg font-bold text-white">Total Users</h1>
            <span class="bg-[#13E8FB] text-black font-bold p-1 rounded-full text-[10px] px-4"><?php echo $totals; ?></span>
        </div>
        
        <span class="hidden lg:block">
            <svg width="1" height="50" viewBox="0 0 1 151" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="0.5" x2="0.5" y2="151" stroke="white"/>
            </svg>
        </span>

        <div class="flex gap-5 items-center flex-row lg:flex-col">
            <h1 class="text-lg font-bold text-white">Total Time In</h1>
            <span class="bg-[#13E8FB] text-black font-bold p-1 rounded-full text-[10px] px-4"><?php echo $totalt; ?></span>
        </div>

        <span class="hidden lg:block">
            <svg width="1" height="50" viewBox="0 0 1 151" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="0.5" x2="0.5" y2="151" stroke="white"/>
            </svg>
        </span>

        <div class="flex gap-5 items-center flex-row lg:flex-col">
            <h1 class="text-lg font-bold text-white">Total Time Out</h1>
            <span class="bg-[#13E8FB] text-black font-bold p-1 rounded-full text-[10px] px-4"><?php echo $totalto; ?></span>
        </div>
    </div>
</div>

<div class="justify-center  flex flex-col items-center lg:flex-row ">
<img src="../src/qrs.png" alt="" width="500">
<p class="text-sm text-center lg:text-2xl ">Welcome to the admin dashboard of the University of Science & Technology of Southern Philippines. This interface provides an overview of key metrics and functionalities to manage the attendance system effectively.</p>
</div>
<!-- <div class="flex items-center justify-center mt-10">
  <div>
  <div class=budsatd"raddicalrdddandadsdautial-pogokdkres texdkktlage-primary" style="--valudloe:70;" role="progressbar">70%</div>
  </div>es
</div> -->























<!------------------------------------------>


    </div>
    </div>
  </body>
</html>

