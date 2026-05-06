<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use OwenIt\Auditing\Contracts\Auditable; // Uncomment after installing owen-it/laravel-auditing

class Setting extends Model // implements Auditable
{
    // use \OwenIt\Auditing\Auditable; // Uncomment after installing owen-it/laravel-auditing

    // The table associated with the model.
    protected $table = 'settings';

    // The attributes that are mass assignable.
    protected $fillable = ['key', 'value'];
    
    // protected $auditInclude = ['key', 'value'];

    // Disables the auto-incrementing ID since we use 'key' as the primary key
    public $incrementing = false;
    protected $primaryKey = 'key';
    protected $keyType = 'string';

    /**
     * Get a setting by its key.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public static function getSetting($key, $default = null)
    {
        $setting = static::where('key', $key)->first();

        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value by its key.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public static function setSetting($key, $value)
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    public function getValueAttribute($value)
    {
        // Cast to array for specific keys (Example keys provided by user)
        if (in_array($this->key, [
            'grn_entry_role_id',
            'grn_approver_role_id',
        ])) {
            return json_decode($value, true) ?? [];
        }

        // Cast to boolean
        if (in_array($this->key, [
            'grn_affects_inventory',
            'auto_create_purchase_invoice',
        ])) {
            return filter_var($value, FILTER_VALIDATE_BOOLEAN);
        }

        return $value;
    }

    public function setValueAttribute($value)
    {
        if (in_array($this->key, [
            'grn_entry_role_id',
            'grn_approver_role_id',
        ])) {
            $this->attributes['value'] = json_encode($value);
            return;
        }

        if (is_bool($value)) {
            $this->attributes['value'] = $value ? 'true' : 'false';
            return;
        }

        $this->attributes['value'] = $value;
    }
}
