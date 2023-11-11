
@extends("layouts.app")
@section("content")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Edit task")}}</h1>
                    </div>
                    <form method="POST" action="{{route('task.update',$task)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />


                        <x-input-edit type="text" name="task" displayname="Task" isrequired="required" value="{{$task->task}}" />
                        

                    </div> <!-- end of the row-->
                           <div class="row">
                        <x-input-edit type="date" name="task_day" displayname="Day of the task" isrequired="required" value="{{$task->task_day}}"/>
                          <x-input-edit type="time" name="task_start" displayname="Start of the task" isrequired="required" value="{{$task->task_start}}"/>
                          <x-input-edit type="time" name="task_end" displayname="End of the task" isrequired="required" value="{{$task->task_end}}"/>

                   </div> <!-- end of the row-->


                                       
                    <div class="row">
                        <x-text-area-edit name="description" displayname="Description of the task" isrequired="" value="{{$task->description}}"/>
                   </div> <!-- end of the row-->


                    <div class="row">
                          <div class= "col-md pt-2" >
                            <button class="btn btn-secondary" type="submit">{{__("Submit")}}</button>
                          </div>
                      </div>
                 </form>


                                 <!-- Page Heading2 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-3">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Assign task")}}</h1>

                    </div>

                                        <form method="POST" action="{{route('task.assignUser',$task)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />

                         <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="type_of_treatment">{{__("Users")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="user_id">
                            
                        <option value="">{{__("Select a user")}}</option>
                            @foreach($unassignedUser as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    </div>
                    <div class= "col-md pt-4" >
                            <button class="btn btn-secondary" type="submit">{{__("Assign")}}</button>
                          </div>
                    </div> <!-- end of the row-->

                          

                    </form>
                    @foreach($assignedUser as $user)
                    <form method="POST" action="{{route('task.detachUser',[$task,$user])}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">

                    <div class="col-md">
                        <p class="float-right"><a href="#">{{$user->name}}</a></p>
                    </div>

                    
                    <div class= "col-md" >
                            <button class="btn btn-secondary" type="submit">{{__("Detach")}}</button>
                          </div>
                    </div> <!-- end of the row-->
                    </form>
                    @endforeach


                                                     <!-- Page Heading3 -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-3">
                        <h1 class="h3 mb-0 text-gray-800">{{__("Assign horse")}}</h1>

                    </div>

                                        <form method="POST" action="{{route('task.assignHorse',$task)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                       <hr />

                         <div class="col-md">
                            <div class="form-outline">
                        <label class="form-label" for="horse_id">{{__("Horses")}}</label>
                          <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="horse_id">
                            
                    <option value="">{{__("Select a horse")}}</option>
                            @foreach($unassignedHorse as $horse)
                                <option value="{{$horse->id}}">{{$horse->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    </div>
                    <div class= "col-md pt-4" >
                            <button class="btn btn-secondary" type="submit">{{__("Assign")}}</button>
                          </div>
                    </div> <!-- end of the row-->

                          

                    </form>
                    @foreach($assignedHorse as $horse)
                    <form method="POST" action="{{route('task.detachHorse',[$task,$horse])}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">

                    <div class="col-md">
                        <p class="float-right"><a href="{{route('horse.show',$horse)}}">{{$horse->name}}</a></p>
                    </div>

                    
                    <div class= "col-md" >
                            <button class="btn btn-secondary" type="submit">{{__("Detach")}}</button>
                          </div>
                    </div> <!-- end of the row-->
                    </form>
                    @endforeach
                          

                </div>

                    

@endsection