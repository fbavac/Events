@extends('layouts.app')

@section('content')
<a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><b>Home</b></a>

<div class="container" style="background-color: grey;padding: 30px; width:500px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <center<div class="card-header"><b>My Dynamic Form</b></div></center>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        
                        

                        @if(isset($forms[0]))
                        @foreach($forms as $form)
  							<div class="row mb-3">
                            <label for="label" class="col-md-8 col-form-label text-md-end">{{$form->label}}</label>

                            <div class="col-md-6">
                            	@if($form->html_field =="text" || $form->html_field =="number")
                                	<input id="label" type="{{$form->html_field}}" class="form-control" name="label" value=""   autofocus>
                                @else
                                
                                @php
             						$options = explode(",",$form->options);

                                @endphp
	                                <select name="field" id="field" class="form-control">
	                                    <option value="">--Select--</option>
	                                    @foreach($options as $option)
	                                    <option value="{{$option}}">{{$option}}</option>
	                                    @endforeach
	                                </select>
                                @endif
                                

                            </div>
                        </div>
                        @endforeach
                        @else
                        <i> No fileds Defined. Please add Fields </i>
                        @endif
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
