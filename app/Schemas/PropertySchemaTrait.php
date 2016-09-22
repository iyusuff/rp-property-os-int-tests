<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 6/8/16
 * Time: 4:32 PM
 */

namespace App\Schemas;

use RealPage\EnterpriseServices\Transformers\ApiTransformerTrait;

trait PropertySchemaTrait
{
    use ApiTransformerTrait;

    /**
     * @var array $mapping between request payload attributes to DB model fields.
     */
    public static $mapping = [
        'propertyId'            => 'property_id',
        'propertyName'          => 'property_name',
        'propertyTypeId'        => 'property_type_id',
        'locationId'            => 'location_id',
        'spaceCount'            => 'space_count',
        'modifiedId'            => 'modified_id',
        'lotNumber'             => 'lot_number',
        'blockNumber'           => 'block_number',
        'censusTractBlockGroup' => 'census_tract_block_group'
    ];

    /**
     * @var array $internalAttributesMapping mapping between request payload
     * attributes to DB model json attribute fields.
     */
    public static $internalAttributesMapping = [
        'attributes'  => [
            'taxIdsAssessorParcelNumber' => 'property_type_location.tax_ids_apns',
            'propertyMarketingName'      => 'property_type_location.property_marketing_name',
            'marketArea'                 => 'property_type_location.market_area',
            'mpfMarketArea'              => 'property_type_location.mpf_market_area',
            'propertyUrl'                => 'property_type_location.google_maps_hyperlink',
            'googleMapsHyperlink'        => 'property_type_location.property_url_1',
            'buildingClass'              => 'building_characteristics_1.building_class',
            'yearBuilt'                  => 'building_characteristics_1.year_built',
            'mostRecentRenovationYear'   => 'building_characteristics_1.most_recent_renovation_year',
            'noOfBuildings'              => 'building_characteristics_1.no_of_buildings',
            'noOfStories'                => 'building_characteristics_1.no_of_stories',
            'totalNoOfBeds'              => 'building_characteristics_1.total_no_of_beds',
            'rentableArea'               => 'building_size.rentable_area_in_sf',
            'grossLandAreaInSf'          => 'land_related.gross_land_area_in_sf',
            'grossLandAreasInAcres'      => 'land_related.gross_land_area_in_acres'
        ]
    ];

    public static function getMapping()
    {
        return self::$mapping;
    }
}
