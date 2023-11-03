
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create inventory")}}</h1>
                       
                    </div>
                    <form method="POST" action="{{route('inventory.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />
                          <x-input type="text" name="name_of_product" displayname="Name of product" isrequired="required"/>
                          <x-input type="number" name="amount" displayname="Amount" isrequired="required" />

                    </div> <!-- end of the row-->
                           <div class="row">



                            <x-input type="text" name="description" displayname="Description"  isrequired=""/>


                   </div> <!-- end of the row-->
               




                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection