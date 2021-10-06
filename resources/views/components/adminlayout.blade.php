<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Final Project</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
    rel="stylesheet"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

  </head>
<body class="adminBody">
    {{-- Navigation --}}
    <x-navbar/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group mt-3 mt-md-5">
                    <li class="list-group-item rounded">
                        <a class="ms-2" href="{{route('admin.manage-premium-users')}}">
                            <i class="fas fa-user-astronaut fa-lg"></i>
                            Manage Premium User
                        </a>
                    </li>
                    <li class="list-group-item mt-3 rounded">
                        <a class="ms-2" href="{{route('admin.contact-messages')}}">
                            <i class="fas fa-envelope-open-text fa-lg"></i>
                            Contact Messages
                        </a>
                    </li>
                  </ul>
            </div>
            <div class="col-md-8">
                {{$slot}}
            </div>
        </div>
    </div>
    

    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
      @if(Session('message'))
        let message = "{{Session('message')}}";
        toastr.success(message);
      @endif
    </script>
    <script>
        $('.navbar-toggler').click(function(){
          $('.dropdown').toggle();
        });
    </script>
  </body>
</html>