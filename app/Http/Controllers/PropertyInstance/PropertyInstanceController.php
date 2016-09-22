<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 2:54 PM
 */

namespace App\Http\Controllers\PropertyInstance;

use App\Models\PropertyInstance\PropertyInstance;
use App\Models\PropertyType\PropertyType;
use App\Repositories\Property\PropertyRepositoryInterface;
use App\Repositories\PropertyInstance\PropertyInstanceRepositoryInterface;
use App\Schemas\PropertyInstance\PropertyInstanceSchema;
use App\Schemas\PropertyType\PropertyTypeSchema;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use RealPage\EnterpriseServices\Controllers\ApiControllerTrait;
use \InvalidArgumentException;

/**
 * Class PropertyInstanceController Handles the requests
 * related to Property Instance entity.
 *
 * @package App\Http\Controllers\PropertyInstance
 */
class PropertyInstanceController extends BaseController
{
    use ApiControllerTrait;

    /**
     * @var PropertyRepositoryInterface
     */
    private $propertyRepository;

    /**
     * PropertyInstanceController constructor.
     *
     * @param PropertyInstanceRepositoryInterface $repository
     * @param PropertyRepositoryInterface $propertyRepository
     */
    public function __construct(
        PropertyInstanceRepositoryInterface $repository,
        PropertyRepositoryInterface $propertyRepository
    ) {
        $this->repository = $repository;
        $this->schema = PropertyInstanceSchema::class;
        $this->propertyRepository = $propertyRepository;
        $this->encoder = $this->getEncoderInstance(
            [
                PropertyInstance::class => PropertyInstanceSchema::class,
                PropertyType::class => PropertyTypeSchema::class
            ]
        );
    }

    /**
     * Creates a new instance of property from the given master property id.
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        $propertyInstance = null;
        // Transform the request payload
        $content = call_user_func(array($this->schema, 'getRequestAttributes'), $request->json('data')['attributes']);
        // Fetch the master property for the given master parent id
        $masterProperty = $this->propertyRepository->findById($content['master_parent_id'], false);
        if ($masterProperty != null) {
            // Any additional data provided in the request, will overwrite the fields from the master property.
            $mergedArray = array_replace_recursive(json_decode($masterProperty, true), $content);
            $mergedArray = array_diff_key(
                $mergedArray,
                [
                    'created_at' => $mergedArray['created_at'],
                    'updated_at' => $mergedArray['updated_at'],
                    'deleted_at' => $mergedArray['deleted_at']
                ]
            );
            $propertyInstance = $this->repository->create($mergedArray);
        }
        return $this->getDataResponse($this->encoder, $propertyInstance, 201);
    }
}
