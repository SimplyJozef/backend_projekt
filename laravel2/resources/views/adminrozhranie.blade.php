@include("parts.header")
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
@if($stages)
    <h1> Stage </h1>
    <ul>
        @foreach($stages as $stage)
            <div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
            <form action="{{ route('update-stage', ['id' => $stage->id]) }}" method="POST">
                @csrf <!-- CSRF protection -->
                @method('PUT') <!-- Use PUT method for update -->
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="{{ $stage->name }}"><br>
                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date" value="{{ $stage->date }}"><br><br>


                <button type="submit">Update Stage</button> <br>
            </form>

            <form action="{{ route('delete-stage', ['id' => $stage->id]) }}" method="POST">
                @csrf <!-- CSRF protection -->
                @method('DELETE') <!-- Use DELETE method for delete -->
                <button type="submit">Delete Stage</button>
            </form>

            @foreach($stageInfo as $info)
                @if($info->stage_id == $stage->id)
                    <form action="{{ route('update-stageInfo', ['id' => $info->id]) }}" method="POST">
                        @csrf <!-- CSRF protection -->
                        @method('PUT') <!-- Use PUT method for update -->
                        <label for="Nazov">nazov</label><br>
                        <input type="text" id="nazov" name="nazov" value="{{ $info->nazov }}"><br>

                        <label for="timestamp">Cas od : do</label><br>
                        <input type="text" id="cas_od" name="cas_od" value="{{ $info->cas_od }}">
                        :
                        <input type="text" id="cas_do" name="cas_do" value="{{ $info->cas_do }}"><br>
                        <!-- Include a div for CKEditor -->
                        <div id="editor-container-{{ $info->id }}">
                            <textarea name="popis" id="popis-{{ $info->id }}">{{ $info->popis }}</textarea><br>
                        </div>

                        <label for="speaker">Speaker</label><br>
                        <input type="text" id="speaker" name="speaker"  value="{{ $info->speaker }}"><br><br>

                        <label for="firma">Firma</label><br>
                        <input type="text" id="firma" name="firma" value="{{ $info->firma }}"><br><br>


                        <label for="speaker_image_link">speaker_image_link</label><br>
                        <input type="text" id="speaker_image_link" name="speaker_image_link" value="{{ $info->speaker_image_link }}"><br><br>

                        <label for="max_capacity">Max kapacita</label><br>
                        <input type="text" id="max_capacity" name="max_capacity" value="{{ $info->max_capacity }}"><br><br>

                        <button type="submit">Update Stage info</button> <br>
                    </form>

                    <!-- Initialize CKEditor -->
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#popis-{{ $info->id }}' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                @endif
            @endforeach
            </div>
        @endforeach

    </ul>
@else
    <b>No stages</b>
@endif
<div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
    <form action="{{ route('create-stage') }}" method="POST">
        @csrf <!-- CSRF protection -->
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date"><br><br>
        <button type="submit">Add Stage</button>
    </form>
</div>


@if($sponzors)
    <h1> Sponsors </h1>
    <ul>
        @foreach($sponzors as $sponsor)
            <div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
            <form action="{{ route('update-sponsor', ['id' => $sponsor->id]) }}" method="POST">
                @csrf <!-- CSRF protection -->
                @method('PUT') <!-- Use PUT method for update -->
                <img src="{{ url('storage/images/' . $sponsor->imageLink) }}" class="img-fluid" style="max-height: 200px;" alt=""><br>
                <label for="imageLink">Image Link:</label><br>
                <input type="text" id="imageLink" name="imageLink" value="{{ $sponsor->imageLink }}"><br>
                <label for="link">Link:</label><br>
                <input type="text" id="link" name="link" value="{{ $sponsor->link }}"><br><br>
                <button type="submit">Update Sponsor</button>
            </form>

            <form action="{{ route('delete-sponsor', ['id' => $sponsor->id]) }}" method="POST">
                @csrf <!-- CSRF protection -->
                @method('DELETE') <!-- Use DELETE method for delete -->
                <button type="submit">Delete Sponsor</button>
            </form>
            </div>
        @endforeach
    </ul>
@else
    <b>No sponsors</b>
@endif
<div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">

<form action="{{ route('create-sponsor') }}" method="POST">
    @csrf <!-- CSRF protection -->
    <label for="imageLink">Image Link:</label><br>
    <input type="text" id="imageLink" name="imageLink"><br>
    <label for="link">Link:</label><br>
    <input type="text" id="link" name="link"><br><br>
    <button type="submit">Add Sponsor</button>
