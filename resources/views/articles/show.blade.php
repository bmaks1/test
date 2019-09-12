@extends ('layouts.app')

@section ('title', 'Admin | Show One Article')

@section('page-header')
    <h2>
        Articles Management
        <small>Show article</small>
    </h2>
@endsection

@section('content')
    <div>
        <h1><?=$article->name?></h1>
        <img style="max-width: 300px;" src="/img/<?=$article->file?>">
        <div>
            <?=$article->content?>
        </div>
        <div class="comments_container" style="margin-top: 20px;">
            <?php

                if($comments)
                {
                    foreach ($comments as $comment)
                    {
                        ?>
                            <div style="padding: 20px;">
                                <div><b><?=$comment->author?></b></div>
                                <div><?=$comment->content?></div>
                                <div style="text-align: right;"><?=$comment->created_at?></div>
                            </div>
                        <?
                    }

                }

            ?>
        </div>
        {{ Form::open(['route' => 'comment','class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST','onsubmit'=>'return commentManager.send.call(this);']) }}
        {{ Form::hidden('id_article', $article->id, []) }}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Add comment</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('author', "Author", ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('author', null, ['class' => 'form-control',  'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => "Author"]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('content', "Content", ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('content', null, ['class' => 'form-control',  'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => "Content"]) }}
                    </div>
                </div>

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('articles.show', "Cancel", ['article'=>$article], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit('Save', ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

        {{ Form::close() }}

    </div>
    <script>
        var commentManager={
            send:function(){
                var this_form = $(this);
                var url = this_form.attr('action');
                var container = $(".comments_container:first");
                $.post(
                    url,
                    this_form.serialize(),
                    function(data)
                    {
                        container.append(data);
                    },
                    'text'
                );

                return false;
            }
        }
    </script>
@endsection