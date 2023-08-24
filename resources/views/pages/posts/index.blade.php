<x-app-layout>
    
    <div class="container lg:mx-auto p-5">
        {{-- top bar --}}
        <div class="flex items-center">
            <div class="flex-1 lg:flex lg:justify-center">
                <input type="text" placeholder="Type here" class="input lg:w-96 max-w-xs" />

            </div>
            
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-14 rounded-full">
                        <img src="{{ Auth::user()->profile->image }}" alt="" />
                    </div>
                </label>
                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow
                menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a href="{{ url('/profile') }}" class="justify-between">
                        Profile
                        <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
            
        </div>
        {{-- end topbar --}}

        <div class="m-5">
            <div class="flex items-center">
                <div class="flex-1">
                    <h1 class="text-3xl text-white">good morning</h1>
                    <h1>choose what you want to cook !</h1>
                </div>
                <div>
                    <a href="" class="link-hover hover:text-gray-50">See more -></a>
                </div>
            </div>
            {{-- {{ $posts }} --}}
            <div class="mt-5 lg:flex gap-2">
                @foreach ($posts as $post)
                <a href="{{ route('post-detail', $post->id) }}">
                    <div class="card lg:w-56 bg-base-100 shadow-xl">
                        <figure class="px-3 pt-2">
                            <img src="https://source.unsplash.com/1200x1000?food" class="rounded-xl" alt="" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">
                                {{ $post->title }}
                                <div class="badge badge-secondary">NEW</div>
                            </h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p>
                            <div class="card-actions justify-end">
                                @foreach ($post->categories as $c)
                                <div class="badge badge-outline">{{ $c->name }}</div>
                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>

        <div class="m-5">
            <h1 class="text-xl text-white">
                Mau masak apa ya?
            </h1>
            <h1>Berbagai jenis resep makanan ada disini!</h1>

            <div class="my-3">
                @foreach ($categories as $category)
                <a href="{{ route('categories' , $category->id) }}">
                    <div class="avatar">
                        <div class="w-16 rounded-full">
                            <img src="https://source.unsplash.com/1200x1000?food" alt=""/>
                        </div>
                        <p>{{ $category->name }}</p>
                    </div>
                </a>
                @endforeach
            </div>

        </div>

        <div class="absolute ">
            <div class="fixed right-5 bottom-5 lg:right-10 lg:bottom-10">
                <a href="{{ route('post-create') }}" class="btn btn-circle focus:bg-pink-600  border-none">
                    <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                    stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                    <path
                    d="M9.65661 17L6.99975 17L6.99975 14M6.10235 14.8974L17.4107 3.58902C18.1918 2.80797 19.4581 2.80797 20.2392 3.58902C21.0202 4.37007 21.0202 5.6364 20.2392 6.41745L8.764 17.8926C8.22794 18.4287 7.95992 18.6967 7.6632 18.9271C7.39965 19.1318 7.11947 19.3142 6.8256 19.4723C6.49475 19.6503 6.14115 19.7868 5.43395 20.0599L3 20.9998L3.78312 18.6501C4.05039 17.8483 4.18403 17.4473 4.3699 17.0729C4.53497 16.7404 4.73054 16.424 4.95409 16.1276C5.20582 15.7939 5.50466 15.4951 6.10235 14.8974Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </a>
            </div>
        </div>

        

    </div>

</x-app-layout>