<?php
namespace App\Repositories;

use App\Article;

use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

//use Intervention\Image\ImageManager;


/**
 * Class ArticlesRepository.
 */
class ArticlesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Article::class;

    /**
     * @return mixed
     */
    public function getList()
    {
        //Article::query()->select(["*"])->get();
        $list = $this->query()->select(["*"])->get();
        return $list;
    }

    /**
     * @param Request $httpRequest
     * @param array $request
     *
     *  * @return mixed
     */
    public function create(Request $httpRequest,array $request)
    {
        /**
         * @var Article $article
         */
        $model = self::MODEL;
        $article = new $model();
        $article->id_category = $request['id_category'];
        $article->name = $request['name'];
        $article->content = $request['content'];

        if ($httpRequest->hasFile('file'))
        {
            $file = $httpRequest->file('file');
            $filename  = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/'),$filename);
            $article->file = $filename;
        }

        $article->save();

        return $article;
    }

    /**
     * @param Request $request
     * @param Model $article
     * @param array $input
     *
     * @return bool

     */
    public function update(Request $request,Model $article, array $input)
    {
        $model_file = $article->file;
        $article->id_category = $input['id_category'];
        $article->name = $input['name'];
        $article->content = $input['content'];

       // $request = new Request();
        if ($request->hasFile('file'))
        {
            if($model_file)
                @unlink(public_path('/img/'.$model_file));
            $file = $request->file('file');
            $filename  = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/'),$filename);
            $article->file = $filename;

            $article->file = $filename;
        }
        else
            $article->file = $model_file;
       return $article->save();
    }

    /**
     * @param Model $article
     * @return bool
     */
    public function delete(Model $article)
    {
        @unlink(public_path('/img/'.$article->file));
        return $article->delete();
    }





}
