<?php
include "header.php";
session_start();

if(isset($_SESSION['check-user'])){
    header("location: ./admin.php");
}

if(isset($_SESSION['expire'])){
    $diff= time() - $_SESSION['expire'];
    if($diff>3){
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['expire']);
    }
}

?>

<div class="container">
    <div class="col-md-8 offset-2 bg-dark rounded mt-5">
        <h2 class="text-white pt-4 pb-3 px-3"> <i class="fa-solid fa-right-to-bracket"></i> Please Login! </h2>

        <form class="row g-3" action="../../controllers/loginController.php" method="POST">
            <div class="row py-4 px-4">
                <div class="col-md-4">
                    <label for="email" class="form-label text-white"> Email :</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="email" class="form-control" id="email" placeholder="@gmail.com">
                    <?php
                    if(isset($_SESSION['email'])){  ?>
                        <p class="text-danger"> <?php echo $_SESSION['email']; ?></p>
                    <?php
                    }

                    ?>
                </div>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-4">
                    <label for="password" class="form-label text-white"> Password :</label>
                </div>
                <div class="col-md-8">
                    <input type="password" name="password" class="form-control" id="password" placeholder="*******">
                    
                    <?php
                    if(isset($_SESSION['password'])){  ?>
                        <p class="text-danger"> <?php echo $_SESSION['password']; ?> </p>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="col-md-8 offset-4 pb-5">
                <button type="submit" class="btn btn-outline-success mx-2"> <i class="fa-solid fa-right-to-bracket"></i> Login</button>
                <button type="reset" class="btn btn-outline-danger mx-2"> <i class="fa-solid fa-eraser"></i> Reset</button>
            </div>
        </form>

    </div>
</div>


<?php
include "footer.php";