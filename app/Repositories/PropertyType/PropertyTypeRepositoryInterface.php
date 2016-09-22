<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/23/16
 * Time: 9:48 AM
 */

namespace App\Repositories\PropertyType;

use App\Models\PropertyType\PropertyType;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface PropertyTypeRepositoryInterface - Defines CRUD operations on Property Type entity.
 *
 * @package App\Repositories\PropertyType
 */
interface PropertyTypeRepositoryInterface
{
    /**
     * Returns the Collection of all property types
     *
     * @return Collection
     */
    public function findAll() : Collection;

    /**
     * Returns the Property Type entity based on the given id
     *
     * @param string $id
     *
     * @return PropertyType
     */
    public function findById(string $id);

    /**
     * Creates a property type
     *
     * @param array $content
     *
     * @return PropertyType
     */
    public function create(array $content);

    /**
     * Updates property type record for the given id.
     *
     * @param array  $content
     * @param string $id
     *
     * @return PropertyType
     */
    public function update(array $content, string $id);

    /**
     * Deletes property type record.
     *
     * @param string $id
     *
     * @return bool
     */
    public function delete(string $id) : bool;
}
