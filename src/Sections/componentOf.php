<?php

class ComponentOfSection
{
    static function getComponentOfSection(Patient $patient)
    {
        $componentOf = $patient->attributes->componentOf;
        $componentOf = [
            'componentOf' => [
                'encompasingEncounter' => [
                    'id' => [
                        '_attributes' => [
                            'root' => $componentOf['id'],
                            'extension' => $componentOf['id']
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => is_null($componentOf['encounterType']) ? null : '2.16.840.1.113883.5.4',
                            'codeSystemName' => is_null($componentOf['encounterType']) ?  null : 'actCode',
                            'code' => $componentOf['encounterType']['value'] ?? null,
                            'displayName' => $componentOf['encounterType']['name'] ?? null
                        ]
                    ],
                    'effectiveTime' => [
                        'low' => [
                            '_attributes' => ['value' => $componentOf['time']['low']]
                        ],
                        'high' => [
                            '_attributes' => ['value' => $componentOf['time']['high']]
                        ],
                    ],
                    'responsibleParty' => [
                        'assignedEntity' => [
                            'id' => [
                                '_attributes' => [
                                    'root' => is_null($componentOf['professionalId']) ? null : '2.16.840.1.113883.3.215.12.18',
                                    'extension' => $componentOf['professionalId']
                                ]
                            ],
                            'assignedPerson' => [
                                'name' => [
                                    'given' => $componentOf['personName']['given'],
                                    'family' => [
                                        [$componentOf['personName']['first_surname']],
                                        [$componentOf['personName']['second_surname']]
                                    ]
                                ],
                            ],
                            'representedOrganization' => [
                                'id' => ['_attributes' => ['root' => $componentOf['organization']['id']]],
                                'name' => $componentOf['organization']['name'],
                            ],
                        ],
                    ],
                    'dischargeDispositionCode' => [
                        '_attributes' => [
                            'codeSystem' => is_null($componentOf['dischargeDispositionCode']) ?  null : '2.16.840.1.113883.12.112',
                            'codeSystemName' => is_null($componentOf['dischargeDispositionCode']) ? null : 'HL7D Discharge Disposition',
                            'code' => $componentOf['dischargeDispositionCode']['value'] ?? null,
                            'displayName' => $componentOf['dischargeDispositionCode']['name'] ?? null
                        ]
                    ],
                    'location' => [
                        'healthCareFacility' => [
                            'id' => [
                                [
                                    '_attributes' => [
                                        'root' => is_null($componentOf['location']['clues']) ? null : '2.16.840.1.113883.4.631',
                                        'extension' => $componentOf['location']['clues'],
                                        'assigningAuthorityName' => is_null($componentOf['location']['clues']) ? null : 'CLUES'
                                    ]
                                ],
                                [
                                    '_attributes' => [
                                        'root' => is_null($componentOf['location']['sanitaryLicense']) ? null : '2.16.840.1.113883.3.215.1.1',
                                        'extension' => $componentOf['location']['sanitaryLicense'],
                                        'assigningAuthorityName' => is_null($componentOf['location']['sanitaryLicense']) ? null : 'Licencia Sanitaria'
                                    ]
                                ]
                            ],
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => is_null($componentOf['location']['areaCode']) ? null : '2.16.840.1.113883.5.11',
                                    'codeSystemName' => is_null($componentOf['location']['areaCode']) ? null : 'RoleCode',
                                    'code' => $componentOf['location']['areaCode']['value'] ?? null,
                                    'displayName' => $componentOf['location']['areaCode']['name'] ?? null
                                ]
                            ],
                            'location' => [
                                'name' => [$componentOf['organization']['name']],
                                'addr' => [
                                    'fullAddress' => [$componentOf['location']['address']['fullAddress']],
                                    'streetNameType' => [$componentOf['location']['address']['streetNameType']],
                                    'streetName' => [$componentOf['location']['address']['streetName']],
                                    'houseNumberNumeric' => [$componentOf['location']['address']['houseNumberNumeric']],
                                    'houseNumber' => [$componentOf['location']['address']['houseNumber']],
                                    'unitID' => [$componentOf['location']['address']['unitId']],
                                    'unitType' => [$componentOf['location']['address']['unitType']],
                                    'deliveryInstallationType' => [$componentOf['location']['address']['deliveryInstallationType']],
                                    'deliveryInstallationArea' => [$componentOf['location']['address']['deliveryInstallationArea']],
                                    'precint' => [$componentOf['location']['address']['precint']],
                                    'county' => [$componentOf['location']['address']['county']],
                                    'state' => [$componentOf['location']['address']['state']],
                                    'postalCode' => [$componentOf['location']['address']['postalCode']],
                                    'country' => [$componentOf['location']['address']['country']],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $componentOf;
    }
}
