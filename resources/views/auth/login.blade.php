<x-authlayout>
  <div class="container">
    <div class="col-md-4 mx-auto mt-5">

      {{-- Session Message --}}
      @if(Session('message'))
        <div class="alert alert-success">
          {{Session('message')}}
        </div>
      @endif

      {{-- Login --}}
      <div class="card">
        <div class="card-header customHeader">
          <h2 class="text-center">Login</h2>
        </div>
        <div class="card-body">
          @if(Session('error'))
            <div class="alert alert-danger">
              {{Session('error')}}
            </div>
          @endif
          <form action="{{route('post_login')}}" method="POST">
            @csrf  
            <!-- Email input -->
            <div class="mb-3">
              <label class="form-label" for="form2Example1">Email address</label>
              <input type="email" id="form2Example1" class="form-control" name="email" />
              @error('email')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
                  
            <!-- Password input -->
            <div class="mb-4">
              <label class="form-label" for="form2Example2">Password</label>
              <input type="password" id="form2Example2" class="form-control" name="password" />
              @error('password')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
                  
            <!-- Submit button -->
            <button type="submit" class="btn customButton btn-block mb-4">Sign in</button>
            <!-- Register buttons -->
            <div class="text-center">
              <p>Not a member? <a href="{{route('register')}}">Register</a></p>
            </div>
          </form>
        </div>
      </div>
        
    </div>
  </div>
</x-authlayout>


