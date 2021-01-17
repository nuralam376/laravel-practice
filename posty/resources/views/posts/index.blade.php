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
                <h5>{{$post->user->name}} - {{$post->created_at->diffForHumans()}}</h5>
                <p>{{$post->body}}</p>
            @endforeach
        @else
            <h4>There are no posts</h4>
        @endif
    </div>
</div>
@endsection