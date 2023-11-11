<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
</head>
<body>
    <h1>Create Profile</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profiles.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="nickname">Nickname:</label>
        <input type="text" name="nickname" value="{{ old('nickname') }}" required>

        <label for="body">Body:</label>
        <textarea name="body">{{ old('body') }}</textarea>

        <label for="hobby">Hobby:</label>
        <input type="text" name="hobby" value="{{ old('hobby') }}" required>

        <label for="dislike">Dislike:</label>
        <input type="text" name="dislike" value="{{ old('dislike') }}">

        <label for="mbti">MBTI:</label>
        <input type="text" name="mbti" value="{{ old('mbti') }}">

        <label for="smoking">Smoking:</label>
        <input type="text" name="smoking" value="{{ old('smoking') }}">

        <label for="distance">Distance:</label>
        <input type="text" name="distance" value="{{ old('distance') }}">

        <label for="where">Where:</label>
        <input type="text" name="where" value="{{ old('where') }}">

        <label for="age">Age:</label>
        <input type="text" name="age" value="{{ old('age') }}">

        <label for="like">Like:</label>
        <input type="text" name="like" value="{{ old('like') }}">

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
