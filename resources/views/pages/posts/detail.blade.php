<x-app-layout>
    <div class="drawer drawer-end">
        <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
        <!-- Page content here -->

            <div class="flex justify-center flex-wrap m-5 lg:my-8">
                <div class="max-w-xl min-h-screen">
                    <h1 class="font-black text-4xl text-white">{{ $post->title }}</h1>
                    <p class="text-xl mt-2">{{ $post->description }}</p>
                    <div class="flex items-center gap-3 my-5">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="{{ $post->user->profile->image }}" alt="" />
                            </div>
                        </div>
                        <div>
                            <h1 class="text-white text-sm">{{ $post->user->name }}</h1>
                            <h1 class="text-xs">{{ $post->created_at->diffForHumans() }}</h1>
                        </div>
                    </div>
        
                    <hr>
                        
                    {{-- <hr>  --}}
        
                    <div class="text-white my-3 break-words">
                            {!! $post->body !!}
                    </div>
        
                    
                    <div class="mt-10">
                        @foreach ($post->categories as $c)
                        <button class="btn btn-neutral btn-sm rounded-full  ">{{ $c->name }}</button>
                        @endforeach
                    </div>
        
                    <div class="flex justify-between items-center">
                        <div>
                            <label for="my-drawer-4" class="m-0 p-0 drawer-button btn bg-transparent outline-transparent
                            border-none text-white hover:bg-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" class="hover:stroke-white" height="16"
                                viewBox="0 0 24 24" fill="none"
                                stroke="#a6adba" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </label>
                        </div>

                        <div class="dropdown dropdown-end">
                            <label tabindex="0" class="btn bg-transparent outline-transparent
                            border-none text-white hover:bg-transparent m-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" class="hover:stroke-white"
                                height="16" viewBox="0 0 24 24"
                                fill="none" stroke="#a6adba" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1">
                                        </circle><circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </label>
                            <ul tabindex="0" class="dropdown-content z-[1]
                            menu p-2 shadow bg-slate-900 rounded-box w-52">
                                <li><a href="{{ route('post-edit' , $post->id) }}">Edit</a></li>
                                <form action="{{ route('post-delete' , $post->id) }}" method="POST">
                                    <li>
                                        @csrf
                                        @method('DELETE')
                                        <button class="link link-hover text-red-700">Delete</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

        <div class="drawer-side">
            <label for="my-drawer-4" class="drawer-overlay"></label>
                <div class="bg-black
                    overflow-y-scroll p-4 w-80 h-full border-l text-base-content">
                <!-- Sidebar content here -->
                    <form action="{{ route('comment-store' , $post->id) }}" method="POST">
                        @method('post')
                        @csrf
                        <input type="text" placeholder="Tulis Komentar" class="focus:outline-none focus:underline
                        input bg-transparent  p-0 my-1 w-full max-w-xs" name="body" autocomplete="false"/>
                    </form>

                    <div>
                        @foreach ($post->comments as $comment)
                        <div class="flex items-center gap-3 my-3">
                            <div class="avatar">
                                <div class="w-8 rounded-full">
                                    <img src="{{ $comment->user->profile->image }}" alt="" />
                                </div>
                            </div>
                            <div>
                                <h1 class="text-white text-sm">{{ $comment->user->name }}</h1>
                                <h1 class="text-xs">{{ $comment->created_at->diffForHumans() }}</h1>
                            </div>
                        </div>
                        <p class="text-sm">{{ $comment->body }}</p>
                        <div class="divider"></div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>




</x-app-layout>



{{-- 
<div class="drawer drawer-end">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <!-- Page content here -->
      <label for="my-drawer-4" class="drawer-button btn btn-primary">Open drawer</label>
    </div> 
    <div class="drawer-side">
      <label for="my-drawer-4" class="drawer-overlay"></label>
      <ul class="menu p-4 w-80 h-full bg-base-200 text-base-content">
        <!-- Sidebar content here -->
        <li><a>Sidebar Item 1</a></li>
        <li><a>Sidebar Item 2</a></li>
      </ul>
    </div>
  </div> --}}