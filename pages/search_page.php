<?php 

$_keyword = $_SESSION['session_search'];
$blog = $library->getAllBlogBySearch($_keyword); ?>

<div class="col-md-8">
      <?php if (empty($blog)) { ?>
        <h3 class="my-4">No News Found with keyword : <?= $_keyword ?></h3>
      <?php }else{ ?>
          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>
          <!-- Blog Post -->
          <?php foreach ($blog as $key => $value) { ?>
          <div class="card mb-4">
            <?= cl_image_tag("redfox.jpg", array("width" => 730, "height" => 300, "crop" => "fill")); ?>
            <div class="card-body">
              <h2 class="card-title"><?= $value['title'] ?></h2>
              <p class="card-text"><?= $value['news'] ?></p>
              <a href="index.php?detail=<?= $value['id'] ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?= $value['date_post'] ?> By
              <a href="#"> Marcel</a>
            </div>
          </div>

          <?php } ?>
          <?php } ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>