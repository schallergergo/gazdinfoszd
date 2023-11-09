
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Edit owner record")}}</h1>

                    </div>
                    <form method="POST" action="{{route('owner.update',$owner)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input-edit type="text" name="name" displayname="Name" value="{{$owner->name}}" isrequired="" />
                          <x-input-edit type="email" name="email" displayname="Email" value="{{$owner->email}}" isrequired="required"/>
                          

                   </div> <!-- end of the row-->



                    <div class="row">
                       <hr />

                            <x-input-edit type="text" name="phone_no" displayname="Phone number" value="{{$owner->phone_no}}" isrequired="required" />
                    <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="type_of_treatment">{{__("Users")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="user_id">
                            
                        <option value="">{{__("Select a user (optional)")}}</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @if ($user->id==$owner->user_id)selected @endif>{{$user->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    </div>

                   </div> <!-- end of the row-->

                    <div class="row">
                         <hr />
                      <x-text-area-edit name="comments" displayname="Comments" value="{{$owner->comments}}" isrequired=""/>

                    </div>

                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>





                                 <!-- Page Heading2 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-3">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Attach horse")}}</h1>

                    </div>
                    @foreach($notOwnedHorses as $horse)
                    <a href="{{route('owner.attachHorse',[$owner,$horse,true])}}">{{$horse->name
                    }} |</a>
                    @endforeach


                                 <!-- Page Heading2 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-3">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Detach horse")}}</h1>

                    </div>
                    @foreach($ownedHorses as $horse)
                    <a href="{{route('owner.detachHorse',[$owner,$horse,true])}}">{{$horse->name
                    }} |</a>
                    @endforeach
                 

                 </div>

@endsection