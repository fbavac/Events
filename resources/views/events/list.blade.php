@extends('layouts.header')

@section('content')

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
           
                
            <!-- Basic Tables -->
            <section id="row-grouping-datatable">
                 <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                    <h4 class="card-title">{{$formtext['table_heading']}}</h4>
                                    <a href="{{url('event/create')}}" class="btn btn-primary btn-next waves-effect waves-float waves-light"> + Add New </a>
                                </div>

                            <div class="table-responsive">
                                <table id="example" class="table display">
                                    <thead>
                                            <tr>
                                                <th>Event Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th class="noExport">Invite</th>
                                                <th class="noExport">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($events[0]))
                                        @foreach($events as $event)
                                            <tr> 
                                                <td>{{$event->name}}</td>
                                                <td>{{$event->start_date}}</td>
                                                <td>{{$event->end_date}}</td>
                                                <td><a href="{{url('invite')}}/{{encrypt($event->id)}}" class="item-edit">
                                                    <i class="ficon" data-feather="send"></i><b>Invite People</b></a></td>
                                                
                                                <td><a href="{{url('event')}}/{{encrypt($event->id)}}" class="item-edit">
                                                    <i class="ficon" data-feather="edit"></i></a>
                                                    &nbsp&nbsp
                                                    <a href="javascript:;" class="delete-record" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$event->id}}').submit();"><i class="ficon" data-feather="trash-2"></i></a>
                                                    <form id="delete-form-{{$event->id}}" action="{{ url('event')}}/{{encrypt($event->id)}}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                                

                                            </tr>
                                        @endforeach
                                        @else
                                           <tr> <td rowspan=""><td colspan=""><td colspan="5">No Data Found</td></tr>
                                        @endif
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Tables end -->


                <!--/ Basic table -->

            </div>
        </div>
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
@endsection