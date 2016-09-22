<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/24/16
 * Time: 2:54 PM
 */

namespace App\Schemas\PropertyType;

use Neomerx\JsonApi\Schema\SchemaProvider;
use RealPage\EnterpriseServices\Transformers\ApiTransformerTrait;

class PropertyTypeSchema extends SchemaProvider
{
    use ApiTransformerTrait;

    protected $resourceType = 'propertytype';

    /**
     * @var array mapping between request payload attributes to DB model fields.
     */
    public static $mapping = [
        'propertyTypeId'    => 'property_type_id',
        'propertyTypeName'  => 'property_type_name',
        'description'       => 'description'
    ];

    /**
     * Get resource identity.
     *
     * @param object $resource
     *
     * @return string
     */
    public function getId($resource)
    {
        return $resource->property_type_id;
    }

    /**
     * Get resource attributes.
     *
     * @param object $resource
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return $this->transformResponseAttributes($resource, self::$mapping);
    }

    /**
     * Transforms property type POST/PUT/PATCH request payload JSON attributes
     * to DB model fields.
     *
     * @param array $attributes
     *
     * @return array of transformed attributes
     */
    public static function getRequestAttributes($attributes) : array
    {
        return self::transformRequestAttributes($attributes, self::$mapping);
    }
}
