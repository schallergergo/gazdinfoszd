
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Edit rider")}}</h1>

                    </div>
                    <form method="POST" action="{{route('rider.update',$rider)}}">
                    <!-- Content Row -->
                    @csrf



                    <div class="row">
                       <hr />


                          <x-input-edit type="text" name="name" displayname="Rider name" value="{{$rider->name}}" isrequired="required" />
                          
                          <x-input-edit type="number" name="normal_price" displayname="Price of a lesson" value="{{$rider->normal_price}}" isrequired="required" />

                   </div> <!-- end of the row-->


                    <div class="row">
                       <hr />


                          <x-input-edit type="text" name="phone" displayname="Phone number" value="{{$rider->phone}}"  isrequired="required" />
                          
                          <x-input-edit type="email" name="email" displayname="Email" value="{{$rider->email}}"  isrequired="required" />

                   </div> <!-- end of the row-->


                    <div class="row">

                     <div class="col-md">
                    <div class="form-outline">
                    <label class="form-label" for="user_id">{{__("Users")}}</label>
                    <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="user_id" id="user_id" >
                    
                        <option value="">{{__("Select a user")}} {{__("Optional")}}</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}" @if($user->id == $rider->user_id) selected @endif >{{$user->name}}</option>
                        @endforeach

                    </select>
                </div>
                        </div> <!-- end of the col-->
                   
                   </div> <!-- end of the row-->



                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection
