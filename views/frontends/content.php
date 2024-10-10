<!-- Content Cards Starts  -->

<div class="container-fluid mt-5 pb-5" id="content">
    <h2 class="content-header text-center pt-4 pb-3">
    <i class="fa-solid fa-mountain-sun"></i>
      Soul-Curing Places In Myanmar
    </h2>
    <div class="row justify-content-center">
      <?php
      foreach($postData as $post){   ?>

        <div class="card p-0" style="width: 16rem;">
            <img src="./assests/posts/<?php  echo $post['image'] ?>" id="card-image" class="card-img-top" alt="...">
            <div class="card-body">
                  <h5 class="card-title text-center" id="card-header"> <?php  echo $post['title']; ?> </h5>
                  <p class="card-text" id="card-text"> <?php  echo substr($post['description'],0,100); ?> </p>
                  <div class="card-btn">
                        <a href="#" class="btn"> <i class="fa-brands fa-readme"></i> Read More</a>
                  </div>
            </div>
        </div>
      <?php
      }
      ?>

    </div>

</div>



<!-- Content Cards Starts  -->