<x-pagelayout>
  <header></header>
  <div class="container">
        <h1 class="mt-3">All Posts</h1>
        <div class="row">
          {{$posts->links()}}
            @foreach ($posts as $post)
            <div class="col-md-4 col-sm-1 mt-3 p-3">
              <div class="card">
                  <img
                    src="{{asset('/images/posts/'.$post->image)}}"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <small>posted by {{$post->user->username}}</small>
                    <p class="cardBody">{{$post->content}}</p>
                    <a href="{{route('show_post',$post->id)}}" class="btn btn-primary">See More</a>
                  </div>
              </div>    
            </div>
            @endforeach
            
            {{ $posts->links() }}
            
        </div>
  </div>
</x-pagelayout>
