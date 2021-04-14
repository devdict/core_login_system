<?php
include ('connection.php');
if(isset($_POST['submit']) AND $_POST['submit'] == 'register'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $submitable = true;

    //Name validation
    if($name == ''){
        $name_error = 'Name field is required';
    }elseif(strlen($name) < 3){
        $name_error = 'Name should be greater than three chracters';
    }

    //E-mail validation
    $email_check = $connection->query("SELECT * FROM users WHERE email = '$email'");
//    print_r($email_check);
    if($email == ''){
        $email_error = 'E-mail field is required';
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error = 'Invalid email';
    }elseif($email_check->num_rows > 0){
        $email_error = 'E-mail already exists';
    }

    //password validation

    if($password == ''){
        $password_error = 'Password field is required';
    }elseif(strlen($password) < 6){
        $password_error = 'Password must be greater than six character';
    }elseif($password != $confirm_password){
        $confirm_password_error = 'Password does not matched';
    }


    if($submitable){

        $encryp_pass = md5($password);

        $sql = "INSERT INTO users (name,email,password) values ('$name','$email','$encryp_pass')";

        $connection->query($sql);
    }

    $name = $email = $password = $confirm_password = '';
}

?>
<?php include('components/header.php') ?>
<div class="col-md-6 m-auto pt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-uppercase text-center m-0 card-title">Signup</h1>
        </div>
        <div class="card-body">
            <form action="register.php" method="post">
                <div class="form-group">
                    <input type="text" name="name" placeholder="name" class="form-control" value="<?php echo $name ?? '' ?>">
                    <small class="text-danger"><?php  echo $name_error ?? '' ?></small>
                </div>
                <div class="form-group">
                    <input type="text" name="email" placeholder="email" class="form-control" value="<?php echo $email ?? '' ?>">
                    <small class="text-danger"><?php  echo $email_error ?? '' ?></small>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="password" class="form-control" value="<?php echo $password ?? '' ?>">
                    <small class="text-danger"><?php  echo $password_error ?? '' ?></small>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" placeholder="confirm password" class="form-control" value="<?php echo $confirm_password ?? '' ?>">
                    <small class="text-danger"><?php  echo $confirm_password_error ?? '' ?></small>
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="submit" value="register" class="btn btn-info btn-lg">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ('components/footer.php')?>