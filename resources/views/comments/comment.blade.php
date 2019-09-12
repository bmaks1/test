<?php

    if($comment)
    {
        ?>
        <div style="padding: 20px;">
            <div><b><?=$comment->author?></b></div>
            <div><?=$comment->content?></div>
            <div style="text-align: right;"><?=$comment->created_at?></div>
        </div>
        <?
    }

?>