@extends('layout.theme')
@section('title', 'Author | Show')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                Show Author
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Form show author</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic informations</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="offset-2 col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description">
                            Basic form
                        </p>
                        <form class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" disabled value="{{ $author->firstname }}">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" disabled value="{{ $author->lastname }}">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
