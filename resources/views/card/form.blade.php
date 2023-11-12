<form action="" method="post">
    @csrf
    @method($card->id ? "PATCH" : "POST")
    <input type="text" name="question" id="quesition" value="{{ old('question', $card->question) }}">
    @error('question')
        {{ $message }}
    @enderror
    <input type="text" name="answer" id="" value="{{ old('answer', $card->answer) }}">
    @error('answer')
        {{ $message }}
    @enderror
    <input type="text" name="explication" id="{{ old('explication'), $card->explication}}">
    @error('explication')
        {{ $message }}
    @enderror
    <input type="submit" value="{{ $card->id? 'Modifier' : 'créer'}}">
    @error(['slug','owner_id'])
        {{ $message }}
    @enderror
</form>