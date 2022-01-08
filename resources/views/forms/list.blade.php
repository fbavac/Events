@extends('layouts.app')

@section('content')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Form table</h2>
<a href="{{ url('/forms/create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><b>Add Field</b></a>
<a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="padding-left:30px "><b>Form Render</b></a>

<table>
  <tr>
    <th>Label</th>
    <th>HTML Field</th>
    <th>Options</th>
    <th>Comments</th>
    <th>Actions</th>

  </tr>
  @if(isset($forms[0]))
  @foreach($forms as $form)
  <tr>
    <td>{{$form->label}}</td>
    <td>{{$form->html_field}}</td>
    <td>{{$form->options}}</td>
    <td>{{$form->comments}}</td>
    <td>
      
        <a href="{{url('forms')}}/{{encrypt($form->id)}}" class="item-edit">
        <i class="ficon" data-feather="edit">EDIT</i></a>
        &nbsp&nbsp
        <a href="javascript:;" class="delete-record" onclick="event.preventDefault();
         document.getElementById('delete-form-{{$form->id}}').submit();"><i class="ficon" data-feather="trash-2">Delete</i></a>
         <form id="delete-form-{{$form->id}}" action="{{ url('forms')}}/{{encrypt($form->id)}}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>
                                              
      
    </td>

  </tr>
  @endforeach
  @else
  <tr> <td></td><td></td> <td><b>no data Found</b>  <td></td><td></td> </td></tr>
  @endif

 
</table>

</body>
@endsection
