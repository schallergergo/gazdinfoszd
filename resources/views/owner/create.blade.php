
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create owner record")}}</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <form method="POST" action="{{route('owner.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input type="text" name="name" displayname="Name" isrequired="" />
                          <x-input type="email" name="email" displayname="Email" isrequired="required"/>
                          

                   </div> <!-- end of the row-->



                    <div class="row">
                       <hr />

                            <x-input type="text" name="phone_no" displayname="Phone number" isrequired="required" />
                    <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="type_of_treatment">{{__("Users")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="user_id">
                            
                        <option value="">{{__("Select a user (optional)")}}</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    </div>

                   </div> <!-- end of the row-->

                    <div class="row">
                         <hr />
                      <x-text-area name="comments" displayname="Comments" isrequired=""/>

                    </div>

                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection