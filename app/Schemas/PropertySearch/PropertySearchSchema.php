<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 6/29/16
 * Time: 10:52 AM
 */

namespace App\Schemas\PropertySearch;

use App\Models\PropertySearch\PropertySearch;
use Neomerx\JsonApi\Schema\SchemaProvider;

class PropertySearchSchema extends SchemaProvider
{
    protected $resourceType = 'search';

    /**
     * Get resource identity.
     *
     * @param object $resource
     *
     * @return string
     */
    public function getId($resource)
    {
        return $resource->getPropertyId();
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
        //$this->resourceType = (($resource->getEntity() == 'MasterProperty') ? 'property' : 'propertyinstance');
        return [
            'propertyId'   => $resource->getPropertyId(),
            'propertyName' => $resource->getPropertyName(),
            'locationId'   => $resource->getLocationId(),
            'entity'       => $resource->getEntity(),
            'link'         =>
                (($resource->getEntity() == 'MasterProperty') ? '/property' :
                    '/propertyinstance') . '/' . $resource->getPropertyId()
        ];
    }

    public static function transformSearchResults($searchResults)
    {
        $propertySearchResults = [];
        $propertySearch = null;
        foreach ($searchResults as $searchResult) {
            $propertySearch = new PropertySearch();
            $propertySearch->setPropertyId($searchResult->propertyid);
            $propertySearch->setPropertyName($searchResult->propertyname);
            $propertySearch->setLocationId($searchResult->locationid);
            $propertySearch->setEntity($searchResult->entity);
            $propertySearchResults[] = $propertySearch;
        }
        return $propertySearchResults;
    }

    public function getSelfSubLink($resource)
    {
        return $this->createLink(
            (($resource->getEntity() == 'MasterProperty') ? '/property' :
                '/propertyinstance') . '/' . $resource->getPropertyId()
        );
    }
}
