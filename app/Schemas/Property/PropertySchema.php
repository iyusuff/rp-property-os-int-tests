<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:12 PM
 */

namespace App\Schemas\Property;

use App\Schemas\PropertySchemaTrait;
use Neomerx\JsonApi\Schema\SchemaProvider;

/**
 * Class PropertySchema
 *
 * @package App\Schemas\Property
 */
class PropertySchema extends SchemaProvider
{
    use PropertySchemaTrait;

    /**
     * @var string resource type
     */
    protected $resourceType = 'property';

    /**
     * Get resource identity.
     *
     * @param object $resource resource
     *
     * @return string
     */
    public function getId($resource)
    {
        return $resource->property_id;
    }

    /**
     * Get resource attributes.
     *
     * @param object $resource resource
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return $this->transformResponseAttributes(
            $resource,
            self::$mapping,
            self::$internalAttributesMapping
        );
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
        return self::transformRequestAttributes(
            $attributes,
            self::$mapping,
            self::$internalAttributesMapping
        );
    }

    /**
     * Relationships to be returned as part of the json response.
     *
     * @param object $resource             resource
     * @param bool   $isPrimary
     * @param array  $includeRelationships
     *
     * @return array
     */
    public function getRelationships(
        $resource,
        $isPrimary,
        array $includeRelationships
    ) {
        return [];
    }
}
