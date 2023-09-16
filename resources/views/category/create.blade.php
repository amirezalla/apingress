@extends('layouts.admin')

@section('page-title')
    {{__('Add category')}}
@endsection

@section('breadcrumb')
{{--    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>--}}
    <li class="breadcrumb-item"><a href="">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Add category')}}</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Category name</label><span class="text-danger">*</span>
                                            <input class="form-control" required="required" name="name" type="text" id="name">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <small class="form-text text-muted mb-2 mt-0">This textarea will autosize while you type</small>
                                            <textarea class="form-control" rows="1" data-toggle="autosize" name="description" cols="50" id="description"></textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">
                                <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
                                <input type="submit" value="Create" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
