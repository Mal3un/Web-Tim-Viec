<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;

class LanguageController extends Controller
{
    use ResponseTrait;
    private object $model;

    public function __construct()
    {
        $this->model = Language::query();
    }
    public function index(request $request) : JsonResponse
    {
        $configs = SystemConfigController::getAndCache();
        $keySearch = $request->get('q');
        if(isset($keySearch)){
            $data = $configs['languages']->filter(function($each) use ($request){
                return Str::contains(strtolower($each['name']),$request->get('q'));
            });
        }else{
            $data = $configs['languages']->all();
        }
        return $this->successResponse($data);
    }
}
