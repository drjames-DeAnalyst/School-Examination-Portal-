<?php include "../config/db.php"; ?>

<?php
if(isset($_POST['register'])){
    if($_POST['captcha'] != $_SESSION['captcha']){
        $msg = "Invalid CAPTCHA";
    } else {
        $password = $_POST['password'];

        if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&]).{8,}$/",$password)){
            $msg = "Weak password";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO admins(full_name,email,password) VALUES(?,?,?)");
            $stmt->bind_param("sss",$_POST['name'],$_POST['email'],$hash);
            $stmt->execute();
            $msg = "Admin registered successfully";
        }
    }
}
?>

<form method="post">
<h2>Admin Register</h2>
<input type="text" name="name" placeholder="Full Name" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="password" placeholder="Password" required><br>
CAPTCHA: <?php include "captcha.php"; ?><br>
<input type="text" name="captcha" placeholder="Enter CAPTCHA"><br>
<button name="register">Register</button>
<p><?= $msg ?? "" ?></p>
</form>