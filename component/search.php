<?php 

  if (isset($_POST['search'])) {
    $_SESSION['session_search'] = $_POST["keyword"];
    header("location:index.php?search");  
  }
 ?>
   <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form action="" method="post">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." name="keyword">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" name="search">Go!</button>
                </span>
              </div>
              </form>
            </div>
    </div>
