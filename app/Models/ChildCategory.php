<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChildCategory extends Model
{
    use HasFactory;

    /**
     * Get the sub category that owns the child-category.
     */
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, "sub_category_id");
    }
}
