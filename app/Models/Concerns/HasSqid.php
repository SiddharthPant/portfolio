<?php

namespace App\Models\Concerns;

use App\Support\Facades\Sqid;
use Illuminate\Database\Eloquent\Model;

trait HasSqid
{
    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'sqid';
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->resolveRouteBindingQuery($this, Sqid::decode($value)[0], 'id')->first();
    }

    public function getSqidAttribute(): string
    {
        return static::SQID_PREFIX.$this->raw_sqid;
    }

    public function getRawSqidAttribute(): string
    {
        return Sqid::encode([$this->id]);
    }
}
