<x-adminlayout>
    <div class="card mt-3">
        <div class="card-header customHeader">
            <h2 class="text-center">Update User</h2>
        </div>
        <div class="card-body">
            <form action="{{route('update_user',$user->id)}}" method="POST"> 
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Name" name="username" value="{{$user->username}}"/>
                    @error('username')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}"/>
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="customNote form-label" for="Admin">Admin</label>
                    <select class="form-select selectBox" name="Admin" id="">
                        <option value="1" {{$user->Admin === 1 ? "selected" : ""}}>True</option>
                        <option value="0" {{$user->Admin === 0 ? "selected" : ""}}>False</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="customNote form-label" for="Premium">Premium</label>
                    <select class="form-select selectBox" name="Premium" id="">
                        <option value="1" {{$user->Premium === 1 ? "selected" : ""}}>True</option>
                        <option value="0" {{$user->Premium === 0 ? "selected" : ""}}>False</option>
                    </select>
                </div>
                <button type="submit" class="btn customButton btn-block mb-3">Update</button>
            </form>
        </div>
    </div>
    
</x-adminlayout>