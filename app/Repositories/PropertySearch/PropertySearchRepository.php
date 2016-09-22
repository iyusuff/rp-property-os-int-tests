<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 6/28/16
 * Time: 9:16 PM
 */

namespace App\Repositories\PropertySearch;

use DB;

class PropertySearchRepository implements PropertySearchRepositoryInterface
{
    const SEARCH_COLS = "property_id as propertyId, property_name as propertyName, location_id as locationId";

    public function searchByName(string $name)
    {
        $masterProperties = $this->buildSearchByPropertyNameQuery('property', 'MasterProperty', $name);
        $propertyInstances = $this->buildSearchByPropertyNameQuery('property_instance', 'PropertyInstance', $name);

        return $masterProperties->unionall($propertyInstances)->get();
    }

    public function searchByLocationIds(array $locationIds = [])
    {
        $masterProperties = $this->buildSearchByLocationIdsQuery('property', 'MasterProperty', $locationIds);
        $propertyInstances = $this->buildSearchByLocationIdsQuery(
            'property_instance',
            'PropertyInstance',
            $locationIds
        );

        return $masterProperties->unionall($propertyInstances)->get();
    }

    private function buildSearchByLocationIdsQuery($table, $entity, array $locationIds = [])
    {
        return $this->getJoinsQuery($table, $entity)->whereIn($table . '.location_id', $locationIds);
    }

    private function buildSearchByPropertyNameQuery($table, $entity, $name)
    {
        return $this->getJoinsQuery($table, $entity)->where($table . '.property_name', 'ilike', '%'.$name.'%');
    }

    private function getJoinsQuery($table, $entity)
    {
        return DB::table($table)
            ->select(DB::raw(self::SEARCH_COLS . ", '$entity' as entity"));
    }
}
