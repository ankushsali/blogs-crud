@section("title", "All Blogs")
<x-app-layout>
    <div class="container">
        <a href="{{ route('blog.create') }}" class="create-blog-button">Create New Blog</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th style="width: 15%;">Title</th>
                    <th style="width: 45%;">Description</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->description }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('blog.show', $blog->id) }}" class="action-link view-link">View</a>
                            <a href="{{ route('blog.edit', $blog->id) }}" class="action-link edit-link">Edit</a>
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button onclick="return confirm('Are you sure want to delete')" class="delete-link"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $blogs->links() }}
        </div>
    </div>
</x-app-layout>