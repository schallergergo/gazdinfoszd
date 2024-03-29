
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create task")}}</h1>

                    </div>
                    <form method="POST" action="{{route('task.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                        <x-input type="text" name="task" displayname="Task" isrequired="required" />
                        

                    </div> <!-- end of the row-->
                           <div class="row">
                            <x-input type="date" name="task_day" displayname="Day of the task" isrequired="required"/>
                          <x-input type="time" name="task_start" displayname="Start of the task" isrequired="required"/>
                          <x-input type="time" name="task_end" displayname="End of the task" isrequired="required"/>

                   </div> <!-- end of the row-->


                                       
                    <div class="row">
                        <x-text-area name="description" displayname="Description of the task" isrequired=""/>
                   </div> <!-- end of the row-->
                   <label class="form-label pt-2" for="horses" >{{__("Horses")}}</label><br>
@foreach($horses as $horse)
                   <div class="form-check form-check-inline">
                              
                              
                               <input class="form-check-input"  type="checkbox" id= "horse_{{$horse->id}}" name="horses[]"  value= "{{$horse->id}}"/>
                                <label for="horse_{{$horse->id}}" class="checkbox-inline"> {{$horse->name}}</label>

                    </div>
@endforeach


                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection