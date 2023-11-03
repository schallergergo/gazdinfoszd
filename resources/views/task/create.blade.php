
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Create event")}}</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <form method="POST" action="{{route('task.store')}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                        <x-input type="text" name="task" displayname="Task" isrequired="required" />
                        

                    </div> <!-- end of the row-->
                           <div class="row">
                          <x-input type="datetime-local" name="task_start" displayname="Start of the task" isrequired="required"/>
                          <x-input type="datetime-local" name="task_end" displayname="End of the task" isrequired="required"/>

                   </div> <!-- end of the row-->


                                       
                    <div class="row">
                        <x-text-area name="description" displayname="Description of the task" isrequired=""/>
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
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>
                </div>

@endsection