<?php

class Attributes
{
    ################### HEADER  #########################
    public $header = [
        'system' => [
            'id' => null,
            'uniqueId' => null,
            'name' => null
        ],
        'time' => null,
        'confidentiality' => null,
        'version' => null
    ];

    ################### PATIENT INFO #####################
    public $patient = [
        'id' => null,
        'curp' => null,
        'aditionalId' => null,
        'nationality' => null,
        'age' => null,
        'address' => [
            'fullAddress' => null,
            'streetNameType' => null,
            'streetName' => null,
            'houseNumberNumeric' => null,
            'houseNumber' => null,
            'unitId' => null,
            'unitType' => null,
            'deliveryInstallationType' => null,
            'deliveryInstallationArea' => null,
            'precint' => null,
            'county' => null,
            'state' => null,
            'postalCode' => null,
            'country' => null
        ],
        'phone' => null,
        'email' => null,
        'name' => [
            'given' => null,
            'first_surname' => null,
            'second_surname' => null
        ],
        'gender' => null,
        'birtTime' => null,
        'maritalStatus' => null,
        'religion' => null,
        'ethnicity' => null,
        'birtplace' => null,
        'guardian' => [
            'code' => null,
            'address' => [
                'fullAddress' => null,
                'streetNameType' => null,
                'streetName' => null,
                'houseNumberNumeric' => null,
                'houseNumber' => null,
                'unitId' => null,
                'unitType' => null,
                'deliveryInstallationType' => null,
                'deliveryInstallationArea' => null,
                'precint' => null,
                'county' => null,
                'state' => null,
                'postalCode' => null,
                'country' => null
            ],
            'phone' => null,
            'email' => null,
            'name' => [
                'given' => null,
                'first_surname' => null,
                'second_surname' => null
            ]
        ],
        'provider' => [
            'id' => null,
            'name' => null,
            'phone' => null,
            'email' => null,
            'address' => [
                'fullAddress' => null,
                'streetNameType' => null,
                'streetName' => null,
                'houseNumberNumeric' => null,
                'houseNumber' => null,
                'unitId' => null,
                'unitType' => null,
                'deliveryInstallationType' => null,
                'deliveryInstallationArea' => null,
                'precint' => null,
                'county' => null,
                'state' => null,
                'postalCode' => null,
                'country' => null
            ],
        ]
    ];

    ################### INFORMATION RECIPIENT ####################
    public $informationRecipient = [
        'professionalId' => null,
        'phone' => null,
        'email' => null,
        'address' => [
            'fullAddress' => null,
            'streetNameType' => null,
            'streetName' => null,
            'houseNumberNumeric' => null,
            'houseNumber' => null,
            'unitId' => null,
            'unitType' => null,
            'deliveryInstallationType' => null,
            'deliveryInstallationArea' => null,
            'precint' => null,
            'county' => null,
            'state' => null,
            'postalCode' => null,
            'country' => null
        ],
        'name' => [
            'given' => null,
            'first_surname' => null,
            'second_surname' => null
        ],
        'organization' => [
            'id' => null,
            'cluesId' => null,
            'name' => null
        ]
    ];

    #################### AUTHOR ###################################
    public $author = [
        'time' => null,
        'id' => null,
        'softwareName' => null,
        'manufacturer' => null,
        'phone' => null,
        'email' => null,
        'address' => [
            'fullAddress' => null,
            'streetNameType' => null,
            'streetName' => null,
            'houseNumberNumeric' => null,
            'houseNumber' => null,
            'unitId' => null,
            'unitType' => null,
            'deliveryInstallationType' => null,
            'deliveryInstallationArea' => null,
            'precint' => null,
            'county' => null,
            'state' => null,
            'postalCode' => null,
            'country' => null
        ],
        'organizationId' => null,
        'organizationName' => null
    ];

    ############### DATA ENTERER ###################
    public $enterer = [
        'time' => null,
        'id' => null,
        'person' => [
            'given' => null,
            'first_surname' => null,
            'second_surname' => null
        ],
    ];

    ############## CUSTODIAN ##########################
    public $custodian = [
        'id' => null,
        'name' => null,
        'phone' => null,
        'email' => null,
        'address' => [
            'fullAddress' => null,
            'streetNameType' => null,
            'streetName' => null,
            'houseNumberNumeric' => null,
            'houseNumber' => null,
            'unitId' => null,
            'unitType' => null,
            'deliveryInstallationType' => null,
            'deliveryInstallationArea' => null,
            'precint' => null,
            'county' => null,
            'state' => null,
            'postalCode' => null,
            'country' => null
        ],

    ];

