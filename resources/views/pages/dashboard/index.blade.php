@extends('pages.master')

@section('konten')
<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">List Order Diet Bangsal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table2" class="table table-bordered table-hover">
                <thead class="bg-purple">
                    <tr>
                        <th>No</th>
                        <th>BED</th>
                        <th>Nama</th>
                        <th>Pasien ID</th> 
                        <th>DPJD</th> 
                        {{-- <th>Input Diet</th> --}}
                        {{-- <th>Diet</th> --}}
                        <th>Action Button</th>
                    </tr>
                </thead>
                <?php $no='1'; ?>
                <tbody>
                    <tr>
                        @foreach ($getval as $item)
                        <td><?=$no++;?></td>
                        <td>{{$item['bed']}}</td>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['pasienID']}}</td>
                        <td>{{$item['DPJP']}}</td>
                        {{-- <form method="POST" action="{{ url('/insert-diet') }}"> 
                            @csrf --}}
                        <td>
                            {{-- <a href="{{ url('/cetak',$item->id) }}" class="btnprn btn btn btn-primary btn-sm" ><i class="fa fa-folder-open"></i></a>  --}}
                            <button type="" id="" name="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalViewEdit{{$item['pasienID']}}"><i class="fa fa-folder-open"></i></button>
                            {{-- <a href="{{ url('/cetak',$item->id) }}" class="btnprn btn btn btn-danger btn-sm" ><i class="fa fa-car"></i></a>  --}}
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#isPulang{{$item['pasienID']}}"><i class="fa fa-car"></i></button>
                        </td>
                    {{-- </form> --}}
                </tr>
                 {{-- modal view-Edit --}}

                    <div class="modal fade" id="modalViewEdit{{$item['pasienID']}}" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title">View Diet</h5>
                                        <a class="close" data-dismiss="modal" aria-label="Close">
                                        {{-- <span aria-hidden="true">&times;</span> --}} <i class="fa fa-close"></i>
                                        </a>
                                        </div>
                                            <div class="modal-body">
                                            <!--FORM VIEW EDIT-->
                                            <form action="{{ url('/viewEdit') }}/{{$item['pasienID']}}" method="put">
                                                @csrf
                                                <div class="hdr">
                                                    Diet Untuk Pasien a.n : <b>{{$item['nama']}}</b> , Ruang : <b>{{$item['bed']}}</b>
                                                </div>
                                                <br>
                                                {{-- @foreach ($getval as $ze) --}}
                                                {{-- @if ($item['nama']==$ze['nama']) --}}
                                                    
                                                <div class="form-group">
                                                    <a href="{{ url('/cetakPagi',$item->id) }}"><i class="fa fa-print"> Diet Pagi</i></a>
                                                    <input type="text" class="form-control" id="diet_pagi" name="diet_pagi" placeholder="Masukan Jenis Diet.." value="{{$item['diet_pagi']}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_pagi_konsistensi" name="diet_pagi_konsistensi" placeholder="Masukan Konsistensi.." value="{{$item['diet_pagi_konsistensi']}}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <a href="{{ url('/cetakSiang',$item->id) }}"><i class="fa fa-print"> Diet Siang</i></a>
                                                    <input type="text" class="form-control" id="diet_siang" name="diet_siang" placeholder="Masukan Jenis Diet.." value="{{$item['diet_siang']}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_siang_konsistensi" name="diet_siang_konsistensi" placeholder="Masukan Konsistensi.." value="{{$item['diet_siang_konsistensi']}}" readonly>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <a href="{{ url('/cetakSore',$item->id) }}"><i class="fa fa-print"> Diet Sore</i></a>
                                                    <input type="text" class="form-control" id="diet_sore" name="diet_sore" placeholder="Masukan Jenis Diet.." value="{{$item['diet_sore']}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_sore_konsistensi" name="diet_sore_konsistensi" placeholder="Masukan Konsistensi.." value="{{$item['diet_sore_konsistensi']}}" readonly>
                                                </div>
{{--                                                 
                                                <div class="button float-right">
                                                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-pencil-square-o"> &nbsp; Update</i></button>
                                            </div> --}}
                                        </form>
                                        <!--END FORM TAMBAH BARANG-->
                                        {{-- @else
                                            <div class="bg-danger">
                                                {{'kosong! Entahlah,Sepertinya Jenengan Belum Input Data Diet'}}
                                            </div>                                                --}}
                                        {{-- @endif --}}
                                        {{-- @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- END MODAL --}}

                    <!-- The Modal -->
                        <div class="modal" id="isPulang{{$item['pasienID']}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Dulu,mbak!</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                   Yakin Pasien : <b>{{$item['nama']}}</b> Bed : <b>{{$item['bed']}}</b>, Sudah Pulang?
                                </div>
                                <form action="{{ url('/isPulang',$item['pasienID']) }}" method="post">
                                @method("POST")
                                @csrf
                                <div class="">
                                    <input type="hidden" name="isPulang" value="1">
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer"> 
                                    <button type="submit" class="btn btn-success">Yakin!</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    {{-- END MODAL --}}

                @endforeach 
            </tbody>
            </table>
        </div>
    </div>

@endsection
  