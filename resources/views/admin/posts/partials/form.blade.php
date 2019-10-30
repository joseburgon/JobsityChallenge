{{-- <link href="{{ asset('vendor/ckeditor5-build-classic/ckeditor.css') }}" rel="stylesheet"> --}}

{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    {{ Form::label('category_id', 'Categories') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Post name') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
        {{ Form::label('slug', 'Friendly URL') }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }} <br>
    {{ Form::file('file') }}
</div>

<div class="form-group">
    {{ Form::label('status', 'Status') }} <br>
    <label>
		{{ Form::radio('status', 'PUBLISHED') }} Published
	</label>
	<label>
		{{ Form::radio('status', 'DRAFT') }} Draft
	</label>
</div>

<div class="form-group">
    {{ Form::label('tags', 'Tags') }}
    <div>
        @foreach ($tags as $tag)
            <label>
                {{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}
            </label>
        @endforeach
    </div>
</div>

<div class="form-group">
    {{ Form::label('excerpt', 'Excerpt') }}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>

<div class="form-group">
    {{ Form::label('body', 'Description') }}
    {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body']) }}
</div>

<div class="form-group">
    {{ Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')

<script src="{{ asset('vendor/ckeditor5-build-classic/ckeditor.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function(e) {
        var name = document.getElementById('name'),
            slug = document.getElementById('slug');
    
        name.onkeyup = function() {
        slug.value = string_to_slug(name.value);
        }
    });
    
    function string_to_slug (str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
    
        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
    
        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes
    
        return str;
    }

    // CKEditor
    window.onload = function(){
        setTimeout(function(){
            //CKEDITOR
            ClassicEditor
                .create( document.querySelector( '#body' ), {
                    toolbar: [ 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
                } )
                .catch( error => {
                    console.error( error );
            } );            
            //END CKEDITOR
        },0);
    }
</script>
@endsection