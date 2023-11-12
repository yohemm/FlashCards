<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <input type="text" name="question" id="quesition" value="{{ old('question', 'Ma question ?') }}">
        @error('question')
            {{ $message }}
        @enderror
        <input type="text" name="answer" id="" value="{{ old('answer', 'Ma réponse') }}">
        @error('answer')
            {{ $message }}
        @enderror
        <input type="text" name="explication" id="{{ old('explication') }}">
        @error('explication')
            {{ $message }}
        @enderror
        <input type="submit" value="submit">
        @error(['slug','owner_id'])
            {{ $message }}
        @enderror
    </form>
</body>
</html>