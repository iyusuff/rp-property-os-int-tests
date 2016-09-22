<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 6/9/16
 * Time: 10:31 PM
 */

namespace App\Models;

use App\Models\PropertyType\PropertyType;

trait PropertyModelTrait
{
    /**
     * attributes mutator
     *
     * @param $value
     */
    public function setAttributesAttribute($value)
    {
        if (!empty($value)) {
            if (!is_string($value)) {
                $this->attributes['attributes'] = json_encode($value);
            } else {
                $this->attributes['attributes'] = $value;
            }
        }
    }

    /**
     * attributes accessor
     *
     * @param $value
     * @return array
     */
    public function getAttributesAttribute($value)
    {
        $attributes = [];
        if (!empty($value)) {
            $attributes = json_decode($value, true);
        }
        return $attributes;
    }

    /**
     * Returns the related Property Type data
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
}
