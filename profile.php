<?php include "connection.php"; ?>

<?php include ('components/header.php')?>
<?php
if(isset($_SESSION['login']) == false){
    return header('location: login.php');
}

if(isset($_POST['update']) && $_POST['update'] == 'update'){
    $user_id = $_SESSION['login_user'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $avatar = $_FILES['avatar'];

    $ext = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);

    $avatar_name = "storage/".time()."_".$_SESSION['login_user'].".$ext";
    $avatar_size = $avatar['size'];
    $avatar_tmp = $avatar['tmp_name'];

    move_uploaded_file($avatar_tmp,$avatar_name);

    unlink($user_data['avatar']);

    $user_update_sql = "UPDATE users SET name = '$name', email = '$email', avatar = '$avatar_name' WHERE id = '$user_id'";

    $connection->query($user_update_sql);

    return header('location: profile.php');
}

?>
<div class="col-md-6 m-auto pt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Profile</h2>
        </div>
        <div class="card-body">
            <form action="profile.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input value="<?php echo $user_data['name'] ?>" name="name" type="text" placeholder="Name" class="form-control">
                </div>
                <div class="form-group">
                    <input value="<?php echo $user_data['email'];?>" name="email" type="text" placeholder="E-mail" class="form-control">
                </div>
                <div class="form-group">
                    <input type="file" name="avatar">
                </div>
                <div class="form-group text-center">
                    <input name="update" value="update" type="submit" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ('components/footer.php')?>
