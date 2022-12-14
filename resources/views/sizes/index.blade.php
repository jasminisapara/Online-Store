@extends('layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sizes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Size List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                    </div>

                    <div class="card card-primary card-outline">
                        <div class="card-body">

                            <a href="{{ route('sizes.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                                Add Size</a><br><br>

                            <h5 class="card-title">Size List</h5><br>
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Size</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sizes)
                                        @foreach ($sizes as $key => $size)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $size->size ?? '' }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info "
                                                        href="{{ route('sizes.edit', $size->id) }}">
                                                        <i class="fa fa-edit"> Edit</i>
                                                    </a>
                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                        data-form-id="size-delete-{{ $size->id }}">
                                                        <i class="fa fa-trash"> Delete</i>
                                                    </a>

                                                    <form method="post" id="size-delete-{{ $size->id }}"
                                                        action="{{ route('sizes.destroy', $size->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div><!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
