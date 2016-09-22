<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:05 PM
 */

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyDetail - Eloquent model for Property_detail entity
 *
 * @package App\Models\Property
 */
class PropertyDetail extends Model
{
    /**
     * @var string
     */
    protected $table = 'property_detail';

    /**
     * @var string
     */
    protected $primaryKey = 'property_id';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Returns the related master property data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
