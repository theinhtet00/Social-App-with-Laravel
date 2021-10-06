<x-pagelayout>
    <div class="container my-3">
        <div class="card">
            <div class="card-header customHeader">
                <h2 class="text-center">{{$post->title}}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="rounded w-100 h-100" src="{{asset('/images/posts/'.$post->image)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <pre class="my-3 px-3 customNote font-weight-bold">{{$post->content}}</pre> 
                    </div>
                </div>
            </div>
            @can('premium_user',$post->id)
                <div class="card-footer customHeader text-end">
                    <a class="btn btn-sm btn-success me-3 px-3" href="{{route('edit_post',$post->id)}}">Edit</a>
                    <a class="btn btn-sm btn-danger px-3" href="{{route('delete_post',$post->id)}}">Delete</a>
                </div>
            @endcan
        </div>
    </div>
</x-pagelayout>


