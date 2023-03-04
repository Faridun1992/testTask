<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    const NEW = 1;
    const USED = 2;

    public function getType(): string
    {
        return match ($this->type){
            self::NEW => 'Новый',
            self::USED => 'БУ'
        };
    }
}
