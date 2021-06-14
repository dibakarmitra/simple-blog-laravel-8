@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Entries</h1>
            </div>
            @auth
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('entries.create') }}">
                    Add New
                </a>
            </div>
            @endauth
        </div>
    </div>
</section>
@auth
<div class="clearfix"></div>
<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">
        {!! Form::open(['route' => 'entries.store', 'enctype' => 'multipart/form-data']) !!}

        <div class="card-body">

            <div class="row">
                @include('entries.fields')
            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('entries.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endauth
<div class="clearfix"></div>
<div class="content p-3">
    <div class="card-header">
        <h5 class="float-left">Entries</h5>
        <div class="float-right">
            <div class="form-group">
                <a href="?view=tableview" class='btn btn-primary'>Table</a>
                <a href="?view=gridview" class='btn btn-primary'>Grid</a>
                <a href="?view=timeline" class='btn btn-primary'>Timeline</a>
            </div>

        </div>
    </div>
</div>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">{{--

            @include('entries.table')
        --}}

            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                    @if(session('view') && session('view')=='tableview')
                    @include('entries.views.table')
                    @endif

                    @if(session('view') && session('view')=='gridview')
                    @include('entries.views.grid')
                    @endif

                    @if(session('view') && session('view')=='timeline')
                    @include('entries.views.timeline')
                    @endif
                    @if(!session('view'))
                    @include('entries.views.grid')
                    @endif
                </div>
            </div>

            <div class="card-footer clearfix float-right">
                <div class="float-right">
                    @include('adminlte-templates::common.paginate', ['records' => $entries])
                </div>
            </div>
        </div>

    </div>
</div>

@endsection