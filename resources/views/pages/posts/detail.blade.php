<x-app-layout>

    <div class="flex justify-center flex-wrap m-5 lg:my-8">
        <div class="max-w-xl min-h-screen">
            <h1 class="font-black text-4xl text-black">{{ $post->title }}</h1>
            
            <div class="flex items-center gap-3 my-5">
                <div class="avatar">
                    <div class="w-10 rounded-full">
                        <img src="{{ $post->user->profile->image }}" alt="" />
                    </div>
                </div>
                <div>
                    <h1 class="text-black text-sm">{{ $post->user->name }}</h1>
                    <h1 class="text-xs">{{ $post->created_at->diffForHumans() }}</h1>
                </div>
            </div>

            <div class="divider"></div>
            <form action="{{ route('comment-store' , $post->id) }}" method="POST">
                @method('post')
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="text" placeholder="Vas happenin?!" class="focus:outline-none focus:underline
                input bg-transparent   p-0 mt-3 w-full max-w-xs" name="body" autocomplete="false"/>
            </form>
            <div class="divider"></div>

            <div class="text-black my-3 break-words">
                    {!! $post->body !!}
                {{-- {{ dd($post->body) }} --}}
            </div>

            
            <div>
                @foreach ($post->categories as $c)
                <button class="btn btn-neutral btn-sm rounded-full  ">{{ $c->name }}</button>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
