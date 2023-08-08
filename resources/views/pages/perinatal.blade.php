@extends('pages.master')

@section('konten')
<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">List pasien Bangsal Perinatal</h3>
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
                        <th>Diet</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <?php $no='1'; ?>
                <tbody>
                    @foreach ($collection as $item)
                    @if ($item['LayananID']==='RI008')
                    <tr>
                        <td><?=$no++;?></td>
                        <td>{{$item['BedName']}}</td>
                        <td>{{$item['PasienName']}}</td>
                        <td>{{$item['PasienID']}}</td>
                        <td>{{$item['DokterName']}}</td>
                        <td class="warning">
                            @foreach ($getval as $ze)
                            @if ($item['PasienID']==$ze['pasienID']) 
                            {{ $ze->diet }} <i class="fa fa-check"></i>
                            @else 
                            {{ '' }} 
                            @endif 
                            @endforeach
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambah{{$item['PasienID']}}"><i class="fa fa-plus"> Add</i></button>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalViewEdit{{$item['PasienID']}}"><i class="fa fa-folder-open"> View/Edit</i></button>
                            {{-- <button type="" class="btn btn-sm btn-warning" name="edit" id="edit"><i class="fa fa-edit"></i></button> --}}
                        </td>  
                    @endif
                </tr> 
                 {{-- modal --}}

                    <div class="modal fade" id="modalTambah{{$item['PasienID']}}" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title">Input Diet</h5>
                                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button> --}}
                                        </div>
                                            <div class="modal-body">
                                            <!--FORM TAMBAH BARANG-->
                                            <form action="{{ url('/addDiet') }}" method="post">
                                                @method('POST')
                                                @csrf
                                                <input type="hidden" class="form-control" id="bed" name="bed" value="{{$item['BedName']}}">
                                                <input type="hidden" class="form-control" id="nama" name="nama" value="{{$item['PasienName']}}">
                                                <input type="hidden" class="form-control" id="pasienID" name="pasienID" value="{{$item['PasienID']}}">
                                                <input type="hidden" class="form-control" id="DPJP" name="DPJP" value="{{$item['DokterName']}}"> 

                                                <div class="hdr">
                                                    Diet Untuk Pasien a.n : <b>{{$item['PasienName']}}</b> , Ruang : <b>{{$item['BedName']}}</b>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="">Diet Pagi</label>
                                                    <input type="text" class="form-control" id="diet_pagi" name="diet_pagi" placeholder="Masukan Jenis Diet..">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_pagi_konsistensi" name="diet_pagi_konsistensi" placeholder="Masukan Konsistensi..">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Diet Siang</label>
                                                    <input type="text" class="form-control" id="diet_siang" name="diet_siang" placeholder="Masukan Jenis Diet..">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_siang_konsistensi" name="diet_siang_konsistensi" placeholder="Masukan Konsistensi..">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Diet Sore</label>
                                                    <input type="text" class="form-control" id="diet_sore" name="diet_sore" placeholder="Masukan Jenis Diet..">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_sore_konsistensi" name="diet_sore_konsistensi" placeholder="Masukan Konsistensi..">
                                                </div>

                                            <div class="float-right">
                                                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"> Simpan</i></button>
                                            </div>
                                            </form>
                                            <!--END FORM TAMBAH BARANG-->
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- END MODAL Add --}}

                    {{-- modal view-Edit --}}

                    <div class="modal fade" id="modalViewEdit{{$item['PasienID']}}" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
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
                                            <form action="{{url('/viewedit', $item['PasienID'])}}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="hdr">
                                                    Diet Untuk Pasien a.n : <b>{{$item['PasienName']}}</b> , Ruang : <b>{{$item['BedName']}}</b>
                                                </div>
                                                <br>
                                                @foreach ($getval as $ze)
                                                @if ($item['PasienID']==$ze['pasienID'])
                                                    
                                                <div class="form-group">
                                                    <label for="">Diet Pagi</label>
                                                    <input type="text" class="form-control" id="diet_pagi" name="diet_pagi" placeholder="Masukan Jenis Diet.." value="{{$ze['diet_pagi']}}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_pagi_konsistensi" name="diet_pagi_konsistensi" placeholder="Masukan Konsistensi.." value="{{$ze['diet_pagi_konsistensi']}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Diet Siang</label>
                                                    <input type="text" class="form-control" id="diet_siang" name="diet_siang" placeholder="Masukan Jenis Diet.." value="{{$ze['diet_siang']}}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_siang_konsistensi" name="diet_siang_konsistensi" placeholder="Masukan Konsistensi.." value="{{$ze['diet_siang_konsistensi']}}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Diet Sore</label>
                                                    <input type="text" class="form-control" id="diet_sore" name="diet_sore" placeholder="Masukan Jenis Diet.." value="{{$ze['diet_sore']}}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="diet_sore_konsistensi" name="diet_sore_konsistensi" placeholder="Masukan Konsistensi.." value="{{$ze['diet_sore_konsistensi']}}">
                                                </div>
                                                
                                                <div class="button float-right">
                                                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-pencil-square-o"> &nbsp; Update</i></button>
                                                </div>
                                                <!--END FORM TAMBAH BARANG-->
                                                {{-- @else
                                                    <div class="bg-danger">
                                                        {{'kosong! Entahlah,Sepertinya Jenengan Belum Input Data Diet'}}
                                                    </div>                                                --}}
                                                @endif
                                            @endforeach
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>

                    {{-- END MODAL --}}
                    @endforeach 
                </tbody>
            </table>
        </div> 
    </div>
    </div>
</div>
 
         
@endsection