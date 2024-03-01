<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static first()
 */
#[ScopedBy([UserScope::class])]
class Setting extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trello(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TrelloSetting::class);
    }
}
