<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\AdministracionFarmacologica;
use Medicplus\HL7\Segments\Catalogos\Medicamento;

class Medicamentos {
    private string $descripcion;
    private string $medicamentoAdministrado;
    private string $dosisAdministrada;
    private ?DateTime $fechaIniUsoMedicamento;
    private ?DateTime $fechaFinUsoMedicamento;
    private string $observacionPrescripcion;
    private ?Medicamento $medicamento;
    private ?AdministracionFarmacologica $administracionFarmacologica;

    public function __construct(string $descripcion, string $medicamentoAdministrado, string $dosisAdministrada, string $observacionPrescripcion, DateTime $fechaIniUsoMedicamento = null, DateTime $fechaFinUsoMedicamento = null, Medicamento $medicamento = null, AdministracionFarmacologica $administracionFarmacologica = null) {
        $this->descripcion = $descripcion;
        $this->medicamentoAdministrado = $medicamentoAdministrado;
        $this->dosisAdministrada = $dosisAdministrada;
        $this->fechaIniUsoMedicamento = $fechaIniUsoMedicamento;
        $this->fechaFinUsoMedicamento = $fechaFinUsoMedicamento;
        $this->observacionPrescripcion = $observacionPrescripcion;
        $this->medicamento = $medicamento;
        $this->administracionFarmacologica = $administracionFarmacologica;
    }

    public function getMedicamentos() {
        return $this->descripcion;
    }

    public function setMedicamentos(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getMedicamentoAdministrado() {
        return $this->medicamentoAdministrado;
    }

    public function setMedicamentoAdministrado(string $medicamentoAdministrado) {
        $this->medicamentoAdministrado = $medicamentoAdministrado;
    }

    public function getDosisAdministrada() {
        return $this->dosisAdministrada;
    }

    public function setDosisAdministrada(string $dosisAdministrada) {
        $this->dosisAdministrada = $dosisAdministrada;
    }

    public function getFechainiUsoMedicamento() {
        return $this->fechaIniUsoMedicamento;
    }

    public function setFechaIniUsoMedicamento(DateTime $fechaIniUsoMedicamento) {
        $this->fechaIniUsoMedicamento = $fechaIniUsoMedicamento;
    }

    public function getFechaFinUsoMedicamento() {
        return $this->fechaFinUsoMedicamento;
    }

    public function setFechaFinUsoMedicamento(DateTime $fechaFinUsoMedicamento) {
        $this->fechaFinUsoMedicamento = $fechaFinUsoMedicamento;
    }

    public function getObservacionPrescripcion() {
        return $this->observacionPrescripcion;
    }

    public function setObservacionPrescripcion(string $observacionPrescripcion) {
        $this->observacionPrescripcion = $observacionPrescripcion;
    }

    public function getMedicamento() {
        return $this->medicamento;
    }

    public function setMedicamento(Medicamento $medicamento) {
        $this->medicamento = $medicamento;
    }

    public function getAdministracionFarmacologica() {
        return $this->administracionFarmacologica;
    }

    public function setAdministracionFarmacologica(AdministracionFarmacologica $administracionFarmacologica) {
        $this->administracionFarmacologica = $administracionFarmacologica;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function parseXML(DOMDocument $DOM, array $descripcion = []) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.1');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '10160-0');
        $code->setAttribute('displayName', 'Antecedentes de medicamentos');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Historial farmacológico');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($medicamento) {
            return $medicamento->getMedicamentos();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $section->appendChild($entry);

        $substanceAdministration = $DOM->createElement('substanceAdministration', '');
        $substanceAdministration->setAttribute('classCode', 'SBADM');
        $substanceAdministration->setAttribute('moodCode', 'EVN');
        $substanceAdministration->setAttribute('negationInd', 'false');
        $entry->appendChild($substanceAdministration);

        $text = $DOM->createElement('text', '--Observaciones generales del medicamento relevante al episodio--');
        $substanceAdministration->appendChild($text);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $substanceAdministration->appendChild($statusCode);

        $routeCode = $DOM->createElement('routeCode', '');
        $routeCode->setAttribute('codeSystem', '2.16.840.1.113883.3.215.12.12');
        $routeCode->setAttribute('codeSystemName', 'Vía de Administración CBM');
        $routeCode->setAttribute('code', '--Valor del identificador de Vía de administración--');
        $routeCode->setAttribute('displayName', '--Nombre de Vía de administración--');
        $substanceAdministration->appendChild($routeCode);

        $doseQuantity = $DOM->createElement('doseQuantity', '');
        $substanceAdministration->appendChild($doseQuantity);

        $center = $DOM->createElement('center', '');
        $center->setAttribute('value', '--Cantidad administrada y frecuencia--');
        $doseQuantity->appendChild($center);

        $effectiveTime = $DOM->createElement('effectiveTime', '');
        $substanceAdministration->appendChild($effectiveTime);

        $low = $DOM->createElement('low', '');
        $low->setAttribute('value', '--aaaammddhhiiss--');
        $effectiveTime->appendChild($low);

        $high = $DOM->createElement('high', '');
        $high->setAttribute('value', '--aaaammddhhiiss--');
        $effectiveTime->appendChild($high);

        $consumable = $DOM->createElement('consumable', '');
        $substanceAdministration->appendChild($consumable);

        $manufacturedProduct = $DOM->createElement('manufacturedProduct', '');
        $consumable->appendChild($manufacturedProduct);

        $manufacturedMaterial = $DOM->createElement('manufacturedMaterial', '');
        $manufacturedProduct->appendChild($manufacturedMaterial);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.3.215.12.8');
        $code1->setAttribute('codeSystemName', 'Cuadro Básico de Medicamentos');
        $code1->setAttribute('code', '--Valor del identificador del Medicamento de acuerdo a catálogo--');
        $code1->setAttribute('displayName', '--Nombre del medicamento de acuerdo a catálogo--');
        $manufacturedMaterial->appendChild($code1);

        return $DOM;
    }
}