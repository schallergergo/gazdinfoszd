
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create income")}}</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <form method="POST" action="{{route('income.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />
                          <x-input type="date" name="date" displayname="Date of income" isrequired="required"/>
                          <x-input type="number" name="amount" displayname="Amount" isrequired="required" />

                    </div> <!-- end of the row-->
                           <div class="row">



                            <x-input type="text" name="description" displayname="Description" isrequired="required" />
                            <x-input type="text" name="category" displayname="Category" isrequired="required" />

                           <div class="form-outline">
                            <label class="form-label" for="description">Horse</label>
                        <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="horse_id">
                            
                        <option value="">{{__("Select a horse")}} {{__("Optional")}}</option>
                            @foreach($horses as $horse)
                                <option value="{{$horse->id}}">{{$horse->name}}</option>
                            @endforeach

                        </select>
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