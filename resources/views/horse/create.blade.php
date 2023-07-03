
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <form method="POST" action="{{route('horse.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input type="text" name="name" displayname="Name" isrequired="required" />
                          <x-input type="date" name="birthdate" displayname="Date of birth" isrequired="required"/>
                          <x-input type="text" name="gender" displayname="Gender" isrequired="required" />

                   </div> <!-- end of the row-->



                    <div class="row">
                       <hr />


                          <x-input type="text" name="passport_number" displayname="Passport number" isrequired="required"/>
                          <x-input type="text" name="FEI_number" displayname="FEI number" isrequired="required"/>
                          <x-input type="text" name="color" displayname="Color" isrequired=""/>

                   </div> <!-- end of the row-->

                    <div class="row">
                         <hr />
                      <x-textarea name="comments" displayname="Comments" isrequired=""/>

                    </div>

                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection