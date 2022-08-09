<?php

include '../connection.php';

define("TITLE", "Course");
define("PAGE", "Course");


include 'header.php';

?>


<div class="body-section">
  <div class="container">
    <div class="card ">
      <div class="card-header border-0">
        <h3 class="card-title display-6">Course</h3>
        <hr>
        <div class="container mt-1">
          <div class="row">
            <div class="col-lg-9">
              <div class="input-group ">

              </div>
            </div>
            <div class="col-lg-3">


              <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn float-right mb-3">
                <i class="fas fa-plus"></i> Add Course
              </button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-light">
                    <h4 class="modal-title " id="exampleModalLabel">Add Course</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                      <div class="form-group">


                        <label class="fw-bold">Course Name:</label>
                        <input type="text" class="form-control mb-2" placeholder="Course Name" name="name">

                        <label class="fw-bold">Course Code:</label>
                        <input type="text" class="form-control mb-2" placeholder="Course Code" name="code">

                        <label class="fw-bold">Faculty:</label>
                        <select name="faculty" class="form-control">
                          <?php
                          $sql = mysqli_query($conn, "select * from admin_fauclty");
                          while ($row = mysqli_fetch_assoc($sql)) {
                          ?>
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                          <?php
                          }

                          ?>


                        </select>



                      </div>
                      <div class="modal-footer bg-light">
                        <input type="submit" id="btn3" class="form-control" name="save" value="Save">
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>









          <div class="card-body table-responsive p-0">
            <div class="row">
              <div class="col-lg-12">
                <table id="example" class="table table-striped  mx-10">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Course Name</th>
                      <th>Course Code</th>
                      <th>Faculty</th>

                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $select = mysqli_query($conn, "select * from admin_course");
                    while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['code']; ?></td>
                        <td><?php echo $row['faculty']; ?></td>

                        <td>
                          <div class="action">
                            <button class="btn btnaction btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu p-0">

                              <li class="dropdown-item editbtn"> <i class="far fa-edit"></i> Edit</li>
                              <li class="dropdown-item">
                                <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                                <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm h"><i class="fas fa-trash"></i> Delete</a>
                              </li>


                            </ul>
                          </div>




                        </td>
                      </tr>
                    <?php
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>


            <div class="row mt-2">
              <div class="col-lg-4">
                <p>Showing 1 to 5 of 5 entries</p>
              </div>
              <div class="col-lg-4">

              </div>
              <div class="col-lg-4 ">
                <nav aria-label="Page navigation example">

                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Teacher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">

              <p>Are you sure want to delete the record?</p>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn " id="button-addon2">Yes</button>
              </div>
              </form>
            </div>

          </div>

        </div>
      </div>
    </div>




    <div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <input type="hidden" name="update_id" id="update_id" />
              <div class="form-group">

                <label class="fw-bold">Name:</label>
                <input type="text" class="form-control mb-2" placeholder=" Name" name="name" id="name">

                <label class="fw-bold">Course Code:</label>
                <input type="text" class="form-control mb-2" placeholder="Course Code" name="code" id="code">

                <label class="fw-bold">Faculty:</label>
                <select name="faculty" class="form-control" id="faculty">
                  <?php
                  $sql = mysqli_query($conn, "select * from admin_fauclty");
                  while ($row = mysqli_fetch_assoc($sql)) {
                  ?>
                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                  <?php
                  }

                  ?>


                </select>



              </div>



          </div>
          <div class="modal-footer bg-light">
            <input type="submit" id="btn3" class="form-control" name="edit" value="Save">
          </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>




</div>
<!-- flex-item -->
</div>
<!-- /flex-container -->
</div>
</div>
<!-- flex-item -->
</div>
<!-- /flex-container -->
</div>
</div>

</div>

</div>




</div>



<script>
  $(document).ready(function() {
    $('.editbtn').on('click', function() {
      $('#myModalEdit').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#name').val(data[1]);
      $('#code').val(data[2]);
      $('#faculty').val(data[3]);
      $('#status').val(data[4]);

    });
  });
</script>

<script>
  $(document).ready(function() {
    $(".delete_btn_ajax").click(function(e) {
      e.preventDefault();
      var deleteid = $(this).closest('tr').find('.delete_id_value').val();
      // alert(deleteid);
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this Data!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type: "POST",
              url: "deletecourse.php",
              data: {
                "delete_btn_set": 1,
                "deleteid": deleteid,
              },
              success: function(response) {
                swal("Deleted!", "Your Data is Deleted", "success", {
                  button: "Ok!",
                }).then((result) => {
                  location.reload();
                });

              }
            });
          }
        });

    });
  });
</script>

<?php


include 'footer.php';

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $code = $_POST['code'];
  $faculty = $_POST['faculty'];
  $status = $_POST['status'];

  $sql = mysqli_query($conn, "INSERT INTO `admin_course`(`name`, `code`,`faculty`,`status`) VALUES ('$name','$code','$faculty','active')");

  if ($sql) {
?>
    <script>
      window.location = "<?php echo $app_url . 'admin/course.php' ?>";
    </script>
  <?php
  }
}

if (isset($_POST['edit'])) {
  $id = $_POST['update_id'];
  $name = $_POST['name'];
  $code = $_POST['code'];
  $faculty = $_POST['faculty'];

  $sql = mysqli_query($conn, "UPDATE `admin_course` SET `name`='$name',`code`='$code',`faculty`='$faculty' WHERE id='$id'");

  if ($sql) {
  ?>
    <script>
      window.location = "<?php echo $app_url . 'admin/course.php' ?>";
    </script>
<?php
  }
}
?>