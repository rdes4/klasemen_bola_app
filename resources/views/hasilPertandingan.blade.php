
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
                @if (session('errorr'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('errorr')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif
                <form action="{{url('hasil_pertandingan')}}" method="post" >
                    @csrf
                <div class="" id="form-pertandingan">
                <div class="row pertandingan" id="pertandingan">
                    <div class="col-5 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <select class="form-control mb-2 tim_1[0]" id="tim_1[0]" name="nama_klub1[0]">
                                <option value="">Pilih</option>
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama_klub}}</option>
                                    @endforeach
                                    
                                </select>
                                <input type="number" class="form-control" placeholder="Masukkan Skor" name="skor_1[0]">
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-4 text-center">
                        <div class="card">
                            <div class="card-body">
                                VS
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-5 mb-4">
                        <div class="card ">
                            <div class="card-body">
                                <select class="form-control mb-2" name="nama_klub2[0]">
                                    <option value="">Pilih</option>
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama_klub}}</option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control" placeholder="Masukkan Skor" name="skor_2[0]">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- <div class="row">
                    <div class="col-5 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <select class="form-control mb-2" id="tim_1" onchange="checkTim1()" name="nama_klub[0]">
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama_klub}}</option>
                                    @endforeach
                                    
                                </select>
                                <input type="number" class="form-control" placeholder="Masukkan Skor" name="skor[0]">
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-4 text-center">
                        <div class="card">
                            <div class="card-body">
                                VS
                            </div>
                        </div>
                    </div>
                    <div class="col-5 mb-4">
                        <div class="card ">
                            <div class="card-body">
                                <select class="form-control mb-2" name="nama_klub[1]">
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama_klub}}</option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control" placeholder="Masukkan Skor" name="skor[1]">
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="" id="btn">
                <button type="button" class="btn btn-success add-btn" id="add-btn"><i class="fas fa-plus" style="color: #ffffff;"></i> Tambah Pertandingan</button>
                <button type="submit" class="btn btn-primary">Submit</button>
               
                </div>
                
                </form>

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