@props(['post' => $post])

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