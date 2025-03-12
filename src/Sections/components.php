<?php

class ComponentsSection extends Patient
{
    static function getComponentsSection()
    {
        $components = [
            'component' => [
                'structuredBody' => [
                    'component' => [
                        [
                            self::ReasonComponent()
                        ],
                        [
                            self::Affiliations()
                        ],
                        [
                            self::Allergies()
                        ],
                        [
                            self::FamilyHistory()
                        ],
                        [
                            self::NonPathologicalHistory()
                        ],
                        [
                            self::PathologicalHistory()
                        ],
                        [
                            self::Disabilites()
                        ],
                        [
                            self::Medications()
                        ],
                        [
                            self::InitialManifestations()
                        ],
                        [
                            self::DiagnosticImpresion()
                        ],
                        [
                            self::Diagnostics()
                        ],
                        [
                            self::Procedures()
                        ],
                        [
                            self::MedicationsDuringCare()
                        ],
                        [
                            self::EvolutionDuringCare()
                        ],
                        [
                            self::VitalSigns()
                        ],
                        [
                            self::LaboratoryResults()
                        ],
                        [
                            self::TreatmentPlan()
                        ],
                        [
                            self::HealthPronostics()
                        ],
                    ]
                ]
            ]
        ];

        return $components;
    }

    private static function ReasonComponent()
    {
        $reasonComponent = [
            'section' => [
                'templateId' => [
                    '_attributes' => [
                        'root' => ''
                    ]
                ],
                'code' => [
                    '_attributes' => [
                        'codeSystem' => '',
                        'codeSystemName' => '',
                        'code' => '',
                        'displayName' => ''
                    ]
                ],
                'title' => '',
                'text' => ''
            ]
        ];

        return $reasonComponent;
    }

