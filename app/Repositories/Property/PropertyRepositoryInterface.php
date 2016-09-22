<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:19 PM
 */

namespace App\Repositories\Property;

use App\Models\Property\Property;

/**
 * Interface PropertyRepositoryInterface - Defines CRUD operations on Property entity.
 *
 * @package App\Repositories\Property
 */
interface PropertyRepositoryInterface
{
    /**
     * Returns the Property entity with the given id
     *
     * @param string $id
     * @param bool $withRelations
     *
     * @return Property
     */
    public function findById(string $id, bool $withRelations);

    /**
     * Creates a master property
     *
     * @param array $content
     *
     * @return Property
     */
    public function create(array $content);

    /**
     * Updates the master property with the given id
     *
     * @param array  $content
     * @param string $id
     *
     * @return Property
     */
    public function update(array $content, string $id);

    /**
     * Soft deletes master property
     *
     * @param string $id
     *
     * @return bool
     */
    public function delete(string $id) : bool;
}
