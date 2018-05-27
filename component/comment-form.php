<?php 
    if(isset($_POST["save"])) {
        $data = array(
            'post_id' => $_POST['post_id'],
            'username' => $_POST['username'],
            'reply' => $_POST['reply']
        );
        $library->saveData($data);
    }
 ?>
