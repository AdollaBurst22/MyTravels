
<?php   


    if(isset($_SESSION['expire'])){
        $diff = time() - $_SESSION['expire'];
        if($diff > 3){
            unset($_SESSION['success']);
            unset($_SESSION['expire']);
        }
    }


    ?>

<div class="col-md-9">

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
    </nav>

    <?php   
    if(isset($_SESSION['success'])){  ?>
    
    <div class="alert alert-success col-md-8 offset-2 pt-2" role="alert">
        <?php echo $_SESSION['success']; ?>
    </div>
    <?php
    }

    ?>
    <?php   
    if(isset($_SESSION['fail'])){  ?>
    
    <div class="alert alert-danger col-md-8 offset-2 pt-2" role="alert">
        <?php echo $_SESSION['fail']; ?>
    </div>
    <?php
    }

    ?>


    <div class="col-md-8 offset-2 mt-5">
        <h2 class="pb-4"> <i class="fa-solid fa-users"></i> User List</h2>
            <table class= "table">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    
                </thead>
                <tbody>
                   <?php    
                    $no = 1;
                    foreach($userListData as $data){  ?>
                    <tr>
                        <th> <?php echo $no; ?> </th>
                        <th> <?php  echo $data['username']; ?>   </th>
                        <th> <?php  echo $data['email']; ?>   </th>
                        <th>
                            <a href="./admin.php?page=edituser&id=<?php echo $data['id'];  ?>" class="text-success px-1"> <i class="fa-solid fa-user-pen"></i> </a>
                            <a href="./admin.php?page=deleteuser&id=<?php echo $data['id'];  ?>" class="text-danger px-1"> <i class="fa-solid fa-user-xmark"></i> </a>
                        </th>
                    </tr>
                    <?php
                    $no++;
                    }

                    ?>
                </tbody>
            </table>


    </div>






</div>