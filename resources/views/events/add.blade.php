@extends('layouts.header')

@section('content')


    <!-- BEGIN: Content-->
	    
            
	        <div class="content-overlay"></div>
	        <div class="header-navbar-shadow"></div>
	        <div class="content-wrapper">
	            <div class="content-header row">
	                <div class="content-header-left col-md-9 col-12 mb-2">
	                    <div class="row breadcrumbs-top">
	                        <div class="col-12">
                                @foreach ($page_data as $key => $formtext) @endforeach
	                            <h2 class="content-header-title float-left mb-0">{{$formtext['page_header']}}</h2>
	                            <div class="breadcrumb-wrapper">
	                                <ol class="breadcrumb">
	                                    <li class="breadcrumb-item"><a href="#">{{$formtext['bc1']}}</a>
	                                    </li>
	                                    <li class="breadcrumb-item"><a href="#">{{$formtext['bc2']}}</a>
	                                    </li>
	                                    <li class="breadcrumb-item active"><a href="#">{{$formtext['bc3']}}</a>
	                                    </li>
	                                </ol>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                
	            </div>
	            <div class="content-body">
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    
                                    <h4 class="card-title">{{$formtext['form_heading']}}</h4>

                                  <!--   <a href="{{url('agent-manage/create')}}" class="btn btn-primary btn-next waves-effect waves-float waves-light"> + Add New </a> -->
                                </div>
                                <div class="card-body">
                                    
                                    <form class="form form-vertical" action="{{url('/event')}}@if(isset($event))/{{encrypt($event->id)}}@endif" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        @if(isset($event))
                                        @method('PUT')
                                        @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Event Name</label>
                                                    <input type="text" id="first-name-vertical" class="form-control @error('event_name') is-invalid @enderror" name="event_name" placeholder="Event Name" value="@if(isset($event)){{$event->name}}@endif" />
                                                    @error('event_name')
				                                        <span class="invalid-feedback" role="alert">
				                                            <strong>{{ $message }}</strong>
				                                        </span>
                                        			@enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Start Date</label>
                                                    <input type="date" id="first-name-vertical" class="form-control @error('start_date') is-invalid @enderror" name="start_date" placeholder="Start Date" value="@if(isset($event)){{$event->start_date}}@endif" />
                                                    @error('start_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">End Date</label>
                                                    <input type="date" id="first-name-vertical" class="form-control @error('end_date') is-invalid @enderror" name="end_date" placeholder="End Date" value="@if(isset($event)){{$event->end_date}}@endif" />
                                                    @error('end_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="Submit" class="btn btn-primary mr-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

@endsection