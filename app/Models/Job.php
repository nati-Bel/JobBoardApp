<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['entry', 'intermediate', 'senior'];

    public static array $category = ['IT', 'Finance', 'Education'];

    public function scopeFilter(Builder | QueryBuilder $query, array $filters) 
    {
        
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        })->when($filters['min_salary'], function ($query, $minSalary) {
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'], function ($query, $maxSalary) {
            $query->where('salary', '<=', $maxSalary);
        })->when($filters['experience'], function($query, $experience) {
            $query->where('experience', $experience);
        })->when($filters['category'], function($query, $category) {
            $query->where('category', $category);
        });

    }
}
