    <div class="card-box">
            <h4 class="header-title">{{__("Tasks")}}</h4>

            @foreach($tasks as $task)
            <div class="pt-1">
                <h6 class="text-uppercase mt-0">{{$task->task}} <span class="float-right">{{date('H:i', strtotime($task->task_start))}} - {{date('H:i', strtotime($task->task_end))}}</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="{{dateDifferencePercentage($task->task_start,$task->task_end)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{dateDifferencePercentage($task->task_start,$task->task_end)}}%">

                    </div>

                </div>
                @php
                    $assignedUsers = $task->user;
                @endphp
                @if (count($assignedUsers)>0)
                <p><span class="fw-bold">{{__("Assigned users:")}}</span> @foreach($assignedUsers as $user) <span>{{$user->name}}, </span>@endforeach</p>
                @endif
            </div>

            @endforeach

        </div> <!-- end card-box-->
