<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\checkSlugRequest;
use App\Http\Requests\Post\generateSlugRequest;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class PostController extends Controller
{

    use ResponseTrait;
    private object $model;


    public function __construct()
    {
        $this->model = Post::query();
    }
    public function index() : JsonResponse
    {
        $data = $this->model->paginate();
        foreach ($data as $each) {
            $each->currency_salary = $each->currency_salary_code;
            $each->status = $each->status_name;
        }
        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();

        return $this->successResponse($arr);
    }
    public function generateSlug(generateSlugRequest $request) : JsonResponse
    {
        try{
            $title = $request->get('title');
            $slug = SlugService::createSlug(Post::class, 'slug', $title);
            return $this->successResponse($slug);
        }catch(Throwable $e){
            return $this->errorResponse();
        }
    }
    public function checkSlug(checkSlugRequest $request): JsonResponse
    {
        return $this->successResponse();
//        return $this->errorResponse();

    }
}
