<?php

foreach (glob(__DIR__ . "/Sections/*.php") as $archivo) {
    require_once $archivo;
}

foreach (glob(__DIR__ . "/Segments/Catalogos/*.php") as $archivo) {
    require_once $archivo;
}

require_once 'attributes.php';
require '../vendor/autoload.php';

use Spatie\ArrayToXml\ArrayToXml;

class Patient
{
    public $attributes;

    function __construct()
    {
        $this->attributes = new Attributes();
    }

    public function setPatient(
        $patient = [
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
        ]
    ) {
        $this->editAttributes($patient, 'patient');
    }

    public function setInformationRecipient(
        $informationRecipient = [
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
        ]
    ) {
        $this->editAttributes($informationRecipient, 'informationRecipient');
    }

    public function setAuthor(
        $author = [
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
        ]
    ) {
        $this->editAttributes($author, 'author');
    }

    public function setDataEnterer(
        $enterer = [
            'time' => null,
            'id' => null,
            'person' => [
                'given' => null,
                'first_surname' => null,
                'second_surname' => null
            ]
        ]
    ) {
        $this->editAttributes($enterer, 'enterer');
    }

    public function setCustodian(
        $custodian = [
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
            ]
        ]
    ) {
        $this->editAttributes($custodian, 'custodian');
    }

    public function setLegalAuthenticator(
        $legalAuthenticator = [
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
        ]
    ) {
        $this->editAttributes($legalAuthenticator, 'legalAuthenticator');
    }

    public function setDocumentation(
        $documentationOf = [
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
        ]
    ) {
        $this->editAttributes($documentationOf, 'documentationOf');
    }

    public function setComponentOf(
        $componentOf = [
            'id' => null,
            'encounterType' => null,
            'time' => [
                'low' => null,
                'high' => null
            ],
            'professionalId' => null,
            'personName' => [
                'given' => null,
                'first_surnanme' => null,
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
        ]
    ) {
        $this->editAttributes($componentOf, 'componentOf');
    }

    /* Components */

    public function setReasonComponent(
        $reason = [
            'reason' => null,
            'detail' => null
        ]
    ) {
        if (isset($reason['reason']) && isset($reason['detail'])) {
            $this->attributes->reasonComponent['reason'] = $reason['reason'] ?? null;
            $this->attributes->reasonComponent['detail'] = $reason['detail'] ?? null;
        } else {
            echo 'Para Motivo (Reason) se necesitan la razón (reason) y el detalle (detail)';
        }
    }

    public function setAffiliationsComponent(...$params) {
        $affiliation_components = $this->attributes->affiliationsComponent(count($params), $params);
        $this->attributes->affiliationsComponents = $affiliation_components;
    }

    public function setAllergies(...$params) {
        $this->attributes->allergies(count($params), $params);
    }

    public function setProcedures(...$params) {
        $this->attributes->procedures(count($params), $params);
    }

    public function setEvolution($evolution = null) {;
        $this->attributes->evolution = $evolution;
    }

    public function setDisabilities($description = null, ...$params) {
        $this->attributes->disabilities($description, count($params), $params);
    }

    public function setDrugs(...$params) {
        $this->attributes->drugs(count($params), $params);
    }

    public function setDiagnostics(...$params) {
        $this->attributes->diagnostics(count($params), $params);
    }
    
    public function setTreatmentPlan($plan = null) {
        $this->attributes->treatmentPlan = $plan;
    }

    public function setHealthPronostics($pronostics = null) {
        $this->attributes->healthPronostics = $pronostics;
    }

    public function setDiagnosticImpression($impression = null) {
        if ($impression == null) {
            echo 'Se necesita el estado del paciente en su evaluación inicial';
        } else {
            $this->attributes->diagnosticImpression = $impression;
        }
    }

    public function setVitalSigns(...$params) {
        $this->attributes->vitalSigns($params);
    }

    public function setMedicationsDuringCare(...$params) {
        $this->attributes->medicationsDuringCare($params);
    }

    public function setLabTests(...$params) {
        $this->attributes->labTests($params);
    }

    public function setPathologicalHistory(...$params) {
        $this->attributes->pathologicalHistory($params);
    }

    public function setNonPathologicalHistory(...$params) {
        $this->attributes->nonPathologicalHistory($params);
    }

    public function setInitialManifestation($manifestation = null) {
        if ($manifestation == null) {
            echo 'Se necesita la sintomatología inicial del paciente';
        } else {
            $this->attributes->initialManifestation = $manifestation;
        }
    }

    private function editAttributes($data, $section) {
        foreach ($data as $element => $value) {
            if (is_array($value)) {
                foreach ($value as $subElement => $subValue) {
                    $this->attributes->$section[$element][$subElement] = $subValue;
                }
            } else {
                $this->attributes->$section[$element] = $value;
            }
        }
    }

    private function getFile() {
        return $this->deleteNulls(array_merge_recursive(
            SeccionHeader::getHeader($this),
            SeccionPaciente::getPatientSection($this),
            InformationRecipientSection::getInformationRecipientSection($this),
            AuthorSection::getAuthorSection($this),
            DataEntererSection::getDataEntererSection($this),
            CustodianSection::getCustodianSection($this),
            LegaluthenticatorSection::getLegalAuthenticatorSection($this),
            DocumentationOfSection::getDocumentOfSection($this),
            ComponentOfSection::getComponentOfSection($this),
            ComponentsSection::getComponentsSection($this)
        ));
    }

    protected function deleteNulls($array) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->deleteNulls($value);
                if (empty($array[$key])) {
                    unset($array[$key]);
                }
            }
        }
        return array_filter($array, function ($v) {
            return $v !== null;
        });
    }

    protected function allNull($array) {
        $notNull = false;
        array_walk_recursive($array, function($value) use (&$notNull) {
            if (!is_null($value)) {
                $notNull = true;
            }
        });
        return !$notNull;
    }

    function export() {
        $array_to_xml = new ArrayToXml($this->getFile(), 'ClinicalDocument', false, 'UTF-8');
        $array_to_xml->setDomProperties(['formatOutput' => 'true']);
        $xml = $array_to_xml->toXml();
        file_put_contents('xml.xml', $xml);
    }
}

$p = new Patient();

$p->export();
