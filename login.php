<?php include "connection.php"; ?>

<?php include ('components/header.php')?>
<?php

if(isset($_SESSION['login']) == true){
    return header('location: dashboard.php');
}

if(isset($_POST['submit']) && $_POST['submit'] == 'login'){
    $email = $_POST['email'];
    $password = $_POST['password']; //
    $encrypted_pass =  md5($password);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$encrypted_pass'";

    $data = $connection->query($sql);

   if($data->num_rows > 0){
       $_SESSION['login'] = true;
       return header('location: dashboard.php');
   }
   $_SESSION['login_error_msg'] = 'authentication credentials does not matched';
   return header('location: login.php');
}
?>
<div class="col-md-6 m-auto pt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="cart-title text-uppercase text-center h1">Login</h1>
        </div>
        <div class="card-body">
            <form action="login.php" method="post">
                <?php if(isset($_SESSION['login_error_msg'])){ ?>
                    <p class="alert alert-danger pt-2"><?php echo $_SESSION['login_error_msg']; ?></p>
                <?php } ?>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="submit" value="login" class="btn btn-info btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include ('components/footer.php')?>
