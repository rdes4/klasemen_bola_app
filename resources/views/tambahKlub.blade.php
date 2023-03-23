<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aplikasi Klasemen Sepak Bola</title>
    @include('layouts.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
       @include('layouts.sidebar')
       <!-- End Of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Klub</h6>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <form action="{{url('club')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_klub">Nama Klub</label>
                                    <input type="text" class="form-control" id="nama_klub" name="nama_klub" value="{{Session::get('nama_klub')}}">
                                </div>
                                <div class="form-group">
                                    <label for="kota_klub">Kota Klub</label>
                                    <input type="text" class="form-control" id="kota_klub" name="kota_klub" value="{{Session::get('kota_klub')}}">
                                </div>
                                <button type="submit" class="btn btn-primary"><strong>Submit</strong></button>
                                <button type="reset" class="btn btn-warning"><strong>Reset</strong></button>
                            </form>
                        </div>
                    </div>
                    </div>

                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="col-md-8 mt-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Klub</h6>
                        </div>
                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Klub</th>
                                <th scope="col">Kota Klub</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            $i = 1;
                        ?>
                        @foreach($data as $item)
                            
                                <tr>
                                <th scope="row"><?=$i?></th>
                                <td>{{$item->nama_klub}}</td>
                                <td>{{$item->kota_klub}}</td>
                                </tr>
                            
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layouts.script')

</body>

</html>