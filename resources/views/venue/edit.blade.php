
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create venue")}}</h1>

                    </div>
                    <form method="POST" action="{{route('venue.update',$venue)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input-edit type="text" name="name" displayname="Name" value="{{$venue->name}}" isrequired="" />
                          </div> <!-- end of the row-->
                      <div class="row">
                          <x-input-edit type="time" name="opens" displayname="Opens" value="{{$venue->opens}}" isrequired="required"/>

                           <x-input-edit type="time" name="closes" displayname="Closes" value="{{$venue->closes}}" isrequired="required"/>
                          

                   </div> <!-- end of the row-->




                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection