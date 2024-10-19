<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('location: ./error');
}
include('db.php');
session_start();
if(isset($_POST['idNumberInput']) && $_POST['PasswordInput']){
$user = $_POST['idNumberInput'];
$pass = $_POST['PasswordInput'];

if($db->selectWithWhere('users ','*','id_number="'.$user.'" AND password="'.$pass.'"')){
$student = $db->selectWithWhere('users ','*','id_number="'.$user.'" AND password="'.$pass.'"')[0];
$Sfullname = $student['full_name'];
$_SESSION['authenticated'] = true;
$_SESSION['id_number'] = $user;
$_SESSION['name'] = $Sfullname;
header('Location: user/dashboard.php');
exit();
}
else if($user == "0000000000" && $pass == "admin123"){
    $_SESSION['logged'] = true;
    $_SESSION['name'] ='Admin Dashboard';
    header('Location: admin/dashboard.php');
    exit(); 
    }
else{
$_SESSION['error'] = 'Wrong Id Number or Password';
header('Location: ./');
exit();
}
}
/*
function g($string, $start, $end) {
    $str = explode($start, $string);
    if (isset($str[1])) {
        $str = explode($end, $str[1]);
        return $str[0];
    }
    return false;
}

function clearCookies() {
    foreach (glob('cookie/*.txt') as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

if (!is_dir('cookie')) {
    mkdir('cookie');
}

$cookie = [
    getcwd() . '/cookie/' . mt_rand() . rand() . '.txt',
];


$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://prisms.ustp.edu.ph/auth/login');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://prisms.ustp.edu.ph';
$headers[] = 'Referer: https://prisms.ustp.edu.ph/auth/login';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie[0]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie[0]);
$response = curl_exec($ch);
$token = g($response, 'name="_token" id="_token" value="', '">');
curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://prisms.ustp.edu.ph/auth/login');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Host: prisms.ustp.edu.ph';
$headers[] = 'Origin: https://prisms.ustp.edu.ph';
$headers[] = 'Referer: https://prisms.ustp.edu.ph/auth/login';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie[0]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie[0]);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_token=' . $token . '&Username=' . $user . '&password=' . $pass . '&remember=0');
$response1 = curl_exec($ch);
curl_close($ch);
if (strpos($response1, 'Welcome To Dashboard!')) {

    $_SESSION['authenticated'] = true;
    $_SESSION['name'] = strtoupper(g($response1, '<span class="username uppercase username-hide-on-mobile">', '</span>'));
    $_SESSION['profile_pic'] = g($response1,'<img alt="" class="img-circle" src="','"/>');
    header('Location: user/dashboard');
    exit();
} else {
    $_SESSION['error'] = 'Wrong username or password';
    header('Location: ./');
    exit();     
}
*/

//clearCookies();

?>
