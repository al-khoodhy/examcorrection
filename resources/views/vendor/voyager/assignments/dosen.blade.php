@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-edit"></i>Assignments
        </h1>
        <a href="" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>Add New</span>
        </a>
        <a href="" class="btn btn-primary btn-add-new">
            <i class="voyager-list"></i> <span>Bulk Delete</span>
        </a> 
    </div>
@stop


@section('content')
<script src="https://kit.fontawesome.com/8d4621267d.js" crossorigin="anonymous"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Daftar Penugasan</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6" style="align-content:center">
                            <div class="form-group">
                                    <section class="form-group-vertical">
                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon"><i class="fa-solid fa-magnifying-glass" style="color: #878787;"></i></span>
                                            </span>
                                            <input class="form-control" type="text" placeholder="Search Tasks">
                                        </div>
                                    </section>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <select class="form-control mb-md">
                                        @foreach ($classrooms as $item)
                                        <option>{{ $item}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">  
                                    <select class="form-control mb-md">
                                        <option>Terbaru</option>
                                        <option>Default</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- colom terluar mata kuliah-->
                        @foreach ($assignments as $item)
                        <a href="http://localhost/examcorrection/public/app/assignments/view/{{ $item->slug }}" style="color: black">
                        <div class="col-lg-12">
                                <div class="row">
                                    <!-- colom dalam mata kuliah -->
                                    <div class="col-lg-12">
                                        <div class="task-list">
                                            <ul class="list-group">
                                              <li class="list-group-item">
                                                <div class="row">
                                                  <!-- Kolom untuk ikon -->
                                                      <div class="col-md-1">
                                                        <div class="summary-icon bg-primaryn">
                                                            <i class="fa-solid fa-file-pen" style="color: #fe6220; font-size: 30px; margin-left:25px; padding:0; margin-top: 25px; " ></i>
                                                        </div>  
                                                    </div>
                                                  <!-- Kolom untuk judul dan keterangan -->
                                                  <div class="col-md-8" >
                                                    <h3>{{ $item->task_title }}</h3>
                                                    <p>Diberikan {{ $item->start_time }}</p>
                                                  </div>
                                                  <!-- kolom untuk status sebelah kanan -->
                                                  <div class="col-md-3">
                                                    <div class="col-md-8"></div>
                                                    <div class="col-md-4">
                                                        <div class="text-right">Kelas\Ruang</div>
                                                        <div style="background-color: rgb(46, 127, 219); margin-left:42px; margin-top:2px; padding:3px">{{ $item->classroom }}</div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </li>
                                            </ul>
                                          </div> 
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        </a>
                        
                        
                    </div>
                    
                </div>
                
            </section>
        </div>			
     </div>
</div>
@stop
