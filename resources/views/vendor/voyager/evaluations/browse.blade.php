
@extends('voyager::master')

@section('content')
<script src="https://kit.fontawesome.com/8d4621267d.js" crossorigin="anonymous"></script>


<div class="container-fluid">
<div class="row">
  <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading" style="display: flex; align-items:center;">
            <i class="fa-solid fa-list" style="margin-left: 20px"></i>
            <h2 class="panel-title">PENUGASAN</h2> 
          </header>
          <div class="panel-body">
              <div class="row">
                  <!-- colom terluar mata kuliah-->
                  <div class="col-lg-12">
                    @foreach ($tugas as $item)
                    <a href="http://localhost/examcorrection/public/app/{{ $item->slug }}" style="color: black">
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
                                                      <i class="fa-solid fa-file-pen" style="color: #fe6220; font-size: 30px; margin-left:25px; padding:0; margin-top: 25px;"></i>
                                              
                                                  </div>  
                                              </div>
                                            <!-- Kolom untuk judul dan keterangan -->
                                            <div class="col-md-8">
                                              <h3>{{ $item->task_title }}</h3>
                                              <p>Diberikan {{ $item->start_time }}</p>
                                            </div>
                                            <!-- kolom untuk status sebelah kanan -->
                                            <div class="col-md-3">
                                              <div class="col-md-5"></div>
                                              <div class="col-sm-12 col-md-7" style="border-radius: 5px; background: rgba(0, 128, 0, 0.1); padding-top: 5px; padding-bottom: 5px; ">
                                                  <span style="color: black;" class="pull-left">Status  :</span>
                                                  <span class="pull-right" style="border: 1px solid rgb(92, 143, 92); border-radius: 5px; padding-left: 3px; padding-right: 3px; color:green"> {{ $item->status }}</span>
                                              </div>
                                              <div class="text-right">Batas waktu: <br><span>{{ $item->end_time }}</span></div>
                                              
                                            </div>
                                          </div>
                                        
                                        </li>
                                      </ul>
                                    </div> 
                              </div>
                          </div>
                        </a>
                          @endforeach
                  </div>

              </div>
          </div>
      </div>
  </section>
  </div>
</div>
</div>
@stop
