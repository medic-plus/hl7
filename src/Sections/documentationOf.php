<?php 

class DocumentationOfSection extends Patient {
    static function getDocumentOfSection(Patient $patient){
        $attributes = $patient->attributes;
        $documentationOf = [
            'documentationOf' => [
                '_attributes' => ['typeCode' => 'DOC'],
                'serviceEvent' => [
                    '_attributes' => ['classCode' => 'PCPR'],
                    'id' => [
                        '_attributes' => [
                            'root' => null,
                            'extension' => $attributes->documentationId
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => null,
                            'codeSystemName' => 'actCode',
                            'code' => $attributes->documentationCode,
                            'displayName' => $attributes->documentationCode
                        ]
                    ],
                    'effectiveTime' => [
                        'low' => [
                            '_attributes' => [
                                'value' => $attributes->documentationEffectiveTime['low']
                            ],
                        ],
                        'high' => [
                            '_attributes' => [
                                'value' => $attributes->documentationEffectiveTime['high']
                            ],
                        ]
                    ],
                    'performer' => [
                        '_attributes' => [
                            'typeCode' => 'PRF'
                        ],
                        'functionCode' => [
                            '_attributes' => [
                                'codeSystem' => null,
                                'codeSystemName' => 'Provider Role',
                                'code' => 'PP',
                                'displayName' => 'Primary Care Provider'
                            ]
                        ],
                        'assignedEntity' => [
                            'id' => [
                                '_attributes' => [
                                    'root' => null,
                                    'extension' => $attributes->documentationPerformer['professionalId']
                                ]
                            ],
                            'assignedPerson' => [
                                'name' => [
                                    'given' => $attributes->documentationPerformer['name']['given'],
                                    'family' => [
                                        [$attributes->documentationPerformer['name']['first_surname']],
                                        [$attributes->documentationPerformer['name']['second_surname']]
                                    ],
                                ],
                            ],
                            'representedOrganization' => [
                                'id' => [
                                    [
                                        '_attributes' => [
                                            'root' => null,
                                            'extension' => $attributes->documentationPerformer['organization']['organizationClues'],
                                            'assignningAuthorityName' => 'CLUES'
                                        ]
                                    ],
                                    [
                                        '_attributes' => [
                                            'root' => null,
                                            'extension' => $attributes->documentationPerformer['organization']['organizationSanitaryLicence'],
                                            'assignningAuthorityName' => 'Licencia Sanitaria'
                                        ]
                                    ]
                                ],
                                'name' => $attributes->documentationPerformer['organization']['name'],
                                'telecom' => [
                                    [$attributes->documentationPerformer['organization']['phone']],
                                    [$attributes->documentationPerformer['organization']['email']]
                                ],
                                'addr' => [
                                    'fullAddress' => [$attributes->documentationPerformer['organization']['address']['fullAddress']],
                                    'streetNameType' => [$attributes->documentationPerformer['organization']['address']['streetNameType']],
                                    'streetName' => [$attributes->documentationPerformer['organization']['address']['streetName']],
                                    'houseNumberNumeric' => [$attributes->documentationPerformer['organization']['address']['houseNumberNumeric']],
                                    'houseNumber' => [$attributes->documentationPerformer['organization']['address']['houseNumber']],
                                    'unitID' => [$attributes->documentationPerformer['organization']['address']['unitId']],
                                    'unitType' => [$attributes->documentationPerformer['organization']['address']['unitType']],
                                    'deliveryInstallationType' => [$attributes->documentationPerformer['organization']['address']['deliveryInstallationType']],
                                    'deliveryInstallationArea' => [$attributes->documentationPerformer['organization']['address']['deliveryInstallationArea']],
                                    'precint' => [$attributes->documentationPerformer['organization']['address']['precint']],
                                    'county' => [$attributes->documentationPerformer['organization']['address']['county']],
                                    'state' => [$attributes->documentationPerformer['organization']['address']['state']],
                                    'postalCode' => [$attributes->documentationPerformer['organization']['address']['postalCode']],
                                    'country' => [$attributes->documentationPerformer['organization']['address']['country']],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $patient->deleteNulls($documentationOf);
    } 

}

?>