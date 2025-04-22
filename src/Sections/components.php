<?php

class ComponentsSection
{
    static function getComponentsSection(Patient $patient)
    {
        $components = [
            'component' => [
                'structuredBody' => [
                    'component' => [
                        [
                            self::ReasonComponent($patient)
                        ],
                        [
                            self::Affiliations($patient)
                        ],
                        [
                            self::Allergies($patient)
                        ],
                        [
                            self::FamilyHistory($patient)
                        ],
                        [
                            self::NonPathologicalHistory($patient)
                        ],
                        [
                            self::PathologicalHistory($patient)
                        ],
                        [
                            self::Disabilites($patient)
                        ],
                        [
                            self::Medications($patient)
                        ],
                        [
                            self::InitialManifestations($patient)
                        ],
                        [
                            self::DiagnosticImpression($patient)
                        ],
                        [
                            self::Diagnostics($patient)
                        ],
                        [
                            self::Procedures($patient)
                        ],
                        [
                            self::MedicationsDuringCare($patient)
                        ],
                        [
                            self::EvolutionDuringCare($patient)
                        ],
                        [
                            self::VitalSigns($patient)
                        ],
                        [
                            self::LaboratoryResults($patient)
                        ],
                        [
                            self::TreatmentPlan($patient)
                        ],
                        [
                            self::HealthPronostics($patient)
                        ],
                    ]
                ]
            ]
        ];

        return $components;
    }

