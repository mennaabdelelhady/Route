<?php

include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
include "../../connection.php";




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addCategory'])) {
  $title = trim($_POST['title']);

  if (!empty($title)) {      $sql_check = "SELECT * FROM categories WHERE name = ?";
      $stmt_check = $connection->prepare($sql_check);
      $stmt_check->bind_param("s", $title);
      $stmt_check->execute();
      $result_check = $stmt_check->get_result();

      if ($result_check->num_rows > 0) {
          echo "<div class='alert alert-danger text-center'>Category already exists!</div>";
      } else {
          $sql_insert = "INSERT INTO categories (name) VALUES (?)";
          $stmt_insert = $connection->prepare($sql_insert);
          $stmt_insert->bind_param("s", $title);

          if ($stmt_insert->execute()) {
              echo "<div class='alert alert-success text-center'>Category added successfully!</div>";
          } else {
              echo "<div class='alert alert-danger text-center'>Error adding category. Please try again.</div>";
          }
      }
  } else {
      echo "<div class='alert alert-danger text-center'>Category title cannot be empty!</div>";
  }
}
?>

?>



              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Category</h3>
                <form method="POST" action="addCategory.php">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input text-light">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addCategory" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

<?php 
include "../view/footer.php";
 ?>