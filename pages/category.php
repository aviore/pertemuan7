<?php 

$category_id = $_GET["category"];

$count = $library->countBlogByCategory($category_id);
$per_page = 4;
$cur_page = 1;
if(isset($_GET["page-category"])) {
  $cur_page = $_GET["page-category"];
  $cur_page = ($cur_page > 1)? $cur_page : 1;
}
$total_data = $count['count'];
$total_page = ceil($total_data/$per_page);
$offset = ($cur_page - 1) * $per_page;

  $blog = $library->getAllBlogByCategory($category_id, $per_page, $offset);



 ?>

<div class="col-md-8">
          <?php if (empty($blog)){ ?>
            <h3 class="my-4">No News Found</h3>
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
              <?= $value['date_post'] ?>
              <a href=""><?= $value['category_name'] ?></a>
            </div>
          </div>

          <?php } ?>
          <?php } ?>
          
          <?php if(isset($total_page)) {?>
          <?php if($total_page > 1){?>
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
          <?php  if($cur_page > 1) {?>  
            <li class="page-item">
              <a class="page-link" href="index.php?page-category=<?= ($cur_page-1)."&category=".$category_id ?>">&larr; Older</a>
            </li>
            <?php }else{ ?>
            <li class="page-item disabled">
              <a class="page-link" href="#">&larr; Older</a>
            <?php } ?>
            <?php if($cur_page < $total_page) {?>
            </li>
            <li class="page-item">
              <a class="page-link" href="index.php?page-category=<?= ($cur_page+1)."&category=".$category_id ?>">Newer &rarr;</a>
            </li>
            <?php }else{ ?>
            <li class="page-item disabled">
              <a href="" class="page-link">Newer &rarr;</a>
            </li>
            <?php }?>            
          </ul>
          <?php }?>
          <?php }?>

        </div>