<!DOCTYPE html>
<html>
<head>
    <title>Image View</title>
</head>
<body>
    <h1>Image View</h1>
    {{-- <p>{{ $imageData }}</p> --}}

    @if($imageData)
        <img src="{{ $imageData}}" alt="Image">
    @endif
    <form method="POST" action="{{route('findobject')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="prompt" placeholder="Enter prompt">
        <input type="file" name="image">
        <button type="submit">Generate Image</button>
    </form>
</body>
</html>
