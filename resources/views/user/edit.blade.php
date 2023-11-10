
@extends("layouts.app")
@section("content")
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Edit user record")}}</h1>

                    </div>
                    <form method="POST" action="{{route('user.update',$user)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input-edit type="text" name="name" displayname="Name" value="{{$user->name}}" isrequired="" />
                          <x-input-edit type="email" name="email" displayname="Email" value="{{$user->email}}" isrequired="required"/>
                          

                   </div> <!-- end of the row-->

                  


                    <div class="row">
                       <hr />

                    <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="locale">{{__("Language")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="locale" required>
  

                                <option @if ($user->locale == 'hu') selected @endif value="hu">Magyar</option>
                                <option @if ($user->locale == 'en') selected @endif value="en">English</option>


                        </select>
                    </div>
                    </div>
                           
                    <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="role">{{__("Role")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="role" required>
                            
                        <option value="">{{__("Select a role")}}</option>
                            @foreach(getUserRoles() as $role)
                                <option @if ($user->role==$role) selected @endif value="{{$role}}">{{__($role)}}</option>
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