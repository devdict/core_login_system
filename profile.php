<?php include "connection.php"; ?>

<?php include ('components/header.php')?>
<?php
if(isset($_SESSION['login']) == false){
    return header('location: login.php');
}
?>
<div class="col-md-6 m-auto pt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Profile</h2>
        </div>
        <div class="card-body">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab facilis fugit incidunt labore neque quasi quos, sit! Ab aliquam, aperiam consequatur cumque debitis dignissimos ducimus fugiat, fugit, ipsa laboriosam nam officia quod quos sequi sint sunt ullam. Ad alias aliquam aliquid asperiores, aspernatur assumenda beatae cumque delectus dignissimos dolorem eaque earum error esse est et ex fugiat fugit, harum illo incidunt minima nam numquam officiis optio pariatur quaerat quam ratione reprehenderit sed sequi sunt voluptates voluptatibus voluptatum. Animi atque dicta earum eveniet expedita facere iure magnam maiores minima molestias non perferendis quo repellat repudiandae sapiente unde ut voluptas, voluptate voluptatibus.
            </p>
        </div>
    </div>
</div>
<?php include ('components/footer.php')?>
