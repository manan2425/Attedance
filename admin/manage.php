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
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="script.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Manage User</title>
</head>

<body class="m-0 bg-zinc-900">
  <div class="flex">
    <ul class="menu bg-base-200 gap-5 h-full w-[20%] flex flex-col items-center justify-center bg-zinc-900 fixed z-50">
      <div class="flex justify-center flex-col items-center gap-3 mt-5">
        <img src="../src/usg.jpg" class="rounded-full w-[100px]">

      </div>
      <li class="rounded-sm w-full">
        <a href="./dashboard.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Dashboard">
          <i class="bi bi-house "></i>
          <h1 class="hidden md:block ">Dashboard</h1>
        </a>
      </li>
      <li class="w-full">
        <a href="./qrcode.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="QR code">
          <i class="bi bi-qr-code "></i>
          <h1 class="hidden md:block ">Qr Code Scanner</h1>
        </a>
      </li>
      <li class="w-full">
        <a href="./attendance.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Attendance">
          <i class="bi bi-file-earmark-check-fill "></i>
          <h1 class="hidden md:block ">View Attendance</h1>
        </a>
      </li>
      <li class="bg-gray-800 w-full">
        <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Student Profile">
          <i class="bi bi-person-circle "></i>
          <h1 class="hidden md:block ">Manage User</h1>
        </a>
      </li>
      <li class="w-full">
        <a href="./notification.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Notification">
          <i class="bi bi-bell-fill "></i>
          <h1 class="hidden md:block ">Manage Notification</h1>
        </a>
      </li>
      <li class="w-full">
        <a href="../logout.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Logout">
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
              <li><a>Logout</a></li>
            </ul>
          </div>
        </div>

      </div>
      <!------------------------------------------>
      <!---------------- #Quick Acces ---------------------->
      <div class="overflow-x-auto mt-10">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th>Student ID</th>
              <th>Full Name</th>
              <th>ID Number</th>
              <th>Course & Section</th>
              <th>Email</th>
              <th>Date Registered</th>
            </tr>
          </thead>
          <tbody>
          <?php
        include '../db.php';
        $student = $db->selectWithWhere('users ', '*', '');
        foreach ($student as $a) {
        ?>
          <tr>
            <th><?php echo $a['user_id']; ?></th>
            <td><?php echo $a['full_name']; ?></td>
            <td><?php echo $a['id_number']; ?></td>
            <td><?php echo $a['section']; ?></td>
            <td><?php echo $a['email']; ?></td>
            <td><?php echo $a['date_registered']; ?></td>
            <td><button onclick="confirmDelete(<?php echo $a['user_id']; ?>)"><i class="bi bi-trash3"></i></button></td>
          </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal dialog -->
<dialog id="my_modal_3" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="font-bold text-lg text-center">Are You Sure?</h3>
    <div class="flex justify-center items-center gap-5 mt-10">
      <button id="deleteBtnYes" class="btn btn-success w-20">YES</button>
      <button id="deleteBtnNo" class="btn btn-error  w-20">NO</button>
    </div>
  </div>
</dialog>

<script>
function confirmDelete(studentId) {
  var modal = document.getElementById('my_modal_3');
  modal.showModal();

  document.getElementById('deleteBtnYes').addEventListener('click', function() {
    // Redirect to delete.php with the student ID as a query parameter
    window.location.href = 'delete.php?id=' + encodeURIComponent(studentId);
  });

  document.getElementById('deleteBtnNo').addEventListener('click', function() {
    modal.close();
  });
}
</script>


      <!---------------- #Quick Acces ---------------------->








    </div>


  </div>
</body>

</html>