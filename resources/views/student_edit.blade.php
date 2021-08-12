<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit Students
        </h2>
    </x-slot>

    
     
      <div class="card">
      @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>
   @endif
   
      <div class="card-body">
    <form action="{{ url('student/update/'.$students->id)}}" method="POST">
    @csrf
    <div class="col-md-4">
  <div class="form-group  ">
   
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{ $students->name }}">
   @error('name')
<span class="text-danger"> {{$message}}  </span>
   @enderror
  </div>
<br>
  <div class="form-group">
  
    <input type="text" class="form-control" id="roll_no" name="roll_no" aria-describedby="emailHelp" value="{{ $students->roll_no }}">
    @error('roll_no')
<span class="text-danger"> {{$message}}  </span>
   @enderror
  </div>
  <br>
  <div class="form-group">
  
    <input type="text" class="form-control" id="maths" name="maths" aria-describedby="emailHelp" value="{{ $students->maths }}">
    @error('maths')
<span class="text-danger"> {{$message}}  </span>
   @enderror
  </div>
  <br>
  <div class="form-group">
    
    <input type="text" class="form-control" id="physics" name="physics" aria-describedby="emailHelp" value="{{ $students->physics }}">
    @error('physics')
<span class="text-danger"> {{$message}}  </span>
   @enderror
  </div><br>
  <div class="form-group">
    
    <input type="text" class="form-control" id="chemistery" name="chemistery" aria-describedby="emailHelp" value="{{ $students->chemistery }}">
    @error('chemistery')
<span class="text-danger"> {{$message}}  </span>
   @enderror
  </div><br>
  <div class="form-group">
    
    <input type="text" class="form-control" id="computer" name="computer" aria-describedby="emailHelp" value="{{ $students->computer_science }}">
    @error('computer')
<span class="text-danger"> {{$message}}  </span>
   @enderror
  </div><br>
  <div class="form-group">
   
    <input type="text" class="form-control" id="biology" name="biology" aria-describedby="emailHelp" value="{{ $students->biology }}">
    @error('biology')
<span class="text-danger"> {{$message}}  </span>
   @enderror
  </div><br>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    </div>
    </div>
    
</div>
</x-app-layout>
