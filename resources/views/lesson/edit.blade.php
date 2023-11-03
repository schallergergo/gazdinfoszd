
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Update lesson")}}</h1>

                    </div>
                    <form method="POST" action="{{route('lesson.update',$lesson)}}">
                    <!-- Content Row -->
                    @csrf

                                        <div class="row">

                     <div class="col-md">
                    <div class="form-outline">
                    <label class="form-label" for="rider_id">{{__("Riders")}}</label>
                    <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="rider_id" id="rider_id" required>
                    
                        <option value="">{{__("Select a rider")}}</option>
                        @foreach($riders as $rider)
                        <option value="{{$rider->id}}" @if ($rider->id==$lesson->rider_id) selected @endif>{{$rider->name}}</option>
                        @endforeach

                    </select>
                </div>
                        </div> <!-- end of the col-->
                    <div class="col-md">
                    <div class="form-outline">
                    <label class="form-label" for="horse_id">{{__("Horses")}}</label>
                    <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="horse_id" id="horse_id" required>

                        <option value="">{{__("Select a horse")}}</option>
                        @foreach($horses as $horse)
                        <option value="{{$horse->id}}" @if ($horse->id==$lesson->horse_id) selected @endif>{{$horse->name}}</option>
                        @endforeach
                    </select>
                </div>
                    </div><!-- end of the col-->
                   </div> <!-- end of the row-->


                    <div class="row">
                       <hr />


                          <x-input-edit type="date" name="date_of_lesson" displayname="Date of lesson" isrequired="required" value="{{$lesson->date_of_lesson}}"/>
                          
                          <x-input-edit type="number" name="price_of_lesson" displayname="Price of lesson" isrequired="required" value="{{$lesson->price_of_lesson}}"/>

                   </div> <!-- end of the row-->


                    <div class="row">
                         <hr />
                      <x-textarea-edit name="comments" displayname="Comments" isrequired="" value="{{$lesson->comments}}"/>

                    </div>

                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection
@section("footerScript")
<script type="text/javascript">
    
    document.getElementById('date_of_lesson').valueAsDate = new Date();

</script>
<script src="{{ asset('js/getNormalPriceAjax.js') }}"></script>
@endsection