<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 6/28/16
 * Time: 9:16 PM
 */

namespace App\Repositories\PropertySearch;

interface PropertySearchRepositoryInterface
{
    public function searchByName(string $name);

    public function searchByLocationIds(array $locationIds = []);
}
