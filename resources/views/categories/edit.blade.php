@extends ('layouts.app')

@section ('title', 'Admin | One Category')

@section('page-header')
    <h1>
        Categories Management
        <small>Create category</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($category, ['route' => ['categories.update', $category],'files'=>false, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Create category</h3>
        </div>

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('name', "Name", ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control',  'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => "Name of category "]) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('description', "Description", ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::textarea('description', null, ['class' => 'form-control',  'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => "Description"]) }}
                </div>
            </div>


        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('categories.index', "Cancel", [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit('Save', ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@endsection