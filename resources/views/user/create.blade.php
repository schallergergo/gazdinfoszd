
@extends("layouts.app")
@section("content")
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create user record")}}</h1>

                    </div>
                    <form method="POST" action="{{route('user.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input type="text" name="name" displayname="Name" isrequired="" />
                          <x-input type="email" name="email" displayname="Email" isrequired="required"/>
                          

                   </div> <!-- end of the row-->

                   <div class="row">
                       <hr />


                          <x-input type="password" name="password" displayname="Password" isrequired="required" />
                          <x-input type="password" name="password_confirmation" displayname="Confirm password" isrequired="required" />

                   </div> <!-- end of the row-->



                    <div class="row">
                       <hr />

                    <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="locale">{{__("Language")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="locale" required>
  

                                <option value="hu">Magyar</option>
                                <option value="en">English</option>


                        </select>
                    </div>
                    </div>
                           
                    <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="role">{{__("Role")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="role" required>
                            
                        <option value="">{{__("Select a role")}}</option>
                            @foreach(getUserRoles() as $role)
                                <option value="{{$role}}">{{__($role)}}</option>
                            @endforeach

                        </select>
                    </div>
                    </div>

                   </div> <!-- end of the row-->

                   
                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection