<?php
session_start();
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
  header("location: user/dashboard");
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./src/icon.png" type="image/png">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="script.js" defer></script>
</head>

<body class="m-0 font-mono bg-slate-900">
  <div class="flex flex-col justify-center items-center m-auto h-[90vh] lg:h-[100vh]">
    <form class="flex gap-2 flex-col justify-center items-center bg-slate-800 text-center p-8 rounded-3xl" method="POST" action="auth">
      <?php if (isset($_SESSION['error'])) { ?>
        <div role="alert" class="alert alert-error text-center">
          <span><?php echo $_SESSION['error']; ?></span>
        </div>
      <?php session_destroy();} ?>
      <?php if (isset($_SESSION['success'])) { ?>
        <div role="alert" class="alert alert-success text-center">
          <span><?php echo $_SESSION['success']; ?></span>
        </div>
      <?php session_destroy();} ?>
      <img src="src/usg.jpg" class="rounded-full w-24 h-24">
      <p class="text-white">Please Login to your Account.</p>
      <label class="input input-bordered flex items-center gap-2 w-full">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
        </svg>
        <input type="text" name="idNumberInput" class="grow bg-transparent text-gray-900  text-white placeholder-gray-500 placeholder-gray-400" placeholder="ID Number" maxlength="10" minlength="10" id="idNumberInput" required autocomplete="off"  />
      </label>
     <label class="input input-bordered flex items-center gap-2 w-full">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
            <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
        </svg>
        <input type="password" name="PasswordInput" id="PasswordInput" class="grow bg-transparent text-gray-900 text-white placeholder-gray-500 placeholder-gray-400" placeholder="●●●●●●●●●●●" required />
    </label>
    <div class="show-password-container">
        <input type="checkbox" id="showPassword"> Show Password
    </div>

    <script>
        const passwordInput = document.getElementById('PasswordInput');
        const showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
    
       <style>
        .show-password-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
      <div>
      <button type="submit" class="btn btn-active  w-[8rem]">Login</button>
      </form>
      <!-- Open the modal using ID.showModal() method -->
<button class="btn btn-outline w-[8rem] " onclick="my_modal_1.showModal()">Register</button>
<dialog id="my_modal_1" class="modal">
  <div class="modal-box">
    <form class="gap-3 flex flex-col" action="./information" method="POST">
    <h3 class="font-bold text-lg">Register!</h3>
    <label class="input input-bordered flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
  <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
  <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
</svg>
      <input type="text" class="grow" placeholder="Full Name" name="fullname" required />
    </label>
    <label class="input input-bordered flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
      <input type="text" class="grow" placeholder="ID Number" name="idnumber" maxlength="10" minlength="10" required />
    </label> 
    <label class="input input-bordered flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-blockquote-right" viewBox="0 0 16 16">
  <path d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1zm10.113-5.373a7 7 0 0 0-.445-.275l.21-.352q.183.111.452.287.27.176.51.428.234.246.398.562.164.31.164.692 0 .54-.216.873-.217.328-.721.328-.322 0-.504-.211a.7.7 0 0 1-.188-.463q0-.345.211-.521.205-.182.569-.182h.281a1.7 1.7 0 0 0-.123-.498 1.4 1.4 0 0 0-.252-.37 2 2 0 0 0-.346-.298m-2.168 0A7 7 0 0 0 10 6.352L10.21 6q.183.111.452.287.27.176.51.428.234.246.398.562.164.31.164.692 0 .54-.216.873-.217.328-.721.328-.322 0-.504-.211a.7.7 0 0 1-.188-.463q0-.345.211-.521.206-.182.569-.182h.281a1.8 1.8 0 0 0-.117-.492 1.4 1.4 0 0 0-.258-.375 2 2 0 0 0-.346-.3z"/>
</svg>
      <input type="Section" class="grow" placeholder="Section" name="section" required />
    </label> 
    <label class="input input-bordered flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" /><path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" /></svg>
      <input type="email" class="grow" placeholder="Email" name="email" required />
    </label>
    <label class="input input-bordered flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
      <input type="password" class="grow" name="password" placeholder="●●●●●●●●●●●" required />
    </label>
    <button class="btn btn-active" type="submit">Register</button>
  </form>
    <div class="modal-action">
      <form method="dialog">
        <!-- if there is a button in form, it will close the modal -->
        <button class="">Close</button>
      </form>
    </div>
  </div>
</dialog>
    </div>
  </div>
</dialog>
    </div>
    </form>
  </div>
</body>
</html>
