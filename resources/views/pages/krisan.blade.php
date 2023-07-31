@extends('pages.master')

@section('konten')
<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">List pasien Bangsal Krisan</h3>
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
                        <th>Input Diet</th>
                        <th>Action</th>
                        <th>Diet</th>
                    </tr>
                </thead> 
                <?php $no='1'; ?>
                <tbody>
                    @foreach ($collection as $item)
                    @if ($item['LayananID']==='RI002')
                    <tr>
                        <td><?=$no++;?></td>
                        <td>{{$item['BedName']}}</td>
                        <td>{{$item['PasienName']}}</td>
                        <td>{{$item['PasienID']}}</td>
                        <td>{{$item['DokterName']}}</td>
                        <form method="POST" action="{{ url('/insert-diet') }}"> 
                            @csrf
                        <td>
                            <input type="hidden" name="bed" value="{{$item['BedName']}}">
                            <input type="hidden" name="nama" value="{{$item['PasienName']}}"> 
                            <input type="hidden" name="pasienID" value="{{$item['PasienID']}}">
                            <input type="hidden" name="DPJP" value="{{$item['DokterName']}}">
                            <input type="text" class="form-control" name="diet">
                        </td>
                        <td>
                            @foreach ($getval as $ze)
                            @if ($item['PasienID']==$ze['pasienID']) 
                            {{ $ze->diet }} <i class="fa fa-check"></i>
                            @else
                            {{ '' }} 
                            @endif
                            @endforeach
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-success" name="click" id="click" onclick="zimbabwe(this)"><i class="fa fa-save"></i></button>
                        </td>  
                        @endif
                    </form>
                </tr>
                @endforeach 
            </tbody>
            </table>
        </div> 
    </div>
    </div>
</div>
 
         
@endsection