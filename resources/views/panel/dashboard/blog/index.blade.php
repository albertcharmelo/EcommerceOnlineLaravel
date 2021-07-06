@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Noticia</h1>
        <div class="section-header-button">
            <a href="features-post-create.html" class="btn btn-primary">Añadir Noticia</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Blog</a></div>
            <div class="breadcrumb-item">Noticias</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Noticas</h2>
        <p class="section-lead">
            Puedes administrar todas las noticas, además de editar, borrar y mas.

        </p>

        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Todos <span class="badge badge-white">5</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Publicados <span class="badge badge-primary">1</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pendiente <span class="badge badge-primary">1</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Eliminados <span class="badge badge-primary">0</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Todas las Noticias</h4>
                    </div>
                    <div class="card-body">

                        <div class="float-right">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-center pt-2">
                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-2">
                                            <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>Laravel 5 Tutorial: Introduction
                                        <div class="table-links">
                                            <a href="#">View</a>
                                            <div class="bullet"></div>
                                            <a href="#">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger">Trash</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">Web Developer</a>,
                                        <a href="#">Tutorial</a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img alt="image"
                                                src="{{ asset('/assets/img/avatar/avatar-5.png') }}"
                                                class="rounded-circle" width="35" data-toggle="title" title="">
                                            <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                        </a>
                                    </td>
                                    <td>2018-01-20</td>
                                    <td>
                                        <div class="badge badge-primary">Published</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-3">
                                            <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>Laravel 5 Tutorial: Installing
                                        <div class="table-links">
                                            <a href="#">View</a>
                                            <div class="bullet"></div>
                                            <a href="#">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger">Trash</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">Web Developer</a>,
                                        <a href="#">Tutorial</a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img alt="image"
                                                src="{{ asset('/assets/img/avatar/avatar-5.png') }}"
                                                class="rounded-circle" width="35" data-toggle="title" title="">
                                            <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                        </a>
                                    </td>
                                    <td>2018-01-20</td>
                                    <td>
                                        <div class="badge badge-primary">Published</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-4">
                                            <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>Laravel 5 Tutorial: MVC
                                        <div class="table-links">
                                            <a href="#">View</a>
                                            <div class="bullet"></div>
                                            <a href="#">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger">Trash</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">Web Developer</a>,
                                        <a href="#">Tutorial</a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img alt="image"
                                                src="{{ asset('/assets/img/avatar/avatar-5.png') }}"
                                                class="rounded-circle" width="35" data-toggle="title" title="">
                                            <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                        </a>
                                    </td>
                                    <td>2018-01-20</td>
                                    <td>
                                        <div class="badge badge-primary">Published</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-5">
                                            <label for="checkbox-5" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>Laravel 5 Tutorial: CRUD
                                        <div class="table-links">
                                            <a href="#">View</a>
                                            <div class="bullet"></div>
                                            <a href="#">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger">Trash</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">Web Developer</a>,
                                        <a href="#">Tutorial</a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img alt="image"
                                                src="{{ asset('/assets/img/avatar/avatar-5.png') }}"
                                                class="rounded-circle" width="35" data-toggle="title" title="">
                                            <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                        </a>
                                    </td>
                                    <td>2018-01-20</td>
                                    <td>
                                        <div class="badge badge-danger">Draft</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>Laravel 5 Tutorial: Deployment
                                        <div class="table-links">
                                            <a href="#">View</a>
                                            <div class="bullet"></div>
                                            <a href="#">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger">Trash</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">Web Developer</a>,
                                        <a href="#">Tutorial</a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img alt="image"
                                                src="{{ asset('/assets/img/avatar/avatar-5.png') }}"
                                                class="rounded-circle" width="35" data-toggle="title" title="">
                                            <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                        </a>
                                    </td>
                                    <td>2018-01-20</td>
                                    <td>
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{ asset('js/panel/page/features-posts.js') }}"></script>

@endsection