    ##################### LEGAL AUTHENTICATOR ###########################
    public $legalAuthenticator = [
        'time' => null,
        'signature' => null,
        'entity' => [
            'professionalId' => null,
            'address' => [
                'fullAddress' => null,
                'streetNameType' => null,
                'streetName' => null,
                'houseNumberNumeric' => null,
                'houseNumber' => null,
                'unitId' => null,
                'unitType' => null,
                'deliveryInstallationType' => null,
                'deliveryInstallationArea' => null,
                'precint' => null,
                'county' => null,
                'state' => null,
                'postalCode' => null,
                'country' => null
            ],
            'phone' => null,
            'email' => null,
            'person' => [
                'given' => null,
                'first_surname' => null,
                'second_surname' => null
            ]
        ]
    ];

    public $componentOf = [
        'id' => null,
        'encounterType' => null,
        'time' => [
            'low' => null,
            'high' => null
        ],
        'professionalId' => null,
        'personName' => [
            'given' => null,
            'first_surname' => null,
            'second_surname' => null
        ],
        'organization' => [
            'id' => null,
            'name' => null
        ],
        'dischargeDispositionCode' => null,
        'location' => [
            'clues' => null,
            'sanitaryLicense' => null,
            'areaCode' => null,
            'address' => [
                'fullAddress' => null,
                'streetNameType' => null,
                'streetName' => null,
                'houseNumberNumeric' => null,
                'houseNumber' => null,
                'unitId' => null,
                'unitType' => null,
                'deliveryInstallationType' => null,
                'deliveryInstallationArea' => null,
                'precint' => null,
                'county' => null,
                'state' => null,
                'postalCode' => null,
                'country' => null
            ]
        ]
    ];

    ##################### DOCUMENTATION OF ###############################
    public $documentationOf = [
        'id' => null,
        'code' => null,
        'time' => [
            'low' => null,
            'high' => null,
        ],
        'doctorCode' => null,
        'professionalId' => null,
        'person' => [
            'name' => null,
            'first_surname' => null,
            'second_surname' => null
        ],
        'organization' => [
            'clues' => null,
            'sanitaryLicense' => null,
            'name' => null,
            'phone' => null,
            'email' => null,
            'address' => [
                'fullAddress' => null,
                'streetNameType' => null,
                'streetName' => null,
                'houseNumberNumeric' => null,
                'houseNumber' => null,
                'unitId' => null,
                'unitType' => null,
                'deliveryInstallationType' => null,
                'deliveryInstallationArea' => null,
                'precint' => null,
                'county' => null,
                'state' => null,
                'postalCode' => null,
                'country' => null
            ]
        ]
    ];

    ####################### COMPONENTS #####################################
    public $reasonComponent = [
        'reason' => null,
        'detail' => null,
    ];

    public $affiliationsComponents = null;
    public $allergies = null;
    public $disabilitiesDescription = null, $disabilities = null;
    public $evolution = null;
    public $healthPronostics = null;
    public $treatmentPlan = null;
    public $drugs = null;
    public $familyHistory = null;
    public $procedures = null;
    public $diagnostics = null;
    public $diagnosticImpression = null;
    public $initialManifestation = null;
    public $vitalSigns = null;
    public $labTests = null;
    public $medicationsDuringCare = null;
    public $pathologicalHistory = null;
    public $nonPathologicalHistory = null;

    public function affiliationsComponent($number, $data) {
        $arrays = [];
        for ($i = 0; $i < $number; $i++) {
            $arrays[] = array_merge([
                'affiliations' => [
                    'start' => $data[$i]['affiliations']['start'] ?? null,
                    'end' => $data[$i]['affiliations']['end'] ?? null,
                    'name' => $data[$i]['affiliations']['name'] ?? null,
                    'idPolicyValue' => $data[$i]['affiliations']['idPolicyValue'] ?? null,
                    'idBeneficiario' => $data[$i]['affiliations']['idBeneficiario'] ?? null,
                    'idBeneficiarioTipo' => $data[$i]['affiliations']['idBeneficiarioTipo'] ?? null,
                ],
                'affiliation' => [
                    'programKey' => $data[$i]['affiliation']['programKey'] ?? null,
                    'programName' => $data[$i]['affiliation']['programKey'] ?? null,
                    'insurance' => [
                        'id' => $data[$i]['affiliation']['insurance']['id'] ?? null,
                        'organizationName' => $data[$i]['affiliation']['insurance']['organizationName'] ?? null,
                        'insuranceStart' => $data[$i]['affiliation']['insurance']['insuranceStart'] ?? null,
                        'insuranceEnd' => $data[$i]['affiliation']['insurance']['insuranceEnd'] ?? null,
                        'personId' => $data[$i]['affiliation']['insurance']['personId'] ?? null,
                        'beneficiaryType' => $data[$i]['affiliation']['insurance']['beneficiaryType'] ?? null,
                        'policyPersonId' => $data[$i]['affiliation']['insurance']['policyPersonId'] ?? null
                    ]
                ]
            ]);
        }
        return $arrays;
    }

