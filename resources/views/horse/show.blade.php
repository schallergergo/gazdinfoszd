
@extends("layouts.app")
@section("extra_styles")
<link rel="stylesheet" type="text/css" href="/css/horse/show.css">
@endsection
@section("content")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

<div class="container">
<div class="row">
    <div class="col-lg-4 col-xl-4">
        @include("horse.show.data")
        @include("horse.show.tasks")

    
    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg">
                <li class="nav-item">
                    <a href="#about-me" data-toggle="tab" aria-expanded="true" class="nav-link ml-0 active">
                        <i class="mdi mdi-face-profile mr-1"></i>About
                    </a>
                </li>



                  <li class="nav-item">
                    <a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="mdi mdi-settings-outline mr-1"></i>Messages
                    </a>
                </li>

            </ul>
            
            <div class="tab-content">
                
                @include("horse.show.about")

            
                @include("horse.show.messages")


            </div> <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
</div>

@endsection