<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:20 PM
 */

namespace App\Repositories\PropertyInstance;

use App\Models\PropertyInstance\PropertyInstance;
use RealPage\EnterpriseServices\Repositories\ApiRepositoryTrait;

/**
 * Class PropertyInstanceRepository
 *
 * @package App\Repositories\PropertyInstance
 */
class PropertyInstanceRepository implements PropertyInstanceRepositoryInterface
{
    use ApiRepositoryTrait;

    /**
     * PropertyRepository constructor.
     * @param PropertyInstance $propertyInstance
     */
    public function __construct(PropertyInstance $propertyInstance)
    {
        $this->model = $propertyInstance;
    }

    /**
     * @param string $id
     *
     * @return PropertyInstance
     */
    public function findById(string $id) : PropertyInstance
    {
        return PropertyInstance::with('propertyType')->findOrFail($id);
    }
}
