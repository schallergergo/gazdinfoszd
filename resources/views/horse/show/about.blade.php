                <div class="tab-pane show active" id="about-me">

                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                        {{__("Treatments")}}</h5>

                    <ul class="list-unstyled timeline-sm">

                        @foreach ($treatments as $treatment)

                        <li class="timeline-sm-item">
                            <span class="timeline-sm-date">{{$treatment->date_of_treatment}}</span>
                            <h5 class="mt-0 mb-1">{{$treatment->type_of_treatment}}</h5>
                            <p>{{$treatment->cost_of_treatment}} Ft</p>
                            <p class="text-muted mt-2">{{$treatment->comments}}</p>

                        </li>
                       @endforeach
                    </ul>

                    <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                        Projects</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Clients</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>App design and development</td>
                                    <td>01/01/2015</td>
                                    <td>10/15/2018</td>
                                    <td><span class="badge badge-info">Work in Progress</span></td>
                                    <td>Halette Boivin</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Coffee detail page - Main Page</td>
                                    <td>21/07/2016</td>
                                    <td>12/05/2018</td>
                                    <td><span class="badge badge-success">Pending</span></td>
                                    <td>Durandana Jolicoeur</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Poster illustation design</td>
                                    <td>18/03/2018</td>
                                    <td>28/09/2018</td>
                                    <td><span class="badge badge-pink">Done</span></td>
                                    <td>Lucas Sabourin</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Drinking bottle graphics</td>
                                    <td>02/10/2017</td>
                                    <td>07/05/2018</td>
                                    <td><span class="badge badge-purple">Work in Progress</span></td>
                                    <td>Donatien Brunelle</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Landing page design - Home</td>
                                    <td>17/01/2017</td>
                                    <td>25/05/2021</td>
                                    <td><span class="badge badge-warning">Coming soon</span></td>
                                    <td>Karel Auberjo</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end timeline content-->