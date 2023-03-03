<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];
    protected $hidden = ['key']; // will never be sent to the browser.

    public function escapedDescription(): Attribute
    {
        return Attribute::get(fn () => new HtmlString(nl2br(e($this->description))));
    }

    public function escapedMarkdownDescription(): Attribute
    {
        return Attribute::get(fn () => Str::of($this->description)->markdown([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
            'max_nesting_level' => 5,
        ])->toHtmlString()
        );
    }
}