    private static function ReasonComponent($patient)
    {
        $reasonComponent = [];
        if (!is_null($patient->attributes->reasonComponent['reason'])) {
            $reasonComponent = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '1.3.6.1.4.1.19376.1.5.3.1.3.1'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '42349-1',
                            'displayName' => 'Motivo de Referencia'
                        ]
                    ],
                    'title' => $patient->attributes->reasonComponent['reason'] ?? null,
                    'text' => $patient->attributes->reasonComponent['detail'] ?? null
                ]
            ];
        }
        return $reasonComponent;
    }

    private static function Affiliations($patient)
    {
        $components = [];
        $affiliations = $patient->attributes->affiliationsComponents;

        if (!is_null($affiliations)) {

            $rows = [];
            foreach ($affiliations as $affiliation) {
                $rows[] = [
                    $affiliation['affiliations']['start'] ?? null,
                    $affiliation['affiliations']['end'] ?? null,
                    $affiliation['affiliations']['name'] ?? null,
                    $affiliation['affiliations']['idPolicyValue'] ?? null,
                    $affiliation['affiliations']['idBeneficiario'] ?? null,
                    $affiliation['affiliations']['idBeneficiarioTipo'] ?? null
                ];
            }

            $affiliationsData = [];
            foreach ($affiliations as $affiliationComponent) {
                $affiliationsData[] = [
                    'act' => [
                        '_attributes' => [
                            'classCode' => 'ACT',
                            'moodCode' => 'EVN'
                        ],
                        'code' => [
                            '_attributes' => [
                                'codeSystem' => '2.16.840.1.113883.6.1',
                                'codeSystemName' => 'LOINC',
                                'code' => '48768-7',
                                'displayName' => 'Fuentes de financiamiento'
                            ]
                        ],
                        'statusCode' => [
                            '_attributes' => [
                                'code' => 'completed'
                            ]
                        ],
                        'entryRelationship' => [
                            '_attributes' => [
                                'typeCode' => 'COMP'
                            ],
                            'act' => [
                                '_attributes' => [
                                    'classCode' => 'ACT',
                                    'moodCode' => 'EVN'
                                ],
                                'code' => [
                                    '_attributes' => [
                                        'codeSystem' => '2.16.840.1.113883.5.110',
                                        'codeSystemName' => 'RoleClass',
                                        'code' => $affiliationComponent['affiliation']['programKey'],
                                        'displayName' => $affiliationComponent['affiliation']['programName']
                                    ]
                                ],
                                'statusCode' => [
                                    '_attributes' => [
                                        'code' => 'completed'
                                    ]
                                ],
                                'performer' => [
                                    '_attributes' => [
                                        'typeCode' => 'PRF'
                                    ],
                                    'time' => [
                                        '_attributes' => [
                                            'nullFlavor' => 'NA'
                                        ]
                                    ],
                                    'assignedEntity' => [
                                        'id' => [
                                            '_attributes' => [
                                                'root' => $affiliationComponent['affiliation']['insurance']['id']
                                            ]
                                        ],
                                        'code' => [
                                            '_attributes' => [
                                                'code' => 'PAYOR',
                                                'codeSystem' => '2.16.840.1.113883.5.110',
                                                'codeSystemName' => 'HL7 RoleCode'
                                            ]
                                        ],
                                        'representedOrganization' => [
                                            'name' => $affiliationComponent['affiliation']['insurance']['organizationName']
                                        ],
                                    ],
                                ],
                                'participant' => [
                                    '_attributes' => [
                                        'typeCode' => 'COV'
                                    ],
                                    'time' => [
                                        'low' => [
                                            '_attributes' => [
                                                'value' => $affiliationComponent['affiliation']['insurance']['insuranceStart'] // Acceso adecuado
                                            ]
                                        ],
                                        'high' => [
                                            '_attributes' => [
                                                'value' => $affiliationComponent['affiliation']['insurance']['insuranceEnd'] // Acceso adecuado
                                            ]
                                        ],
                                    ],
                                    'participantRole' => [
                                        '_attributes' => [
                                            'classCode' => 'PAT'
                                        ],
                                        'id' => [
                                            '_attributes' => [
                                                'root' => $affiliationComponent['affiliation']['insurance']['personId'], // Acceso adecuado
                                                'extension' => $affiliationComponent['affiliation']['insurance']['personId'] // Acceso adecuado
                                            ]
                                        ],
                                        'code' => [
                                            '_attributes' => [
                                                'codeSystem' => '2.16.840.1.113883.3.215.12.16',
                                                'codeSystemName' => 'Tipos de beneficiario',
                                                'code' => $affiliationComponent['affiliation']['insurance']['beneficiaryType']['name'] ?? null,
                                                'displayName' => $affiliationComponent['affiliation']['insurance']['beneficiaryType']['value'] ?? null,
                                            ]
                                        ],
                                    ],
                                ],
                                'participant' => [
                                    'participantRole' => [
                                        'id' => [
                                            '_attributes' => [
                                                'root' => '2.16.840.1.113883.3.215.1.2',
                                                'extension' => $affiliationComponent['affiliation']['insurance']['policyPersonId'] // Acceso adecuado
                                            ]
                                        ],
                                    ],
                                ],
                            ]
                        ],
                    ]
                ];
            }

            $components = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.18'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '48768-6',
                            'displayName' => 'Pagador'
                        ]
                    ],
                    'text' => [
                        'table' => [
                            '_attributes' => [
                                'border' => '1',
                                'width' => '100%'
                            ],
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['Inicio'],
                                        ['Fin'],
                                        ['Programa'],
                                        ['Póliza'],
                                        ['Folio'],
                                        ['Tipo de beneficiario']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($row) {
                                    return [
                                        'td' => array_map(function ($cell) {
                                            return [$cell ?? ''];
                                        }, $row)
                                    ];
                                }, $rows)
                            ]

                        ]
                    ],
                    'entry' => array_map(function ($component) {
                        return [
                            array_map(function ($cell) {
                                return [$cell ?? ''];
                            }, $component)
                        ];
                    }, $affiliationsData)
                ]
            ];
        }

        return $components;
    }

    private static function Allergies($patient)
    {
        $components = [];
        $allergies = $patient->attributes->allergies;

        if (!is_null($allergies)) {
            $rows = [];

            foreach ($allergies as $allergie) {
                $rows[] = [
                    $allergie['allergenName'] ?? null,
                    $allergie['startDate'] ?? null,
                    $allergie['doctorName'] ?? null,
                    $allergie['reactionDescription'] ?? null,
                    $allergie['currentSituation'] ?? null,
                    $allergie['observations'] ?? null
                ];
            }

            $components[] = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.2.22'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSsytem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '48765-2',
                            'displayName' => 'Alergias'
                        ]
                    ],
                    'title' => 'Alergias y reacciones adversas',
                    'text' => [
                        'table' => [
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['Alergeno'],
                                        ['Fecha Inicial'],
                                        ['Médico'],
                                        ['Reacción'],
                                        ['Estado actual'],
                                        ['Observaciones']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($row) {
                                    return [
                                        'td' => array_map(function ($cell) {
                                            return [$cell ?? ''];
                                        }, $row)
                                    ];
                                }, $rows)
                            ]
                        ]
                    ],
                ]
            ];
        }

        return $components;
    }

    private static function FamilyHistory($patient)
    {

        $familyData = $patient->attributes->familyHistory;
        $rows = [];
        $familyHistory = [];

        if (!is_null($familyData)) {

            foreach ($familyData as $data) {
                $rows[] = [
                    $data['hipertension'] ?? null,
                    $data['dislipidemias'] ?? null,
                    $data['diabetes'] ?? null,
                ];
            }


            $familyHistory = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.1.4'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '10157-6',
                            'displayName' => 'Antecedentes Familiares'
                        ]
                    ],
                    'title' => ['Antecedentes Heredo-Familiares'],
                    'text' => [
                        'table' => [
                            '_attributes' => [
                                'width' => '100%'
                            ],
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['Hipertensión'],
                                        ['Dislipidemias'],
                                        ['Diabetes']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => [
                                    'td' => [[], [], []]
                                ]
                            ]
                        ]
                    ],
                    'entry' => [
                        'organizer' => [
                            'statusCode' => [],
                            'subject' => [
                                'relatedSubject' => [
                                    'code' => []
                                ]
                            ],
                            'component' => [
                                'observation' => [
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                    [
                                        'code' => [''],
                                        'statusCode' => [''],
                                        'value' => ['']
                                    ],
                                ],
                                'organizer' => [
                                    'templateId' => [''],
                                    'statusCode' => [''],
                                    'subject' => [
                                        'relatedSubject' => [
                                            'code' => [''],
                                        ],
                                    ],
                                    'component' => [
                                        'observation' => [
                                            'code' => [''],
                                            'value' => [''],
                                            'entryRelationship' => [
                                                'observation' => [
                                                    [
                                                        'code' => [''],
                                                        'statusCode' => [''],
                                                        'value' => [''],
                                                    ],
                                                    [
                                                        'code' => [''],
                                                        'statusCode' => [''],
                                                        'value' => [''],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];
        }

        return $familyHistory;
    }

    public static function NonPathologicalHistory($patient) {
        $components = [];
        $nonPathologicalHistory = $patient->attributes->nonPathologicalHistory;
    
        if (!is_null($nonPathologicalHistory)) {
            $rows = [];
    
            foreach ($nonPathologicalHistory as $entry) {
                $rows[] = [
                    'bloodType' => $entry['bloodType'] ?? null,
                    'smokingStart' => $entry['smokingStart'] ?? null,
                    'smokingEnd' => $entry['smokingEnd'] ?? null,
                    'cigarettesPerDay' => $entry['cigarettesPerDay'] ?? null,
                    'alcoholStart' => $entry['alcoholStart'] ?? null,
                    'alcoholEnd' => $entry['alcoholEnd'] ?? null,
                    'alcoholAmountPerDay' => $entry['alcoholAmountPerDay'] ?? null,
                    'substanceStart' => $entry['substanceStart'] ?? null,
                    'substanceEnd' => $entry['substanceEnd'] ?? null,
                    'substanceDescription' => $entry['substanceDescription'] ?? null,
                    'otherNonPathologicalHistory' => $entry['otherNonPathologicalHistory'] ?? null,
                ];
            }
    
            $components[] = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.4.38'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '29762-2',
                            'displayName' => 'Antecedentes no patológicos'
                        ]
                    ],
                    'title' => 'Antecedentes personales no patológicos',
                    'text' => [
                        'paragraph' => 'Tipo de Sangre: ' . ($nonPathologicalHistory[0]['bloodType'] ?? 'Desconocido'),
                        'table' => [
                            'thead' => [
                                'tr' => [
                                    'th' => 'Tabaquismo'
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($entry) {
                                    return [
                                        'td' => [
                                            $entry['smokingStart'] ?? '',
                                            $entry['smokingEnd'] ?? '',
                                            $entry['cigarettesPerDay'] ?? ''
                                        ]
                                    ];
                                }, $rows)
                            ]
                        ]
                    ]
                ]
            ];
    
            foreach (['smoking', 'alcohol', 'substance'] as $type) {
                foreach ($nonPathologicalHistory as $entry) {
                    $components[] = [
                        'entry' => [
                            '_attributes' => [
                                'typeCode' => 'DRIV'
                            ],
                            'observation' => [
                                '_attributes' => [
                                    'classCode' => 'OBS',
                                    'moodCode' => 'EVN'
                                ],
                                'id' => [
                                    '_attributes' => [
                                        'root' => '--identificador único--'
                                    ]
                                ],
                                'code' => [
                                    '_attributes' => [
                                        'codeSystem' => '2.16.840.1.113883.6.96',
                                        'codeSystemName' => 'SNOMED CT',
                                        'code' => '--código del consumo--',
                                        'displayName' => ucfirst($type)
                                    ]
                                ],
                                'statusCode' => [
                                    '_attributes' => [
                                        'code' => 'completed'
                                    ]
                                ],
                                'effectiveTime' => [
                                    'low' => [
                                        '_attributes' => [
                                            'value' => $entry["{$type}Start"] ?? ''
                                        ]
                                    ],
                                    'high' => [
                                        '_attributes' => [
                                            'value' => $entry["{$type}End"] ?? ''
                                        ]
                                    ]
                                ],
                                'value' => [
                                    '_attributes' => [
                                        'xsi:type' => 'ST',
                                        'value' => $entry["{$type}Description"] ?? ''
                                    ]
                                ]
                            ]
                        ]
                    ];
                }
            }
        }
    
        return $components;
    }
    

    public static function PathologicalHistory($patient) {
        $components = [];
        $pathologicalHistory = $patient->attributes->pathologicalHistory;
    
        if (!is_null($pathologicalHistory)) {
            $rows = [];
    
            foreach ($pathologicalHistory as $condition) {
                $rows[] = [
                    'condition' => $condition['condition'] ?? null,
                    'diagnosisYear' => $condition['diagnosisYear'] ?? null,
                    'icdCode' => $condition['icdCode'] ?? null,
                    'conditionName' => $condition['conditionName'] ?? null,
                    'diagnosisText' => $condition['diagnosisText'] ?? null
                ];
            }
    
            $components[] = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.2.20'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '11348-0',
                            'displayName' => 'Antecedentes patológicos'
                        ]
                    ],
                    'title' => 'Antecedentes personales patológicos',
                    'text' => [
                        'paragraph' => '--Relación de antecedentes personales patológicos del paciente --',
                        'table' => [
                            'tbody' => [
                                'tr' => array_map(function ($condition) {
                                    return [
                                        'th' => [
                                            $condition['condition'] ?? ''
                                        ],
                                        'td' => [
                                            $condition['diagnosisYear'] ?? '',
                                            $condition['icdCode'] ?? '',
                                            $condition['conditionName'] ?? ''
                                        ]
                                    ];
                                }, $rows)
                            ]
                        ]
                    ]
                ]
            ];
    
            foreach ($pathologicalHistory as $condition) {
                $components[] = [
                    'entry' => [
                        'observation' => [
                            '_attributes' => [
                                'classCode' => 'OBS',
                                'moodCode' => 'EVN'
                            ],
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => '2.16.840.1.113883.6.96',
                                    'codeSystemName' => 'SNOMED CT',
                                    'code' => '282291009',
                                    'displayName' => 'Diagnóstico'
                                ]
                            ],
                            'statusCode' => [
                                '_attributes' => [
                                    'code' => 'completed'
                                ]
                            ],
                            'effectiveTime' => [
                                'low' => [
                                    '_attributes' => [
                                        'value' => $condition['diagnosisYear'] ?? ''
                                    ]
                                ]
                            ],
                            'value' => [
                                '_attributes' => [
                                    'xsi:type' => 'CE',
                                    'codeSystem' => '2.16.840.1.113883.6.3',
                                    'codeSystemName' => 'ICD-10',
                                    'code' => $condition['icdCode'] ?? '',
                                    'displayName' => $condition['conditionName'] ?? ''
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }
    
        return $components;
    }
    

    private static function Disabilites($patient)
    {
        $disabilities = [];
        $disabilitiesComponent = [];

        if (!is_null($patient->attributes->disabilities)) {
            foreach ($patient->attributes->disabilities as $disability) {
                $disabilities[] = [
                    [
                        '_attributes' => [
                            'typeCode' => 'DRIV'
                        ],
                        'observation' => [
                            '_attributes' => [
                                'classCode' => 'OBS',
                                'moodCode' => 'EVN'
                            ],
                            'id' => [
                                '_attributes' => [
                                    'root' => $disability['id']
                                ]
                            ],
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => '2.16.840.1.113883.6.96',
                                    'codeSystemName' => 'SNOMED CT',
                                    'code' => '248536006',
                                    'displayName' => 'Discapacidades'
                                ]
                            ],
                            'statusCode' => [
                                '_attributes' => [
                                    'code' => 'completed'
                                ]
                            ],
                            'value' => [
                                '_attributes' => [
                                    'xsi:type' => 'CD',
                                    'codeSystem' => '2.16.840.1.113883.6.254',
                                    'codeSystemName' => 'CIF',
                                    'code' => $disability['disabilityValue'],
                                    'displayName' => $disability['disabilityName']
                                ]
                            ],
                        ]
                    ]
                ];
            }
        }

        $disabilitiesComponent = [
            'section' => [
                'templateId' => [
                    '_attributes' => [
                        'root' => empty($disabilities) ? null : '2.16.480.1.113883.10.20.22.2.14',
                    ]
                ],
                'code' => empty($disabilities) ? null : [
                    '_attributes' => [
                        'codeSystem' => '2.16.840.1.113883.6.96',
                        'codeSystemName' => 'SNOMED CT',
                        'code' => '21134002',
                        'displayName' => 'Discapacidades'
                    ]
                ],
                'title' => empty($disabilities) ? null : 'Discapacidades',
                'text' => $patient->attributes->disabilitiesDescription ?? null,
                'entry' => empty($disabilities) ? null : $disabilities
            ]
        ];
        return $disabilitiesComponent;
    }

    private static function Medications($patient) 
    {
        $drugsInfo = $patient->attributes->drugs;
        $drugsRows = [];
        $medications = [];

        if (!is_null($drugsInfo)) {

            foreach ($drugsInfo as $drugs) {
                $drugsRows[] = [
                    'drugName' => $drugs['drugName'] ?? null,
                    'administrationRoute' => $drugs['administrationRoute'] ?? null,
                    'dose' => $drugs['dose'] ?? null,
                    'startDate' => $drugs['startDate'] ?? null,
                    'endDate' => $drugs['endDate'] ?? null,
                    'observations' => $drugs['observations'] ?? null,
                ];
            }

            $medications = [
                'section' => [
                    'templateId' => [''],
                    'code' => [''],
                    'title' => 'Historial farmacológico',
                    'text' => [
                        'table' => [
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['Medicamentos'],
                                        ['Vias de administración'],
                                        ['Dosis'],
                                        ['Fecha de inicio'],
                                        ['Fecha de fin'],
                                        ['Obs. prescripción']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($row) {
                                    return [
                                        'td' => array_map(function ($cell) {
                                            return [$cell ?? ''];
                                        }, $row)
                                    ];
                                }, $drugsRows)
                            ]
                        ]
                    ],
                    'entry' => [
                        'substanceAdministration' => [
                            'text' => '',
                            'statusCode' => [''],
                            'routeCode' => [''],
                            'doseQuantity' => [
                                'center' => [''],
                            ],
                            'effectiveTime' => [
                                'low' => [''],
                                'high' => [''],
                            ],
                            'consumable' => [
                                'manufacturedProduct' => [
                                    'manufacturedMaterial' => [
                                        'code' => [''],
                                    ],
                                ],
                            ],
                        ],
                    ]
                ]
            ];
        }

        return $medications;
    }

    private static function InitialManifestations($patient) {
        $components = [];
        $initialManifestations = $patient->attributes->initialManifestation;
    
        if (!is_null($initialManifestations)) {
            $components[] = [
                'component' => [
                    'section' => [
                        'templateId' => [
                            '_attributes' => [
                                'root' => '1.3.6.1.4.1.19376.1.5.3.1.1.13.2.1'
                            ]
                        ],
                        'code' => [
                            '_attributes' => [
                                'codeSystem' => '2.16.840.1.113883.6.1',
                                'codeSystemName' => 'LOINC',
                                'code' => '10154-3',
                                'displayName' => 'Manifestaciones Iniciales'
                            ]
                        ],
                        'title' => 'Manifestaciones iniciales',
                        'text' => $initialManifestations
                    ]
                ]
            ];
        }
    
        return $components;
    }
    

    private static function DiagnosticImpression($patient) {
        $components = [];
        $diagnosticImpression = $patient->attributes->diagnosticImpression;
    
        if (!is_null($diagnosticImpression)) {
            $components[] = [
                'component' => [
                    'section' => [
                        'templateId' => [
                            '_attributes' => [
                                'root' => '2.16.840.1.113883.10.20.22.2.8'
                            ]
                        ],
                        'code' => [
                            '_attributes' => [
                                'codeSystem' => '2.16.840.1.113883.6.1',
                                'codeSystemName' => 'LOINC',
                                'code' => '51848-0',
                                'displayName' => 'Impresión diagnóstica'
                            ]
                        ],
                        'title' => 'Impresión diagnóstica',
                        'text' => $diagnosticImpression
                    ]
                ]
            ];
        }
    
        return $components;
    }
    

    private static function Diagnostics($patient) {
        $components = [];
        $diagnostics = $patient->attributes->diagnostics;
    
        if (!is_null($diagnostics)) {
            $rows = [];
    
            foreach ($diagnostics as $problem) {
                $rows[] = [
                    $problem['diagnosisType'] ?? null,
                    $problem['diagnosisDate'] ?? null,
                    $problem['cieCode'] ?? null,
                    $problem['diagnosisName'] ?? null,
                    $problem['observations'] ?? null
                ];
            }
    
            $components[] = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.2.5'
                        ]
                    ],
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.2.5.1'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '11450-4',
                            'displayName' => 'Lista de Problemas'
                        ]
                    ],
                    'title' => 'Diagnósticos y problemas de salud',
                    'text' => [
                        'table' => [
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['Tipo'],
                                        ['Fecha'],
                                        ['CIE'],
                                        ['Diagnóstico'],
                                        ['Observaciones']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($row) {
                                    return [
                                        'td' => array_map(function ($cell) {
                                            return [$cell ?? ''];
                                        }, $row)
                                    ];
                                }, $rows)
                            ]
                        ]
                    ]
                ]
            ];
    
            foreach ($diagnostics as $problem) {
                $components[] = [
                    'entry' => [
                        '_attributes' => [
                            'typeCode' => 'DRIV'
                        ],
                        'act' => [
                            '_attributes' => [
                                'classCode' => 'ACT',
                                'moodCode' => 'EVN'
                            ],
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => '2.16.840.1.113883.5.6',
                                    'code' => 'CONC',
                                    'displayName' => 'Concern'
                                ]
                            ],
                            'statusCode' => [
                                '_attributes' => [
                                    'code' => 'completed'
                                ]
                            ],
                            'effectiveTime' => [
                                'low' => [
                                    '_attributes' => [
                                        'value' => $problem['problemStartDate']  ?? null
                                    ]
                                ],
                                'high' => [
                                    '_attributes' => [
                                        'value' => $problem['problemEndDate']  ?? null
                                    ]
                                ]
                            ],
                            'entryRelationship' => [
                                '_attributes' => [
                                    'typeCode' => 'SUBJ'
                                ],
                                'observation' => [
                                    '_attributes' => [
                                        'classCode' => 'OBS',
                                        'moodCode' => 'EVN'
                                    ],
                                    'id' => [
                                        '_attributes' => [
                                            'root' => $problem['problemId']  ?? null,
                                            'extension' => $problem['affectionNumber']  ?? null
                                        ]
                                    ],
                                    'code' => [
                                        '_attributes' => [
                                            'codeSystem' => '2.16.840.1.113883.6.96',
                                            'codeSystemName' => 'SNOMED CT',
                                            'code' => '282291009',
                                            'displayName' => 'Diagnóstico'
                                        ]
                                    ],
                                    'text' => $problem['diagnosisText']  ?? null,
                                    'statusCode' => [
                                        '_attributes' => [
                                            'code' => 'completed'
                                        ]
                                    ],
                                    'value' => [
                                        '_attributes' => [
                                            'xsi:type' => 'CE',
                                            'codeSystem' => '2.16.840.1.113883.6.3',
                                            'codeSystemName' => 'ICD-10',
                                            'code' => $problem['diagnosisCode']  ?? null,
                                            'displayName' => $problem['diagnosisDisplayName'] ?? null
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }
    
        return $components;
    }
    

    private static function Procedures($patient)
    {
        $components = [];
        $procedures = $patient->attributes->procedures;

        if (!is_null($procedures)) {
            $rows = [];

            foreach ($procedures as $procedure) {
                $rows[] = [
                    $procedure['cie9Code'] ?? null,
                    $procedure['procedureName'] ?? null,
                    $procedure['status'] ?? null,
                    is_null($procedure['isActive']) ? null : ($procedure['isActive'] ? 'Si' : 'No'),
                    $procedure['observations'] ?? null
                ];
            }

            $components[] = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.1.12'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '47519-4',
                            'displayName' => 'Historial de procedimientos'
                        ]
                    ],
                    'title' => 'Procedimientos quirúrgicos y terapéuticos',
                    'text' => [
                        'table' => [
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['CIE9-MC'],
                                        ['Procedimiento'],
                                        ['Estado'],
                                        ['Activo'],
                                        ['Observaciones']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($row) {
                                    return [
                                        'td' => array_map(function ($cell) {
                                            return [$cell ?? ''];
                                        }, $row)
                                    ];
                                }, $rows)
                            ]
                        ]
                    ]
                ]
            ];

            foreach ($procedures as $procedure) {
                $components[] = [
                    'entry' => [
                        '_attributes' => [
                            'typeCode' => 'DRIV'
                        ],
                        'procedure' => [
                            '_attributes' => [
                                'classCode' => 'PROC',
                                'moodCode' => 'EVN'
                            ],
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => '2.16.840.1.113883.6.2',
                                    'codeSystemName' => 'ICD-9CM',
                                    'code' => $procedure['procedureCode'] ?? null,
                                    'displayName' => $procedure['displayName'] ?? null
                                ],
                                'originalText' => $procedure['pricedureDescription'] ?? null
                            ],
                            'statusCode' => [
                                '_attributes' => [
                                    'code' => 'completed'
                                ]
                            ],
                            'effectiveTime' => [
                                '_attributes' => [
                                    'value' => $procedure['effectiveTime'] ?? null
                                ]
                            ],
                            'performer' => [
                                'assignedEntity' => [
                                    'id' => [
                                        '_attributes' => [
                                            'root' => '2.16.840.1.113883.3.215.12.18',
                                            'extension' => $procedure['performerId'] ?? null
                                        ]
                                    ],
                                    'assignedPerson' => [
                                        'name' => [
                                            'given' => $procedure['performerName']['given'] ?? null,
                                            'first_surname' => $procedure['performerName']['first_surname'] ?? null,
                                            'second_surname' => $procedure['performerName']['second_surname'] ?? null
                                        ]
                                    ]
                                ]
                            ],
                            'participant' => [
                                'participantRole' => [
                                    '_attributes' => [
                                        'classCode' => 'SDLOC'
                                    ],
                                    'code' => [
                                        '_attributes' => [
                                            'codeSystem' => '2.16.840.1.113883.6.259',
                                            'codeSystemName' => 'HealthcareServiceLocation',
                                            'code' => $procedure['locationCode'] ?? null,
                                            'displayName' => $procedure['locationName'] ?? null
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }

        return $components;
    }

    public static function MedicationsDuringCare($patient) {
        $components = [];
        $medications = $patient->attributes->medicationsDuringCare;
    
        if (!is_null($medications)) {
            $rows = [];
    
            foreach ($medications as $medication) {
                $rows[] = [
                    $medication['medicationName'] ?? null,
                    $medication['administrationRoute'] ?? null,
                    $medication['dose'] ?? null,
                    $medication['startDate'] ?? null,
                    $medication['endDate'] ?? null,
                    $medication['prescriptionObservations'] ?? null
                ];
            }
    
            $components[] = [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.2.38'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '29549-3',
                            'displayName' => 'Medicamentos administrados'
                        ]
                    ],
                    'title' => 'Terapéutica empleada',
                    'text' => [
                        'table' => [
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['Medicamento'],
                                        ['Vía de administración'],
                                        ['Dosis'],
                                        ['Fecha de inicio'],
                                        ['Fecha de fin'],
                                        ['Obs. prescripción']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($row) {
                                    return [
                                        'td' => array_map(function ($cell) {
                                            return [$cell ?? ''];
                                        }, $row)
                                    ];
                                }, $rows)
                            ]
                        ]
                    ]
                ];
    
            foreach ($medications as $medication) {
                $components[] = [
                    'entry' => [
                        'substanceAdministration' => [
                            '_attributes' => [
                                'classCode' => 'SBADM',
                                'moodCode' => 'EVN',
                                'negationInd' => 'false'
                            ],
                            'text' => $medication['prescriptionObservations'] ?? null,
                            'statusCode' => [
                                '_attributes' => [
                                    'code' => 'completed'
                                ]
                            ],
                            'routeCode' => [
                                '_attributes' => [
                                    'codeSystem' => '2.16.840.1.113883.3.215.12.12',
                                    'codeSystemName' => 'Vía de Administración CBM',
                                    'code' => $medication['administrationRouteCode'] ?? null,
                                    'displayName' => $medication['administrationRouteDisplayName'] ?? null
                                ]
                            ],
                            'doseQuantity' => [
                                'center' => [
                                    '_attributes' => [
                                        'value' => $medication['dose'] ?? null
                                    ]
                                ]
                            ],
                            'effectiveTime' => [
                                'low' => [
                                    '_attributes' => [
                                        'value' => $medication['startDate'] ?? null
                                    ]
                                ],
                                'high' => [
                                    '_attributes' => [
                                        'value' => $medication['endDate'] ?? null
                                    ]
                                ]
                            ],
                            'consumable' => [
                                'manufacturedProduct' => [
                                    '_attributes' => [
                                        'classCode' => 'MANU'
                                    ],
                                    'manufacturedMaterial' => [
                                        'code' => [
                                            '_attributes' => [
                                                'codeSystem' => '2.16.840.1.113883.3.215.12.8',
                                                'codeSystemName' => 'Cuadro Básico de Medicamentos',
                                                'code' => $medication['medicationCode'] ?? null,
                                                'displayName' => $medication['medicationDisplayName'] ?? null
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }
    
        return $components;
    }

    private static function EvolutionDuringCare($patient)
    {
        $evolution = [];
        if (!is_null($patient->attributes->evolution)) {
            $evolution = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '1.3.6.1.4.1.19376.1.5.3.1.3.5'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '8648-8',
                            'displayName' => 'Evolución'
                        ]
                    ],
                    'title' => ['Evolución durante la atención'],
                    'text' => $patient->attributes->evolution,
                ],
            ];
        }
        return $evolution;
    }

    private static function VitalSigns($patient) {
        $components = [];
        $vitalSigns = $patient->attributes->vitalSigns;
    
        if (!is_null($vitalSigns)) {
            $rows = [];
    
            foreach ($vitalSigns as $sign) {
                $rows[] = [
                    'date' => $sign['date'] ?? null,
                    'sign' => $sign['sign'] ?? null,
                    'value' => $sign['value'] ?? null,
                    'observations' => $sign['observations'] ?? null
                ];
            }
    
            $components[] = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.2.4'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '8716-3',
                            'displayName' => 'Signos Vitales'
                        ]
                    ],
                    'title' => 'Signos vitales',
                    'text' => [
                        'table' => [
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['Fecha'],
                                        ['Signo'],
                                        ['Valor'],
                                        ['Observaciones']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($row) {
                                    return [
                                        'td' => array_map(function ($cell) {
                                            return [$cell ?? ''];
                                        }, $row)
                                    ];
                                }, $rows)
                            ]
                        ]
                    ]
                ]
            ];
    
            foreach ($vitalSigns as $sign) {
                $components[] = [
                    'entry' => [
                        'organizer' => [
                            '_attributes' => [
                                'classCode' => 'CLUSTER',
                                'moodCode' => 'EVN'
                            ],
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => '2.16.840.1.113883.6.96',
                                    'codeSystemName' => 'SNOMED CT',
                                    'code' => '46680005',
                                    'displayName' => 'Signos vitales'
                                ]
                            ],
                            'statusCode' => [
                                '_attributes' => [
                                    'code' => 'completed'
                                ]
                            ],
                            'component' => [
                                'observation' => [
                                    '_attributes' => [
                                        'classCode' => 'OBS',
                                        'moodCode' => 'EVN'
                                    ],
                                    'code' => [
                                        '_attributes' => [
                                            'codeSystem' => '2.16.840.1.113883.6.1',
                                            'codeSystemName' => 'LOINC',
                                            'code' => $sign['code'] ?? null,
                                            'displayName' => $sign['sign'] ?? null
                                        ]
                                    ],
                                    'statusCode' => [
                                        '_attributes' => [
                                            'code' => 'completed'
                                        ]
                                    ],
                                    'effectiveTime' => [
                                        '_attributes' => [
                                            'value' => $sign['date'] ?? null
                                        ]
                                    ],
                                    'value' => [
                                        '_attributes' => [
                                            'xsi:type' => 'PQ',
                                            'value' => $sign['value'] ?? null,
                                            'unit' => $sign['unit'] ?? null
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }
    
        return $components;
    }

    public static function LaboratoryResults($patient) {
        $components = [];
        $labTests = $patient->attributes->labTests;
    
        if (!is_null($labTests)) {
            $rows = [];
    
            foreach ($labTests as $test) {
                $rows[] = [
                    $test['testName'] ?? null,
                    $test['testDate'] ?? null,
                    $test['result'] ?? null,
                    $test['range'] ?? null
                ];
            }
    
            $components[] = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.2.3.1'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '30954-2',
                            'displayName' => 'Estudios de laboratorio'
                        ]
                    ],
                    'title' => 'Estudios de laboratorio',
                    'text' => [
                        'table' => [
                            'thead' => [
                                'tr' => [
                                    'th' => [
                                        ['Prueba'],
                                        ['Fecha de resultado'],
                                        ['Resultado'],
                                        ['Rango']
                                    ]
                                ]
                            ],
                            'tbody' => [
                                'tr' => array_map(function ($row) {
                                    return [
                                        'td' => array_map(function ($cell) {
                                            return [$cell ?? ''];
                                        }, $row)
                                    ];
                                }, $rows)
                            ]
                        ]
                    ]
                ]
            ];
    
            foreach ($labTests as $test) {
                $components[] = [
                    'entry' => [
                        'organizer' => [
                            '_attributes' => [
                                'classCode' => 'BATTERY',
                                'moodCode' => 'EVN'
                            ],
                            'code' => [
                                '_attributes' => [
                                    'codeSystem' => '--OID del sistema de codificación--',
                                    'codeSystemName' => '--Nombre del sistema de codificación--',
                                    'code' => $test['batteryId'] ?? null,
                                    'displayName' => $test['batteryName'] ?? null
                                ]
                            ],
                            'statusCode' => [
                                '_attributes' => [
                                    'code' => 'completed'
                                ]
                            ],
                            'component' => [
                                'observation' => [
                                    '_attributes' => [
                                        'classCode' => 'OBS',
                                        'moodCode' => 'EVN'
                                    ],
                                    'code' => [
                                        '_attributes' => [
                                            'codeSystem' => '--OID del sistema de codificación--',
                                            'codeSystemName' => '--Nombre del sistema de codificación--',
                                            'code' => $test['testCode'] ?? null,
                                            'displayName' => $test['testDisplayName'] ?? null
                                        ]
                                    ],
                                    'statusCode' => [
                                        '_attributes' => [
                                            'code' => 'completed'
                                        ]
                                    ],
                                    'effectiveTime' => [
                                        '_attributes' => [
                                            'value' => $test['testDate'] ?? null
                                        ]
                                    ],
                                    'value' => [
                                        '_attributes' => [
                                            'xsi:type' => 'PQ',
                                            'value' => $test['value'] ?? null,
                                            'unit' => $test['unit'] ?? null
                                        ]
                                    ],
                                    'referenceRange' => [
                                        'observationRange' => [
                                            'text' => $test['referenceRange'] ?? null
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }
    
        return $components;
    }
    
    private static function TreatmentPlan($patient)
    {
        $treatmentPlan = [];
        if (!is_null($patient->attributes->treatmentPlan))
            $treatmentPlan = [
                'section' => [
                    'templateId' => [
                        '_attributes' => [
                            'root' => '2.16.840.1.113883.10.20.22.2.10'
                        ]
                    ],
                    'code' => [
                        '_attributes' => [
                            'codeSystem' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '18776-5',
                            'displayName' => 'Plan de tratamiento'
                        ]
                    ],
                    'title' => 'Plan de tratamiento y recomendaciones terapéuticas',
                    'text' => $patient->attributes->treatmentPlan,
                ]
            ];
        return $treatmentPlan;
    }

    private static function HealthPronostics($patient)
    {
        $healthPronostics = [];
        if (!is_null($patient->attributes->healthPronostics)) {
            $healthPronostics = [
                'section' => [
                    'code' => [
                        '_attributes' => [
                            'code' => '2.16.840.1.113883.6.1',
                            'codeSystemName' => 'LOINC',
                            'code' => '47420-5',
                            'displayName' => 'Evaluación del Estado Funcional'
                        ]
                    ],
                    'title' => 'Pronostico de salud del paciente',
                    'text' => $patient->attributes->healthPronostics,
                ]
            ];
        }
        return $healthPronostics;
    }
}
