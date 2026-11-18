<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
    ];

    /**
     * Get a setting by key with an optional default.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();
        if (!$setting || $setting->value === null) {
            return $default;
        }

        if ($setting->type === 'boolean') {
            return filter_var($setting->value, FILTER_VALIDATE_BOOLEAN);
        }

        if ($setting->type === 'json') {
            return json_decode($setting->value, true) ?: $default;
        }

        return $setting->value;
    }

    /**
     * Set a setting key and value.
     */
    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'text'): static
    {
        $valToStore = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : (string)$value;

        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $valToStore,
                'group' => $group,
                'type' => $type,
            ]
        );
    }
}
