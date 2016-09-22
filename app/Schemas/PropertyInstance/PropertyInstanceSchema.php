<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:12 PM
 */

namespace App\Schemas\PropertyInstance;

use App\Schemas\PropertySchemaTrait;
use Neomerx\JsonApi\Schema\SchemaProvider;

class PropertyInstanceSchema extends SchemaProvider
{
    use PropertySchemaTrait {
        getMapping as traitGetMapping;
    }

    protected $resourceType = 'propertyinstance';

    /**
     * @var array $additionalMapping between request payload attributes to DB model fields.
     */
    private static $additionalMapping = [
        'masterParentId'        => 'master_parent_id',
        'accountId'             => 'account_id',
    ];

    public static function getMapping()
    {
        return array_merge(self::traitGetMapping(), self::$additionalMapping);
    }

    /**
     * Get resource identity.
     *
     * @param object $resource
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
     * @param object $resource
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return $this->transformResponseAttributes(
            $resource,
            self::getMapping(),
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
            self::getMapping(),
            self::$internalAttributesMapping
        );
    }
}
