@extends('layouts.header')

@section('content')

<!-- navigation -->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                    <div class="d-flex align-items-center">
                                        <!-- <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p> -->
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <a href="{{url('/event')}}">
                                                <div class="media">
                                                    <div class="avatar bg-light-primary mr-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="package" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body my-auto">
                                                        <h4 class="font-weight-bolder mb-0">@if(isset($event_counts)) {{$event_counts}} @endif</h4>
                                                        <p class="card-text font-small-3 mb-0">Total Events</p> <!-- admin added -->
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <a href="{{url('/invite')}}">
                                                <div class="media">
                                                    <div class="avatar bg-light-info mr-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="box" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body my-auto">
                                                        <h4 class="font-weight-bolder mb-0"> @if(isset($invite_req)) {{$invite_req}} @endif</h4>
                                                        <p class="card-text font-small-3 mb-0">Invites Requests</p> <!-- user side scrap req -->
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                </div>
            </div>
            </section>
                <!-- Dashboard Ecommerce ends -->
            </div>
        </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <script type="text/javascript">

  $(document).ready(function() {

      window.history.pushState(null, "", window.location.href);        

      window.onpopstate = function() {

          window.history.pushState(null, "", window.location.href);

      };

  });

</script>
@endsection