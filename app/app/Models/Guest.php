<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Guest
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Guest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest query()
 * @mixin \Eloquent
 */
class Guest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'phone_number', 'second_name', 'country'];
}
