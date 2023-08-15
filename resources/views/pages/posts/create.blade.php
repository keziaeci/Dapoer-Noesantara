<x-app-layout>
    @push('css')
    @endpush
    <div class="flex m-10 items-center">
        <div class="flex-1">
            <h1>{{ Auth::user()->name }}'s draft</h1>
        </div>
        <div class="avatar">
            <div class="w-10 rounded-full">
                <img src="{{ Auth::user()->profile->image }}" />
            </div>
        </div>  
    </div>

    {{-- <div class=""> --}}
        <form class="m-10" action="{{ route('post-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-control w-full max-w-xs mb-5">
                <label class="label">
                    <span class="label-text">Mau dikasi judul apa?</span>
                </label>
                <input type="text" name="title" placeholder="Type here" class="input bg-inherit input-bordered w-full max-w-xs" />
            </div>
            
            <select class="multi-select" name="categories_id[]" multiple="multiple">
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>    

            <textarea name="body" id="editor" placeholder="Bagi resepmu...">
            </textarea>

            <button class="btn btn-ghost" type="submit">Upload</button>

        </form>
    

    {{-- </div> --}}

    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    @endpush
</x-app-layout>