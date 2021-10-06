<x-pagelayout>
    <div class="container">
        <div class="card my-4">
            <div class="card-header customHeader">
                <h2 class="text-center">Update Post</h2>
            </div>
            <div class="card-body">
                <form action="{{route('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Email input -->
                    <div class="mb-3">
                        <label class="form-label" for="form1Example1">Title</label>
                        <input type="text" id="form1Example1" class="form-control customNote" name="title" value="{{$post->title}}"/>
                        @error('title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="form1Example1" class="form-label customNote">Photo</label>
                        <input type="file" id="form1Example1" class="form-control customNote" name="image"/>
                        @error('image')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <img class="rounded" height="300px" src="{{asset('/images/posts/'.$post->image)}}" alt="Post Image">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="form1Example1">Content</label>
                        <textarea name="content" cols="30" rows="5" id="form1Example1" class="form-control">
                        {{$post->content}}
                        </textarea>
                        @error('content')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Add Post -->
                    <button type="submit" class="btn customButton btn-block">Update</button>
                  </form>
            </div>
        </div>
    </div>
</x-pagelayout>
