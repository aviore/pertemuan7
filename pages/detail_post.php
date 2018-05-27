<?php

$_id = $_GET["detail"];
$blog = $library->getBlogById($_id); ?>

<?php 
    if(isset($_POST["save"])) {
        $data = array(
            'post_id' => $_id,
            'username' => $_POST['username'],
            'reply' => $_POST['reply']
        );
        $library->saveData($data);
        header("location:index.php?detail=$_id&success-comment#success");
    }
 ?>


<title>Blog Post - Start Bootstrap Template</title>
        <div class="col-lg-8">
          <!-- Title -->
          <h1 class="mt-4"><?= $blog["title"] ?></h1>
         <!-- Author -->
          <p class="lead">
            by
            <a href="#">Marcel</a>
          </p>
          <hr>
          <!-- Date/Time -->
          <p>Posted on <?= $blog["date_post"] ?></p>

          <hr>

          <!-- Preview Image -->
          <?= cl_image_tag("redfox.jpg", array("width" => 730, "height" => 300, "crop" => "fill")); ?>

          <hr>

          <!-- Post Content -->
          <blockquote class="blockquote">
            <p class="mb-0"><?= $blog["news"] ?></p>
            <footer class="blockquote-footer">Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>
          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="post">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" name="username" required="">
                </div>
                <div class="form-group">
                  <label for="">Reply</label>
                  <textarea class="form-control" rows="3" name="reply" required=""></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
              </form>
            </div>
          </div>

          <?php if(isset($_GET["success-comment"])) {?>
            <div class="form-group" id="success">
            <div class="alert alert-success" role="alert">New Comment added Below</div>
            </div>
        <?php }?>
          
          <?php $comment = $library->getAllComment($_id); ?>
       <!-- Single Comment -->
          <?php foreach ($comment as $no => $value) { ?>
         
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?= $value['username'] ?></h5>
              <p><?= $value['reply'] ?></p>
            </div>
          </div>

       <?php } ?>
          <!-- Comment with nested comments -->
         <!--  <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div> -->

   
        </div>
