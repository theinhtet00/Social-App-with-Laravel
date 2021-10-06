<x-pagelayout>
    <div class="container mt-3">
        @if (Session('Success'))
            <div class="alert alert-success">
                {{Session('Success')}}
            </div>
        @endif
        @if (Session('Error'))
            <div class="alert alert-success">
                {{Session('Error')}}
            </div>
        @endif
        <div class="card my-3">
            <div class="card-header customHeader">
                <h2 class="text-center">User Profile</h2>
            </div>
            <div class="card-body">
                <form action="{{route('post_userProfile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="">Username</label>
                        <input type="text" class="form-control" value="{{auth()->user()->username}}" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Email</label>
                        <input type="email" class="form-control" value="{{auth()->user()->email}}" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Photo</label>
                        <input type="file" class="form-control customNote" name="image">
                    </div>
                    <div class="mb-3">
                        <img class="rounded" src="{{asset('/images/profiles/'.auth()->user()->image)}}" height="300px" alt="Profile Image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Old Password</label>
                        <input type="password" class="form-control" name="old_password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">New Password</label>
                        <input type="password" class="form-control" name="new_password">
                    </div>
                    <button class="btn customButton btn-block mb-3" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-pagelayout>
