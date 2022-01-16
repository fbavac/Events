@extends('layouts.common')

@section('content')

<!-- navigation -->
<!-- end Navigation -->
<!-- BEGIN: Content-->
        <div class="content-wrapper">
            <div class="content-body">
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-xl-2 col-md-12 col-12">&nbsp</div>
                        <!--/ Statistics Card -->
                    </div>
                </div>
        </div>
        <!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
	        <div class="row match-height">
	        	<!-- Statistics Card -->
                <div class="col-xl-2 col-md-12 col-12"></div>
                <div class="col-xl-8 col-md-12 col-12">
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a>
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="package" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">@if(isset($all_active_prod[0])) {{count($all_active_prod)}} @endif</h4>
                                                <p class="card-text font-small-3 mb-0">Average Events</p> <!-- admin added -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a>
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0"> @if(isset($new_prod_req[0])) {{count($new_prod_req)}} @endif</h4>
                                                <p class="card-text font-small-3 mb-0">Test</p> <!-- user side scrap req -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-12 col-12"></div>
                        <!--/ Statistics Card -->
	            <!-- Company Table Card -->
	            <div class="col-lg-2 col-12"></div>
	            <div class="col-lg-8 col-12">
	                <div class="card card-company-table">
	                    <div class="card-body p-0">
	                        <div class="card-header border-bottom">
	                        <h4 class="card-title">Events</h4>
	                        </div>
	                         <div class="table-responsive">
	                            <table id="example" class="table display">
	                                <thead>
	                                        <tr>
	                                            <th>Event Name</th>
	                                            <th>Start Date</th>
	                                            <th>End Date</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    @if(isset($events[0]))
	                                    @foreach($events as $event)
	                                        <tr> 
	                                            <td>{{$event->name}}</td>
	                                            <td>{{$event->start_date}}</td>
	                                            <td>{{$event->end_date}}</td>
	                                        </tr>
	                                    @endforeach
	                                    @else
	                                       <tr> <td rowspan=""><td colspan="2">No Data Found</td></tr>
	                                    @endif
	                                    </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-2 col-12"></div>
	        </div>
        </section>
         <!-- Dashboard Ecommerce ends -->
            </div>
        </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

@endsection