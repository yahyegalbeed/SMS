<?php 
session_start();
include 'admin/includes/connect.php';

if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM users WHERE email='$email' and password='$pass' and status=0";
    $q = mysqli_query($conn, $sql);
    if ($q->num_rows > 0) {
        $row = mysqli_fetch_assoc($q);
        $_SESSION['userID'] = $row['name'];

        header('location: admin/dashboard.php');
    } else {
        echo "<script>alert('incorrect credentails'); location='index.php'</script>";
    }
}
