@extends('app')

@section('admin-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
            <div class="col-md-12">
                @include('partials._alert')
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dashboard</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection