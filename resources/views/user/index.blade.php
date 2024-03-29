
@extends("layouts.app")
@section("extra_styles")
<link rel="stylesheet" type="text/css" href="/css/horse/index.css">
@endsection
@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<section class="section">
    <div class="container">
        <form action="{{route('user.index')}}" method="GET">
        <div class="justify-content-center row">
            <div class="col-lg-12">
                <div class="candidate-list-widgets mb-4">
                    <form action="#" class="">
                        <div class="g-2 row">
                            <div class="col-lg-3">
                                <div class="filler-job-form">
                                    <i class="uil uil-briefcase-alt"></i><input id="user_name" name="user_name" placeholder="{{__('User name')}}" type="search" class="form-control filler-job-input-box form-control"  value="{{$user_name}}"/>
                                </div>
                            </div>
                           
                            <div class="col-lg-3">
                                <div>
                                    <input type="submit" name="submit" class="btn btn-success ms-2" value={{__("Filter")}}>

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

<div class="candidate-list">
                @foreach ($users as $user)
                
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

                                            {{$user->name}} 
                                            @if(!$user->active)
                                            <span class="text-danger">{{__("Inactive")}}</span>
                                            @endif

                                        </h5>
                                        <a href="{{route('user.index.role',$user->role)}}"><p class="text-muted mb-2">{{__($user->role)}}</p></a>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item"><i class="mdi mdi-map-marker"></i> {{$user->email}}</li>
   
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="favorite-icon">

                                <a href="{{route('user.activate',$user)}}" >
                                    @if ($user->active)
                                    <i class="mdi mdi mdi-trash-can-outline fs-18"></i>
                                    @else
                                    <i class="mdi mdi mdi-airplane-off fs-18"></i>
                                    @endif


                                </a>
                                <a href="{{route('user.edit',$user)}}" >
                                    <i class="mdi mdi mdi-cog fs-18"></i></a>
                                <a href="{{route('user.loginAs',$user)}}" >
                                    <i class="mdi mdi mdi-login fs-18"></i></a>
                            </div>
                        </div>
                    </div>

                    
                    @endforeach
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 pt-2 col-lg-12">
                <nav aria-label="Page navigation example">
                    <div class="pagination job-pagination mb-0 justify-content-center">
                        <div class="d-flex">{{$users->links()}}</div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection