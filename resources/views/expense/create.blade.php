
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create expense")}}</h1>

                    </div>
                    <form method="POST" action="{{route('expense.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />
                          <x-input type="date" name="date" displayname="Date of expense" isrequired="required"/>
                          <x-input type="number" name="amount" displayname="Amount" isrequired="required" />

                    </div> <!-- end of the row-->
                           <div class="row">



                            <x-input type="text" name="description" displayname="Description" isrequired="required" />
                             <div class="col-md">


                         
                          <div class="form-outline">
                            <label class="form-label" for="category">{{__("Category")}}</label>
                            <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="category">

                                @foreach(getExpenseTypes() as $type)
                            <option value="{{$type}}">{{__($type)}}</option>

                                @endforeach

                            </select>
                            @error("category")
                               <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div> <!-- end of the col-->
                    </div>
                    <div class="row">
                           <div class="form-outline">
                            <label class="form-label" for="description">{{__("Horse")}}</label>
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