
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Edit event")}}</h1>

                    </div>
                    <form method="POST" action="{{route('event.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                          <x-input-edit type="text" name="description" displayname="Description" value="{{$event->description}}" isrequired="required" />
                           <div class="form-outline">
                            <label class="form-label" for="description">Venue</label>
                        <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="venue_id" required>
                            
                        <option value="">{{__("Select a venue")}}</option>
                            @foreach($venues as $venue)
                                <option value="{{$venue->id}}" @if ($event->venue_id == $venue->id) selected @endif>{{$venue->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    </div> <!-- end of the row-->
                           <div class="row">
                            <x-input-edit type="date" name="event_day" displayname="Day of the event" value="{{$event->event_day}}" isrequired="required" />

                          <x-input-edit type="time" name="start" displayname="Start of the event" value="{{$event->start}}" isrequired="required"/>
                          <x-input-edit type="time" name="end" displayname="End of the event" value="{{$event->end}}" isrequired="required" />

                   </div> <!-- end of the row-->





                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection