<?php

class Attributes {
    ################### HEADER  #########################
    public $providerSystem = [
        'systemId' => null,
        'systemUniqueId' => null,
        'name' => null
    ];
    public $documentTime;
    public $documentConfidentiality = null;

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
    public $authorTime = null, $assignedAuthorId = null, $authorSoftwareName = null, $authorManufacturerModelName = null, $authorPhone = null, $authorEmail = null;
    public $authorAddress = ['fullAddress' => null, 'streetNameType' => null, 'streetName' => null, 'houseNumberNumeric' => null, 'houseNumber' => null, 'unitId' => null, 'unitType' => null, 'deliveryInstallationType' => null, 'deliveryInstallationArea' => null, 'precint' => null, 'county' => null, 'state' => null, 'postalCode' => null, 'country' => null];
    public $authorRepresentedOrganizationName = null, $authorRepresentedOrganizationId = null;

    #################### DATA ENTERER ################################
    public $entererTime = null, $entererEntityId = null;
    public $entererPersonName = ['given' => null, 'first_surname' => null, 'second_surname' => null];

    ##################### CUSTODIAN ##################################
    public $custodianOrganizationClues = null, $custodianOrganizationName = null, $custodianOrganizationPhone = null, $custodianOrganizationEmail = null;
    public $custodianOrganizationAddress = ['fullAddress' => null, 'streetNameType' => null, 'streetName' => null, 'houseNumberNumeric' => null, 'houseNumber' => null, 'unitId' => null, 'unitType' => null, 'deliveryInstallationType' => null, 'deliveryInstallationArea' => null, 'precint' => null, 'county' => null, 'state' => null, 'postalCode' => null, 'country' => null];

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

    ##################### DOCUMENTATION OF ###############################
    public $documentationId = null, $documentationCode = null;
    public $documentationEffectiveTime = ['low' => null, 'high' => null];
    public $documentationPerformer = [
        'professionalId' => null,
        'name' => [
            'given' => null, 
            'first_surname' => null, 
            'second_surname' => null],
        'organization' => [
            'organizationClues' => null,
            'organizationSanitaryLicence' => null,
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

    ####################### COMPONENT OF ##################################
    public $encounter = ['id' => null, 'code' => null];
    public $encounterTime = ['low' => null, 'high' => null];
    public $encounterResponsible = ['professionalId' => null, 'name' => ['given' => null, 'first_surname' => null, 'second_surname' => null]];
    public $encounterResponsibleOrganization = ['id' => null, 'name' => null];
    public $encounterResponsibleDispositionCode = null;
    public $encounterResponsibleHealthcareFacility = ['cluesId' => null, 'sanitaryLicence' => null, 'areaCode' => null, 'name' => null, 'address' => ['fullAddress' => null, 'streetNameType' => null, 'streetName' => null, 'houseNumberNumeric' => null, 'houseNumber' => null, 'unitId' => null, 'unitType' => null, 'deliveryInstallationType' => null, 'deliveryInstallationArea' => null, 'precint' => null, 'county' => null, 'state' => null, 'postalCode' => null, 'country' => null]];
}

?>