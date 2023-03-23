    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

    <script>

        let i = 0;
        $('#add-btn').click(function(){
            ++i;
            $('#form-pertandingan').append(
                `
                <div class="row pertandingan">
                    <div class="col-5 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <select class="form-control mb-2 tim_1[`+i+`]" id="tim_1[`+i+`]" name="nama_klub1[`+i+`]">
                                    <option value="">Pilih</option>
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama_klub}}</option>
                                    @endforeach
                                    
                                </select>
                                <input type="number" class="form-control" placeholder="Masukkan Skor" name="skor_1[`+i+`]">
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-4 text-center">
                        <div class="card">
                            <div class="card-body">
                                VS
                                <br>
                                 <button type="button" class="btn-sm btn-danger delete-row">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 mb-4">
                        <div class="card ">
                            <div class="card-body">
                                <select class="form-control mb-2" name="nama_klub2[`+i+`]">
                                    <option value="">Pilih</option>
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->nama_klub}}</option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control" placeholder="Masukkan Skor" name="skor_2[`+i+`]">
                            </div>
                        </div>
                    </div>
                </div>
                `);
        });

        $(document).on('click','.delete-row', function(){
            $(this).parent().parent().parent().parent().remove();
        })
    </script>