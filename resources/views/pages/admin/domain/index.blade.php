@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Domains</h1>
                <a href="{{ route('admin.domain.create') }}" class="btn btn-primary">Create Domain</a>
                <br /><br />
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($domains as $domain)
                        <tr>
                            <td>{{ $domain->id }}</td>
                            <td>{{ $domain->name }}</td>
                            <td>
                                <a href="{{ route('admin.domain.edit', $domain->id) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('admin.domain.destroy', $domain->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this domain?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <p>Showing {{ $domains->count() }} out of {{ $domains->total() }} domains</p>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item{{ $domains->currentPage() === 1 ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $domains->previousPageUrl() }}" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $domains->currentPage() }}</a>
                            </li>
                            <li class="page-item{{ $domains->hasMorePages() ? '' : ' disabled' }}">
                                <a class="page-link" href="{{ $domains->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
