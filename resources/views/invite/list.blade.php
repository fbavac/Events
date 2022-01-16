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
                                     <div id="myDiv">
                                        <img id="loading-image" src="{{ asset('app-assets/images')}}/loading-cargando.gif" style="width:30%;display:none;" />
                                    </div>
                                    <a href="{{url('event')}}" class="btn btn-primary btn-next waves-effect waves-float waves-light"> + Invite </a>
                                </div>

                            <div class="table-responsive">
                                <table id="example" class="table display">
                                    <thead>
                                            <tr>
                                                <th>Invites</th>
                                                <th>Event Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th class="noExport">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($invites[0]))
                                        @foreach($invites as $invite)
                                            <tr> 
                                                <td>{{$invite->email}}</td>
                                                <td>{{$invite->name}}</td>
                                                <td>{{$invite->start_date}}</td>
                                                <td>{{$invite->end_date}}</td>
                                                <td>
                                                    <!-- <a href="javascript:;" class="delete-record" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$invite->id}}').submit();"><i class="ficon" data-feather="trash-2"></i></a> -->
                                                    <form  action="{{ url('invite')}}/{{encrypt($invite->id)}}" method="POST" class="" id="form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="Submit" class="btn-outline-secondary"  id="save" style="border: 0px  !important;"><i class="ficon" data-feather="trash-2"></i></button>
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
            </div>
        </div>
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

<script>
$(document).ready(function() {

    $("form"). submit(function(e){
        e.preventDefault();
        var data = $("form").serialize()
          $("#save").attr("disabled", "disabled"); 
          $("#loading-image").show();
          $.ajax({
              url: $('#form').prop('action'),
              type: "DELETE",
              data:  data,
              cache: false,
              success: function(dataResult){
                  console.log(dataResult);
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
                    $("#loading-image").show();
                    alert(dataResult.message)
                    window.location = "/invite";              
                  }
                  else if(dataResult.statusCode==201){
                    $("#loading-image").hide();
                    alert(dataResult.message)
                    $("#save").attr("disabled", "false");
                  }
                  
              }
          });
        
  });
});
</script>
@endsection