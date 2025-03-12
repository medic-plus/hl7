<?php

class ComponentOfSection extends Patient
{
    static function getComponentOfSection(Patient $patient)
    {
        $attributes = $patient->attributes;
        $componentOf = [
            'componentOf' => [
                'encompasingEncounter' => [
                    'id' => [
                        '_attributes' => [
                            'root' => null,
                            'extension' => $attributes->encounter['id']
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => null,
                            'codeSystemName' => 'actCode',
                            'code' => $attributes->encounter['code'],
                            'displayName' => $attributes->encounter['code']
                        ]
                    ],
                    'effectiveTime' => [
                        'low' => [
                            '_attributes' => ['value' => $attributes->encounterTime['low']] 
                        ],
                        'high' => [
                            '_attributes' => ['value' => $attributes->encounterTime['high']] 
                        ],
                    ],
                    'responsibleParty' => [
                        'assignedEntity' => [
                            'id' => [
                                '_attributes' => [
                                    'root' => null,
                                    'extension' => $attributes->encounterResponsible['professionalId']
                                ]
                            ],
                            'assignedPerson' => [
                                'name' => [
                                    'given' => $attributes->encounterResponsible['name']['given'],
                                    'family' => $attributes->encounterResponsible['name']['first_surname'],
                                    'family' => $attributes->encounterResponsible['name']['second_surname'],
                                ],
                            ],
                            'representedOrganization' => [
                                'id' => ['_attributes' => ['root' => $attributes->encounterResponsibleOrganization['id']]],
                                'name' => $attributes->encounterResponsibleOrganization['name'],
                            ],
                        ],
                    ],
                    'dischargeDispositionCode' => [
                        '_attributes' => [
                            'codeSystem' => null,
                            'codeSystemName' => 'HL7 Discharge Disposition',
                            'code' => $attributes->encounterResponsibleDispositionCode,
                            'displayName' => $attributes->encounterResponsibleDispositionCode
                        ]
                    ],
                    'location' => [
                        'healthCareFacility' => [
                            'id' => [
                                [
                                    '_attributes' => [
                                        'root' => null,
                                        'extension' => $attributes->encounterResponsibleHealthcareFacility['cluesId'],
                                        'assigningAuthorityName' => null
                                    ]
                                ], 
                                [
                                    '_attributes' => [
                                        'root' => null,
                                        'extension' => $attributes->encounterResponsibleHealthcareFacility['sanitaryLicence'],
                                        'assigningAuthorityName' => null
                                    ]
                                ]
                            ],
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => null,
                                    'codeSystemName' => 'RoleCode',
                                    'code' => $attributes->encounterResponsibleHealthcareFacility['areaCode'],
                                    'displayName' => $attributes->encounterResponsibleHealthcareFacility['areaCode']
                                ]
                            ],
                            'location' => [
                                'name' => [$attributes->encounterResponsibleHealthcareFacility['name']],
                                'addr' => [
                                    'fullAddress' => [$attributes->encounterResponsibleHealthcareFacility['address']['fullAddress']],
                                    'streetNameType' => [$attributes->encounterResponsibleHealthcareFacility['address']['streetNameType']],
                                    'streetName' => [$attributes->encounterResponsibleHealthcareFacility['address']['streetName']],
                                    'houseNumberNumeric' => [$attributes->encounterResponsibleHealthcareFacility['address']['houseNumberNumeric']],
                                    'houseNumber' => [$attributes->encounterResponsibleHealthcareFacility['address']['houseNumber']],
                                    'unitID' => [$attributes->encounterResponsibleHealthcareFacility['address']['unitId']],
                                    'unitType' => [$attributes->encounterResponsibleHealthcareFacility['address']['unitType']],
                                    'deliveryInstallationType' => [$attributes->encounterResponsibleHealthcareFacility['address']['deliveryInstallationType']],
                                    'deliveryInstallationArea' => [$attributes->encounterResponsibleHealthcareFacility['address']['deliveryInstallationArea']],
                                    'precint' => [$attributes->encounterResponsibleHealthcareFacility['address']['precint']],
                                    'county' => [$attributes->encounterResponsibleHealthcareFacility['address']['county']],
                                    'state' => [$attributes->encounterResponsibleHealthcareFacility['address']['state']],
                                    'postalCode' => [$attributes->encounterResponsibleHealthcareFacility['address']['postalCode']],
                                    'country' => [$attributes->encounterResponsibleHealthcareFacility['address']['country']],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $patient->deleteNulls($componentOf);
    }
}
