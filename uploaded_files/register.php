<?php
include '../components/connect.php';
//this is the second step

$warning_msg =[];
$success_msg = [];
$error_msg = [];

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id ='';
}
if(isset($_POST['submit'])){
    $id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $pass =  sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $c_pass =  sha1($_POST['c_pass']);
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

    $select_email = $conn->prepare("select * FROM `users` WHERE email = ?");
    $select_email->execute([$email]);
//if its not working double check if you added a  users table in phpmyadmin 
    if($select_email->rowCount() > 0){
        $warning_msg[] = 'email already taken!';
    }else{
        if($pass != $c_pass){
            $warning_msg[] = 'Passwords do not match';
        }else{
            $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
            $insert_success = $insert_user->execute([$id, $name,$number,  $email, $c_pass,]);

            if($insert_success){
                $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
                $verify_user->execute([$email, $c_pass]);
                $row = $verify_user->fetch(PDO::FETCH_ASSOC);
                var_dump($email, $c_pass, $row);

                if($verify_user->rowCount() > 0){
                    setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
                    header('location:home.php');

                }else{
                    $error_msg[] = 'something went wrong!';
                }
            }
        }
        
    }
}
// if the mysql server keeps failing you have to delete the data files except for ibdata and copy the files from the backup
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include'../components/user_header.php'; ?>
   <!-- Resgister section start-->
   <section class="form-container">
    <form action="" method="POST">
        <h3>Create an account</h3>
        <input type="text" name="name" required maxlength="50"
        placeholder="enter your name" class="box">

        <input type="email" name="email" required maxlength="50"
        placeholder="enter your email" class="box">

        <input type="number" name="number" required maxlength="50"
        placeholder="enter your number" min="0" max="99999999999" maxlength="11"class="box">

        <input type="password" name="pass" required maxlength="50"
        placeholder="enter your password" class="box">

        <input type="password" name="c_pass" required maxlength="50"
        placeholder="confirm your password" class="box">

        <p>already have an account? <a href="login.php">Login here</a></p>
        <input type="submit" value="register new " name="submit" class="btn">
    </form>
   </section>




    <?php include '../components/footer.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="../js/script.js">
    
</script>
<?php include '../components/message.php' ?>
</body>
</html>