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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Qr Scanner</title>
  </head>
  <body class="m-0 bg-zinc-900">
    <div class="flex">
    <ul class="menu bg-base-200 gap-5 h-full w-[20%] flex flex-col items-center justify-center bg-zinc-900 fixed z-50">
        <div class="flex justify-center flex-col items-center gap-3 mt-5">
          <img src="../src/usg.jpg" class="rounded-full w-[100px]">
          
        </div>
        <li class="rounded-sm w-full">
          <a href="./dashboard" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Dashboard">
            <i class="bi bi-house "></i><h1 class="hidden md:block ">Dashboard</h1>
          </a>
        </li>
        <li class="bg-gray-800  w-full">
          <a class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="QR code">
            <i class="bi bi-qr-code "></i><h1 class="hidden md:block ">Qr Code Scanner</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="./attendance" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Attendance">
            <i class="bi bi-file-earmark-check-fill "></i><h1 class="hidden md:block ">View Attendance</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="./manage" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Student Profile">
            <i class="bi bi-person-circle "></i><h1 class="hidden md:block ">Manage User</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="./notification" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Notification">
            <i class="bi bi-bell-fill "></i><h1 class="hidden md:block ">Manage Notification</h1>
          </a>
        </li>
        <li class="w-full">
          <a href="../logout.php" class="tooltip tooltip-right flex items-center justify-center md:justify-start gap-2" data-tip="Logout">
            <i class="bi bi-box-arrow-left "></i><h1 class="hidden md:block ">Logout</h1>
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
<h1 class="text-[20px] text-center mt-10 font-bold ">Attendance QR Scanner</h1>
<div class="flex flex-col mt-5 items-center justify-center text-center">
    <div id="result" class="text-center mb-5"></div>
    <div class="mb-5">
        <button id="timeInButton" class="btn btn-success">Time In</button>
        <button id="timeOutButton" class="btn btn-info">Time Out</button>
    </div>
    <main id="scannerContainer" class="flex justify-center items-center w-[30vh] lg:w-[50vh] hidden">
        <div id="reader" class="w-[50vh]"></div>
    </main>
</div>

<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
<script>
    const scanner = new Html5QrcodeScanner('reader', {
        qrbox: {
            width: 150,
            height: 150,
        },
        fps: 30,
    });

    let lastResult = ''; // To store the last scanned result
    let action = 'timeIn'; // Default action

    document.getElementById('timeInButton').addEventListener('click', () => {
        action = 'timeIn';
        document.getElementById('scannerContainer').classList.remove('hidden');
        scanner.render(success, error);
        console.log('Time In button clicked');
    });

    document.getElementById('timeOutButton').addEventListener('click', () => {
        action = 'timeOut';
        document.getElementById('scannerContainer').classList.remove('hidden');
        scanner.render(success, error);
        console.log('Time Out button clicked');
    });

    function success(result) {
        if (result === lastResult) {
            document.getElementById('result').innerHTML = `
                <div class="alert alert-info">
                    <span>Already Recorded!<br>${result} - ${action}</span>
                </div>
            `;
            return;
        }

        lastResult = result; // Update last scanned result

        document.getElementById('result').innerHTML = `
            <div class="alert alert-success">
                <span>Recorded Successfully!<br>${result} - ${action}</span>
            </div>
        `;

        // Send scanned data to attend.php via AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'attend.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Response from PHP script
            }
        };

        // Change the key based on the action
        let key = action === 'timeIn' ? 'time_in' : 'time_out';
        xhr.send(key + '=' + encodeURIComponent(result));
    }

    function error(err) {
        console.error(err);
    }
</script>


        
               </div>
            
               
    </div>
  </body>
</html>
