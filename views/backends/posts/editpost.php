<?php

if(isset($_SESSION['expire'])){
    $diff=time() - $_SESSION['expire'];
    if($diff>3){
        unset($_SESSION['title']);
        unset($_SESSION['description']);
        unset($_SESSION['image']);
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
        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
    </ol>
    </nav>

    <?php
    if(isset($_SESSION['success'])){  ?>
        <div class="col-md-8 offset-2 mt-5">
            <div class="alert alert-success" role="alert">
                <?php   echo $_SESSION['success'];   ?>
            </div>
        </div>
    <?php
    }
    ?>

    <?php
        if(isset($_SESSION['fail'])){  ?>
            <div class="col-md-8 offset-2 mt-5">
                <div class="alert alert-danger" role="alert">
                    <?php   echo $_SESSION['fail'];   ?>
                </div>
            </div>
        <?php
    }
    ?>

    <div class="col-md-8 offset-2 bg-dark rounded">
        <h2 class="text-white py-3 px-2"> <i class="fa-solid fa-pen-to-square"></i> Edit Post</h2>
        <form class="row g-3" action="../../controllers/postController.php" method="POST" enctype="multipart/form-data">
            <div class="row py-4 px-4">
                <div class="col-md-4">
                    <label for="title" class="form-label text-white"> Title :</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="title" class="form-control" id="title" value="<?php  echo $post_data['title']; ?>">
                <?php  
                if(isset($_SESSION['title'])){  ?>

                <p class="text-danger"> <?php  echo $_SESSION['title']; ?> </p>    
                <?php
                }

                ?>
                </div>
            </div>
            <div class="row py-4 px-4">
                <div class="col-md-4">
                    <label for="description" class="form-label text-white"> Description :</label>
                </div>
                <div class="col-md-8">
                    <textarea name="description" id="description" class="form-control" cols="30" rows="5"> <?php  echo $post_data['description']; ?> </textarea>
                    <?php  
                    if(isset($_SESSION['description'])){  ?>

                    <p class="text-danger"> <?php  echo $_SESSION['description']; ?> </p>    
                    <?php
                    }

                    ?>
                </div>
            </div>
            <div class="row pt-4 pb-2 px-4">
                <div class="col-md-4">
                    <label for="image" class="form-label text-white"> Image :</label>
                </div>
                <div class="col-md-8">
                    <input type="file" name="image" class="form-control" id="image">
                    <?php  
                    if(isset($_SESSION['image'])){  ?>

                    <p class="text-danger"> <?php  echo $_SESSION['image']; ?> </p>    
                    <?php
                    }

                    ?>
                </div>
            </div>
            
            <input type="hidden" name="action" value="editpost">
            <input type="hidden" name="postId" value="<?php  echo $_GET['id']; ?>">
            
            <div class="col-md-8 offset-4 pb-5">
                <button type="submit" class="btn btn-outline-success mx-2"> <i class="fa-solid fa-circle-check"></i> Update</button>
                <button type="reset" class="btn btn-outline-danger mx-2"> <i class="fa-solid fa-eraser"></i> Reset</button>
            </div>
        </form>
    </div>
</div>



<?php