<?php


namespace Source\Models\Admin;


use Source\Core\Model;

/**
 * Class Address
 * @package Source\Models\Admin
 */
class Address extends Model
{
    /**
     * Address constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'admin_address',
            ['id'],
            ['street', 'number', 'complement', 'neighborhood', 'city', 'uf', 'zip']
        );
    }
}