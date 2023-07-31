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
                        {{-- <th>Input Diet</th> --}}
                        <th>Diet</th>
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
                        <td>{{$item['diet']}}</td>
                        <td>
                            <a href="{{ url('/cetak',$item->id) }}" class="btnprn btn btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>
                            {{-- <button type="submit" id="btnprn" name="btnprn" class="btnprn btn btn-success btn-sm" >cetak</button> --}}
                        </td>
                    {{-- </form> --}}
                </tr>
                @endforeach 
            </tbody>
            </table>
        </div>
    </div>

@endsection
  