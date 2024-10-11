<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
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
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../script.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Student Profile</title>
</head>

<body class="m-0 bg-zinc-900">
  <div class="flex">
    <ul class="menu bg-base-200 gap-5 h-full w-[20%] flex flex-col items-center justify-center bg-zinc-900 fixed z-50">
      <div class="flex justify-center flex-col items-center gap-3 mt-5">
        <img src="../src/usg.jpg" class="rounded-full w-[100px]">

      </div>
      <li class=" rounded-sm w-full">
        <a href="dashboard" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Homepage">
          <i class="bi bi-house "></i>
          <h1 class="hidden md:block ">Dashboard</h1>
        </a>
      </li>
      <li class="w-full">
        <a href="qrcode" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="QR code">
          <i class="bi bi-qr-code "></i>
          <h1 class="hidden md:block ">QR code for attendance</h1>
        </a>
      </li>
      <li class="bg-gray-800 w-full">
        <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Student Profile">
          <i class="bi bi-person-circle "></i>
          <h1 class="hidden md:block ">Student Profile</h1>
        </a>
      </li>
      <li class="w-full">
        <a href="notification" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Notification">
          <i class="bi bi-bell-fill "></i>
          <h1 class="hidden md:block ">Notification</h1>
        </a>
      </li>
      <li class="w-full">
        <a href="../logout" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Logout">
          <i class="bi bi-box-arrow-left "></i>
          <h1 class="hidden md:block ">Logout</h1>
        </a>
      </li>
    </ul>

    <div class="flex-1 ml-[20%] p-5 w-full h-[90vh] bg-slate-800 lg:h-[100vh]">

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
                <img src="https://scontent.fdvo2-2.fna.fbcdn.net/v/t39.30808-6/438925801_418766657435194_4778425672618341434_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHOGQjRpEhjN9klVGX4APGuP14aeIkorFM_Xhp4iSisU2LeGcoYtfBY1cPZFTYKL263-aoXcVT00gzbBOjCXYN3&_nc_ohc=slox993UngcQ7kNvgE6YXYx&_nc_ht=scontent.fdvo2-2.fna&oh=00_AYBw2UBL0IH7mmBTPcc7vTHkKbAx_Uy0smWfAZR8dZS8_A&oe=665A6420" />
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
      $studentProfile = $db->selectWithWhere('users','*','id_number="'.$_SESSION['id_number'].'"')[0];
      $Sfullname = $studentProfile['full_name'];
      $Semail = $studentProfile['email'];
      $Ssection = $studentProfile['section'];
      $Sid_number = $studentProfile['id_number'];
      $Sdate_registered = $studentProfile['date_registered'];
      ?>
      <!---------------- #Student Profile ---------------------->

      <div class="max-w-sm mx-auto bg-base-100 rounded-lg shadow-lg overflow-hidden mt-[15vh]">

        <div class="bg-primary p-4 text-primary-content text-center">

          <h2 class="text-2xl font-bold">Student Profile</h2>
        </div>
        <div class="p-6">
        <div class="mb-4">
            <label class="block text-base-content font-bold mb-2">ID Number:  </label>
            <p id="fullName" class="text-base-content"><?php echo $Sid_number ?></p>
          </div>
          <div class="mb-4">
            <label class="block text-base-content font-bold mb-2">Full Name: </label>
            <p id="fullName" class="text-base-content"><?php echo $Sfullname ?></p>
          </div>
          <div class="mb-4">
            <label class="block text-base-content font-bold mb-2">Section: </label>
            <p id="section" class="text-base-content"><?php echo $Ssection ?></p>
          </div>
          <div class="mb-4">
            <label class="block text-base-content font-bold mb-2">Email: </label>
            <p id="fullName" class="text-base-content"><?php echo $Semail ?></p>
          </div>
          <div class="mb-4">
            <label class="block text-base-content font-bold mb-2">Date Registered: </label>
            <p id="fullName" class="text-base-content"><?php echo $Sdate_registered ?></p>
          </div>
          <div class="mb-4">

        </div>
      </div>
    </div>
  </div>
</body>
<!---------------- #Student Profile ---------------------->
</body>

</html>
<script>
  document.getElementById('editDob').addEventListener('change', function() {
    const dob = new Date(this.value);
    const now = new Date();
    let age = now.getFullYear() - dob.getFullYear();
    const m = now.getMonth() - dob.getMonth();
    if (m < 0 || (m === 0 && now.getDate() < dob.getDate())) {
      age--;
    }
  });
</script>