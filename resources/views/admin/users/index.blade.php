@extends('admin.layouts.admin')

@section('title', 'Usuários')

@section('content')
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Administradores</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Congressistas</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Congressistas Confirmados</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>@sortablelink('email', __('views.admin.users.index.table_header_0'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('name',  __('views.admin.users.index.table_header_1'),['page' => $users->currentPage()])</th>
                                        <th>{{ __('views.admin.users.index.table_header_2') }}</th>
                                        <th>@sortablelink('active', __('views.admin.users.index.table_header_3'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('confirmed', __('views.admin.users.index.table_header_4'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $users->currentPage()])</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        @if($user->hasRole('administrator'))
                                        <tr>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
                                            <td>
                                                @if($user->active)
                                                    <span class="label label-primary">{{ __('views.admin.users.index.active') }}</span>
                                                @else
                                                    <span class="label label-danger">{{ __('views.admin.users.index.inactive') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->confirmed)
                                                    <span class="label label-success">{{ __('views.admin.users.index.confirmed') }}</span>
                                                @else
                                                    <span class="label label-warning">{{ __('views.admin.users.index.not_confirmed') }}</span>
                                                @endif</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                {{--@if(!$user->hasRole('administrator'))--}}
                                                {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                                                {{--data-url="{{ route('admin.users.destroy', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                                                {{--<i class="fa fa-trash"></i>--}}
                                                {{--</button>--}}
                                                {{--@endif--}}
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $users->links() }}
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>@sortablelink('email', __('views.admin.users.index.table_header_0'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('name',  __('views.admin.users.index.table_header_1'),['page' => $users->currentPage()])</th>
                                        <th>{{ __('views.admin.users.index.table_header_2') }}</th>
                                        <th>@sortablelink('active', __('views.admin.users.index.table_header_3'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('confirmed', __('views.admin.users.index.table_header_4'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $users->currentPage()])</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        @if(!$user->hasRole('administrator'))
                                            <tr>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
                                                <td>
                                                    @if($user->active)
                                                        <span class="label label-primary">{{ __('views.admin.users.index.active') }}</span>
                                                    @else
                                                        <span class="label label-danger">{{ __('views.admin.users.index.inactive') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->confirmed)
                                                        <span class="label label-success">{{ __('views.admin.users.index.confirmed') }}</span>
                                                    @else
                                                        <span class="label label-warning">{{ __('views.admin.users.index.not_confirmed') }}</span>
                                                    @endif</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>
                                                <td>
                                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {{--@if(!$user->hasRole('administrator'))--}}
                                                    {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                                                    {{--data-url="{{ route('admin.users.destroy', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                                                    {{--<i class="fa fa-trash"></i>--}}
                                                    {{--</button>--}}
                                                    {{--@endif--}}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $users->links() }}
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>@sortablelink('email', __('views.admin.users.index.table_header_0'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('name',  __('views.admin.users.index.table_header_1'),['page' => $users->currentPage()])</th>
                                        <th>{{ __('views.admin.users.index.table_header_2') }}</th>
                                        <th>@sortablelink('active', __('views.admin.users.index.table_header_3'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('confirmed', __('views.admin.users.index.table_header_4'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $users->currentPage()])</th>
                                        <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $users->currentPage()])</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        @if($user->hasRole('Confirmados'))
                                            <tr>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
                                                <td>
                                                    @if($user->active)
                                                        <span class="label label-primary">{{ __('views.admin.users.index.active') }}</span>
                                                    @else
                                                        <span class="label label-danger">{{ __('views.admin.users.index.inactive') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->confirmed)
                                                        <span class="label label-success">{{ __('views.admin.users.index.confirmed') }}</span>
                                                    @else
                                                        <span class="label label-warning">{{ __('views.admin.users.index.not_confirmed') }}</span>
                                                    @endif</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>
                                                <td>
                                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {{--@if(!$user->hasRole('administrator'))--}}
                                                    {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                                                    {{--data-url="{{ route('admin.users.destroy', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                                                    {{--<i class="fa fa-trash"></i>--}}
                                                    {{--</button>--}}
                                                    {{--@endif--}}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection