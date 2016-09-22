<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/23/16
 * Time: 9:50 AM
 */

namespace App\Models\PropertyType;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyType - Eloquent Model for Property Type model object.
 *
 * @package App\Models\PropertyType
 */
class PropertyType extends Model
{
    /**
     * @var string
     */
    protected $table = 'property_type';

    /**
     * @var string
     */
    protected $primaryKey = 'property_type_id';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['property_type_name','description'];
}
