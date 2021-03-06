<?php

namespace App\Models;

use App\Enums\object_language_type_enum;
use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostStatusEnum;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    use HasFactory;
    use Sluggable;

    protected $fillable = [
        "company_id",
        "job_title",
        "district",
        "city",
        "can_partime",
        "remotable",
        "min_salary",
        "max_salary",
        "currency_salary",
        "requirement",
        "start_date",
        "end_date",
        "number_applicants",
        "status",
        "is_pinned",
        "slug",
        "created_at",
        "updated_at",
        "deleted_at"
    ];
    protected $appends = ['currency_salary_code'];
    protected static function booted()
    {
        static::creating(static function ($object) {
            // $object->user_id = auth()->id();
            $object->user_id = 1;
        });
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'job title'
            ]
        ];
    }
    public function getCurrencySalaryCodeAttribute(): string
    {
        return PostCurrencySalaryEnum::getKey($this->currency_salary);
    }
    public function getStatusNameAttribute(): string
    {
        return PostStatusEnum::getKey($this->status);
    }
    public function languages(){
        return $this->morphToMany(
            Language::class,
            'object',
            ObjectLanguage::class,
            'object_id',
            'language_id',
        );
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
