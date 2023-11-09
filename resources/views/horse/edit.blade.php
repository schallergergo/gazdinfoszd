
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Edit horse record")}}</h1>

                    </div>
                    <form method="POST" action="{{route('horse.update',$horse)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input-edit type="text" name="name" displayname="Name" value="{{$horse->name}}" isrequired="" />
                          <x-input-edit type="date" name="birthdate" displayname="Date of birth" value="{{$horse->birthdate}}"  isrequired="required"/>
                          <x-input-edit type="text" name="gender" displayname="Gender" value="{{$horse->gender}}" isrequired="required" />

                   </div> <!-- end of the row-->



                    <div class="row">
                       <hr />


                          <x-input-edit type="text" name="passport_number" displayname="Passport number" value="{{$horse->passport_number}}" isrequired="required"/>
                          <x-input-edit type="text" name="FEI_number" displayname="FEI number" value="{{$horse->FEI_number}}" isrequired=""/>
                          <x-input-edit type="text" name="color" displayname="Color" value="{{$horse->color}}" isrequired=""/>

                   </div> <!-- end of the row-->

                    <div class="row">
                         <hr />
                      <x-text-area-edit name="comments" displayname="Comments" value="{{$horse->comments}}" isrequired=""/>

                    </div>

                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>

                   <!-- Page Heading2 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-3">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Attach owner")}}</h1>

                    </div>
                    @foreach($doesNotOwn as $owner)
                    <a href="{{route('owner.attachHorse',[$owner,$horse,0])}}">{{$owner->name
                    }} |</a>
                    @endforeach


                                 <!-- Page Heading2 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-3">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Detach owner")}}</h1>

                    </div>
                    @foreach($doesOwn as $owner)
                    <a href="{{route('owner.detachHorse',[$owner,$horse,0])}}">{{$owner->name
                    }} |</a>
                    @endforeach


                </div>

@endsection