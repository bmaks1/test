<?php
namespace App\Repositories;

use App\Comment;

/**
 * Class CommentsRepository.
 */
class CommentsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Comment::class;

    /**
     * @param array $request
     *
     *  * @return mixed
     */
    public function create(array $request)
    {
        /**
         * @var Comment $comment
         */
        $model = self::MODEL;
        $comment = new $model();
        $comment->id_article = $request['id_article'];
        $comment->author = $request['author'];
        $comment->content = $request['content'];
        $comment->created_at = date("Y-m-d H:i:s");
        $comment->save();
        return $comment;
    }





}
