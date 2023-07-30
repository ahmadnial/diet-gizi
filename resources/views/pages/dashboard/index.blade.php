@extends('pages.master')

@section('konten')

    <div class="comtainer">
        {{-- <h3>BANGSAL KRISAN</h3> --}}
        <div class="table">
            <table class="table table-bordered">
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
                            <a href="{{ url('/cetak',$item->id) }}" class="btnprn btn btn btn-success btn-sm" onclick="printPage()">Print Preview</a>
                            {{-- <button type="submit" id="btnprn" name="btnprn" class="btnprn btn btn-success btn-sm" >cetak</button> --}}
                        </td>
                    {{-- </form> --}}
                </tr>
                @endforeach 
            </tbody>
            </table>
        </div>
    </div>
    {{-- <script type="text/javascript">
        $(document).ready(function(){
        $('.btnprn').printPage();
        });
        </script> --}}
@endsection
  