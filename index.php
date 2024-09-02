<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Management</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- Navbar start -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <h2 class="font-weight-bold mb-0 d-none d-md-block mt-1">Athena</h2>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>

        <!-- Form Pencarian -->
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <input type="text" class="form-control" id="search" placeholder="Search Here..." aria-label="search"
                  aria-describedby="search">
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <button class="btn" id="searchBtn">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
              <button class="btn" id="filterBtn">
                <i class="fa-solid fa-filter"></i>
              </button>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Navbar end -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <!-- Container table start -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Siswa</h4>
                  <div class="table-responsive">
                    <!-- Table start -->
                    <table id="tabel_siswa" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            NIS
                          </th>
                          <th>
                            Nama
                          </th>
                          <th>
                            Kelas
                          </th>
                          <th>
                            Jurusan
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody id="result">
                        <!-- <tr id="result"></tr> -->
                      </tbody>
                    </table>
                    <!-- Table end -->
                  </div>
                </div>

                <!-- Modal Filter Start -->
                <div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel">Filter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Form untuk mengedit siswa -->
                        <form id="formFilter" method="post">
                          <input type="button" name="filterName" id="filterNama" class="btn btn-secondary"
                            value="nama"></input>
                          <input type="button" name="filterKelas" id="filterKelas" class="btn btn-secondary"
                            value="kelas"></input>
                          <input type="button" name="filterJurusan" id="filterJurusan" class="btn btn-secondary"
                            value="jurusan"></input>
                          <input type="button" name="filterAlamat" id="filterAlamat" class="btn btn-secondary"
                            value="alamat"></input>
                        </form>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="applyFilter">Filter</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal FIlter End -->

                <!-- Modal Edit User -->
                <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel">Edit Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Form untuk mengedit siswa -->
                        <form id="formEdit" method="post">
                          <input type="hidden" id="edit_id" name="id_siswa">
                          <div class="form-group">
                            <label for="edit_nis">Nis:</label>
                            <input type="number" class="form-control" id="edit_nis" name="nis">
                          </div>
                          <div class="form-group">
                            <label for="edit_nama">Nama:</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama">
                          </div>
                          <div class="form-group">
                            <label for="edit_kelas">kelas:</label>
                            <input type="text" class="form-control" id="edit_kelas" name="kelas">
                          </div>
                          <div class="form-group">
                            <label for="edit_jurusan">Jurusan:</label>
                            <input type="text" class="form-control" id="edit_jurusan" name="jurusan">
                          </div>
                          <div class="form-group">
                            <label for="edit_alamat">Alamat:</label>
                            <input type="text" class="form-control" id="edit_alamat" name="alamat">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="simpanEdit">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal Edit User End -->
              </div>
            </div>
          </div>
          <!-- Container table end -->

          <!-- Container Form tambah start -->
          <div class="row">
            <div class="grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Siswa</h4>
                  <br>
                  <form id="formTambah" class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="nis">NIS</label>
                      <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                    </div>
                    <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas">
                    </div>
                    <div class="form-group">
                      <label for="jurusan">Jurusan</label>
                      <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="jurusan">
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                    </div>

                    <button type="button" class="btn btn-primary me-2" id="simpanTambah">Tambah</button>
                    <button class="btn btn-light">Batal</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Container Form tambah end -->

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <!-- <span class="text-muted text-center text-black text-sm-left d-block d-sm-inline-block">Tugas CRUD Ajax
                  <a href="https://www.mshofadev.vercel.app/" target="_blank">mshofadev </a>2024</span> -->
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Tugas CRUD Ajax mshofadev
                  2024</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/e91d75df7f.js" crossorigin="anonymous"></script>
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script>
    $(document).ready(function () {

      // search
      $('#searchBtn').click(function () {
        var keyword = $('#search').val();

        $.ajax({
          url: 'php/search.php',
          type: 'GET',
          data: { keyword: keyword },
          success: function (data) {
            var datasiswa = JSON.parse(data);
            var html = '';

            if (datasiswa.length > 0) {
              let nomorUrut = 1;
              datasiswa.forEach(function (siswa) {
                html += '<tr>';
                html += '<td>';
                html += nomorUrut; // Gunakan nomor urut
                html += '</td>';
                html += '<td>';
                html += siswa.nis;
                html += '</td>';
                html += '<td>';
                html += siswa.nama;
                html += '</td>';
                html += '<td>';
                html += siswa.kelas;
                html += '</td>';
                html += '<td>';
                html += siswa.jurusan;
                html += '</td>';
                html += '<td>';
                html += siswa.alamat;
                html += '</td>';
                html += '<td>';
                html += '<button class="edit btn btn-primary" data-id="' + siswa.id_siswa + '"><i class="fa-solid fa-pen"></i></button> ';
                html += '<button class="delete btn btn-danger" data-id="' + siswa.id_siswa + '"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></button>';
                html += '</td>';
                html += '</tr>';

                nomorUrut++;
              });
            } else {
              html += '<td>';
              html += 'Tidak ada data yang ditemukan';
              html += '</td>';
            }

            $('#result').html(html);
          },
          error: function (xhr, status, error) {
            console.error('Error: ' + status + ' - ' + error);
            console.log(xhr.responseText);
          }
        });
      });

      // function untuk menampilkan data pada tabel
      function loadData() {
        $.ajax({
          url: 'php/ajax.php',
          type: 'GET',
          dataType: 'json',
          success: function (response) {
            var data = response.data;
            var tbody = $('#tabel_siswa tbody');
            tbody.empty();

            $.each(data, function (index, item) {
              var row = $('<tr>');
              row.append('<td>' + (index + 1) + '</td>');
              row.append('<td>' + item.nis + '</td>');
              row.append('<td>' + item.nama + '</td>');
              row.append('<td>' + item.kelas + '</td>');
              row.append('<td>' + item.jurusan + '</td>');
              row.append('<td>' + item.alamat + '</td>');
              row.append('<td>' + item.aksi + '</td>');
              tbody.append(row);
            });
          },
          error: function (xhr, status, error) {
            console.error('Error: ' + status + ' - ' + error);
            console.log(xhr.responseText);
          }
        });
      }

      loadData(); // tampilkan data terkini pada tabel

      // tambah siswa
      $('#simpanTambah').click(function () {
        var table = $('#tabel_siswa');
        var data = $('#formTambah').serialize(); // ambil value form lalu simpan pada variable data
        $.ajax({
          url: 'php/ajax.php',
          type: 'POST',
          data: data,
          success: function (response) {
            alert(response);
            $('#formTambah')[0].reset();
            loadData();
          },
          error: function (xhr, status, error) {
            console.error('Error: ' + status + ' - ' + error);
            console.log(xhr.responseText);
          }
        });
      });

      // modal filter
      $('#filterBtn').on('click', function () {
        $('#modalFilter').modal('show');

        let statusFilterNama = 0;
        let statusFilterKelas = 0;
        let statusFilterJurusan = 0;
        let statusFilterAlamat = 0;

        // btn filter nama 
        $('#filterNama').on('click', function (event) {
          event.preventDefault(); // Mencegah refresh atau aksi default lainnya
          $(this).toggleClass('btn-info');
          statusFilterNama = $(this).hasClass('btn-info') ? 1 : 0;
        });

        // btn filter kelas
        $('#filterKelas').on('click', function (event) {
          event.preventDefault();
          $(this).toggleClass('btn-info');
          statusFilterKelas = $(this).hasClass('btn-info') ? 1 : 0;
        });

        // btn filter jurusan
        $('#filterJurusan').on('click', function (event) {
          event.preventDefault();
          $(this).toggleClass('btn-info');
          statusFilterJurusan = $(this).hasClass('btn-info') ? 1 : 0;
        });

        // btn filter alamat
        $('#filterAlamat').on('click', function (event) {
          event.preventDefault();
          $(this).toggleClass('btn-info');
          statusFilterAlamat = $(this).hasClass('btn-info') ? 1 : 0;
        });

        // Terapkan filter ketika user mengklik tombol untuk memfilter data
        $('#applyFilter').on('click', function () {
          let dataForFilter = {
            filterNama: statusFilterNama,
            filterKelas: statusFilterKelas,
            filterJurusan: statusFilterJurusan,
            filterAlamat: statusFilterAlamat
          };

          $.ajax({
            url: 'php/ajax.php',
            type: 'POST',
            data: dataForFilter,
            success: function (response) {
              var data = JSON.parse(response);
              var html = '';
              if (data.data.length > 0) { // tampilkan data yang sudah difilter pada tabel
                data.data.forEach(function (siswa) {
                  html += '<tr>';
                  html += '<td>' + siswa.no + '</td>';
                  html += '<td>' + siswa.nis + '</td>';
                  html += '<td>' + siswa.nama + '</td>';
                  html += '<td>' + siswa.kelas + '</td>';
                  html += '<td>' + siswa.jurusan + '</td>';
                  html += '<td>' + siswa.alamat + '</td>';
                  html += '<td>' + siswa.aksi + '</td>';
                  html += '</tr>';
                });
              } else {
                html += '<tr><td colspan="7">Tidak ada data yang ditemukan</td></tr>';
              }

              $('#tabel_siswa tbody').html(html);
            },
            error: function (xhr, status, error) {
              console.error('Error: ' + status + ' - ' + error);
            }
          });
        });

      });

      // tampilkan data siswa pada form modal
      $('#tabel_siswa').on('click', '.edit', function () {
        let id = $(this).data('id');
        $.ajax({
          url: 'php/ajax.php',
          type: 'GET',
          data: { id_siswa: id },
          dataType: 'json',
          success: function (data) {
            $('#edit_id').val(data.id_siswa);
            $('#edit_nis').val(data.nis);
            $('#edit_nama').val(data.nama);
            $('#edit_kelas').val(data.kelas);
            $('#edit_jurusan').val(data.jurusan);
            $('#edit_alamat').val(data.alamat);
            $('#modalEdit').modal('show');
          },
          error: function (xhr, status, error) {
            console.error('Error: ' + status + ' - ' + error);
            console.log(xhr.responseText);
          }
        });
      });

      // Simpan edit siswa
      $('#simpanEdit').click(function () {
        var data = $('#formEdit').serialize();
        $.ajax({
          url: 'php/ajax.php',
          type: 'PUT',
          data: data,
          success: function (response) {
            $('#modalEdit').modal('hide');
            loadData();
            alert(response);
          }
        });
      });

      // hapus siswa
      $('#tabel_siswa').on('click', '.delete', function () {
        var id_siswa = $(this).data('id');
        if (confirm('Are you sure you want to delete this user?')) {
          $.ajax({
            url: 'php/ajax.php',
            type: 'DELETE',
            data: { id_siswa: id_siswa },
            success: function (response) {
              alert(response);
              loadData();
            },
            error: function (xhr, status, error) {
              console.error('Error: ' + status + ' - ' + error);
              alert('Failed to delete user.');
            }
          });
        }
      });

    });
  </script>
</body>

</html>