@extends ('layouts.app')

@section ('title', 'Admin | Articles')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        Articles Management
        <small>Articles</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Articles</h3>

        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <a href="{{route('articles.create')}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Create"></i>Create new</a>
                <table  class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($articles)
                            {
                                foreach ($articles as $article)
                                {
                                    ?>
                                        <tr>
                                            <td><img style="width: 200px;" src="/img/<?=$article->file?>"></td>
                                            <td><?=$article->name?></td>
                                            <td><?=$article->content?></td>
                                            <td>
                                                <a href="{{route('articles.edit', $article)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                                <a href="{{route('articles.show', $article)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Show"></i></a>
                                                <a data-method="delete" href="{{route('articles.destroy', $article)}}" class="btn btn-xs btn-danger btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
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
