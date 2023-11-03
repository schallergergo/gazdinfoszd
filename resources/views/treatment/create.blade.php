
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create treatment")}}</h1>

                    </div>
                    <form method="POST" action="{{route('treatment.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input type="date" name="date_of_treatment" displayname="Date of treatment" isrequired="required" />
                          
                          <x-input type="number" name="cost_of_treatment" displayname="Cost of treatment" isrequired="required" />

                   </div> <!-- end of the row-->



                    <div class="row">
                       <hr />


                          <x-input type="date" name="date_of_notification" displayname="Date of notification" isrequired="" />
                        <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="type_of_treatment">{{__("Type of treatment")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="type_of_treatment" required>
                                  <option value="">{{__("Select an item")}}</option>
                                  <option value="farrier">{{__("Farrier")}}</option>
                                  <option value="vet">{{__("Vet")}}</option>
                                  <option value="vaccinaton">{{__("Vaccination")}}</option>
                                  <option value="deworming">{{__("Deworming")}}</option>
                                  <option value="breeding">{{__("Breeding")}}</option>

                        </select>
                    </div>
                    </div>
                        
                        
                   </div> <!-- end of the row-->

<label class="form-label pt-2" for="horses" >{{__("Horses")}}</label><br>
@foreach($horses as $horse)
                   <div class="col-md">


                         
                          <div class="form-outline">

                              
                               
                               <input type="checkbox" id= "horse_{{$horse->id}}" name="horses[]"  value= "{{$horse->id}}"/>
                               <label for="horse_{{$horse->id}}"> {{$horse->name}}</label><br>

                               
                           
                          </div>
</div> <!-- end of the col-->
@endforeach





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