<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKey extends Model
{
    protected $fillable = ['name', 'key', 'is_active'];

    public static function generate(string $name): self
    {
        return self::create([
            'name'      => $name,
            'key'       => 'lib_' . Str::random(40),
            'is_active' => true,
        ]);
    }
}