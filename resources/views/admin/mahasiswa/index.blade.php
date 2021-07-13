@extends('admin.template.master_template')

@section('title')
    Web - Dashboard Admin
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-sm-0 mr-3 font-size-18">Tabel Mahasiswa</h4>
                            <span style="width: 20px"></span>

                            <button type="button" class="mb-sm-0 btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-create">Add New Data</button>
{{--                                    <a href="{{route('dashboard-indexCreateMahasiswa')}}"></a>--}}

                            <!-- center modal -->

                            <div class="modal fade bs-example-modal-center modal-create" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="card">
                                            <div class="card-body">
                                                <center>
                                                    <h4 class="card-title mb-4">FORM TAMBAH MAHASISWA</h4>
                                                </center>
                                                <form method="post" enctype="multipart/form-data" action="{{route('mahasiswa-create')}}">
                                                    @csrf
                                                    <div class="row mb-4">
                                                        <label for="horizontal-nim-input" class="col-sm-3 col-form-label">NIM</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="horizontal-nim-input" name="nim">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-name-input" class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="horizontal-name-input" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="inputCV" class="col-sm-3 col-form-label">CV</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control-file" id="inputCV" name="inputCV">
                                                        </div>
                                                    </div>

                                                    <center>
                                                        <div class="col-sm-9">
                                                            <div>
                                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </form>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Responsive Tables</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Petunjuk singkat</h4>
                                <ul>
                                    <li>Gunakan tombol biru untuk menambahkan data.</li>
                                    <li>Gunakan tombol pensil disamping data untuk mengedit nama mahasiswa.</li>
                                    <li>Gunakan tombol tempat sampah disamping data untuk menghapus mahasiswa.</li>
                                </ul>


                            <div class="table mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>CV</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php($i=1)
                                    @foreach($data as $mhs)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$mhs->nim}}</td>
                                            <td>{{$mhs->name}}</td>
                                            <td><a href="{{url("/storage/CV/$mhs->filename")}}" download="{{"CV_" . $mhs->name}}">Download CV</a></td>
                                            <td style="width: 100px">
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".modal-edit-{{$mhs->id}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <div class="modal fade bs-example-modal-center modal-edit-{{$mhs->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <center>
                                                                        <h4 class="card-title mb-4">FORM EDIT MAHASISWA</h4>
                                                                    </center>
                                                                    <form method="post" enctype="multipart/form-data" action="{{route('mahasiswa-edit', $mhs->id)}}">
                                                                        @csrf
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">NIM</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" id="horizontal-nim-input" name="nim" value="{{$mhs->nim}}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" id="horizontal-name-input" name="name" value="{{$mhs->name}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="inputCV" class="col-sm-3 col-form-label">CV</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="file" class="form-control-file" id="inputCV" name="inputCV">
                                                                            </div>
                                                                        </div>

                                                                        <center>
                                                                            <div class="col-sm-9">
                                                                                <div>
                                                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </center>
                                                                    </form>
                                                                </div>
                                                                <!-- end card body -->
                                                            </div>
                                                            <!-- end card -->
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->




                                                <a class="btn btn-outline-danger btn-sm edit" title="Delete" data-bs-toggle="modal" data-bs-target=".modal-delete-{{$mhs->id}}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <div class="modal fade bs-example-modal-center modal-delete-{{$mhs->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <center>
                                                                        <h4 class="card-title mb-4">Apakah Anda yakin untuk menghapus data berikut?</h4>
                                                                    </center>
                                                                    <form method="post" action="{{route('mahasiswa-delete', $mhs->id)}}">
                                                                        @csrf
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">NIM</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" id="horizontal-nim-input" name="nim" value="{{$mhs->nim}}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" id="horizontal-name-input" name="name" value="{{$mhs->name}}" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <center>
                                                                            <div class="col-sm-9">
                                                                                <div>
                                                                                    <button type="submit" class="btn btn-danger w-md">Delete</button>
                                                                                </div>
                                                                            </div>
                                                                        </center>
                                                                    </form>
                                                                </div>
                                                                <!-- end card body -->
                                                            </div>
                                                            <!-- end card -->
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

@endsection


