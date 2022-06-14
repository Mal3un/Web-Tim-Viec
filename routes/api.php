<?php

    use App\Http\Controllers\CompanyController;
    use App\Http\Controllers\LanguageController;
    use App\Http\Controllers\PostController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;


    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/generateSlug', [PostController::class, 'generateSlug'])->name('posts.generateSlug');
    Route::get('/posts/checkSlug', [PostController::class, 'checkSlug'])->name('posts.checkSlug');
    Route::get('/companies/check/{companyName?}', [CompanyController::class, 'checkName'])->name('companies.check');

    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('/languages', [LanguageController::class, 'index'])->name('languages');
