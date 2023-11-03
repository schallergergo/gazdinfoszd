                <div class="tab-pane" id="messages">
                
                    <form method="POST" action="{{route('horsemessage.store',$horse)}}">
                    <!-- Content Row -->
                    @csrf
                    <div class="row">
                        <x-text-area name="message" displayname="New message" isrequired="" />

                    
                    <div class= "col-md pt-4" >
                            <button class="btn btn-secondary" type="submit">{{__("Send")}}</button>
                    </div>
                    </div> <!-- end of the row-->

                          

                    </form>
                    @foreach($messages as $message)
                    <div class="row mt-2 ml-2 mr-2">
                    <div class="card ">
                          <div class="card-header">
                           <span>{{$message->user->name}}</span> <span class="float-right">{{$message->created_at}}</span> 
                          </div>
                          <div class="card-body">

                              <p>{{$message->message}}</p>

                          </div>
                        </div>
                                                    
                    </div> <!-- end of the row-->
                    @endforeach

                </div>
                <!-- end settings content-->