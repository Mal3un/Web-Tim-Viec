<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompanyController extends Controller
{
    use ResponseTrait;
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Company::query();
    }
    public function index(request $request) : JsonResponse
    {

        $data = $this->model
            ->where('name', 'like', '%'. $request->get('q') .'%')
            ->get();
        return $this->successResponse($data);
    }
    public function checkName($companyName) : JsonResponse
    {
        $check = $this->model
            ->where('name', $companyName)
            ->exists();
        return $this->successResponse($check);
    }
    public function store(StoreRequest $request)
    {
        $arr = $request->validated();
        $arr['logo'] = optional($request->file('logo')->store('company_logo'));
        Company::create($arr);
        return $this->successResponse("thành công");
    }
}
