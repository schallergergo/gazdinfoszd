
@extends("layouts.app")
@section("extra_styles")
<link rel="stylesheet" type="text/css" href="/css/horse/index.css">
@endsection
@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<section class="section">
    <div class="container">
        <div class="justify-content-center row">
            <div class="col-lg-12">
                <div class="candidate-list-widgets mb-4">
                    <form action="#" class="">
                        <div class="g-2 row">
                            <div class="col-lg-3">
                                <div class="filler-job-form">
                                    <i class="uil uil-briefcase-alt"></i><input id="exampleFormControlInput1" placeholder="Job, Company name... " type="search" class="form-control filler-job-input-box form-control" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="filler-job-form">
                                    <i class="uil uil-location-point"></i>
                                    <select class="form-select selectForm__inner" data-trigger="true" name="choices-single-location" id="choices-single-location" aria-label="Default select example">
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="filler-job-form">
                                    <i class="uil uil-clipboard-notes"></i>
                                    <select class="form-select selectForm__inner" data-trigger="true" name="choices-single-categories" id="choices-single-categories" aria-label="Default select example">
                                        <option value="4">Accounting</option>
                                        <option value="1">IT &amp; Software</option>
                                        <option value="3">Marketing</option>
                                        <option value="5">Banking</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div>
                                    <a class="btn btn-primary" href="#"><i class="uil uil-filter"></i> Filter</a><a class="btn btn-success ms-2" href="#"><i class="uil uil-cog"></i> Advance</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="align-items-center row">
                    <div class="col-lg-8">
                        <div class="mb-3 mb-lg-0"><h6 class="fs-16 mb-0">Showing 1 – 8 of 11 results</h6></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="candidate-list-widgets">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="selection-widget">
                                        <select class="form-select" data-trigger="true" name="choices-single-filter-orderby" id="choices-single-filter-orderby" aria-label="Default select example">
                                            <option value="df">Default</option>
                                            <option value="ne">Newest</option>
                                            <option value="od">Oldest</option>
                                            <option value="rd">Random</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="selection-widget mt-2 mt-lg-0">
                                        <select class="form-select" data-trigger="true" name="choices-candidate-page" id="choices-candidate-page" aria-label="Default select example">
                                            <option value="df">All</option>
                                            <option value="ne">8 per Page</option>
                                            <option value="ne">12 per Page</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($horses as $horse)
                <div class="candidate-list">
                    <div class="candidate-list-box card mt-4">
                        <div class="p-4 card-body">
                            <div class="align-items-center row">
                                <div class="col-auto">
                                    <div class="candidate-list-images">
                                        <a href="#"><img src="/img/horse.jpg" alt="" class="avatar-md img-thumbnail rounded-circle" /></a>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="candidate-list-content mt-3 mt-lg-0">
                                        <h5 class="fs-19 mb-0">
                                            <a class="primary-link" href="{{route('horse.show',$horse)}}">{{$horse->name}}</a>
                                        </h5>
                                        <p class="text-muted mb-2">{{$horse->gender}}</p>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item"><i class="mdi mdi-map-marker"></i> Első boksz balra</li>
   
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                        <span class="badge bg-soft-secondary fs-14 mt-1">Leader</span><span class="badge bg-soft-secondary fs-14 mt-1">Manager</span><span class="badge bg-soft-secondary fs-14 mt-1">Developer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="favorite-icon">
                                <a href="#"><i class="mdi mdi-heart fs-18"></i></a>
                            </div>
                        </div>
                    </div>


                    @endforeach
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 pt-2 col-lg-12">
                <nav aria-label="Page navigation example">
                    <div class="pagination job-pagination mb-0 justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" tabindex="-1" href="#"><i class="mdi mdi-chevron-double-left fs-15"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="mdi mdi-chevron-double-right fs-15"></i></a>
                        </li>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection