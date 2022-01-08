@extends('layouts.app')

@section('content')
<a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><b>Back</b></a>
<div class="container" style="background-color: grey;padding: 30px; width:500px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Fields') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('forms') }}@if(isset($forms))/{{encrypt($forms->id)}}@endif">
                        @csrf
                        @if(isset($forms))
                        @method('PUT')
                        @endif

                        <div class="row mb-3">
                            <label for="label" class="col-md-8 col-form-label text-md-end">{{ __('Label') }}</label>

                            <div class="col-md-6">
                                <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" value="@if(isset($forms)){{$forms->label}}@endif"   autofocus>
                                @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="field" class="col-md-8 col-form-label text-md-end">{{ __('HTML Field') }}</label>

                            <div class="col-md-12">
                                <select name="field" id="field" class="form-control @error('field') is-invalid @enderror">
                                    <option value="">--Select Field--</option>
                                    <option value="text" @if(isset($forms) && $forms->html_field=="text") selected @endif >Text</option>
                                    <option value="number" @if(isset($forms) && $forms->html_field=="number") selected @endif >Number</option>
                                    <option value="select" @if(isset($forms) && $forms->html_field=="select") selected @endif >Select</option>
                                </select>
                                @error('field')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="options" class="col-md-8 col-form-label text-md-end">{{ __('options (comma "," seperated)') }}</label>

                            <div class="col-md-6">
                                <input id="options" type="text" class="form-control @error('options') is-invalid @enderror" name="options" value="@if(isset($forms)){{$forms->options}}@endif" autofocus>
                                @error('options')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="comments" class="col-md-8 col-form-label text-md-end">{{ __('comments') }}</label>

                            <div class="col-md-6">
                                <input id="comments" type="text" class="form-control @error('comments') is-invalid @enderror" name="comments" value="@if(isset($forms)){{$forms->comments}}@endif" autofocus>
                                @error('comments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
