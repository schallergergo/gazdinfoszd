                <div class="tab-pane show active" id="about-me">

                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                        {{__("Treatments")}}</h5>

                    <ul class="list-unstyled timeline-sm">

                        @foreach ($treatments as $treatment)

                        <li class="timeline-sm-item">
                            <span class="timeline-sm-date">{{$treatment->date_of_treatment}}</span>
                            <h5 class="mt-0 mb-1">{{__($treatment->type_of_treatment)}}</h5>
                            <p>{{$treatment->cost_of_treatment}} Ft</p>
                            <p class="text-muted mt-2">{{$treatment->comments}}</p>

                        </li>
                       @endforeach
                    </ul>
  <div class="row">
            <div class="mt-4 pt-2 col-lg-12">
                <nav aria-label="Page navigation example">
                    <div class="pagination job-pagination mb-0 justify-content-center">
                        <div class="d-flex">{{$treatments->links()}}</div>
                    </div>
                </nav>
            </div>
        </div>
                </div>
               
                <!-- end timeline content-->