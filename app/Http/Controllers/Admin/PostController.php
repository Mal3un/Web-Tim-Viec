<?php

namespace App\Http\Controllers\Admin;

//use App\Enums\ObjectLanguageTypeEnum;
use App\Enums\object_language_type_enum;
use App\Enums\PostCurrencySalaryEnum;

use App\Enums\PostRemoteableEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Controllers\SystemConfigController;
use App\Http\Requests\Post\StoreRequest;
use App\Imports\PostImport;
use App\Models\Company;
use App\Models\ObjectLanguage;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class PostController extends Controller
{
    use ResponseTrait;

    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Post::query();
        $this->table = (new Post())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $configs = SystemConfigController::getAndCache();

        return view('admin.posts.create', [
            'currencies' => $configs['currencies'],
            'countries' => $configs['countries'],
        ]);
    }

    public function importCsv(Request $request): JsonResponse
    {
        try {
            Excel::import(new PostImport(), $request->file('file'));

            return $this->successResponse();
        } catch (\Throwable $e) {
            return $this->errorResponse();
        }
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $arr = $request->only([
                "district",
                "city",
                "min_salary",
                "max_salary",
                "currency_salary",
                "requirement",
                "start_date",
                "end_date",
                "number_applicants",
                "job_title",
                "slug",
            ]);
            $companyName = $request->get('company');
            if(!empty($companyName)){
                $arr['company_id'] = Company::firstOrCreate(['name' => $companyName])->id;
            }
            if($request->has('removables')){
                $remotable = $request->get('removables');
            }
            if(!empty($remotable['remote']) && !empty($remotable['office'])){
                $arr['remotable'] = PostRemoteableEnum::DYNAMIC;
            }else if(!empty($remotable['remote'])){
                $arr['remotable'] = PostRemoteableEnum::REMOVE_ONLY;
            }else{
                $arr['remotable'] = PostRemoteableEnum::OFFICE_ONLY;
            }
            if($request->has('can_partime')){
                $arr['can_partime'] = 1;
            }
//            dd($arr);
            $post = Post::create($arr);
            $languages = $request->get('languages');
            foreach($languages as $language){
                ObjectLanguage::create([
                    'language_id' => $language,
                    'object_id' => $post->id,
                    'type' => object_language_type_enum::POST,
                ]);
            }
            DB::commit();
            return $this->successResponse();
        } catch (Throwable $e){
            DB::rollback();
            dd($e);
            return $this->errorResponse();
        }
    }
}
