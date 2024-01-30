
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
        <div class="justify-content-center row">
            <div class="col-lg-12">
                <div class="candidate-list-widgets mb-4">

                                <div>
                                    <a href="{{route('venue.create')}}"><button class="btn btn-success ms-2" value="{{__('Filter')}}"> {{__("Create new")}}</button></a>
                                    
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="candidate-list">
                @foreach ($venues as $venue)
                
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
                                            {{$venue->name}} 
                                            @if(!$venue->active)
                                            <span class="text-danger">{{__("Inactive")}}</span>
                                            @endif
                                        </h5>
                                        <p class="text-muted mb-2"><i class="mdi mdi-calendar-blank"></i>  {{$venue->opens}} - {{$venue->closes}}</p>
                                        
                                        
                                    </div>
                                </div>
                             
                            </div>
                            <div class="favorite-icon">
                                <a href="{{route('venue.delete',$venue)}}">
                                    @if ($venue->active)
                                    <i class="mdi mdi mdi-trash-can-outline fs-18"></i>
                                    @else
                                    <i class="mdi mdi mdi-airplane-off fs-18"></i>
                                    @endif
                                </a>
                                <a href="{{route('venue.edit',$venue)}}" >
                                    <i class="mdi mdi mdi-cog fs-18"></i></a>
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
                        <div class="d-flex">{{$venues->links()}}</div>
                    </div>
                </nav>
            </div>
        </div>
    
</section>

@endsection