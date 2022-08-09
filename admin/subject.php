<?php

include '../connection.php';

define("TITLE", "Faculty");
define("PAGE", "Faculty");


include 'header.php';

?>


<div class="body-section">
  <div class="container ">
    <div class="card ">
      <div class="card-header border-0">
        <h3 class="card-title display-6">Faculty</h3>
        <hr>
        <div class="container mt-1">
          <div class="row">
            <div class="col-lg-9">
              <div class="input-group ">

              </div>
            </div>
            <div class="col-lg-3">


              <button type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn float-right mb-3">
                <i class="fas fa-plus"></i> Add Faculty
              </button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-light">
                    <h4 class="modal-title " id="exampleModalLabel">Add Faculty</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                      <div class="form-group">


                        <label class="fw-bold">Name:</label>
                        <input type="text" class="form-control mb-2" placeholder=" Name" name="sbj">
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
                      <th>Name</th>

                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $select = mysqli_query($conn, "select * from admin_fauclty");
                    while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>

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



          </div>
        </div>
      </div>
    </div>

    <!-- //delete -->

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
                  url: "delfaculty.php",
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

  </div>

</div>
</div>
</div>




<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Faculty</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="hidden" name="update_id" id="update_id" />
          <div class="form-group">
            <label class="fw-bold">Name:</label>
            <input type="text" class="form-control mb-2" placeholder=" Name" name="name" id="name">



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
              url: "deletesubject.php",
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
  $sbj = $_POST['sbj'];


  $sql = mysqli_query($conn, "INSERT INTO `admin_fauclty`(`name`,`status`) VALUES ('$sbj','active')");
  if ($sql) {
?>
    <script>
      window.location = "<?php echo $app_url . 'admin/subject.php' ?>";
    </script>
  <?php
  }
}

if (isset($_POST['edit'])) {
  $id = $_POST['update_id'];
  $name = $_POST['name'];
  $status = $_POST['status'];

  $sql = mysqli_query($conn, "UPDATE `admin_fauclty` SET `name`='$name' WHERE id='$id'");
  if ($sql) {
  ?>
    <script>
      window.location = "<?php echo $app_url . 'admin/subject.php' ?>";
    </script>
<?php
  }
}
?>