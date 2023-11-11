
@extends("layouts.app")
@section("extra_styles")
<link rel="stylesheet" type="text/css" href="/css/horse/index.css">
@endsection
@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<section class="section">
    <div class="container">
    
     

        <div class="row">
            <div class="col-lg-12">
                @if(count($lessons)==0)
                <h5 class="fs-19 mb-0">
                    No lesson!
                </h5>
                @endif

                @foreach ($lessons as $lesson)
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
                                            {{$lesson->rider->name}}
                                        </h5>
                                        <p class="text-muted mb-2">{{$lesson->horse->name}}</p>
                                        <ul class="list-inline mb-0 text-muted">
                                             <li class="list-inline-item">
                                                <i class="mdi mdi-calendar-blank"></i> 
                                                {{$lesson->date_of_lesson}}

                                            </li>
                                          
                                             <li class="list-inline-item">

                                                <i class="mdi mdi-cash"></i> {{$lesson->price_of_lesson}}
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="mdi mdi-comment"></i> {{$lesson->comments}}

                                            </li>
   
   
                                        </ul>
                                        
                                    </div>
                                </div>
                             
                            </div>
   
                        </div>
                    </div>


                    @endforeach
                   
                </div>
            </div>
        </div>
        @if($found)
        <div class="row">
            <div class="mt-4 pt-2 col-lg-12">
                <nav aria-label="Page navigation example">
                    <div class="pagination job-pagination mb-0 justify-content-center">
                        <div class="d-flex">{{$lessons->links()}}</div>
                    </div>
                </nav>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection