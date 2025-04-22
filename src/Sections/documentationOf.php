<?php

class DocumentationOfSection
{
    static function getDocumentOfSection(Patient $patient)
    {
        $doc = $patient->attributes->documentationOf;

        $allNull = array_walk_recursive($doc, function ($value) use (&$allNull) {
            if (!is_null($value)) {
                $allNull = false;
            }
        });

        $documentationOf = [];

        if (!$allNull) {
            $documentationOf = [
                'documentationOf' => [
                    '_attributes' => [
                        'typeCode' => 'DOC'
                    ],
                    'serviceEvent' => [
                        '_attributes' => ['classCode' => 'PCPR'],
                        'id' => [
                            '_attributes' => [
                                'root' => $doc['id'],
                                'extension' => $doc['id']
                            ]
                        ],
                        'code' => [
                            '_attributes' => [
                                'codeSystem' => is_null($doc['code']) ? null : '2.16.840.1.113883.5.4',
                                'codeSystemName' => is_null($doc['code']) ? null : 'actCode',
                                'code' => $doc['code']['value'] ?? null,
                                'displayName' => $doc['code']['name'] ?? null
                            ]
                        ],
                        'effectiveTime' => [
                            'low' => [
                                '_attributes' => [
                                    'value' => $doc['time']['low'] ?? null
                                ],
                            ],
                            'high' => [
                                '_attributes' => [
                                    'value' => $doc['time']['high'] ?? null
                                ],
                            ]
                        ],
                        'performer' => [
                            '_attributes' => [
                                'typeCode' => 'PRF'
                            ],
                            'functionCode' => [
                                '_attributes' => [
                                    'codeSystem' => '2.16.840.1.113883.12.443',
                                    'codeSystemName' => 'Provider Role',
                                    'code' => 'PP',
                                    'displayName' => 'Primary Care Provider',
                                ]
                            ],
                            'assignedEntity' => [
                                'id' => [
                                    '_attributes' => [
                                        'root' => is_null($doc['professionalId']) ? null : '2.16.840.1.113883.3.215.12.18',
                                        'extension' => $doc['professionalId']
                                    ]
                                ],
                                'assignedPerson' => [
                                    'name' => [
                                        'given' => $doc['person']['name'] ?? null,
                                        'family' => array_filter([
                                            $doc['person']['first_surname'] ?? null,
                                            $doc['person']['second_surname'] ?? null
                                        ])
                                    ],
                                ],
                                'representedOrganization' => [
                                    'id' => [
                                        [
                                            '_attributes' => [
                                                'root' => is_null($doc['organization']['clues']) ? null : '2.16.840.1.113883.4.631',
                                                'extension' => $doc['organization']['clues'] ?? null,
                                                'assignningAuthorityName' => is_null($doc['organization']['clues']) ? null : 'CLUES'
                                            ]
                                        ],
                                        [
                                            '_attributes' => [
                                                'root' => is_null($doc['organization']['sanitaryLicense']) ? null : '2.16.840.1.113883.3.215.1',
                                                'extension' => $doc['organization']['sanitaryLicense'] ?? null,
                                                'assignningAuthorityName' => is_null($doc['organization']['sanitaryLicense']) ? null : 'Licencia Sanitaria'
                                            ]
                                        ]
                                    ],
                                    'name' => $doc['organization']['name'] ?? null,
                                    'telecom' => array_filter([
                                        $doc['organization']['phone'] ?? null,
                                        $doc['organization']['email'] ?? null
                                    ]),
                                    'addr' => [
                                        'fullAddress' => [$doc['organization']['address']['fullAddress'] ?? null],
                                        'streetNameType' => [$doc['organization']['address']['streetNameType'] ?? null],
                                        'streetName' => [$doc['organization']['address']['streetName'] ?? null],
                                        'houseNumberNumeric' => [$doc['organization']['address']['houseNumberNumeric'] ?? null],
                                        'houseNumber' => [$doc['organization']['address']['houseNumber'] ?? null],
                                        'unitID' => [$doc['organization']['address']['unitId'] ?? null],
                                        'unitType' => [$doc['organization']['address']['unitType'] ?? null],
                                        'deliveryInstallationType' => [$doc['organization']['address']['deliveryInstallationType'] ?? null],
                                        'deliveryInstallationArea' => [$doc['organization']['address']['deliveryInstallationArea'] ?? null],
                                        'precint' => [$doc['organization']['address']['precint'] ?? null],
                                        'county' => [$doc['organization']['address']['county'] ?? null],
                                        'state' => [$doc['organization']['address']['state'] ?? null],
                                        'postalCode' => [$doc['organization']['address']['postalCode'] ?? null],
                                        'country' => [$doc['organization']['address']['country'] ?? null],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ];
        } else {
            return $documentationOf;
        }

        return $documentationOf;
    }
}
