<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:04 PM
 */

namespace App\Models\Property;

use App\Models\PropertyInstance\PropertyInstance;
use App\Models\PropertyModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Property - Eloquent model for Property model object.
 *
 * @package App\Models\Property
 */
class Property extends Model
{
    use SoftDeletes;
    use PropertyModelTrait;

    /**
     * @var string
     */
    protected $table = 'property';

    /**
     * @var string
     */
    protected $primaryKey = 'property_id';

    /**
     * @var array
     */
    protected $fillable = [
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
     * Master property has
     * 1) one-to-one or one-to-many relationship with location by location_id
     * 2) many-to-one relationship with property_type by property_type_id
     * 3) one-to-one relationship with property_detail by property_id
     * 4) one-to-many relationship with property_instance by master_property_id
     */

    /**
     * Returns the related Property_Detail data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function propertyDetail()
    {
        return $this->hasOne(Property::class, 'property_id');
    }


    /**
     * Returns the related property instances
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties()
    {
        return $this->hasMany(
            PropertyInstance::class,
            'master_parent_id',
            'property_id'
        );
    }
}
