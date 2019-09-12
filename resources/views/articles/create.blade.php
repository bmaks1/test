@extends ('layouts.app')

@section ('title', 'Admin | One Article')

@section('page-header')
    <h1>
        Articles Management
        <small>Create article</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'articles.store','files'=>true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Create article</h3>
        </div>

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('id_category', "Category", ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::select('id_category',$categories , null, ['placeholder' => 'Pick a category...']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('name', "Name", ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control',  'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => "Name of article "]) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('content', "Content", ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('content', null, ['class' => 'form-control',  'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => "Content"]) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('file', "Picture", ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::file('file', null, ['class' => 'form-control',  'placeholder' => "picture"]) }}
                </div>
            </div>


        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('articles.index', "Cancel", [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit('Save', ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@endsection