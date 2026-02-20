<?php
session_start();
include "config.php";

$error = "";

if (isset($_POST['login'])) {
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE fullname='$fullname'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "❌ ពាក្យសម្ងាត់មិនត្រឹមត្រូវ";
        }
    } else {
        $error = "❌  ឈ្មោះរបស់អ្នកមិនត្រឹមត្រូវ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <i class="fa-solid fa-user"></i>
        <h2>ចូលប្រព័ន្ធ</h2>
        <p class="msg"><?php echo $error; ?></p>
        <form method="post">
            <input type="text" name="fullname" placeholder="បញ្ចូលឈ្មោះ" required>
            <input type="password" name="password" placeholder="ពាក្យសម្ងាត់" required>
            <button name="login">យល់ព្រម</button>
        </form>
        <p>តើអ្នកមិនទាន់មានគណនីទេឬ?,<a href="register.php">ចុះឈ្មោះ</a></p>
    </div>
</body>

</html>