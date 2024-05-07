
@extends('voyager::master')

@section('content')
<script src="https://kit.fontawesome.com/8d4621267d.js" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hasil Penugasan</h2>
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
                                        <option>Natural Language Prossecing</option>
                                        <option>Pemrograman Web</option>
                                        <option>W</option>
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
                        @foreach ($tugas as $item)
                        <a href="http://localhost/examcorrection/public/app/assignment/{{ $item->slug }}" style="color: black">
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
                                                  <div class="col-md-9" >
                                                    <h3>{{ $item->task_title }}</h3>
                                                    <p>Diberikan {{ $item->start_time }}</p>
                                                  </div>
                                                  <!-- kolom untuk status sebelah kanan -->
                                                  <div class="col-md-2" style="margin-left:60px; width: 135px; background:rgba(0, 128, 0, 0.06); display:flex; justify-content: right; border-radius:5px;">
                                                        <div class="col-md-6" style="padding-top: 10px; width:82px; border-right: 1px solid rgba(0, 128, 0, 0.1); margin-right: 5px">
                                                            <p style="margin-top: -8px;" style="">Status:</p>
                                                            <p style="margin-top: -8px; border: 1px solid rgb(92, 143, 92); border-radius: 5px; padding: 0 3px; color:green; ">{{ $item->status }}</p>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6" style="padding-top: 10px; width:70px; margin-right: -15px">
                                                            <p style="margin-top: -8px">Nilai</p>
                                                            <p style="margin-top: -8px; border: 1px solid rgb(92, 143, 92); border-radius: 5px; padding-left: 3px; padding-right: 3px; color:green; text-align:center">80</p>
                                                        </div>

                                                  </div>
                                                </div>
                                              </li>
                                            </ul>
                                          </div> 
                                    </div>
                                </div>
                        </div>
                        </a>
                        @endforeach
                        
                    </div>
               
                </div>
            </section>
        </div>			
     </div>
</div>
@stop
