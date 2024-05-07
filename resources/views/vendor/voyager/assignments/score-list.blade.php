@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-edit"></i>Score list
        </h1>
    </div>
@stop

@section('content')
<script src="https://kit.fontawesome.com/8d4621267d.js" crossorigin="anonymous"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Halaman Nilai</h2>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-none">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Ruang/Kelas</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor="1"; ?>
                                @foreach ($data_score as $data)
                                <tr> 
                                    <td>{{ $nomor }}</td>
                                    <td>{{ $data["name"] }}</td>
                                    <td>{{ $data["classroom"] }}</td>
                                    <td>{{ $data["score"] }}</td>
                                </tr>
                                <?php $nomor++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
            </section>
        </div>			
     </div>
</div>
@stop
