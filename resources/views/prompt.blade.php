<form method="POST" action="{{ route('generate') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="prompt" placeholder="Enter prompt">
    <button type="submit">Generate Image</button>
</form>
