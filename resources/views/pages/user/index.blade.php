<x-app-layout>

    <div class="navbar bg-inherit">
        <div class="flex-1">
            <div class="dropdown dropdown-bottom">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="{{ Auth::user()->profile->image }}" alt=""/>
                    </div>
                </label>
                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow
                menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
            <div class=" ml-2">
                <h1 class="font-bold">{{ Auth::user()->name }}</h1>
                <h1 class="text-sm">{{ Auth::user()->username }}</h1>
            </div>
        </div>
        <div class="flex-none">
            <button class="btn btn-circle btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg"
                width="22" height="22" viewBox="0 0 24 24" fill="none" class="stroke-current"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg>
            </button>
        </div>
    </div>

</x-app-layout>