<?php

class InformationRecipientSection extends Patient
{
    static function getInformationRecipientSection(Patient $patient)
    {
        $attributes = $patient->attributes;
        $informationRecipient = [
            'informacionRecipient' => [
                'intendedRecipient' => [
                    'id' => [
                        '_attributes' => [
                            'root' => null,
                            'extension' => $attributes->informationRecipient['professionalId']
                        ]
                    ],
                    'telecom' => [
                        [
                            '_attributes' => [
                                'value' => $attributes->informationRecipient['phone']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'value' => $attributes->informationRecipient['email']
                            ]
                        ]
                    ],
                    'addr' => [
                        'fullAddress' => [$attributes->informationRecipient['address']['fullAddress']],
                        'streetNameType' => [$attributes->informationRecipient['address']['streetNameType']],
                        'streetName' => [$attributes->informationRecipient['address']['streetName']],
                        'houseNumberNumeric' => [$attributes->informationRecipient['address']['houseNumberNumeric']],
                        'houseNumber' => [$attributes->informationRecipient['address']['houseNumber']],
                        'unitID' => [$attributes->informationRecipient['address']['unitId']],
                        'unitType' => [$attributes->informationRecipient['address']['unitType']],
                        'deliveryInstallationType' => [$attributes->informationRecipient['address']['deliveryInstallationType']],
                        'deliveryInstallationArea' => [$attributes->informationRecipient['address']['deliveryInstallationArea']],
                        'precint' => [$attributes->informationRecipient['address']['precint']],
                        'county' => [$attributes->informationRecipient['address']['county']],
                        'state' => [$attributes->informationRecipient['address']['state']],
                        'postalCode' => [$attributes->informationRecipient['address']['postalCode']],
                        'country' => [$attributes->informationRecipient['address']['country']],
                    ],
                    'informacionRecipient' => [
                        'name' => [
                            'given' => $attributes->informationRecipient['name']['given'],
                            'family' => [
                                [$attributes->informationRecipient['name']['first_surname']],
                                [$attributes->informationRecipient['name']['second_surname']]
                            ],
                        ],
                    ],
                    'receivedOrganization' => [
                        'id' => [
                            [
                                '_attributes' => [
                                    'root' => $attributes->informationRecipient['organization']['id']
                                ]
                            ],
                            [
                                '_attributes' => [
                                    'root' => null,
                                    'extension' => $attributes->informationRecipient['organization']['cluesId'],
                                    'assigningAuthorityName' => 'CLUES'
                                ]
                            ]
                        ],
                        'name' => $attributes->informationRecipient['organization']['name'],
                    ],
                ],
            ],
        ];

        return $patient->deleteNulls($informationRecipient);
    }
}
