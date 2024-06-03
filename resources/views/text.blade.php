<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Text</title>
</head>
<body>
    <form action="/generate-text" method="POST">
        @csrf
        <label for="prompt">Prompt:</label>
        <input type="text" name="prompt" id="prompt">
        <button type="submit">Generate</button>
    </form>

    @isset($text)
        <p>Generated Text: {{ $text }}</p>
    @endisset
</body>
</html>



                           
