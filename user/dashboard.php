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
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Homepage">
            <i class="bi bi-house "></i><h1 class="hidden md:block ">Dashboard</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="qrcode.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="QR code">
            <i class="bi bi-qr-code "></i><h1 class="hidden md:block ">QR code for attendance</h1>
          </a>
        </li>
       
        <li class="w-full">
          <a  href="profile.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Student Profile">
            <i class="bi bi-person-circle "></i><h1 class="hidden md:block ">Student Profile</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="notification.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Notification">
            <i class="bi bi-bell-fill "></i><h1 class="hidden md:block ">Notification</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="../logout.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Logout">
            <i class="bi bi-box-arrow-left "></i><h1 class="hidden md:block ">Logout</h1>
          </a>
        </li>
      </ul>
      
      <div class="flex-1 ml-[20%] p-5 w-full h-full bg-slate-800">
        
        <!-----------------navbar------------------>

        <div class="navbar bg-base-100">
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
                <li><a href="../logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
          
        </div>
<!------------------------------------------>
<div role="alert" class="alert alert-info mt-10">
  <span>Welcome, <?php echo $_SESSION['name']; ?></span>
</div>
<!-- #Quick Acces -->
<h1 class="text-[2rem] text-center mt-10 font-bold">Quick Access</h1>
<div class="flex flex-col mt-10 items-center justify-center text-center gap-10 lg:flex-row">

<a href="./qrcode.php" class="card w-96 h-[192px] bg-base-100 shadow-xl image-full">
  <figure><img src="../src/image-qr-code.webp" /></figure>
  <div class="card-body">
    <h2 class="card-title">QR CODE</h2>
    <p>A QR code for student verification is a digital solution used to streamline and secure the process of verifying student identities.</p>
    <div class="card-actions justify-end">
    </div>
  </div>
</a>

<!-- CLICK ATTENANCE MODAL -->
<a onclick="attandance.showModal()" class="card w-96 h-[192px] bg-base-100 shadow-xl image-full cursor-pointer">



  <figure><img src="../src/attendance.jpg" /></figure>
  <div class="card-body">
    <h2 class="card-title">VIEW ALL ATTENDANCE</h2>
    <p>Attendance refers to the act of being present at a designated place during a specified time.</p>
    <div class="card-actions justify-end">
    </div>
  </div>
</a>
<!-- #Quick Acces -->
       </div>
       <div class="flex flex-col mt-10 items-center justify-center text-center gap-10 lg:flex-row">

      
        <!-- #Quick Acces -->
        
               </div>
               <footer class="footer footer-center p-4 bg-base-300 text-base-content mt-40">
                <aside>
                  <p>Copyright © 2024 - WAla ko kabalo ani</p>
                </aside>
              </footer>
               
    </div>


<!-- Modal for Attendance -->
    <dialog id="attandance" class="modal">
  <div class="modal-box">
  <div class="overflow-x-auto mt-10">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Full Name</th>
        <th>ID Number</th>
        <th>Course & Section</th>
        <th>Date & Time In</th>
        <th>Date & Time Out</th>
      </tr>
    </thead>
    <tbody>
        <?php 
       include '../db.php';
      $idnumberrrrrrrrrrr = $_SESSION['id_number'];
       $student = $db->selectWithWhere('record','*','id_number= "'.$idnumberrrrrrrrrrr.'"');
       foreach($student as $a){
        ?>
        <tr>
        <th><?php echo $a['user_id']; ?></th>
        <td><?php echo $a['full_name']; ?></td>
        <td><?php echo $a['id_number']; ?></td>
        <td><?php echo $a['section']; ?></td>
        <td><?php echo date("F j Y h:i:s A", strtotime($a['time_in'])); ?></td>
        <td><?php
        if(isset($a['time_out']))
        echo date("F j Y h:i:s A", strtotime($a['time_out']));
        else
        echo "Not Yet recorded";
        ?></td>
        <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
    <div class="modal-action">
      <form method="dialog">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn">Close</button>
      </form>
    </div>
  </div>
</dialog>

<!-- Modal for Attendance -->




  </body>
</html>

