<?php
if(isset($_SESSION['expire'])){
    $diff=time() - $_SESSION['expire'];
    if($diff>3){
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
        <li class="breadcrumb-item active" aria-current="page">Posts</li>
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

    <div class="col-md-8 offset-2">
        <h2 class="mt-5 mb-3"> <i class="fa-solid fa-list-ul"></i> Post List</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th> #</th>
                    <th> Title</th>
                    <th> Description</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($postdata as $data){ ?>
                <tr>
                    <th> <?php echo $no;  ?> </th>
                    <th> <?php echo $data['title'];  ?> </th>
                    <th> <?php echo $data['description'];  ?> </th>
                    <th>
                        <a href="./admin.php?page=editpost&id=<?php  echo $data['id']  ?>" class="text-success px-1"> <i class="fa-solid fa-pen-to-square"></i> </a>
                        <a href="./admin.php?page=deletepost&id= <?php  echo $data['id']  ?>" class="text-danger px-1"> <i class="fa-solid fa-trash-can"></i> </a>
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