    public function familyHistory($number, $data) {
        $history = [];
        for ($i = 0; $i < $number; $i++) {
            $history[] = [
                'hipertension' => $data[$i]['hipertension'] ?? null,
                'dislipidemias' => $data[$i]['dislipidemias'] ?? null,
                'diabetes' => $data[$i]['diabetes'] ?? null,
            ];
        }
        $this->familyHistory = $history;
    }

    public function allergies($number, $data) {
        $allergies = [];
        for ($i = 0; $i < $number; $i++) {
            $allergies[] = [
                'allergenName' => $data[$i]['allergenName'] ?? null,
                'startDate' => $data[$i]['startDate'] ?? null,
                'doctorName' => $data[$i]['doctorName'] ?? null,
                'reactionDescription' => $data[$i]['reactionDescription'] ?? null,
                'currentSituation' => $data[$i]['currentSituation'] ?? null,
                'observations' => $data[$i]['observations'] ?? null
            ];
        }
        $this->allergies = $allergies;
    }

    public function disabilities($description, $number, $data) {
        $this->disabilitiesDescription = $description;
        $disabilities = [];
        for ($i = 0; $i < $number; $i++) {
            $disabilities[] = [
                'id' => $data[$i]['id'] ?? null,
                'disabilityValue' => $data[$i]['disabilityValue'] ?? null,
                'disabilityName' => $data[$i]['disabilityName'] ?? null,
            ];
        }
        $this->disabilities = $disabilities;
    }

    public function drugs($number, $data) {
        $drugs = [];
        for ($i = 0; $i < $number; $i++) {
            $drugs[] = [
                'drugName' => $data[$i]['drugName'] ?? null,
                'administrationRoute' => $data[$i]['administrationRoute'] ?? null,
                'dose' => $data[$i]['dose'] ?? null,
                'startDate' => $data[$i]['startDate'] ?? null,
                'endDate' => $data[$i]['endDate'] ?? null,
                'observations' => $data[$i]['observations'] ?? null,
            ];
        }
        $this->drugs = $drugs;
    }

    public function procedures($number, $data) {
        $procedures = [];
        for ($i = 0; $i < $number; $i++) {
            $procedures[] = [
                'cie9Code' => $data[$i]['cie9Code'] ?? null,
                'procedureName' => $data[$i]['procedureName'] ?? null,
                'status' => $data[$i]['status'] ?? null,
                'isActive' => $data[$i]['isActive'] ?? null,
                'observations' => $data[$i]['observations'] ?? null,
                'procedureCode' => $data[$i]['procedureCode'] ?? null,
                'procedureDescription' => $data[$i]['displayName'] ?? null,
                'procedureDate' => $data['procedureDate'] ?? null, 
                'performerProfessionalId' => $data[$i]['performerProfessionalId'] ?? null,
                'performerName' => [
                    'name' => $data[$i]['performerName']['name'] ?? null,
                    'first_surname' => $data[$i]['performerName']['first_surname'] ?? null,
                    'second_surname' => $data[$i]['performerName']['second_surname'] ?? null,
                ],
                'locationCode' => $data[$i]['locationCode'] ?? null,
                'locationName' => $data[$i]['locationName'] ?? null,
            ];
        }
        $this->procedures = $procedures;
    }

    public function diagnostics($number, $data) {
        $diagnostics = [];
        for ($i = 0; $i < $number; $i++) {
            $diagnostics[] = [
                'diagnosisType' => $data[$i]['diagnosisType'] ?? null,
                'diagnosisDate' => $data[$i]['diagnosisDate'] ?? null,
                'cieCode' => $data[$i]['cieCode'] ?? null,
                'diagnosisName' => $data[$i]['diagnosisName'] ?? null,
                'observations' => $data[$i]['observations'] ?? null,
                'problemStartDate' => $data[$i]['problemStartDate'] ?? null,
                'problemEndDate' => $data[$i]['problemEndDate'] ?? null,
                'concernCode' => $data[$i]['concernCode'] ?? null,
                'concernDisplayName' => $data[$i]['concernDisplayName'] ?? null,
                'problemId' => $data[$i]['problemId'] ?? null,
                'affectionNumber' => $data[$i]['affectionNumber'] ?? null,
                'diagnosisText' => $data[$i]['diagnosisText'] ?? null,
                'diagnosisCode' => $data[$i]['diagnosisCode'] ?? null,
                'diagnosisDisplayName' => $data[$i]['diagnosisDisplayName'] ?? null,
            ];
        }
        $this->diagnostics = $diagnostics;
    }   
    
