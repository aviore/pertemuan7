<?php $category = $library->getAllCategory(); ?>

 <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <?php foreach ($category as $no => $value) { ?>
                    <li>
                      <a href="index.php?category=<?= $value['id']  ?>"><?= $value['category_name'] ?></a>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>