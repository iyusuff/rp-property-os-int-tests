<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/23/16
 * Time: 9:28 AM
 */

namespace App\Http\Controllers\PropertyType;

use App\Repositories\PropertyType\PropertyTypeRepositoryInterface;
use App\Schemas\PropertyType\PropertyTypeSchema;
use App\Models\PropertyType\PropertyType;
use Laravel\Lumen\Routing\Controller as BaseController;
use RealPage\EnterpriseServices\Controllers\ApiControllerTrait;

/**
 * Class PropertyTypeController Handles the requests related to
 * Property Type entity.
 *
 * @package App\Http\Controllers\PropertyType
 */
class PropertyTypeController extends BaseController
{
    use ApiControllerTrait;
    /**
     * PropertyTypeController constructor.
     *
     * @param PropertyTypeRepositoryInterface $repository
     */
    public function __construct(
        PropertyTypeRepositoryInterface $repository
    ) {
        $this->repository = $repository;
        $this->schema = PropertyTypeSchema::class;
        $this->encoder = $this->getEncoderInstance(
            [
                PropertyType::class => PropertyTypeSchema::class
            ]
        );
    }
}
