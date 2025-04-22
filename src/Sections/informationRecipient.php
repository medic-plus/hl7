<?php

class InformationRecipientSection
{
    static function getInformationRecipientSection(Patient $patient)
    {
        $informationRecipient = $patient->attributes->informationRecipient;
        $informationRecipientComponent = [
            'informacionRecipient' => [
                'intendedRecipient' => [
                    'id' => [
                        '_attributes' => [
                            'root' => is_null($informationRecipient['professionalId']) ? null : '2.16.840.1.113883.3.215.12.18',
                            'extension' => $informationRecipient['professionalId']
                        ]
                    ],
                    'telecom' => [
                        [
                            '_attributes' => [
                                'value' => $informationRecipient['phone']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'value' => $informationRecipient['email']
                            ]
                        ]
                    ],
                    'addr' => [
                        'fullAddress' => [$informationRecipient['address']['fullAddress']],
                        'streetNameType' => [$informationRecipient['address']['streetNameType']],
                        'streetName' => [$informationRecipient['address']['streetName']],
                        'houseNumberNumeric' => [$informationRecipient['address']['houseNumberNumeric']],
                        'houseNumber' => [$informationRecipient['address']['houseNumber']],
                        'unitID' => [$informationRecipient['address']['unitId']],
                        'unitType' => [$informationRecipient['address']['unitType']],
                        'deliveryInstallationType' => [$informationRecipient['address']['deliveryInstallationType']],
                        'deliveryInstallationArea' => [$informationRecipient['address']['deliveryInstallationArea']],
                        'precint' => [$informationRecipient['address']['precint']],
                        'county' => [$informationRecipient['address']['county']],
                        'state' => [$informationRecipient['address']['state']],
                        'postalCode' => [$informationRecipient['address']['postalCode']],
                        'country' => [$informationRecipient['address']['country']],
                    ],
                    'informacionRecipient' => [
                        'name' => [
                            'given' => $informationRecipient['name']['given'],
                            'family' => [
                                [$informationRecipient['name']['first_surname']],
                                [$informationRecipient['name']['second_surname']]
                            ],
                        ],
                    ],
                    'receivedOrganization' => [
                        'id' => [
                            [
                                '_attributes' => [
                                    'root' => $informationRecipient['organization']['id']
                                ]
                            ],
                            [
                                '_attributes' => [
                                    'root' => is_null($informationRecipient['organization']['cluesId']) ? null : '2.16.840.1.113883.4.631',
                                    'extension' => $informationRecipient['organization']['cluesId'],
                                    'assigningAuthorityName' => !is_array($informationRecipient['organization']['cluesId']) ? null : 'CLUES'
                                ]
                            ]
                        ],
                        'name' => $informationRecipient['organization']['name'],
                    ],
                ],
            ],
        ];

        return $informationRecipientComponent;
    }
}
