<?php

namespace App\Models;

use App\Http\Requests\Setting\CreatePlatformSettingsRequest;
use App\Models\Scopes\SettingScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $api_key
 * @property string $api_token
 * @property string $board_token
 */
#[ScopedBy([SettingScope::class])]
class TrelloSetting extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'trello_settings';

    /**
     * @var string[]
     */
    protected $fillable = ['api_key', 'api_token', 'setting_id', 'board_token'];

    public function setting(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }

    public static function createOrUpdate(CreatePlatformSettingsRequest $data, $settingsId): mixed
    {
        return self::create([
            'user_id' => $data->user()->id,
            'api_token' => $data->apiToken,
            'api_key' => $data->apiKey,
            'board_token' => $data->boardToken,
            'setting_id' => $settingsId,
        ]);
    }
}
