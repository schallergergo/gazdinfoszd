  <div class="card-box text-center">
            <img src="/img/horse.jpg" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

            <h4 class="mb-0">{{$horse->name}}</h4>
            <p class="text-muted">Nagyon szép lovacska</p>

              <a href="{{route('treatment.create')}}">  <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">{{__("New treatment")}}</button></a>
            <a href="{{route('task.create')}}"> <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">{{__("New task")}}</button></a>

            <div class="text-left mt-3">
                <h4 class="font-13 text-uppercase pb-2">{{__("Data")}}:</h4>

                <p class="text-muted mb-2 font-13"><strong>Birth date:</strong> <span class="ml-2">{{$horse->birthdate}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>Gender :</strong><span class="ml-2">{{$horse->gender}}</span></p>
                @if ($horse->passport_number)
                <p class="text-muted mb-2 font-13"><strong>Passport number :</strong> <span class="ml-2 ">{{$horse->passport_number}}</span></p>
                @endif
                @if ($horse->FEI_number)
                <p class="text-muted mb-2 font-13"><strong>FEI number :</strong> <span class="ml-2 ">{{$horse->FEI_number}}</span></p>
                @endif


                <p class="text-muted font-13 mb-3">
                    {{$horse->comments}}
                </p>
                @if(count($owners)>0)
                <h4 class="mb-2">{{__("Owners")}}:</h4>
               
                @foreach($owners as $owner)
                <p class="text-muted mb-2 font-13"><strong>{{__("Full Name")}}:</strong> <span class="ml-2">{{$owner->name}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>{{__("Mobile")}} :</strong><span class="ml-2">{{$owner->phone_no}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>{{__("Email")}} :</strong> <span class="ml-2 ">{{$owner->email}}</span></p>

                
                <hr>
                @endforeach
                @endif
            </div>

        </div> <!-- end card-box -->