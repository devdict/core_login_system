
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<?php
if(isset($_SESSION['login'])){
    $user_id = $_SESSION['login_user'];
    $user_query = "SELECT * FROM users WHERE id = '$user_id'";
    $user_data = $connection->query($user_query)->fetch_assoc();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand text-uppercase" href="dashboard.php">Authentication System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['login']) == false){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <img src="<?php echo $user_data['avatar']; ?>" style="width: 35px; height: 35px !important;" class="img-fluid rounded-circle" alt="AVATAR">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <?php if(isset($_SESSION['msg'])){ ?>
            <div class="col-12">
                <p class="alert alert-<?php echo $_SESSION['msg_color'] ?? ''; ?>"><?php echo $_SESSION['msg'] ?? '' ?></p>
            </div>
        <?php } ?>
