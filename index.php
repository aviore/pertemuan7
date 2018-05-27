<?php 
    require 'controller/Database.php';
    require 'controller/Library.php';
    require 'vendor/autoload.php';
    
    $library = new \Controller\Library;

    ob_start();
    session_start();

?>

<?php include ("component/head.php") ?>
<title>Blog Home - Start Bootstrap Template</title>
    <!-- Navigation -->
<?php include ("component/menu.php") ?>
    <!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <?php
        if (isset($_GET["home"]) || isset($_GET["page"])) {
            include "pages/home.php";
        }else if (isset($_GET["detail"])) {
            include("pages/detail_post.php");
          }else if (isset($_GET["category"]) || isset($_GET["page-category"])) {
            include("pages/category.php");
          }else if (isset($_GET["search"])) {
            include("pages/search_page.php");
          }else{
            include("pages/home.php");
          }
        ?>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Search Widget -->
            <?php include("component/search.php"); ?>
            <!-- Categories Widget -->
            <?php include("component/category.php"); ?>
            <!-- Side Widget -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <?php include("component/footer.php"); ?>

    <?php include("component/js.php"); ?>
      

    <?php ob_end_flush(); ?>