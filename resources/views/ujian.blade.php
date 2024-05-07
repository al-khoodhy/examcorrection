@extends('voyager::master')


@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-edit"></i>Assessments
        </h1>
        @if ($selfUser === "dosen")
        <a href="" class="btn btn-success btn-add-new">
            <i class="voyager-edit"></i> <span>Edit Soal</span>
        </a>
        @endif
    </div>
@stop


@section('content')
<script src="https://kit.fontawesome.com/8d4621267d.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title text-uppercase" style="margin-left: 32px;">{{ $title }}</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" @if($selfUser === "mahasiswa") action="{{ route('ujian.store') }}" @endif method="post">
                        @csrf
                        @if ($selfUser === "mahasiswa") 
                        <input type="hidden" name="task_id" value="{{ $task_id }}">
                        @endif
                        <div class="row" style="margin-left:-40px; "> 
                                <!-- colom terluar mata kuliah-->
                                <div class="col-lg-12">
                                        <?php $nomer=1; $arr=0; ?>
                                        @foreach($questions as $data)
                                        <div class="row">
                                            <!-- colom dalam mata kuliah -->                      
                                            <div class="col-md-1 text-right">
                                                <h5 style="margin-top: 5px;">{{ $nomer; }}</h5>
                                            </div>
                                            <div class="col-md-10">
                                                <?php $nomer++; ?>
                                                <div class="row">
                                                    <div class="@if ($selfUser === "mahasiswa")col-md-12 @else col-md-11 @endif">
                                                        <p>{{ $data->question }}</p>
                                                    </div>
                                                    @if ($selfUser === "dosen")
                                                    <div class="col-md-1">
                                                        <p style="background-color:rgb(223, 237, 250); margin-left:24px; oadding:4px; text-align:center">{{ $data->weight }}</p>
                                                    </div>
                                                    @endif
                                                    @if ($selfUser === "mahasiswa")
                                                    <div class="col-md-12">                
                                                            <div class="form-group">                    
                                                                <div class="col-md-13">
                                                                    <textarea class="form-control" rows="3" id="textareaAutosize" name="answers[<?= $arr; ?>][answer]" data-plugin-textarea-autosize></textarea>
                                                                    <input type="hidden" name="answers[<?= $arr; ?>][question_id]" value="{{ $data->id }}">
                                                                </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <?php $arr++; ?>
                                    @endforeach
                                </div>
                        </div>
                        <br>
                        @if ($selfUser === "mahasiswa")
                        <div class="col-md-11" style="margin-left: 15px;">
                        <button type="submit" class="btn btn-primary pull-right">Kirim Jawaban</button>
                        </div>
                        @endif
                        </form>
                    
                </div>
                
            </section>
        </div>			
     </div>
</div>
@stop

