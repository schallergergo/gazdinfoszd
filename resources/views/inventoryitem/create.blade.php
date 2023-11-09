
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create inventory item")}} - {{$inventory->name_of_product}}</h1>

                    </div>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('inventoryitem.store',[$inventory,$added])}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          
                          <x-input type="number" name="amount" displayname="Amount used" isrequired="required" />
                          <x-input type="text" name="comments" displayname="Comments" isrequired="" />

                   </div> <!-- end of the row-->






                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection