<x-authlayout>
  <div class="container">
    <div class="col-md-4 mx-auto my-3">
      <div class="card">
        <div class="card-header customHeader">
          <h2 class="text-center ">Register</h2>
        </div>
        <div class="card-body">
          <form action="{{route('post_register')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name input -->
            <div class="mb-2">
              <label class="form-label" for="form3Example3">Username</label>
              <input type="text" id="form3Example3" class="form-control" name="username" value="{{old('username')}}" />
              @error('username')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
                        
            <!-- Email input -->
            <div class="mb-2">
              <label class="form-label" for="form3Example3">Email address</label>
              <input type="email" id="form3Example3" class="form-control" name="email" value="{{old('email')}}" />
              @error('email')
                <p class="text-danger" >{{$message}}</p>
              @enderror
            </div>
                      
            <!-- Password input -->
            <div class="mb-2">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" id="form3Example4" class="form-control" name="password" />
              @error('password')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>

            <!-- Confirm Password input -->
            <div class="mb-2">
              <label class="form-label" for="form3Example4">Confirm Password</label>
              <input type="password" id="form3Example4" class="form-control" name="password_confirmation" />
              @error('password_confirmation')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            
            {{-- Select Profile Picture --}}
            <div class="mb-4">
                          <small class="customNote">Select Profile Picture</small>
                          <input type="file" id="form3Example4" class="form-control customNote" name="image" />  
                          @error('image')
                            <p class="text-danger">{{$message}}</p>
                          @enderror
            </div>
                      
            <!-- Submit button -->
            <button type="submit" class="btn customButton btn-block mb-3">Sign up</button>
            <p class="text-center"><a href="{{route('login')}}">Already Registered?</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-authlayout>
