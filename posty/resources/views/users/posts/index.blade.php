@extends("layouts.app")

@section("content")
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            {{$user->name}}
            <p>Posted {{$posts->count()}} {{Str::plural("post",$posts->count())}} and received {{$user->receivedLikes->count()}} likes</p>

                    @if($posts->count())
            @foreach($posts as $post)
                <h5><a href={{route("user.posts",$post->user)}}>{{$post->user->name}}</a> - {{$post->created_at->diffForHumans()}}</h5>
                <p>{{$post->body}}</p>

                @auth
                @can("delete",$post)
                    <div>
                        <form action = {{route("posts.destroy", $post)}} method="post" class="mr-1">
                            @csrf          
                            @method("DELETE")                  
                            <button type="submit" class="text-blue-500">Delete</button>
                        </form>
                    </div>
                @endcan
                <div class="flex items-center">
                    @if(!$post->likedBy(auth()->user()))
                         <form action = {{route("posts.likes", $post)}} method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="text-blue-500">Like</button>
                        </form>
                    @else
                        <form action = {{route("posts.likes", $post)}} method="post" class="mr-1">
                            @csrf          
                            @method("DELETE")                  
                            <button type="submit" class="text-blue-500">Unlike</button>
                        </form>
                        
                        @endif

                      
                    @if($post->likes()->count())
                        <span>{{$post->likes->count()}} {{Str::plural("like",$post->likes->count())}}</span>
                    @endif
                 </div>
                 @endauth
            @endforeach
            {{$posts->links()}}
        @else
            <h4>There are no posts</h4>
        @endif
        </div>
    </div>
@endsection