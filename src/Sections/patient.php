<?php

class SeccionPaciente
{
    static function getPatientSection(Patient $patientC)
    { 
        $patient = $patientC->attributes->patient;
        $patientSection = [
            'recordTarget' => [
                'patientRole' => [
                    'id' => [
                        [
                            '_attributes' => [
                                'root' => $patient['id'],
                                'extension' => $patient['id'],
                                'assigningAuthorityName' => $patient['id']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'root' => is_null($patient['curp']) ? null : '2.16.840.1.113883.4.629',
                                'extension' => $patient['curp'],
                                'assigningAuthorityName' => is_null($patient['curp']) ? null : 'CURP' 
                            ]
                        ],
                        [
                            '_attributes' => [
                                'root' => $patient['aditionalId'],
                                'extension' => $patient['aditionalId'],
                                'assigningAuthorityName' => $patient['aditionalId']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'root' => is_null($patient['nationality']) ? null : '2.16.1.113883.3.215.12.15',
                                'extension' => $patient['nationality']['name'] ?? null,
                                'assigningAuthorityName' => is_null($patient['nationality']) ? null : 'Nacionalidad',
                            ]
                        ],
                        [
                            '_attributes' => [
                                'root' => null,
                                'extension' => $patient['age'],
                                'assigningAuthorityName' => is_null($patient['age']) ? null : 'Edad'
                            ]
                        ]
                    ],
                    'addr' => [
                        'fullAddress' => [$patient['address']['fullAddress']],
                        'streetName' => [$patient['address']['streetName']],
                        'streetNameType' => [$patient['address']['streetNameType']],
                        'houseNumberNumeric' => [$patient['address']['houseNumberNumeric']],
                        'houseNumber' => [$patient['address']['houseNumber']],
                        'unitID' => [$patient['address']['unitId']],
                        'unitType' => [$patient['address']['unitType']],
                        'deliveryInstallationType' => [$patient['address']['deliveryInstallationType']],
                        'deliveryInstallationArea' => [$patient['address']['deliveryInstallationArea']],
                        'precint' => [$patient['address']['precint']],
                        'county' => [$patient['address']['county']],
                        'state' => [$patient['address']['state']],
                        'postalCode' => [$patient['address']['postalCode']],
                        'country' => [$patient['address']['county']],
                    ],
                    'telecom' => [
                        [
                            '_attributes' => [
                                'value' => $patient['phone']
                            ]
                        ], 
                        [
                            '_attributes' => [
                                'value' => $patient['email']
                            ]
                        ]
                    ],
                    'patient' => [
                        'name' => [
                            'given' => $patient['name']['given'],
                            'family' => [
                                [$patient['name']['first_surname']],
                                [$patient['name']['second_surname']]
                            ]
                        ],
                        'administrativeGenderCode' => [
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => is_null($patient['gender']) ? null : 'Administrative Gender',
                                'code' => $patient['gender']['value'] ?? null,
                                'displayName' => $patient['gender']['name'] ?? null
                            ]
                        ],
                        'birthTime' => [
                            '_attributes' => [
                                'value' => $patient['birtTime'],
                            ]
                        ],
                        'maritalStatusCode' => [                            
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => is_null($patient['maritalStatus']) ? null : 'MaritalStatus',
                                'code' => $patient['maritalStatus']['value'] ?? null,
                                'displayName' => $patient['maritalStatus']['name'] ?? null
                            ]
                        ],
                        'religiousAffiliationCode' => [  
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => is_null($patient['religion']) ? null : 'Religiones INEGI',
                                'code' => $patient['religion']['value'] ?? null,
                                'displayName' => $patient['religion']['name'] ?? null
                            ]
                        ],
                        'ethnicGroupCode' => [                            
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => is_null($patient['ethnicity']) ? null : 'Lenguas Indigenas INEGI',
                                'code' => $patient['ethnicity']['value'] ?? null,
                                'displayName' => $patient['ethnicity']['name'] ?? null
                            ]
                        ],
                        'birthplace' => [
                            'place' => [
                                'addr' => [
                                    'state' => [$patient['birtplace']],
                                ],
                            ],
                        ],
                        'guardian' => [
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => null,
                                    'codeSystemName' => is_null($patient['guardian']['code']) ? null : 'Role Code',
                                    'code' => $patient['guardian']['code']['value'] ?? null,
                                    'displayName' => $patient['guardian']['code']['name'] ?? null
                                ]
                            ],
                            'addr' => [
                                'fullAddress' => [$patient['guardian']['address']['fullAddress']],
                                'streetNameType' => [$patient['guardian']['address']['streetNameType']],
                                'streetName' => [$patient['guardian']['address']['streetName']],
                                'houseNumberNumeric' => [$patient['guardian']['address']['houseNumberNumeric']],
                                'houseNumber' => [$patient['guardian']['address']['houseNumber']],
                                'unitID' => [$patient['guardian']['address']['unitId']],
                                'unitType' => [$patient['guardian']['address']['unitType']],
                                'deliveryInstallationType' => [$patient['guardian']['address']['deliveryInstallationType']],
                                'deliveryInstallationArea' => [$patient['guardian']['address']['deliveryInstallationArea']],
                                'precint' => [$patient['guardian']['address']['precint']],
                                'county' => [$patient['guardian']['address']['county']],
                                'state' => [$patient['guardian']['address']['state']],
                                'postalCode' => [$patient['guardian']['address']['postalCode']],
                                'country' => [$patient['guardian']['address']['country']],
                            ],
                            'telecom' => [
                                [
                                    '_attributes' => [
                                        'value' => $patient['guardian']['phone']
                                    ]
                                ], 
                                [
                                    '_attributes' => [
                                        'value' => $patient['guardian']['email']
                                    ]
                                ]
                            ],
                            'guardianPerson' => [
                                'name' => [
                                    'given' => $patient['guardian']['name']['given'],
                                    'family' => [ 
                                        $patient['guardian']['name']['first_surname'],
                                        $patient['guardian']['name']['second_surname']
                                    ],
                                ],
                            ]
                        ],
                    ],
                    'providerOrganization' => [
                        'id' => [
                            '_attributes' => [
                                'root' => is_null($patient['provider']['id']) ? null : '2.16.840.1.113883.4.631',
                                'extension' => $patient['provider']['id']['value'] ?? null,
                                'assigningAuthorityName' => is_null($patient['provider']['id']) ? null : 'CLUES'
                            ]
                        ],
                        'name' => $patient['provider']['name'],
                        'telecom' => [
                            [
                                '_attributes' => [
                                    'value' => $patient['provider']['phone']
                                ]
                            ],
                            [
                                '_attributes' => [
                                    'value' => $patient['provider']['email']
                                ]
                            ]
                        ],
                        'addr' => [
                            'fullAddress' => [$patient['provider']['address']['fullAddress']],
                            'streetNameType' => [$patient['provider']['address']['streetNameType']],
                            'streetName' => [$patient['provider']['address']['streetName']],
                            'houseNumberNumeric' => [$patient['provider']['address']['houseNumberNumeric']],
                            'houseNumber' => [$patient['provider']['address']['houseNumber']],
                            'unitID' => [$patient['provider']['address']['unitId']],
                            'unitType' => [$patient['provider']['address']['unitType']],
                            'deliveryInstallationType' => [$patient['provider']['address']['deliveryInstallationType']],
                            'deliveryInstallationArea' => [$patient['provider']['address']['deliveryInstallationArea']],
                            'precint' => [$patient['provider']['address']['precint']],
                            'county' => [$patient['provider']['address']['county']],
                            'state' => [$patient['provider']['address']['state']],
                            'postalCode' => [$patient['provider']['address']['postalCode']],
                            'country' => [$patient['provider']['address']['country']],
                        ],
                    ]
                ]
            ]           
        ];

        return $patientSection;
    }
}
