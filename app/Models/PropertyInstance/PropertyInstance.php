<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:05 PM
 */

namespace App\Models\PropertyInstance;

use App\Models\Property\Property;
use App\Models\PropertyModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyInstance - Eloquent model for Property Instance entity
 *
 * @package App\Models\PropertyInstance
 */
class PropertyInstance extends Model
{
    use PropertyModelTrait;
    /**
     * @var string
     */
    protected $table = 'property_instance';

    /**
     * @var string
     */
    protected $primaryKey = 'property_id';

    /**
     * @var array
     */
    protected $fillable = [
        'master_parent_id',
        'account_id',
        'property_name',
        'location_id',
        'property_type_id',
        'space_count',
        'modified_id',
        'lot_number',
        'block_number',
        'census_tract_block_group',
        'attributes'
    ];

    /*
     * Property instance has
     * 1) one-to-many relationship with Account by account_id
     * 2) one-to-one or one-to-many relationship with location by location_id
     * 3) many-to-one relationship with property_type by property_type_id
     * 4) many-to-one relationship with property by master_property_id
     */

    /**
     * Returns the related master property data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'master_parent_id');
    }
}