    public function vitalSigns($data) {
        $vitalSigns = [];
        $number = count($data);
    
        for ($i = 0; $i < $number; $i++) {
            $vitalSigns[] = [
                'date' => $data[$i]['date'] ?? null,
                'sign' => $data[$i]['sign'] ?? null,
                'value' => $data[$i]['value'] ?? null,
                'unit' => $data[$i]['unit'] ?? null,
                'observations' => $data[$i]['observations'] ?? null,
                'code' => $data[$i]['code'] ?? null,
                'signDescription' => $data[$i]['signDescription'] ?? null, // Descripción adicional del signo vital si está disponible
            ];
        }
    
        $this->vitalSigns = $vitalSigns;
    }

    public function labTests($data) {
        $labTests = [];
        $number = count($data);
    
        for ($i = 0; $i < $number; $i++) {
            $labTests[] = [
                'testName' => $data[$i]['testName'] ?? null,
                'testDate' => $data[$i]['testDate'] ?? null,
                'result' => $data[$i]['result'] ?? null,
                'range' => $data[$i]['range'] ?? null,
                'batteryId' => $data[$i]['batteryId'] ?? null,
                'batteryName' => $data[$i]['batteryName'] ?? null,
                'testCode' => $data[$i]['testCode'] ?? null,
                'testDisplayName' => $data[$i]['testDisplayName'] ?? null,
                'value' => $data[$i]['value'] ?? null,
                'unit' => $data[$i]['unit'] ?? null,
                'referenceRange' => $data[$i]['referenceRange'] ?? null,
            ];
        }
    
        $this->labTests = $labTests;
    }    

    public function medicationsDuringCare($data) {
        $medications = [];
        $number = count($data);
    
        for ($i = 0; $i < $number; $i++) {
            $medications[] = [
                'medicationName' => $data[$i]['medicationName'] ?? null,
                'administrationRoute' => $data[$i]['administrationRoute'] ?? null,
                'dose' => $data[$i]['dose'] ?? null,
                'startDate' => $data[$i]['startDate'] ?? null,
                'endDate' => $data[$i]['endDate'] ?? null,
                'prescriptionObservations' => $data[$i]['prescriptionObservations'] ?? null,
                'administrationRouteCode' => $data[$i]['administrationRouteCode'] ?? null,
                'administrationRouteDisplayName' => $data[$i]['administrationRouteDisplayName'] ?? null,
                'medicationCode' => $data[$i]['medicationCode'] ?? null,
                'medicationDisplayName' => $data[$i]['medicationDisplayName'] ?? null
            ];
        }
    
        $this->medicationsDuringCare = $medications;
    }

    public function pathologicalHistory($data) {
        $pathologicalHistory = [];
        $number = count($data);
    
        for ($i = 0; $i < $number; $i++) {
            $pathologicalHistory[] = [
                'condition' => $data[$i]['condition'] ?? null,
                'diagnosisYear' => $data[$i]['diagnosisYear'] ?? null,  
                'icdCode' => $data[$i]['icdCode'] ?? null, 
                'conditionName' => $data[$i]['conditionName'] ?? null, 
                'diagnosis' => $data[$i]['diagnosis'] ?? null, 
            ];
        }
    
        $this->pathologicalHistory = $pathologicalHistory;
    }   
    
    public function nonPathologicalHistory($data) {
        $nonPathologicalHistory = [];
    
        $number = count($data);
    
        for ($i = 0; $i < $number; $i++) {
            $nonPathologicalHistory[] = [
                'bloodType' => $data[$i]['bloodType'] ?? null, // Tipo de sangre
                'smokingStart' => $data[$i]['smokingStart'] ?? null, // Fecha de inicio del hábito
                'smokingEnd' => $data[$i]['smokingEnd'] ?? null, // Fecha de fin del hábito
                'cigarettesPerDay' => $data[$i]['cigarettesPerDay'] ?? null, // Cantidad de cigarrillos por día
                'alcoholStart' => $data[$i]['alcoholStart'] ?? null, // Fecha de inicio del hábito de consumo de alcohol
                'alcoholEnd' => $data[$i]['alcoholEnd'] ?? null, // Fecha de fin del hábito de consumo de alcohol
                'alcoholAmountPerDay' => $data[$i]['alcoholAmountPerDay'] ?? null, // Cantidad de alcohol consumido por día
                'substanceStart' => $data[$i]['substanceStart'] ?? null, // Fecha de inicio del consumo de otras sustancias
                'substanceEnd' => $data[$i]['substanceEnd'] ?? null, // Fecha de fin del consumo de otras sustancias
                'substanceDescription' => $data[$i]['substanceDescription'] ?? null, // Descripción del consumo de otras sustancias
                'otherNonPathologicalHistory' => $data[$i]['otherNonPathologicalHistory'] ?? null, // Otros antecedentes no patológicos
            ];
        }
    
        $this->nonPathologicalHistory = $nonPathologicalHistory;
    }
    
}
