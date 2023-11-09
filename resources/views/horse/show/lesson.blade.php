                <div class="tab-pane show " id="lesson">

                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-data-board mr-1"></i>
                        {{__("Lessons")}}</h5>

                    <ul class="list-unstyled timeline-sm">

                        @foreach ($lessons as $lesson)

                        <li class="timeline-sm-item">
                            <span class="timeline-sm-date">{{$lesson->date_of_lesson}}</span>
                            <h5 class="mt-0 mb-1">{{__($lesson->rider->name)}}</h5>
                            <p>{{$lesson->price_of_lesson}} Ft</p>
                            <p class="text-muted mt-2">{{$lesson->comments}}</p>

                        </li>
                       @endforeach
                    </ul>
                      <div class="row">
            <div class="mt-4 pt-2 col-lg-12">
                <nav aria-label="Page navigation example">
                    <div class="pagination job-pagination mb-0 justify-content-center">
                        <div class="d-flex">{{$lessons->links()}}</div>
                    </div>
                </nav>
            </div>
        </div>

                </div>
                
                <!-- end timeline content-->