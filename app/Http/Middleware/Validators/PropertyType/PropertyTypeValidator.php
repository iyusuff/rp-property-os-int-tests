<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/25/16
 * Time: 9:37 PM
 */

namespace App\Http\Middleware\Validators\PropertyType;

use Illuminate\Http\Request;
use RealPage\EnterpriseServices\Validators\ApiValidator;

/**
 * Class PropertyTypeValidator Validates 'Property Type' entity
 *
 * @package App\Http\Middleware\Validators\PropertyType
 */
class PropertyTypeValidator extends ApiValidator
{
    /**
     * Validation rules to be applied on the request
     * payload for POST/PUT/PATCH requests.
     *
     * @param Request $request Http Request
     *
     * @return array of rules
     */
    public function rules(Request $request) : array
    {
        $baseRules = [
            'data.type' => 'in:propertytype'
        ];
        $rules = [];
        switch ($request->getMethod()) {
            case 'POST':
                $rules = [
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyTypeName' => 'required|string'
                ];
                break;
            case 'PUT':
                $rules =  [
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyTypeName' => 'required|string',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyTypeId' => 'required|integer'
                ];
                break;
            case 'PATCH':
                $rules =  [
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyTypeId' => 'required|integer',
                    parent::ATTRIBUTE_ACCESSOR_PREFIX.'propertyTypeName' => 'sometimes|required|string'
                ];
                break;
            default:
                return [];
        }
        return array_merge($baseRules, $rules);
    }
}