    private static function Affiliations()
    {
        $affiliations = [
            'section' => [
                'templateId' => [
                    '_attributes' => [
                        'root' => ''
                    ]
                ],
                'code' => [
                    '_attributes' => [
                        'codeSystem' => '',
                        'codeSystemName' => '',
                        'code' => '',
                        'displayName' => ''
                    ]
                ],
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], [], [], [], []]
                            ]
                        ],
                        'tbody' => [
                            'tr' => [
                                'td' => [[], [], [], [], [], []]
                            ]
                        ]
                    ]
                ],
                'entry' => [
                    'act' => [
                        'code' => [''],
                        'statusCode' => [''],
                        'entryRelationship' => [
                            'act' => [
                                'code' => [''],
                                'statusCode' => [''],
                                'performer' => [
                                    'time' => [''],
                                    'assignedEntity' => [
                                        'id' => [''],
                                        'code' => [''],
                                        'representedOrganization' => [
                                            'name' => [''],
                                        ],
                                    ],
                                ],
                                'participant' => [
                                    'time' => [
                                        'low' => [''],
                                        'high' => [''],
                                    ],
                                    'participantRole' => [
                                        'id' => [''],
                                        'code' => [''],
                                    ],
                                ],
                                'participant' => [
                                    'participantRole' => [
                                        'id' => [''],
                                    ],
                                ],
                            ]
                        ],
                    ]
                ]
            ]
        ];

        return $affiliations;
    }

    private static function Allergies()
    {
        $allergies = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], [], [], [], []]
                            ]
                        ],
                        'tbody' => [
                            'tr' => [
                                'td' => [[], [], [], [], [], []]
                            ]
                        ]
                    ]
                ],
            ]
        ];

        return $allergies;
    }

    private static function FamilyHistory()
    {
        $familiHistory = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => [''],
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], []]
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

        return $familiHistory;
    }

    private static function NonPathologicalHistory()
    {
        $nonPathologicalHistory = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => [
                    'paragraph' => [
                        [''],
                        [
                            ['table' => [
                                'thead' => [
                                    'tr' => [
                                        'th' => [[], [], []]
                                    ]
                                ],
                                'tbody' => [
                                    'tr' => [
                                        'td' => [[], [], []]
                                    ]
                                ]
                            ]],
                            ['table' => [
                                'thead' => [
                                    'tr' => [
                                        'th' => [[], [], []]
                                    ]
                                ],
                                'tbody' => [
                                    'tr' => [
                                        'td' => [[], [], []]
                                    ]
                                ]
                            ]],
                            ['table' => [
                                'thead' => [
                                    'tr' => [
                                        [
                                            'tr' => [[
                                                'th' => ['']
                                            ]]
                                        ],
                                        [
                                            'th' => [[], [], []]
                                        ]
                                    ]
                                ],
                                'tbody' => [
                                    'tr' => [
                                        'td' => [[], [], []]
                                    ]
                                ]
                            ]],
                        ],
                        ['']
                    ],
                ],
                'entry' => [
                    [
                        'observation' => [
                            'code' => [''],
                            'effectiveTime' => [''],
                            'value' => [''],
                        ],
                    ],
                    [
                        'observation' => [
                            'id' => [''],
                            'code' => [''],
                            'statusCode' => [''],
                            'effectiveTime' => [
                                'low' => [''],
                                'high' => [''],
                            ],
                            'value' => [''],
                        ],
                    ],
                    [
                        'observation' => [
                            'id' => [''],
                            'code' => [''],
                            'statusCode' => [''],
                            'effectiveTime' => [
                                'low' => [''],
                                'high' => [''],
                            ],
                            'value' => [''],
                        ],
                    ],
                ]
            ]
        ];

        return $nonPathologicalHistory;
    }

    private static function PathologicalHistory()
    {
        $pathologicalHistory = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], []]
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
                    [
                        'observation' => [
                            'code' => [''],
                            'statusCode' => [''],
                            'effectiveTime' => [
                                'low' => [''],
                                'high' => [''],
                            ],
                            'value' => [''],
                        ],
                    ],
                    [
                        'observation' => [
                            'code' => [''],
                            'statusCode' => [''],
                            'effectiveTime' => [
                                'low' => [''],
                                'high' => [''],
                            ],
                            'value' => [''],
                        ],
                    ],
                    [
                        'observation' => [
                            'code' => [''],
                            'statusCode' => [''],
                            'effectiveTime' => [
                                'low' => [''],
                                'high' => [''],
                            ],
                            'value' => [''],
                        ],
                    ],
                    [
                        'observation' => [
                            'code' => [''],
                            'statusCode' => [''],
                            'effectiveTime' => [
                                'low' => [''],
                                'high' => [''],
                            ],
                            'value' => [''],
                        ],
                    ],
                ]
            ]
        ];

        return $pathologicalHistory;
    }

    private static function Disabilites()
    {
        $disabilities = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => '',
                'entry' => [
                    'observation' => [
                        'id' => [''],
                        'code' => [''],
                        'statusCode' => [''],
                        'value' => [''],
                    ]
                ]
            ]
        ];

        return $disabilities;
    }

    private static function Medications()
    {
        $medications = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], [], [], [], []]
                            ]
                        ],
                        'tbody' => [
                            'tr' => [
                                'td' => [[], [], [], [], [], []]
                            ]
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

        return $medications;
    }

    private static function InitialManifestations()
    {
        $initialManifestations = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => '',
            ]
        ];

        return $initialManifestations;
    }

    private static function DiagnosticImpresion()
    {
        $diagnosticImpresion = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => '',
            ]
        ];

        return $diagnosticImpresion;
    }

    private static function Diagnostics()
    {
        $diagnostics = [
            'section' => [
                'templateId' => [[''], ['']],
                'code' => [''],
                'title' => '',
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], [], [], []]
                            ]
                        ],
                        'tbody' => [
                            'tr' => [
                                'td' => [[], [], [], [], []]
                            ]
                        ]
                    ]
                ],
                'entry' => [
                    'act' => [
                        'code' => [''],
                        'statusCode' => [''],
                        'effectiveTime' => [
                            'low' => [''],
                            'high' => [''],
                        ],
                        'entryRelationship' => [
                            'observation' => [''],
                            'id' => [''],
                            'code' => [''],
                            'text' => [''],
                            'statusCode' => [''],
                            'value' => [''],
                        ],
                    ]
                ]
            ]
        ];

        return $diagnostics;
    }

    private static function Procedures()
    {
        $procedures  = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => [''],
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], [], [], []]
                            ]
                        ],
                        'tbody' => [
                            'tr' => [
                                'td' => [[], [], [], [], []]
                            ]
                        ]
                    ]
                ],
                'entry' => [
                    'procedure' => [
                        'code' => [
                            'originalText' => [''],
                        ],
                        'statusCode' => [''],
                        'effectiveTime' => [''],
                        'performer' => [
                            'assignedEntity' => [
                                'id' => [''],
                                'assignedPerson' => [''],
                            ],
                        ],
                        'participant' => [
                            'participantRole' => [
                                'code' => [''],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $procedures;
    }

    private static function MedicationsDuringCare()
    {
        $medicationsDuringCare = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], [], [], [], []]
                            ]
                        ],
                        'tbody' => [
                            'tr' => [
                                'td' => [[], [], [], [], [], []]
                            ]
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
            ],
        ];

        return $medicationsDuringCare;
    }

    private static function EvolutionDuringCare()
    {
        $evolutionDuringCare = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => [''],
                'text' => '',
            ],
        ];

        return $evolutionDuringCare;
    }

    private static function VitalSigns()
    {
        $vitalSigns = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], [], []]
                            ]
                        ],
                        'tbody' => [
                            'tr' => [
                                'td' => [[], [], [], []]
                            ]
                        ]
                    ]
                ],
                'entry' => [
                    'organizer' => [
                        'code' => [''],
                        'statusCode' => [''],
                        'component' => [
                            'observation' => [
                                'code' => [''],
                                'statusCode' => [''],
                                'effectiveTime' => [''],
                                'value' => [''],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $vitalSigns;
    }

    private static function LaboratoryResults()
    {
        $laboratiryResults = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => [
                    'table' => [
                        'thead' => [
                            'tr' => [
                                'th' => [[], [], [], []]
                            ]
                        ],
                        'tbody' => [
                            'tr' => [
                                'td' => [[], [], [], []]
                            ]
                        ]
                    ]
                ],
                'entry' => [
                    'organizer' => [
                        'code' => [''],
                        'statusCode' => [''],
                        'component' => [
                            'observation' => [
                                'code' => [''],
                                'statusCode' => [''],
                                'effectiveTime' => [''],
                                'value' => [''],
                                'referenceRange' => [
                                    'observationRange' => [
                                        'text' => '',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $laboratiryResults;
    }

    private static function TreatmentPlan()
    {
        $treatmentPlan = [
            'section' => [
                'templateId' => [''],
                'code' => [''],
                'title' => '',
                'text' => '',
            ]
        ];

        return $treatmentPlan;
    }

    private static function HealthPronostics()
    {
        $healthPronostics = [
            'section' => [
                'code' => [''],
                'title' => '',
                'text' => '',
            ]
        ];

        return $healthPronostics;
    }
}
