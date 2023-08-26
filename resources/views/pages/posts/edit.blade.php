<x-app-layout>

    @push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/select.css') }}">
    @endpush
    <div class="flex m-10 items-center">
        <div class="flex-1">
            <h1>{{ Auth::user()->name }}'s draft</h1>
        </div>
        <div class="avatar">
            <div class="w-10 rounded-full">
                <img src="{{ Auth::user()->profile->image }}" alt="" />
            </div>
        </div>
    </div>

    {{-- <div class=""> --}}
        <form class="m-10" action="{{ route('post-update' , $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="form-control w-full max-w-xs mb-5">
                <label class="label">
                    <span class="label-text">Mau dikasi judul apa?</span>
                </label>
                <input type="text" name="title" value="{{ $post->title }}" placeholder="Type here"
                class="focus:outline-none focus:underline
                        input bg-transparent w-full max-w-xs" />
            </div>

            <div class="form-control w-full max-w-xs mb-5">
                <label class="label">
                    <span class="label-text">Deskripsi</span>
                </label>
                <input type="text" name="description" value="{{ $post->description }}" placeholder="Type here"
                class="focus:outline-none focus:underline
                input bg-transparent w-full max-w-xs" />
            </div>
            
            <div class="form-control mb-5">
                <label class="label">
                    <span class="label-text">Tulis</span>
                </label>
                <textarea name="body" id="editor"  placeholder="Bagi resepmu...">
                    {{ $post->body }}
                </textarea>
            </div>


            <div class="flex h-auto w-80">
                <div class="w-72 lg:w-96 max-w-lg">
                    <div class="shadow-drop-center mt-8">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-400 text-md mb-2" for="pair">
                                Choose categories:
                            </label>
                            <select
                                name="categories_id[]"
                                class="js-example-basic-multiple" style="width: 100%"
                                data-placeholder="Select one or more cities..."
                                autocomplete="on"
                                data-allow-clear="false"
                                multiple="multiple"
                                title="Select city...">
                                @foreach ($categories as $category)
                                    @foreach ($post->categories as $c)
                                        @if ($c->id === $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-ghost" type="submit">Upload</button>

        </form>
    

    {{-- </div> --}}

    @push('js')

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                ckfinder:{
                    uploadUrl: `{{route('ckeditor.upload').'?_token='.csrf_token()}}`,
                },
                mediaEmbed: {
                        previewsInData:true
                    },
                    
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

    @endpush
    
</x-app-layout>
