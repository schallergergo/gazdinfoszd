
@extends("layouts.app")
@section("extra_styles")
<link rel="stylesheet" type="text/css" href="/css/horse/index.css">
@endsection
@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<section class="section">
    <div class="container">
 <form action="{{route('task.index')}}" method="GET">
        <div class="justify-content-center row">
            <div class="col-lg-12">
                <div class="candidate-list-widgets mb-4">
                    <form action="#" class="">
                        <div class="g-2 row">
                            <div class="col-lg-3">
                                <div class="filler-job-form">
                                    <i class="uil uil-briefcase-alt"></i><input id="search_term" name="search_term" placeholder="{{__('Search term')}}" type="date" class="form-control filler-job-input-box form-control"  value="{{$search_term}}"/>
                                </div>
                            </div>
                           
                            <div class="col-lg-3">
                                <div>
                                    <input type="submit" name="submit" class="btn btn-success ms-2" value="{{__('Filter')}}">
                                    
                                </div>
                            </div>
                              
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-lg-12">


                @foreach ($tasks as $task)
                <div class="candidate-list">
                    <div class="candidate-list-box card mt-4">
                        <div class="p-4 card-body">
                            <div class="align-items-center row">
                                <div class="col-auto">
                                    <div class="candidate-list-images">
                                        <a href="#"><img src="/img/horse.jpg" alt="" class="avatar-md img-thumbnail rounded-circle" /></a>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="candidate-list-content mt-3 mt-lg-0">
                                        <h5 class="fs-19 mb-0">
                                            {{$task->task}}

                                        </h5>

                                        <ul class="list-inline mb-0 text-muted">
                                            
                                            <li class="list-inline-item"><i class="mdi mdi-calendar-blank"></i> {{$task->task_day}} </li>
                                            <li class="list-inline-item"><i class="mdi mdi-map-marker"></i> {{$task->task_start}} </li>
                                            <li class="list-inline-item"><i class="mdi mdi-map-marker"></i> {{$task->task_end}} </li>

   
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                        @foreach($task->user as $user)
                                        <span class="badge bg-soft-secondary fs-14 mt-1"><a href="{{route('task.index.user',$user)}}">{{$user->name}}</a></span>
                                        @endforeach
                                    </div>

                                    <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                        @foreach($task->horse as $horse)
                                        <span class="badge bg-soft-primary fs-14 mt-1"><a href="{{route('task.index.horse',$horse)}}">{{$horse->name}}</a></span>
                                        @endforeach
                                    </div>
                                
                                    
                                </div>
                            </div>
                            <div class="favorite-icon">
                                <a href="{{route('task.done',$task)}}" >
                                    @if ($task->done)
                                    
                                    <i class="mdi mdi-checkbox-marked-outline fs-18"></i>
                                    @else
                                    <i class="mdi mdi-checkbox-blank-outline fs-18"></i>
                                    @endif
                                </a>
                                <a href="{{route('task.delete',$task)}}" >
                                    <i class="mdi mdi mdi-trash-can-outline fs-18"></i></a>
                                    <a href="{{route('task.edit',$task)}}" >
                                    <i class="mdi mdi mdi-cog fs-18"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                    @endforeach
                   
      
            </div>
        </div>
        <div class="row">
            <div class="mt-4 pt-2 col-lg-12">
                <nav aria-label="Page navigation example">
                    <div class="pagination job-pagination mb-0 justify-content-center">
                        <div class="d-flex">{{$tasks->links()}}</div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection