<?php

    use App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\View;


    class TestController extends Controller
    {
        private object $model;
        private string $table;

        public function __construct()
        {
            $this->model = User::query();
            $this->table = (new User())->getTable();

            View::share('title', ucwords($this->table));
            View::share('table', $this->table);
        }

    }
