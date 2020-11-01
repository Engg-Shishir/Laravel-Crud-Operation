<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{asset('css')}}/bootstrap.min.css">
<script src="{{asset('js')}}/jquery.js"></script>
<script src="{{asset('js')}}/bootstrap.min.js"></script>
 <title>Laravel Basic Crud</title>
</head>
<body>
  <div style="padding:30px;"></div>
 <div class="container">
  <div class="row">
   <div class="col-md-7">
    <div class="card">
     <div class="card-header text-center">
      <span class="h3">All Student</span>
     </div>
     <div class="card-body">

      @if(Session::has('update-message'))
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('update-message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @if(Session::has('delete-message'))
      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('delete-message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      
    <table class="table table-dark table-bordered">
     <thead>
       <tr class="text-center">
         <th >#</th>
         <th >Name</th>
         <th >Class</th>
         <th >Roll</th>
         <th colspan="2">Action</th>
       </tr>
     </thead>
     <tbody>
      @php
          $serial = 1;
      @endphp
      @foreach ($students as $data)
        <tr class="text-center">
        <th scope="row">{{ $serial++}}</th>
        <td>{{$data->name}}</td>
          <td>{{$data->class}}</td>
          <td>{{$data->roll}}</td>
          <td>
          <a href="{{url('crud/edit/'.$data->id)}}" class="btn btn-warning">Edit</a>
          </td>
          <td>
            <a href="{{url('crud/delete/'.$data->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete ...❌')">Delete</a>
          </td>
        </tr> 
      @endforeach
     </tbody>
   </table>
     </div>
    </div>
   </div>
   <div class="col md-5">    
    <div class="card">
     <div class="card-header text-center">
      <span class="h3">Laravel Basic Crud</span>
     </div>
     <div class="card-body">
      @if(Session::has('insert-message'))
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('insert-message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <form method="POST" action="{{ url('/crud/store') }}">
       @csrf 
       <div class="form-group">
         <label for="name">Name</label>
         <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" />
         @error('name')
          <strong class="text-danger">{{ $message }}</strong>
         @enderror
       </div>
       <div class="form-group">
         <label for="class">Class</label>
         <input name="class" type="text" class="form-control @error('class') is-invalid @enderror" id="class" />
         @error('class')
          <strong class="text-danger">{{ $message }}</strong>
         @enderror
       </div>
       <div class="form-group">
         <label for="roll">Roll</label>
         <input name="roll" type="text" class="form-control @error('roll') is-invalid @enderror" id="roll" />
         @error('roll')
          <strong class="text-danger">{{ $message }}</strong>
         @enderror
       </div>

       <button type="submit" class="btn btn-info form-control">Submit</button>
     </form>
     </div>
    </div>
   </div>
  </div>
 </div>

</body>
</html>