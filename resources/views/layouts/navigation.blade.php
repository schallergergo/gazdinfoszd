        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-horse"></i>
                </div>
                <div class="sidebar-brand-text mx-3">StableMate</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{__("Dashboard")}}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fas fa-user"></i>
                    <span>{{__("Users")}}</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{route('user.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('user.create')}}">{{__("Create")}}</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHorses"
                    aria-expanded="true" aria-controls="collapseHorses">
                    <i class="fas fa-horse"></i>
                    <span>{{__("Horses")}}</span>
                </a>
                <div id="collapseHorses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{route('horse.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('horse.create')}}">{{__("Create")}}</a>
                    </div>
                </div>
            </li>

             


             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOwners"
                    aria-expanded="true" aria-controls="collapseOwners">
                    <i class="fa-solid fa-hat-cowboy"></i>
                    <span>{{__("Owners")}}</span>
                </a>
                <div id="collapseOwners" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{route('owner.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('owner.create')}}">{{__("Create")}}</a>
                    </div>
                </div>
            </li>


               <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRiders"
                    aria-expanded="true" aria-controls="collapseRiders">
                    <i class="fa-solid fa-helmet-safety"></i>
                    <span>{{__("Riders")}}</span>
                </a>
                <div id="collapseRiders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{route('rider.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('rider.create')}}">{{__("Create")}}</a>
                    </div>
                </div>
            </li>

             <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTreatment"
                    aria-expanded="true" aria-controls="collapseTreatment">
                    <i class="fas fa-book-medical"></i>
                    <span>{{__("Treatments")}}</span>
                </a>
                <div id="collapseTreatment" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Treatment</h6>-->
                         <a class="collapse-item" href="{{route('treatment.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('treatment.create')}}">{{__("Create")}}</a>
                    </div>
                </div>
            </li>

               <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents"
                    aria-expanded="true" aria-controls="collapseEvents">
                    <i class="fa-regular fa-calendar-days"></i>
                    <span>{{__("Events")}}</span>
                </a>
                <div id="collapseEvents" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{route('event.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('event.create')}}">{{__("Create")}}</a>
                        <a class="collapse-item" href="{{route('venue.index')}}">{{__("Venue")}}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTask"
                    aria-expanded="true" aria-controls="collapseTask">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>{{__("Tasks")}}</span>
                </a>
                <div id="collapseTask" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Treatment</h6>-->
                         <a class="collapse-item" href="{{route('task.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('task.create')}}">{{__("Create")}}</a>
                    </div>
                </div>
            </li>



               <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLesson"
                    aria-expanded="true" aria-controls="collapseLesson">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <span>{{__("Lessons")}}</span>
                </a>
                <div id="collapseLesson" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{route('lesson.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('lesson.create')}}">{{__("Create")}}</a>
                    </div>
                </div>
            </li>


               <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinance"
                    aria-expanded="true" aria-controls="collapseFinance">
                    <i class="fa-solid fa-coins"></i>
                    <span>{{__("Finance")}}</span>
                </a>
                <div id="collapseFinance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{route('income.index')}}">{{__("Income")}}</a>
                        <a class="collapse-item" href="{{route('expense.index')}}">{{__("Expense")}}</a>
                    </div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventory"
                    aria-expanded="true" aria-controls="collapseInventory">
                    <i class="fa-solid fa-warehouse"></i>
                    <span>{{__("Inventory")}}</span>
                </a>
                <div id="collapseInventory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{route('inventory.index')}}">{{__("Index")}}</a>
                        <a class="collapse-item" href="{{route('inventory.create')}}">{{__("Create")}}</a>
                    </div>
                </div>
            </li>

           



           
        </ul>
        <!-- End of Sidebar -->