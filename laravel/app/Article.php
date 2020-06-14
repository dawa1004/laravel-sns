<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    // userメソッドの戻り値が、BelongsToクラスであることを宣言
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
