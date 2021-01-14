<?php


namespace Source\Models\Admin;


use Source\Core\Model;

class Contract extends Model
{
    public function __construct()
    {
        parent::__construct(
            "admin_contracts",
            ["id"],
            [
                "proprietary_id",
                "tenant_id",
                "address_id",
                "immobile_code",
                "started",
                "closing",
                "administration_fee",
                "rent_value",
                "condo_value",
                "iptu_value"
            ]);
    }

    public function findComplete()
    {

    }
}