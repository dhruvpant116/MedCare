<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'medcare');
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select * from login where email='$email' && password='$password'";
$result = mysqli_query($con, $sql);
$name = '';
if ($num = mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['username'];
    }
    $_SESSION['uname'] = $name;
    $_SESSION['email'] = $email;
    // header('location:dashboard.php');
    header('location:patient.php');
}
// $num = mysqli_num_rows($result);
// if ($num == 1) {
//     $_SESSION['uname'] = $num['username'];
//     header('location:home.php');
// }
else {
    echo '<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
    
        $(document).ready(function() {
            swal({
                title: "Login failed",
                text: "Click OK to go to login page",
                icon: "error",
                button: "Ok",
                timer: 5000
            }).then(function(){
                window.location="index.php";
            });
        });
    </script>';
}
?>

