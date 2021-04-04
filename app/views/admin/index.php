<?php require "inc/admin_header.php"; ?>
<?php require "inc/admin_navigation.php"; ?>

<main class="col-md-10 ms-sm-auto px-lg-1 px-md-4 ps-s-0">

<form action="<?= URLROOT; ?>/posts/post" method="POST" class="mt-3">
<div class="row ">
  <div class="col-4 mb-4" id="bulkOptionContainer">
      <select class="form-select" name="option" id="">
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
        foreach($data as $row) :          
    ?>
    <tr>
      <td><input style="cursor: pointer;" type='checkbox' class='checkBoxes' name="checkBoxArray[]" value="<?= $row['post_id']; ?>"></td>
      <td scope="row" class="fw-bolder"><?= $row['post_id']; ?></th>
      <td class="fs-5"><?= $row['post_title']; ?></td>
      <td><img width="auto" height="90rem" src="<?= URLROOT; ?>/images/comics/<?= $row['post_id']; ?>/<?= $row['post_image']; ?>" alt=""></td>
      <td class="fs-5"><?= $row['post_date']; ?></td>
      <td><?= $row['post_status']; ?></td>
      <td><form action="<?= URLROOT; ?>/posts/post" method="POST"><input type="hidden" name="id" value="<?= $row['post_id'] ;?>"><input class="btn btn-outline-dark mx-2" type="submit" name="published" value="Publish"></form></td> 
      <td><form action="<?= URLROOT; ?>/posts/post" method="POST"><input type="hidden" name="id" value="<?= $row['post_id'] ;?>"><input class="btn btn-outline-dark mx-2" type="submit" name="draft" value="Draft"></form></td>
      <td><a href="<?= URLROOT; ?>/admin/editPost/<?= $row['post_id']; ?>" class="btn btn-outline-dark mx-2">Edit</a></td>
      <td><a href="<?= URLROOT; ?>/admin/deletePost/<?= $row['post_id']; ?>" class="btn btn-outline-dark mx-2">Delete</a></td>
      <td><a href="<?= URLROOT; ?>/pages/comic/<?= $row['post_id']; ?>" class="btn btn-outline-dark mx-2">View</a></td>
    </tr>   
    <?php endforeach; ?>
  </tbody>
</table>
</div>

</form>
</main>

<?php require "inc/admin_footer.php"; ?>