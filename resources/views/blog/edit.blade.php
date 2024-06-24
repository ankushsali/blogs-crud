@section("title", "Edit Blog")
<x-app-layout>
    <div class="container">
        <h2>Edit Blog</h2>
        <form action="{{ route('blog.update', $blog->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" id="title" name="title" value="{{ $blog->title }}" placeholder="Enter Title" >
                @error("title")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description: </label>
                <textarea id="description" name="description" placeholder="Enter Description">{{ $blog->description }}</textarea>
                @error("description")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div style="display: flex;margin-top: 15px;">
                <button type="submit" class="form-btn">Update Blog</button>
                <a href="{{ route('blog.index') }}" class="action-link view-link">Back</a>
            </div>
        </form>
    </div>
</x-app-layout>