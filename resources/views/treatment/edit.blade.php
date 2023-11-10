
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Update treatment")}}</h1>

                    </div>
                    <form method="POST" action="{{route('treatment.update',$treatment)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input-edit type="date" name="date_of_treatment" displayname="Date of treatment"  value="{{$treatment->date_of_treatment}}" isrequired="required" />
                          
                          <x-input-edit type="number" name="cost_of_treatment" displayname="Cost of treatment" value="{{$treatment->cost_of_treatment}}" isrequired="required" />

                   </div> <!-- end of the row-->



                    <div class="row">
                       <hr />

                          <x-input-edit type="date" name="date_of_notification" displayname="Date of notification" value="{{$treatment->date_of_notification}}" isrequired="" />
                        <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="type_of_treatment">{{__("Type of treatment")}}</label>

                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="type_of_treatment" required>
                                  <option value="">{{__("Select an item")}}</option>
                                  <option value="farrier" @if ($treatment->type_of_treatment=="farrier")selected @endif> {{__("Farrier")}}</option>
                                  <option value="vet" @if ($treatment->type_of_treatment=="vet")selected @endif>{{__("Vet")}}</option>
                                  <option value="vaccination" @if ($treatment->type_of_treatment=="vaccination")selected @endif> {{__("Vaccination")}}</option>
                                  <option value="deworming" @if ($treatment->type_of_treatment=="deworming")selected @endif>{{__("Deworming")}}</option>
                                  <option value="breeding" @if ($treatment->type_of_treatment=="breeding")selected @endif>{{__("Breeding")}}</option>
                        </select>
                    </div>
                    </div>
                        
                        
                   </div> <!-- end of the row-->







                    <div class="row">
                         <hr />
                      <x-textarea-edit name="comments" displayname="Comments" value="{{$treatment->comments}}" isrequired=""/>

                    </div>

                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection