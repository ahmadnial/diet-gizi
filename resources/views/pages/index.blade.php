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
                        <th>Input Diet</th>
                        <th>Diet</th>
                        <th>Action Button</th>
                    </tr>
                </thead>
                <?php $no='1'; ?>
                <tbody>
                    <tr>
                        @foreach ($collection as $item)
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
                            <button type="submit" class="btn btn-success" >Save</button>
                        </td>
                    </form>
                </tr>
                @endforeach 
            </tbody>
            {{-- @foreach ($getvalues as $z)
                <td>
                    <button type="submit" class="btn btn-success" >view</button>
                    {{$z['diet']}}
                </td>  
                @endforeach --}}
            </table>
        </div>
    </div>

        
@endsection