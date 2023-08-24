<x-app-layout>

    {{ $categories->name }}
    {{-- {{ dd($categories->posts) }} --}}
    {{-- {{ $categories->posts }} --}}
    @foreach ($categories->posts as $p)
        <div class="m-5">
            {{ $p->title }}
            {!! $p->body !!}
        </div>
    @endforeach

</x-app-layout>
