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
                        <form method="POST" action="{{ url('/insert-diet') }}"> 
                            @csrf
                        <td>{{$item['diet']}}</td>
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