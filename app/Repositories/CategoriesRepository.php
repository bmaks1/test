<?php
namespace App\Repositories;

use App\Category;

use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

//use Intervention\Image\ImageManager;


/**
 * Class CategoriesRepository.
 */
class CategoriesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Category::class;

    /**
     * @return mixed
     */
    public function getList()
    {
        $list = $this->query()->select(["*"])->get();
        return $list;
    }

    /**
     * @return mixed
     */
    public function getCategoriesDroplist()
    {
        $list = $this->query()->select(["id","name"])->orderBy("name")->pluck("name","id");
        return $list;
    }

    /**

     * @param array $request
     *
     *  * @return mixed
     */
    public function create(array $request)
    {
        /**
         * @var Category $category
         */

        $model = self::MODEL;
        $category = new $model();
        $category->name = $request['name'];
        $category->description = $request['description'];

        $category->save();

        return $category;
    }

    /**
     * @param Request $request
     * @param Model $category
     * @param array $input
     *
     * @return bool

     */
    public function update(Request $request,Model $category, array $input)
    {
        $category->name = $input['name'];
        $category->description = $input['description'];
        return $category->save();
    }

    /**
     * @param Model $category
     * @return bool
     */
    public function delete(Model $category)
    {
        @unlink(public_path('/img/'.$category->file));
        return $category->delete();
    }





}
