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
   <div class="col-md-6 m-auto">    
    <div class="card">
     <div class="card-header text-center">
      <span class="h3">Update Student</span>
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
      <form method="POST" action="{{ url('/crud/update/'.$students->id) }}">
       @csrf 
       <div class="form-group">
         <label for="name">Name</label>
         <input value="{{ $students->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" />
         @error('name')
          <strong class="text-danger">{{ $message }}</strong>
         @enderror
       </div>
       <div class="form-group">
         <label for="class">Class</label>
         <input value="{{ $students->class }}" name="class" type="text" class="form-control @error('class') is-invalid @enderror" id="class" />
         @error('class')
          <strong class="text-danger">{{ $message }}</strong>
         @enderror
       </div>
       <div class="form-group">
         <label for="roll">Roll</label>
         <input value="{{ $students->roll }}" name="roll" type="text" class="form-control @error('roll') is-invalid @enderror" id="roll" />
         @error('roll')
          <strong class="text-danger">{{ $message }}</strong>
         @enderror
       </div>

       <button type="submit" class="btn btn-info form-control">Update</button>
     </form>
     </div>
    </div>
   </div>
  </div>
 </div>

</body>
</html>