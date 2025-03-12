<?php

class CustodianSection extends Patient {
    static function getCustodianSection(Patient $patient) {
        $attributes = $patient->attributes;
        $custodian = [
            'custodian' => [
                'assignedCustodian' => [
                    'representedCustodianOrganization' => [
                        'id' => [
                            '_attributes' => [
                                'root' => null,
                                'extension' => $attributes->custodianOrganizationClues,
                                'assigningAuthorityName' => 'CLUES'
                            ]
                        ],
                        'name' => $attributes->custodianOrganizationName,
                        'telecom' => [
                            ['_attributes' => ['value' => $attributes->custodianOrganizationPhone]],
                            ['_attributes' => ['value' => $attributes->custodianOrganizationEmail]]
                        ],
                        'addr' => [
                            'fullAddress' => $attributes->custodianOrganizationAddress['fullAddress'],
                            'streetNameType' => $attributes->custodianOrganizationAddress['streetNameType'],
                            'streetName' => $attributes->custodianOrganizationAddress['streetName'],
                            'houseNumberNumeric' => $attributes->custodianOrganizationAddress['houseNumberNumeric'],
                            'houseNumber' => $attributes->custodianOrganizationAddress['houseNumber'],
                            'unitID' => $attributes->custodianOrganizationAddress['unitId'],
                            'unitType' => $attributes->custodianOrganizationAddress['unitType'],
                            'deliveryInstallationType' => $attributes->custodianOrganizationAddress['deliveryInstallationType'],
                            'deliveryInstallationArea' => $attributes->custodianOrganizationAddress['deliveryInstallationArea'],
                            'precint' => $attributes->custodianOrganizationAddress['precint'],
                            'county' => $attributes->custodianOrganizationAddress['county'],
                            'state' => $attributes->custodianOrganizationAddress['state'],
                            'postalCode' => $attributes->custodianOrganizationAddress['postalCode'],
                            'country' => $attributes->custodianOrganizationAddress['country'],
                        ],
                    ],
                ],
            ],
        ];

        return $patient->deleteNulls($custodian);
    }

}

?>