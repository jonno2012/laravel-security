<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Book extends Model
{
    use HasFactory;

    public function escapedDescription(): Attribute
    {
        return Attribute::get(fn () => new HtmlString(nl2br(e($this->description))));
    }
}
