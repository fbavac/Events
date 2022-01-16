@extends('layouts.common')

@section('content')

<!-- navigation -->
<!-- end Navigation -->
    <!-- BEGIN: Content-->
      
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-12 col-12">&nbsp</div>
                        <!--/ Statistics Card -->
                    </div>
                </div>
            </div>

                    <div class="row match-height">
                        <!-- Company Table Card -->
                        <div class="col-lg-2 col-12"></div>

                        <div class="col-lg-8 col-12">
                            <div class="card card-company-table">
                                <div class="card-body p-0">
                                    <div class="card-header border-bottom">
                                    <h4 class="card-title">Events</h4>
                                    <form class="form form-vertical" action="{{url('/')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Date From</label>
                                                    <input type="date" id="first-name-vertical" class="form-control @error('start_date') is-invalid @enderror" name="start_date" placeholder="Start" @if(isset($form_date)) value="{{$form_date}}" @endif />
                                                    @error('start_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong> Start date required.</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Date To</label>
                                                     <input type="date" id="first-name-vertical" class="form-control @error('end_date') is-invalid @enderror" name="end_date" placeholder="End" @if(isset($to_date)) value="{{$to_date}}" @endif />
                                                    @error('end_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong> End date required.</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    
                                                     <button type="Submit" class="btn btn-primary mr-1" style="margin-top: 22px;">Search</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>
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