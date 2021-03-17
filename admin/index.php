<?php require "includes/admin_header.php"; ?>
<?php require "includes/admin_navigation.php"; ?>
<?php require "POST/admin_checkboxes.php"; ?>
<?php require "POST/admin_post_status.php"; ?>

<main class="col-md-10 ms-sm-auto ms-sm-auto px-lg-1 ps-s-0">

<form action="" method="POST">
<div class="row ">
  <div class="col-4 mb-4" id="bulkOptionContainer">
    
      <select class="form-select" name="bulk_options" id="">
          <option value="">Select Options</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
          <option value="delete">Delete</option>
      </select>

  </div>
  <div class="col-1">
      <input type="submit" name="submit" class="btn btn-success" value="Apply">
  </div>
</div>

<div class="table-responsive">
<table class="table table-sm table-hover table-bordered border-info align-middle fs-6" id="post-table">
  <thead class="table-dark">
    <tr id="theaders">
      <th><input type="checkbox" class="cursor" id="selectAllBoxes" width="10%"></th>
      <th scope="col" onclick="sortTableNum(1, 'post-table')" class="thArrow1 cursor" width="4%">#</th>
      <th scope="col" onclick="sortTable(2, 'post-table')" class="thArrow2 cursor" width="15%">Title</th>
      <th scope="col">Image</th>
      <th scope="col" onclick="sortTableNum(4, 'post-table')" class="thArrow3 cursor">Date&nbsp;(Y/M/D)</th>
      <th scope="col" onclick="sortTable(5, 'post-table')" class="thArrow4 cursor" width="8%">Status</th>
      <th scope="col" width="1%">Publish</th>
      <th scope="col" width="1%">Draft</th>
      <th scope="col" width="1%">Edit</th>
      <th scope="col" width="1%">Delete</th>
      <th scope="col" width="1%">View Post</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $stmt = $pdo->query("SELECT * FROM posts ORDER BY post_id DESC");
        
        while($row = $stmt->fetch()) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_image = $row['post_image'];
            $post_status = $row['post_status'];
            $post_date = $row['post_date'];

            //// Change name to get thumbnail
            $post_image = substr_replace($post_image, "_thumb.jpg", -4);

            //// Formats Date to Sortable Format
            $formatted_date = new DateTime($post_date);
            $post_date = $formatted_date->format("Y/m/d");
        
    ?>

    <tr>
      <td><input style="cursor: pointer;" type='checkbox' class='checkBoxes' name="checkBoxArray[]" value="<?= $post_id; ?>"></td>
      <td scope="row" class="fw-bolder"><?= $post_id; ?></th>
      <td class="fs-5"><?= $post_title; ?></td>
      <td><img width="auto" height="90rem" src="../images/comics/<?= $post_id; ?>/<?= $post_image; ?>" alt=""></td>
      <td class="fs-5"><?= $post_date; ?></td>
      <td><?= $post_status; ?></td>
      <td><form action="" method="POST"><input type="hidden" name="id" value="<?= $post_id ;?>"><input class="btn btn-outline-dark mx-2" type="submit" name="published" value="Publish"></form></td> 
      <td><form action="" method="POST"><input type="hidden" name="id" value="<?= $post_id ;?>"><input class="btn btn-outline-dark mx-2" type="submit" name="draft" value="Draft"></form></td>
      <td><a href="<?= "edit_post.php?p_id={$post_id}" ;?>" class="btn btn-outline-dark mx-2">Edit</a></td>
      <td><a href="delete.php?p_id=<?= $post_id; ?>" class="btn btn-outline-dark mx-2">Delete</a></td>
      <td><a href="<?= "../comic.php?p_id={$post_id}" ;?>" class="btn btn-outline-dark mx-2">View</a></td>
    </tr>
    
    <?php }   
       
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
    
    ?>
 
  </tbody>
</table>
</div>

</form>
</main>

<?php require "includes/admin_footer.php"; ?>