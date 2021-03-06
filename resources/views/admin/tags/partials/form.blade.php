@section('scripts')
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
</script>
@endsection

<div class="form-group">
    {{ Form::label('name', 'Tag name') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
        {{ Form::label('slug', 'Friendly URL') }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<div class="form-group">
        {{ Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) }}
</div>

