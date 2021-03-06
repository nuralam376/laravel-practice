@extends("layouts.app")

@section("content")
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        @auth
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
            </form>
        @endauth
        
        @guest
       
            <h4>Please login to create posts
          <a href={{route('login')}} class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Login</a></h4>
        @endguest

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