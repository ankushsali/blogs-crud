@section("title", "Create Blog")
<x-app-layout>
    <div class="container">
        <!-- @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif -->
        <h2>Create Blog</h2>
        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Title">
                @error("title")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description: </label>
                <textarea id="description" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                @error("description")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div style="display: flex;margin-top: 15px;">
                <button type="submit" class="form-btn">Create Blog</button>
                <a href="{{ route('blog.index') }}" class="action-link view-link">Back</a>
            </div>
        </form>
    </div>
</x-app-layout>