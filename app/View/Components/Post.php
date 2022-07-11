<?php

namespace App\View\Components;

use App\Enums\PostCurrencySalaryEnum;
use App\Models\Company;
use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $languages;
    public object $company;
    public object $post;
    public string $currency_salary;

    public function __construct($post)
    {
//        dd($post);
        $this->post = $post;
        $this->currency_salary = PostCurrencySalaryEnum::getKey((int)$post->currency_salary);

        $this->company = $post->company;
        if(!empty($post->requirement)){$this->requirement = $post->requirement;}
        $this->languages = implode(', ' , $post->languages->pluck('name')->toArray());

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post');
    }
}
