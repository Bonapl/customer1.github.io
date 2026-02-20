<?php
include "config.php";
$message = "";

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname, password)
            VALUES ('$fullname', '$password')";
    if (mysqli_query($conn, $sql)) {
        $message = "✅ ចុះឈ្មោះបានជោគជ័យ";
    } else {
        $message = "❌ ឈ្មោះរបស់អ្នកមិនត្រឹមត្រូវ ឬមានគណនីយរួចហើយ";
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
        <h2>បង្កើតគណនីរបស់អ្នក</h2>
        <p class="msg"><?php echo $message; ?></p>
        <form method="post">
            <input type="text" name="fullname" placeholder="បញ្ចូលឈ្មោះ" required>
            <input type="password" name="password" placeholder="ពាក្យសម្ងាត់" required>
            <button name="register">រក្សាទុក</button>
        </form>
        <p>ខ្ញុំមានគណនីយរួចរាល់ហើយ，<a href="index.php">ចូលប្រព័ន្ធ</a></p>
    </div>
</body>

</html>