<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCard
 */
class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'explication'
    ];

    // protected $quarded = [
    //     'id'
    // ];
}
