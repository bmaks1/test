@extends ('layouts.app')

@section ('title', 'Admin | Categories')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        Categories Management
        <small>Categories</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Categories</h3>

        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <a href="{{route('categories.create')}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Create"></i>Create new</a>
                <table  class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($categories)
                            {
                                foreach ($categories as $category)
                                {
                                    ?>
                                        <tr>
                                            <td><?=$category->name?></td>
                                            <td><?=$category->description?></td>
                                            <td>
                                                <a href="{{route('categories.edit', $category)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                                <a href="{{route('categories.show', $category)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Show"></i></a>
                                                <a data-method="delete" href="{{route('categories.destroy', $category)}}" class="btn btn-xs btn-danger btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                    <?
                                }
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
