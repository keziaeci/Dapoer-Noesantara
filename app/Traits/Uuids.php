<?php 

namespace App\Traits;

use Illuminate\Foundation\Bootstrap\BootProviders;
use Illuminate\Support\Str;
trait Uuids
{
    /**
     * Boot function from laravel
     */
    protected static function boot() {
        parent::boot();
        static::creating(function ($model){
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    function getIncrementing() {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}


?>