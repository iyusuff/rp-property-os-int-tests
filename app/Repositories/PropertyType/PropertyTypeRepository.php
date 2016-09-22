<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/23/16
 * Time: 9:53 AM
 */

namespace App\Repositories\PropertyType;

use App\Models\PropertyType\PropertyType;
use RealPage\EnterpriseServices\Repositories\ApiRepositoryTrait;

/**
 * Class PropertyTypeRepository
 *
 * @package App\Repositories\PropertyType
 */
class PropertyTypeRepository implements PropertyTypeRepositoryInterface
{
    use ApiRepositoryTrait;

    /**
     * PropertyTypeRepository constructor.
     * @param PropertyType $propertyType
     */
    public function __construct(PropertyType $propertyType)
    {
        $this->model = $propertyType;
    }
}
