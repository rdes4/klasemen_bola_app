
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

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Klasemen Liga 1</h6>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Klub</th>
                            <th scope="col">Ma</th>
                            <th scope="col">Me</th>
                            <th scope="col">S</th>
                            <th scope="col">K</th>
                            <th scope="col">GM</th>
                            <th scope="col">GK</th>
                            <th scope="col">Point</th>
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
                                <td>{{$item->main}}</td>
                                <td>{{$item->menang}}</td>
                                <td>{{$item->seri}}</td>
                                <td>{{$item->kalah}}</td>
                                <td>{{$item->goal_menang}}</td>
                                <td>{{$item->goal_kalah}}</td>
                                <td>{{$item->point}}</td>
                                </tr>
                            
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
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