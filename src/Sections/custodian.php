<?php

class CustodianSection {
    static function getCustodianSection(Patient $patient) {
        $attributes = $patient->attributes;
        $custodian = [
            'custodian' => [
                'assignedCustodian' => [
                    'representedCustodianOrganization' => [
                        'id' => [
                            '_attributes' => [
                                'root' => is_null($attributes->custodian['id']) ? null : '2.16.840.1.113883.4.631',
                                'extension' => $attributes->custodian['id'],
                                'assigningAuthorityName' => is_null($attributes->custodian['id']) ? null : 'CLUES'
                            ]
                        ],
                        'name' => $attributes->custodian['name'],
                        'telecom' => [
                            ['_attributes' => ['value' => $attributes->custodian['phone']]],
                            ['_attributes' => ['value' => $attributes->custodian['email']]]
                        ],
                        'addr' => [
                            'fullAddress' => $attributes->custodian['address']['fullAddress'],
                            'streetNameType' => $attributes->custodian['address']['streetNameType'],
                            'streetName' => $attributes->custodian['address']['streetName'],
                            'houseNumberNumeric' => $attributes->custodian['address']['houseNumberNumeric'],
                            'houseNumber' => $attributes->custodian['address']['houseNumber'],
                            'unitID' => $attributes->custodian['address']['unitId'],
                            'unitType' => $attributes->custodian['address']['unitType'],
                            'deliveryInstallationType' => $attributes->custodian['address']['deliveryInstallationType'],
                            'deliveryInstallationArea' => $attributes->custodian['address']['deliveryInstallationArea'],
                            'precint' => $attributes->custodian['address']['precint'],
                            'county' => $attributes->custodian['address']['county'],
                            'state' => $attributes->custodian['address']['state'],
                            'postalCode' => $attributes->custodian['address']['postalCode'],
                            'country' => $attributes->custodian['address']['country'],
                        ],
                    ],
                ],
            ],
        ];

        return $custodian;
    }

}

?>