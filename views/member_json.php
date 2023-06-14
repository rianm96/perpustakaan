<?php
include("layout/_head.php");
?>

<body>
  <?php
  include("layout/_navbar.php");
  include("layout/_sidebar.php");
  include("../function/crud_anggota_json.php");
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Members List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost:3000/views/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item">Members List</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- <a href="" class="btn btn-primary mb-2">Add Data</a> -->
    <button class=" btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#insert-modal">Add Data</button>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Members List</h5>
              <!-- <p></p> -->

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $file = '../json/anggota.json';
                    $anggotas = file_get_contents($file);
                    $datas = json_decode($anggotas,true);
                    $nomor = 1;
                    foreach($datas as $data) {                  
                  ?>
                  <tr>
                      <td>
                        <?php echo $nomor++; ?>
                      </td>
                      <td>
                        <?php echo $data['nama_anggota']; ?>
                      </td>
                      <td>
                        <?php echo $data['jenis_kelamin']; ?>
                      </td>
                      <td>
                        <?php echo $data['alamat']; ?>
                      </td>
                      <td><button class="btn btn-primary" data-bs-toggle="modal"
                          data-bs-target="#modal-edit<?php echo $data['id_anggota']?>">View</button></td>
                    </tr>

                    <!-- Modal input -->
                    <div class="modal fade" id="modal-edit<?php echo $data['id_anggota'] ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <form class="modal-form-edit" id="modal-form-edit<?= $data['id_anggota'];?>" action="member_json.php" method="POST">
                            <div class="modal-body">
                              <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']?>">
                              <div class="form-group">
                                <label for="id_name">Name</label>
                                <input class="form-control" type="text" name="nama" value="<?php echo $data['nama_anggota'];?>" required>
                              </div>
                              <div class="form-group">
                                <label for="jenis_kelamin">Gender</label>
                                <select class="form-control" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin'];?>">
                                  <option value="L">Male</option>
                                  <option value="P">Famale</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="alamat">Address</label>
                                <textarea cols="30" rows="3" class="form-control" name="alamat" required><?php echo $data['alamat'];?></textarea>
                              </div>
                              <div class="form-group">
                                <label for="status">Status</label>
                                <input class="form-control" type="text" name="status" value="<?php echo $data['status']?>"  required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete</button>
                              <button type="submit" class="btn btn-primary"  name="edit" value="edit">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>


                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <!-- Modal input -->
  <div class="modal fade" id="insert-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="modal-form-input" action="member_json.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_name">Member Id</label>
              <input class="form-control" type="text" name="id">
            </div>
            <div class="form-group">
              <label for="id_name">Name</label>
              <input class="form-control" type="text" name="nama">
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Gender</label>
              <select class="form-control" name="jenis_kelamin">
                <option value="L">Male</option>
                <option value="P">Famale</option>
              </select>
            </div>
            <div class="form-group">
              <label for="alamat">Address</label>
              <textarea cols="30" rows="3" class="form-control" name="alamat"></textarea>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <input class="form-control" type="text" name="status">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="save" value="save">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>



  <?php
  include("layout/_footer.php");
  ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function () {
      initModalValidation();
    });

    function initModalValidation() {
      $('#modal-form-input').validate({
        rules: {
          id: { required: true, maxlength: 4 },
          nama: { required: true },
          jenis_kelamin: { required: true, },
          alamat: { required: true, },
          status: { required: true, number: true, maxlength: 1, },

        },

        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
          $(element).closest('.form-group').addClass('has-error')
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
          $(element).closest('.form-group').removeClass('has-error')
        }
      });
    }
  </script>


</body>

</html>