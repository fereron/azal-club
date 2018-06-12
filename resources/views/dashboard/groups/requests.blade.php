@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/examples/css/tables/basic.css">
    <style>
        .example.table-responsive td{
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Заявки на вступление в группу</h1>
            <div class="page-header-actions">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('group.show', [$group->id]) }}">{{ $group->name }}</a></li>
                    <li class="breadcrumb-item active">Заявки на вступление</li>
                </ol>
            </div>
        </div>

        <div class="page-content">

            @if (session('success'))
                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon md-check" aria-hidden="true"></i>
                    {{ session('success') }}
                </div>
            @endif


            <!-- Panel -->
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-lg-12">
                            <!-- Example Basic -->
                            <div class="example-wrap">
                                
                                @if ($group->requests->isNotEmpty())
                                <div class="example table-responsive table-striped">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Фото профиля</th>
                                            <th>Пользователь</th>
                                            <th>Время подания заявки</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($group->requests as $request)
                                            <tr>
                                                <td></td>
                                                <td><img class="avatar avatar-sm" src="{{ $request->user->avatar_path }}" data-toggle="tooltip" data-original-title="{{ $request->user->full_name }}" data-container="body" title=""></td>
                                                <td><a href="{{ route('profile.public', [$request->user->uuid]) }}">{{ $request->user->full_name }}</a></td>
                                                <td>{{ $request->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <form action="{{ route('group.requests.accept') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $request->user->id }}">
                                                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                                                        <button class="btn btn-success">Принять</button>
                                                    </form>
                                                </td>
                                            </tr>д
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                    
                                    
                                @else   
                                    <h4>В данный момент нет активных заявок</h4>
                                @endif
                            </div>
                            <!-- End Example Basic -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panel -->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/global/vendor/peity/jquery.peity.min.js"></script>
    <script src="/global/js/Plugin/peity.js"></script>
    <script src="/global/js/Plugin/asselectable.js"></script>
    <script src="/global/js/Plugin/selectable.js"></script>
    <script src="/global/js/Plugin/table.js"></script>

    <script src="/assets/examples/js/charts/peity.js"></script>
@endpush