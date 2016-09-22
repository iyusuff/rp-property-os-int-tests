<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:01 PM
 */

namespace App\Http\Middleware\Validators\PropertyInstance;

use Illuminate\Http\Request;
use RealPage\EnterpriseServices\Validators\ApiValidator;

/**
 * Class PropertyInstanceValidator Validates 'Property Instance' entity
 *
 * @package App\Http\Middleware\Validators\PropertyInstance
 */
class PropertyInstanceValidator extends ApiValidator
{
    /**
     * Validation rules to be applied on the request payload for POST/PUT/PATCH requests.
     *
     * @param Request $request Http Request
     *
     * @return array of rules
     */
    public function rules(Request $request) : array
    {
        $baseRules = [
            'data.type' => 'in:propertyinstance'
        ];
        $rules = [];
        switch ($request->getMethod()) {
            case 'POST':
                $rules = [
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'masterParentId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'accountId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyName' => 'sometimes|required|string',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyTypeId' => 'sometimes|required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'locationId' => 'sometimes|required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'modifiedId' => 'required|string'
                ];
                break;
            case 'PUT':
                $rules =  [
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'masterParentId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'accountId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyName' => 'required|string',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyTypeId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'locationId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'modifiedId' => 'required|string'
                ];
                break;
            case 'PATCH':
                $rules =  [
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'masterParentId' => 'sometimes|required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'accountId' => 'sometimes|required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyName' => 'sometimes|required|string',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyTypeId' => 'sometimes|required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'locationId' => 'sometimes|required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'modifiedId' => 'required|string'
                ];
                break;
            default:
                return [];
        }
        return array_merge($baseRules, $rules);
    }
}
