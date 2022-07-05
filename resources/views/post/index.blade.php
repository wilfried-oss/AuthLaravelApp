@extends('layout.theme')
@section('title', 'User | All')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                All Users
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Users of our Site</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic informations</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Striped Table</h4>
                        <p class="card-description">
                            Add class <code>.table-striped</code>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Profile
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Tools
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="py-1">
                                            <img src=" {{ Storage::url($user->avatar) }} " alt="image" />
                                        </td>
                                        <td>
                                            {{ $user->Name }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('admin.users.show', $user->id) }}"
                                                    class="mdi mdi-eye" style="color: green">
                                                </a>
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="offset-3 mdi mdi-grease-pencil" style="color: blue"></a>
                                                <form action="{{ route('admin.users.destroy', $user->id) }} "
                                                    method="post" class="offset-3">
                                                    @csrf
                                                    <button type="submit" style="color: red; border: none">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
