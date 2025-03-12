<?php

class SeccionPaciente extends Patient
{
    static function getPatientSection(Patient $patient)
    { 
        $attributes = $patient->attributes;
        $patientSection = [
            'recordTarget' => [
                'patientRole' => [
                    'id' => [
                        [
                            '_attributes' => [
                                'root' => null,
                                'extension' => $attributes->patient['id'],
                                'assigningAuthorityName' => $attributes->patient['id']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'root' => null,
                                'extension' => $attributes->patient['curp'],
                                'assigningAuthorityName' => $attributes->patient['curp']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'root' => null,
                                'extension' => $attributes->patient['adtitionalId'],
                                'assigningAuthorityName' => $attributes->patient['aditionalId']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'root' => null,
                                'extension' => $attributes->patient['nationality'],
                                'assigningAuthorityName' => $attributes->patient['nationality']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'root' => null,
                                'extension' => $attributes->patient['age'],
                                'assigningAuthorityName' => $attributes->patient['age']
                            ]
                        ]
                    ],
                    'addr' => [
                        'fullAddress' => [$attributes->patient['address']['fullAddress']],
                        'streetName' => [$attributes->patient['address']['streetName']],
                        'streetNameType' => [$attributes->patient['address']['streetNameType']],
                        'houseNumberNumeric' => [$attributes->patient['address']['houseNumberNumeric']],
                        'houseNumber' => [$attributes->patient['address']['houseNumber']],
                        'unitID' => [$attributes->patient['address']['unitId']],
                        'unitType' => [$attributes->patient['address']['unitType']],
                        'deliveryInstallationType' => [$attributes->patient['address']['deliveryInstallationType']],
                        'deliveryInstallationArea' => [$attributes->patient['address']['deliveryInstallationArea']],
                        'precint' => [$attributes->patient['address']['precint']],
                        'county' => [$attributes->patient['address']['county']],
                        'state' => [$attributes->patient['address']['state']],
                        'postalCode' => [$attributes->patient['address']['postalCode']],
                        'country' => [$attributes->patient['address']['county']],
                    ],
                    'telecom' => [
                        [
                            '_attributes' => [
                                'value' => $attributes->patient['phone']
                            ]
                        ], 
                        [
                            '_attributes' => [
                                'value' => $attributes->patient['email']
                            ]
                        ]
                    ],
                    'patient' => [
                        'name' => [
                            'given' => $attributes->patient['name']['given'],
                            'family' => [
                                [$attributes->patient['name']['first_surname']],
                                [$attributes->patient['name']['second_surname']]
                            ]
                        ],
                        'administrativeGenderCode' => [
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => 'Administrative Gender',
                                'code' => $attributes->patient['gender'],
                                'displayName' => $attributes->patient['gender']
                            ]
                        ],
                        'birthTime' => [
                            '_attributes' => [
                                'value' => $attributes->patient['birtTime'],
                            ]
                        ],
                        'maritalStatusCode' => [                            
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => 'MaritalStatus',
                                'code' => $attributes->patient['maritalStatus'],
                                'displayName' => $attributes->patient['maritalStatus']
                            ]
                        ],
                        'religiousAffiliationCode' => [  
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => 'Religiones INEGI',
                                'code' => $attributes->patient['religion'],
                                'displayName' => $attributes->patient['religion']
                            ]
                        ],
                        'ethnicGroupCode' => [                            
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => 'Lenguas Indigenas INEGI',
                                'code' => $attributes->patient['ethnicity'],
                                'displayName' => $attributes->patient['ethnicity']
                            ]
                        ],
                        'birthplace' => [
                            'place' => [
                                'addr' => [
                                    'state' => [$attributes->patient['birtplace']],
                                ],
                            ],
                        ],
                        'guardian' => [
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => null,
                                    'codeSystemName' => 'Lenguas Indigenas INEGI',
                                    'code' => $attributes->patient['guardian']['code'],
                                    'displayName' => $attributes->patient['guardian']['code']
                                ]
                            ],
                            'addr' => [
                                'fullAddress' => [$attributes->patient['guardian']['address']['fullAddress']],
                                'streetNameType' => [$attributes->patient['guardian']['address']['streetNameType']],
                                'streetName' => [$attributes->patient['guardian']['address']['streetName']],
                                'houseNumberNumeric' => [$attributes->patient['guardian']['address']['houseNumberNumeric']],
                                'houseNumber' => [$attributes->patient['guardian']['address']['houseNumber']],
                                'unitID' => [$attributes->patient['guardian']['address']['unitId']],
                                'unitType' => [$attributes->patient['guardian']['address']['unitType']],
                                'deliveryInstallationType' => [$attributes->patient['guardian']['address']['deliveryInstallationType']],
                                'deliveryInstallationArea' => [$attributes->patient['guardian']['address']['deliveryInstallationArea']],
                                'precint' => [$attributes->patient['guardian']['address']['precint']],
                                'county' => [$attributes->patient['guardian']['address']['county']],
                                'state' => [$attributes->patient['guardian']['address']['state']],
                                'postalCode' => [$attributes->patient['guardian']['address']['postalCode']],
                                'country' => [$attributes->patient['guardian']['address']['country']],
                            ],
                            'telecom' => [
                                [
                                    '_attributes' => [
                                        'value' => $attributes->patient['guardian']['phone']
                                    ]
                                ], 
                                [
                                    '_attributes' => [
                                        'value' => $attributes->patient['guardian']['email']
                                    ]
                                ]
                            ],
                            'guardianPerson' => [
                                'name' => [
                                    'given' => $attributes->patient['guardian']['name']['given'],
                                    'family' => $attributes->patient['guardian']['name']['first_surname'],
                                    'family' => $attributes->patient['guardian']['name']['second_surname'],
                                ],
                            ]
                        ],
                    ],
                    'providerOrganization' => [
                        'id' => [
                            '_attributes' => [
                                'root' => null,
                                'extension' => $attributes->patient['provider']['id'],
                                'assigningAuthorityName' => 'CLUES'
                            ]
                        ],
                        'name' => $attributes->patient['provider']['name'],
                        'telecom' => [
                            [
                                '_attributes' => [
                                    'value' => $attributes->patient['provider']['phone']
                                ]
                            ],
                            [
                                '_attributes' => [
                                    'value' => $attributes->patient['provider']['email']
                                ]
                            ]
                        ],
                        'addr' => [
                            'fullAddress' => [$attributes->patient['provider']['address']['fullAddress']],
                            'streetNameType' => [$attributes->patient['provider']['address']['streetNameType']],
                            'streetName' => [$attributes->patient['provider']['address']['streetName']],
                            'houseNumberNumeric' => [$attributes->patient['provider']['address']['houseNumberNumeric']],
                            'houseNumber' => [$attributes->patient['provider']['address']['houseNumber']],
                            'unitID' => [$attributes->patient['provider']['address']['unitId']],
                            'unitType' => [$attributes->patient['provider']['address']['unitType']],
                            'deliveryInstallationType' => [$attributes->patient['provider']['address']['deliveryInstallationType']],
                            'deliveryInstallationArea' => [$attributes->patient['provider']['address']['deliveryInstallationArea']],
                            'precint' => [$attributes->patient['provider']['address']['precint']],
                            'county' => [$attributes->patient['provider']['address']['county']],
                            'state' => [$attributes->patient['provider']['address']['state']],
                            'postalCode' => [$attributes->patient['provider']['address']['postalCode']],
                            'country' => [$attributes->patient['provider']['address']['country']],
                        ],
                    ]
                ]
            ]           
        ];

        return $patient->deleteNulls($patientSection);
    }
}
