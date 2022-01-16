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
                            </div>
                            <div class="card-body">
                                
                                <form class="form form-vertical" action="{{url('/invite')}}@if(isset($invite))/{{encrypt($invite->id)}}@endif" method="POST" enctype="multipart/form-data" id="form">
                                	
                                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                    <input type="hidden" name="id" id="id" value="{{encrypt($invite->id)}}">
                                    

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email">E-Mail</label>
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter E-Mail" value="@if(isset($invite)){{$invite->email}}@endif" />
                                                @error('email')
			                                        <span class="invalid-feedback" role="alert">
			                                            <strong>{{ $message }}</strong>
			                                        </span>
                                    			@enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="Submit" class="btn btn-primary mr-1" id="save">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            <span id="myDiv">
                                                <img id="loading-image" src="{{ asset('app-assets/images')}}/giphy.gif" style="width: 15%;display:none;" />
                                            </span>
                                        </div>
                                    </div>
                                     
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end image view section -->
                </div>
            </section>
            <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

<script>
$(document).ready(function() {

    $("form"). submit(function(e){
        e.preventDefault();
        var email = $('#email').val();
        var data = $("form").serialize()
        if(email!=""){
          $("#save").attr("disabled", "disabled"); 
          $("#loading-image").show();
          $.ajax({
              url: $('#form').prop('action'),
              type: "PUT",
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
        }
        else{
          alert('Please fill all the field !');
        }
  });
});
</script>
@endsection