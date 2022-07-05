@extends('layout.theme')
@section('title', 'Welcome')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Welcome</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic informations</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="offset-2 col-md-6 grid-margin stretch-card">
                <div class="card">
                </div>
            </div>
        </div>
    </div>
@endsection
