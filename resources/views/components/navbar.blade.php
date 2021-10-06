<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="hideUser()">
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="{{route('home')}}">
          Social App
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a 
              class="nav-link {{request()->path() === '/' ? "animate__animated animate__zoomIn animate__infinite infinite" : ""}}" 
              href="{{route('home')}}"
              >
              Home
            </a>
          </li>
          <li class="nav-item {{request()->path() === 'user/post' ? "animate__animated animate__zoomIn animate__infinite infinite" : ""}}">
            <a class="nav-link" href="{{route('createPost')}}">Create Post</a>
          </li>
          @can('admin')
            <li class="nav-item {{request()->path() === 'admin' ? "animate__animated animate__zoomIn animate__infinite infinite" : ""}}">
              <a class="nav-link" href="{{route('admin.home')}}">Admin Control</a>
            </li>
          @endcan
          <li class="nav-item {{request()->path() === 'user/contact_us' ? "animate__animated animate__zoomIn animate__infinite infinite" : ""}}">
            <a class="nav-link" href="{{route('contactUs')}}">Contact Us</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="dropdown me-3">
        <a class="" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
          <img class="rounded" src="{{asset('/images/profiles/'.Auth()->user()->image)}}" height="35" loading="lazy" alt="profile image">
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @auth
            <li>
              <a class="dropdown-item auth" href="{{route('userProfile')}}">
                <i type="button" class="fas fa-user-circle fa-lg fa-md-2x mt-1"></i> 
                <label for="">{{Auth()->user()->username}}</label>
              </a>
              </li>
            <li>
              <a class="dropdown-item auth" href="{{route('logout')}}">
                <i type="button" class="fas fa-sign-out-alt fa-lg fa-md-2x mt-1"></i>
                <label for="">Logout</label>
              </a>
            </li>
          @endauth
          @guest
            <li><a class="dropdown-item auth" href="{{route('login')}}">Login</a></li>
            <li><a class="dropdown-item auth" href="{{route('register')}}">Register</a></li>
          @endguest
        </ul>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->