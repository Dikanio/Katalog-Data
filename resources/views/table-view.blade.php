@extends('index')

@section('css')

@endsection

@section('panel-title')
    <span>Table Data</span>
@endsection

@section('content')
    <h3>Katalog Data</h3>
    <hr>
    <div class="table-responsive">
        @if(count($data) > 0)
        <table class="table table-bordered" id="tableGu">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengelola</th>
                    <th>Bidang Pengelola</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php $no=1; ?>
                    @foreach($data as $d)
                        <tr>
                            <td><?php echo $no;$no++; ?></td>
                            <td>{{$d->judul_data}}</td>
                            <td>{{$d->pengelola->nama_dinas}}</td>
                            <td>{{$d->pengelola->bidang_kedinasan}}</td>
                            <td>
                                <a href="{{url('/data/edit', base64_encode($d->id_data))}}" class="btn btn-primary" style="margin-right: 5px">Edit</a>
                                <a href="{{url('/data/detail', base64_encode($d->id_data))}}" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
        @else
            <strong><p>Table Is Empty</p></strong>
            <a href="/data/create">Create Data</a>
        @endif
    </div>
@endsection

@section('js')

@endsection