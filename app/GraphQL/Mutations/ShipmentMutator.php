<?php

namespace App\GraphQL\Mutations;

class ShipmentMutator
{
    public function create($root, array $args)
    {

        $shipment= new \App\Models\Shipment($args);
        $shipment->save();
        return [
            'shipment'=> $shipment
        ];
    }
}
