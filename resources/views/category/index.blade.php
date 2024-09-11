@extends('layout')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Category</h3>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="catname">Category Name</label>
                            <input type="text" class="form-control" name="catname" id="catname" required>
                        </div>

                        <div class="col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="" selected>Select Status</option>
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>
            </div>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories_ as $key => $category)
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $category->catname }}</td>
                            <td scope="col">
                                @if($category->status == 1)
                                    True
                                @else
                                    False
                                @endif
                            </td>
                            <td scope="col">
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>

                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .form-area {
        padding: 20px;
        margin-top: 20px;
        background-color: #b3e5fc;
    }

    .btn-sm {
        margin-right: 10px;
    }

    .fa-pencil-square-o {
        margin-right: 5px;
    }

    .fa-trash {
        color: red;
    }

    .fa-pencil {
        color: green;
    }
</style>
@endpush
