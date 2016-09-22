<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 6/26/16
 * Time: 2:07 PM
 */

namespace App\Http\Controllers\PropertySearch;

use App\Models\PropertySearch\PropertySearch;
use App\Repositories\PropertySearch\PropertySearchRepositoryInterface;
use App\Schemas\PropertySearch\PropertySearchSchema;
use Illuminate\Http\Request;
use RealPage\EnterpriseServices\Controllers\ApiControllerTrait;
use \InvalidArgumentException;

class PropertySearchController
{
    use ApiControllerTrait;

    /**
     * PropertySearchController constructor.
     *
     * @param PropertySearchRepositoryInterface $repository
     */
    public function __construct(PropertySearchRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->encoder = $this->getEncoderInstance([ PropertySearch::class => PropertySearchSchema::class ]);
    }

    public function search(Request $request)
    {
        $filterBy = $request->input('filterby');
        $filterVal = $request->input('filtervalue');

        $searchResults = [];

        if ($filterBy && $filterVal) {
            switch ($filterBy) {
                case 'name':
                    $searchResults = $this->repository->searchByName($filterVal);
                    break;
                case 'locationids':
                    $searchResults = $this->repository->searchByLocationIds(explode(",", $filterVal));
                    break;
                default:
                    throw new InvalidArgumentException("Unsupported search criteria.");
            }
        } else {
            $errorMessage = "Missing required parameters in the request: ";
            if ($filterBy == null) {
                throw new InvalidArgumentException($errorMessage . "filterby");
            } else {
                throw new InvalidArgumentException($errorMessage . 'filtervalue');
            }
        }
        return $this->getDataResponse($this->encoder, PropertySearchSchema::transformSearchResults($searchResults));
    }
}
