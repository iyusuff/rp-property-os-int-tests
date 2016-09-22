<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:20 PM
 */

namespace App\Repositories\Property;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RealPage\EnterpriseServices\Repositories\ApiRepositoryTrait;

/**
 * Class PropertyRepository
 *
 * @package App\Repositories\Property
 */
class PropertyRepository implements PropertyRepositoryInterface
{
    use ApiRepositoryTrait;

    /**
     * PropertyRepository constructor.
     * @param Property $property
     */
    public function __construct(Property $property)
    {
        $this->model = $property;
    }

    /**
     * @param string $id
     * @param bool $withRelations
     *
     * @return Property
     */
    public function findById(string $id, bool $withRelations)
    {
        if ($withRelations === true) {
            return Property::with('propertyType')->findOrFail($id);
        } else {
            return Property::findOrFail($id);
        }
    }
}
