<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:10 PM
 */

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyAttribute - Eloquent model for Property_Attribute entity
 *
 * @package App\Models\Property
 */
class PropertyAttribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'property_attribute';

    protected $fillable = ['root', 'field'];

    /**
     * @var bool
     */
    public $timestamps = false;
}
