<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 2:53 PM
 */

namespace App\Http\Controllers\Property;

use App\Models\Property\Property;
use App\Models\PropertyType\PropertyType;
use App\Repositories\Property\PropertyRepositoryInterface;
use App\Schemas\Property\PropertySchema;
use App\Schemas\PropertyType\PropertyTypeSchema;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use RealPage\EnterpriseServices\Controllers\ApiControllerTrait;
use \InvalidArgumentException;

/**
 * Class PropertyController Handles the requests related to Master Property entity
 *
 * @package App\Http\Controllers\Property
 */
class PropertyController extends BaseController
{
    use ApiControllerTrait;

    /**
     * PropertyController constructor.
     *
     * @param PropertyRepositoryInterface $repository
     */
    public function __construct(PropertyRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->schema = PropertySchema::class;
        $this->encoder = $this->getEncoderInstance(
            [
                Property::class => PropertySchema::class,
                PropertyType::class => PropertyTypeSchema::class
            ]
        );
    }

    /**
     * Returns an entity with the given id
     *
     * @param string $id Unique identifier of an entity
     *
     * @return mixed the entity with the given id if found
     * in the database, else returns an error response
     */
    public function find(string $id)
    {
        $entity = $this->repository->findById($id, true);
        return $this->getDataResponse($this->encoder, $entity);
    }
}
