@extends('layouts.app')

@section('content')
    <div class="page-title-container mb-3">
        <div class="row">
            <!-- Title Start -->
            <div class="col mb-2">
                <h1 class="mb-2 pb-0 display-4" id="title">Users</h1>
            </div>

            <div class="col-12 col-sm-auto d-flex align-items-center justify-content-end">
                <!-- Add New Button Start -->
                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                    <i data-acorn-icon="plus"></i>
                    <span>Add New</span>
                </button>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 row-cols-xxl-4 g-2">
        <div class="col-12">
            content
        </div>
    </div>
@endsection