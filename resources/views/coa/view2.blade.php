@extends('layoutbootstrap')

@section('konten')

<!-- Sweet Alert -->
@if(isset($status_hapus))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Hapus Data Berhasil',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
</script>
@endif

<!--  Main wrapper -->
<div class="body-wrapper">
    <!--  Header Start -->
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                        <i class="ti ti-bell-ringing"></i>
                        <div class="notification bg-primary rounded-circle"></div>
                    </a>
                </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">w</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-mail fs-6"></i>
                                    <p class="mb-0 fs-3">My Account</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-list-check fs-6"></i>
                                    <p class="mb-0 fs-3">My Task</p>
                                </a>
                                <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--  Header End -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="card-title fw-semibold mb-4">Pegawai</h5>
                            <div class="card">

                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Master Data Pegawai</h6>

                                    <!-- Tombol Tambah Data -->
                                    <a href="#" class="btn btn-primary btn-icon-split btn-sm tampilmodaltambah" data-toogle="modal" data-target="#ubahModal">
                                        <span class="icon text-white-50">
                                            <i class="ti ti-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data</span>
                                    </a>
                                    <!-- Akhir Tombol Tambah Data -->

                                </div>

                                <div class="card-body" id="show_all_pegawais">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah dan Ubah Data Pegawai -->
        <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelmodalubah"></h5>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="formubahpegawai" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="idcoahidden" name="idcoahidden" value="">
                            <input type="hidden" id="tipeproses" name="tipeproses" value="">
                            <div class="mb-3 row">
                                <label for="nama_pegawai" class="col-sm-4 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat_pegawai" class="col-sm-4 col-form-label">Alamat Pegawai</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat_pegawai" name="alamat_pegawai" placeholder="Alamat Pegawai">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_telpon_pegawai" class="col-sm-4 col-form-label">No Telpon Pegawai</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="no_telpon_pegawai" name="no_telpon_pegawai" placeholder="No Telpon Pegawai">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto_pegawai" class="col-sm-4 col-form-label">Foto Pegawai</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="foto_pegawai" name="foto_pegawai">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btnsimpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Tambah dan Ubah Data Pegawai -->

        <!-- JavaScript -->
       
<!-- Script untuk menampilkan modals -->
<script>
    function deleteConfirm(e) {
        var tomboldelete = document.getElementById('btn-delete');
        id = e.getAttribute('data-id');

        var url3 = "{{url('coa/destroy/')}}";
        var url4 = url3.concat("/", id);

        tomboldelete.setAttribute("href", url4);

        var pesan = "Data dengan ID <b>"
        var pesan2 = " </b>akan dihapus"
        var res = id;
        document.getElementById("xid").innerHTML = pesan.concat(res, pesan2);

        var myModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
            keyboard: false
        });

        myModal.show();
    }
</script>

<!-- Awal Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
            </div>
            <div class="modal-body" id="xid"></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Delete Confirmation -->

<!-- Jquery Proses Ubah / Tambah Data -->
<script>
    $(document).ready(function() {
        $('.formubahpegawai').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(form[0]);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        // Handle validation errors
                    } else {
                        // Handle success
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                        $('#ubahModal').modal('hide');
                        datacoa();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>
<!-- Akhir Jquery Proses Ubah / Tambah Data -->

<!-- Proses mengisi data pada tabel -->
<script>
    function datacoa() {
        $.ajax({
            url: '{{ url("coa/fetchAll") }}',
            method: 'get',
            success: function(response) {
                $("#show_all_coas").html(response);
                $("table").DataTable({
                    order: [0, 'desc']
                });
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        datacoa();
    });
</script>
<!-- Akhir mengisi data pada tabel -->

@endsection
