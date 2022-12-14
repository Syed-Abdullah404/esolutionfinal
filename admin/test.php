<?php

include '../connection.php';


                      $sqli="select * from admin_course";
                      
                        $sql=mysqli_query($conn,$sqli);
                      ?>
<html lang="en">

<head>
    <title>PHP AJAX Multi Select Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5" style="max-width: 550px">

        <div class="card-header alert alert-info text-center">
            <h2>PHP Multiple Select with Select2</h2>
        </div>

        <!-- Message -->
        <div class="res-msg mt-3 mb-3" style="display: none;">
            <div class="alert alert-success"></div>
        </div>

        <form method="POST">
         

            <div class="mb-3">
                <label class="form-label">Course</label>
                <select class="songs form-select" name="songs[]" multiple>
              <?php
                      while($row=mysqli_fetch_assoc($sql)) {
                        
                        ?>
                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                        <?php
                      }
                     
                    ?>
                </select>
            </div>

            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-danger add-data">Store</button>
            </div>
        </form>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.songs').select2();
        });

        $('body').on('click', '.add-data', function (event) {
            event.preventDefault();
            var name = $('input[name=name]').val();
            var songs = $('.songs').val();
            $.ajax({
                method: 'POST',
                url: '../connection.php',
                data: {
                    name: name,
                    songs: songs,
                },
                success: function (data) {
                    console.log(data);
                    $('.res-msg').css('display', 'block');
                    $('.alert-success').text(data).show();
                    $('input[name=name]').val('');
                    $(".songs").val('').trigger('change');

                    setTimeout(function () {
                        $('.alert-success').hide();
                    }, 3500);


                }
            });
        });
    </script>
</body>

</html>