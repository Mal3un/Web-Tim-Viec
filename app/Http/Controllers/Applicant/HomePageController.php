<?php

    namespace App\Http\Controllers\Applicant;
    use App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\Post;


    class HomePageController extends Controller
    {
        public function index()
        {
            $posts = Post::query()
                ->with('languages')
                ->with('company:id,name,logo')
                ->latest()
                ->paginate();
            return view('applicant.index',['posts'=>$posts]);
        }
    }
