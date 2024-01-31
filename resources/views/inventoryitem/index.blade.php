
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
                                            
                                            
                                            <a href="{{route('inventoryitem.index',$inventory)}}">{{$inventory->name_of_product}}</a>


                                        </h5>
                                        
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item"><i class="mdi mdi-warehouse"></i> {{$inventory->amount}}</li>
                                            <li class="list-inline-item"><i class="mdi mdi-comment"></i> {{$inventory->description}}</li>
                                            <li class="list-inline-item"><i class="mdi mdi-calendar-star"></i> 
                                            {{__("Usage per month")}}:  {{number_format($usage3Month,2)}}
                                        </li>
   
                                        </ul>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="favorite-icon">
                                <a href="{{route('inventoryitem.create',[$inventory,'plus'])}}" >
                                    <i class="mdi mdi mdi-plus fs-18"></i></a>
                                <a href="{{route('inventoryitem.create',[$inventory,'minus'])}}" >
                                    <i class="mdi mdi mdi-minus fs-18"></i></a>
                                                                @can("update",$inventory)
                                <a href="{{route('inventory.edit',$inventory)}}" >
                                    <i class="mdi mdi mdi-cog fs-18"></i></a>
                                    @endcan


                            </div>
                        </div>
                    </div>
                    <div class="mt-5"><h1>{{__("Inventory items")}}</h1></div> <hr>
                @foreach ($inventoryitems as $inventoryitem)
                
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
                                           {{$inventory->name_of_product}}
                                        </h5>
                                        <p class="text-muted mb-2">{{__("Change in inventory")}}: {{$inventoryitem->amount}}</p>
                                        <ul class="list-inline mb-0 text-muted">

                                          
                                             <li class="list-inline-item">

                                                <i class="mdi mdi-acount"></i> {{$inventoryitem->user->name}}
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="mdi mdi-comment"></i> {{$inventoryitem->comments}}

                                            </li>

                                            <li class="list-inline-item">
                                                <i class="mdi mdi-calendar-blank"></i> {{$inventoryitem->created_at}}

                                            </li>
   
   
                                        </ul>
                                        
                                    </div>
                                </div>
                             
                            </div>
                            <div class="favorite-icon">

                                <a href="#" data-toggle="modal" data-target="#deleteinventoryitem{{$inventoryitem->id}}Modal">
                                    <i class="mdi mdi mdi-trash-can-outline fs-18"></i></a>
                            </div>
                        </div>
                    </div>
                    @include("inventoryitem.modal")


                    @endforeach
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 pt-2 col-lg-12">
                <nav aria-label="Page navigation example">
                    <div class="pagination job-pagination mb-0 justify-content-center">
                        <div class="d-flex">{{$inventoryitems->links()}}</div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection