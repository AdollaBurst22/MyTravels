<!-- Add User Starts  -->
<?php


if(isset($_SESSION['expire'])){
    $diff = time() - $_SESSION['expire'];
    if($diff > 3){
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['success']);
        unset($_SESSION['fail']);
        unset($_SESSION['expire']);

    }
}

?>




<div class="col-md-9">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">New User</li>
    </ol>
    </nav>
    <?php

    if(isset($_SESSION['success'])){   ?>

    <div class="alert alert-success col-md-8 offset-2" role="alert">
    <?php   echo $_SESSION['success'];   ?>
    </div>

    <?php
    }

    ?>
    <?php

    if(isset($_SESSION['fail'])){   ?>

    <div class="alert alert-danger col-md-8 offset-2" role="alert">
    <?php   echo $_SESSION['fail'];   ?>
    </div>

    <?php
    }

    ?>

    <div class="col-md-8 offset-2 bg-dark mt-5 rounded">
        <h2 class="addUser-header p-4 text-white"> <i class="fa-solid fa-square-plus"></i> Add New User</h2>
        
        <form class="row g-3" action="../../controllers/userController.php" method="post">
            <div class="row px-4 pt-4 pb-2">               
                <label for="username" class="form-label text-white col-md-4"> Username :</label>
                <div class="col-md-8">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    <?php
                    if(isset($_SESSION['username'])){ ?>
                        <p class="text-danger">
                            <?php  echo $_SESSION['username'];   ?>
                        </p>
                        
                    <?php
                    }
                    ?>

                </div>
            </div>

            <div class="row px-4 pt-4 pb-2">               
                <label for="email" class="form-label text-white col-md-4"> Email :</label>
                <div class="col-md-8">
                    <input type="email" name="email" class="form-control" id="username" placeholder="@gmail.com">
                    <?php
                    if(isset($_SESSION['email'])){ ?>
                        <p class="text-danger">
                            <?php  echo $_SESSION['email'];   ?>
                        </p>
                        
                    <?php
                    }
                    ?>
                
                </div>
                
            </div>
            <div class="row px-4 pt-4 pb-2">               
                <label for="password" class="form-label text-white col-md-4"> Password :</label>
                <div class="col-md-8">
                    <input type="password" name="password" class="form-control" id="username" placeholder="********">
                    <?php
                    if(isset($_SESSION['password'])){ ?>
                        <p class="text-danger">
                            <?php  echo $_SESSION['password'];   ?>
                        </p>
                        
                    <?php
                    }
                    ?>
                
                </div>
                
            </div>
            <input type="hidden" name="action" value="adduser">
            
            <div class="col-md-8 offset-4 pb-5">
                <button type="submit" class="btn btn-outline-success mx-2"> <i class="fa-regular fa-circle-check"></i> Save</button>
                <button type="reset" class="btn btn-outline-danger mx-2"> <i class="fa-regular fa-circle-xmark"></i> Reset</button>
            </div>
        </form>
    </div>

</div>





<!-- Add User Starts  -->
