<?php
/**
 * Created by PhpStorm.
 * User: ayip
 * Date: 5/27/16
 * Time: 3:19 PM
 */

namespace App\Repositories\PropertyInstance;

use App\Models\PropertyInstance\PropertyInstance;

/**
 * Interface PropertyInstanceRepositoryInterface - Defines CRUD operations on Property Instance entity
 *
 * @package App\Repositories\PropertyInstance
 */
interface PropertyInstanceRepositoryInterface
{
    /**
     * Returns the Property instance entity with the given id
     *
     * @param string $id
     *
     * @return PropertyInstance
     */
    public function findById(string $id);

    /**
     * Creates a property instance.
     *
     * @param array $content
     *
     * @return PropertyInstance
     */
    public function create(array $content);

    /**
     * Updates the property instance with the given id.
     *
     * @param array  $content
     * @param string $id
     *
     * @return PropertyInstance
     */
    public function update(array $content, string $id);

    /**
     * Deletes the property instance with the given id.
     *
     * @param  string $id
     * @return bool
     */
    public function delete(string $id) : bool ;
}
