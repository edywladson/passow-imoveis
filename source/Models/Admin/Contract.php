<?php


namespace Source\Models\Admin;


use Source\Core\Model;

class Contract extends Model
{
    public function __construct()
    {
        parent::__construct(
            "contracts",
            ["id"],
            [
                "immobile_code",
                "immobile_address",
                "proprietary_id",
                "tenant_id",
                "started",
                "closing",
                "administration_fee",
                "rent_value",
                "condo_value",
                "iptu_value"
            ]);
    }
}