<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
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
        $data = $this->model
            ->where('name', 'like', '%'. $request->get('q') .'%')
            ->get();
        return $this->successResponse($data);
    }
}