</form>
</div>

@if($povedaliONasList)
    <h1> Povedali o nás </h1>
    <ul>
        @foreach($povedaliONasList as $povedaliONas)
            <div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
            <form action="{{ route('update-povedaliONas', ['id' => $povedaliONas->id]) }}" method="POST">
                @csrf <!-- CSRF protection -->
                @method('PUT') <!-- Use PUT method for update -->
                <img src="{{ url('storage/images/' . $povedaliONas->imageLink) }}" class="img-fluid" style="max-height: 200px;" alt=""><br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="{{ $povedaliONas->name }}"><br>
                <label for="quote">Quote:</label><br>

                <textarea id="quote" name="quote">{{ $povedaliONas->quote }}</textarea><br>

                <label for="pozicia">Pozicia:</label><br>
                <input type="text" id="pozicia" name="pozicia" value="{{ $povedaliONas->pozicia }}"><br>
                <label for="imageLink">Image Link:</label><br>
                <input type="text" id="imageLink" name="imageLink" value="{{ $povedaliONas->imageLink }}"><br><br>
                <button type="submit">Update PovedaliONas</button>
            </form>

            <form action="{{ route('delete-povedaliONas', ['id' => $povedaliONas->id]) }}" method="POST">
                @csrf <!-- CSRF protection -->
                @method('DELETE') <!-- Use DELETE method for delete -->
                <button type="submit">Delete PovedaliONas</button>
            </form>
            </div>
        @endforeach
    </ul>
@else
    <b>No PovedaliONas</b>
@endif

<div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
<form action="{{ route('create-povedaliONas') }}" method="POST">
    @csrf <!-- CSRF protection -->
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="quote">Quote:</label><br>
    <input type="text" id="quote" name="quote"><br>
    <label for="pozicia">Pozicia:</label><br>
    <input type="text" id="pozicia" name="pozicia"><br>
    <label for="imageLink">Image Link:</label><br>
    <input type="text" id="imageLink" name="imageLink"><br><br>
    <button type="submit">Add PovedaliONas</button>
</form>
</div>

@if($speakers)
    <h1> Speakers </h1>
    <ul>
        @foreach($speakers as $speaker)
            <div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
            <form action="{{ route('update-speaker', ['id' => $speaker->id]) }}" method="POST">
                @csrf <!-- CSRF protection -->
                @method('PUT') <!-- Use PUT method for update -->
                <img src="{{ url('storage/images/' . $speaker->imageLink) }}" class="img-fluid" style="max-height: 200px;" alt=""><br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="{{ $speaker->name }}"><br>
                <label for="skusenosti">Experience:</label><br>
                <input type="text" id="skusenosti" name="skusenosti" value="{{ $speaker->skusenosti }}"><br>
                <label for="firma">Company:</label><br>
                <input type="text" id="firma" name="firma" value="{{ $speaker->firma }}"><br>
                <label for="linkedIn">LinkedIn:</label><br>
                <input type="text" id="linkedIn" name="linkedIn" value="{{ $speaker->linkedIn }}"><br>
                <label for="imageLink">Image Link:</label><br>
                <input type="text" id="imageLink" name="imageLink" value="{{ $speaker->imageLink }}"><br><br>
                <button type="submit">Update Speaker</button>
            </form>

            <form action="{{ route('delete-speaker', ['id' => $speaker->id]) }}" method="POST">
                @csrf <!-- CSRF protection -->
                @method('DELETE') <!-- Use DELETE method for delete -->
                <button type="submit">Delete Speaker</button>
            </form>
        </div>
        @endforeach
    </ul>
@else
    <b>No speakers</b>
@endif


<div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
<form action="{{ route('create-speaker') }}" method="POST">
    @csrf <!-- CSRF protection -->
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="skusenosti">Experience:</label><br>
    <input type="text" id="skusenosti" name="skusenosti"><br>
    <label for="firma">Company:</label><br>
    <input type="text" id="firma" name="firma"><br>
    <label for="linkedIn">LinkedIn:</label><br>
    <input type="text" id="linkedIn" name="linkedIn"><br>
    <label for="imageLink">Image Link:</label><br>
    <input type="text" id="imageLink" name="imageLink"><br><br>
    <button type="submit">Add Speaker</button>
</form>
</div>


@include("parts.footer")
