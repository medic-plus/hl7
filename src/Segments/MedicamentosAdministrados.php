<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\AdministracionFarmacologica;
use Medicplus\HL7\Segments\Catalogos\Medicamento;

class MedicamentosAdministrados {
    private string $descripcion;
    private string $observacionMedicamento;
    private string $dosisAdministradas;
    private ?DateTime $fechaIniMedicamento;
    private ?DateTime $fechaFinMedicamento;
    private string $medicamentoAdministrativo;
    private ?AdministracionFarmacologica $administracionFarmacologica;
    private ?Medicamento $medicamento;

    public function __construct(string $descripcion, string $observacionMedicamento, string $dosisAdministradas, string $medicamentoAdministrativo, DateTime $fechaIniMedicamento = null, DateTime $fechaFinMedicamento = null, AdministracionFarmacologica $administracionFarmacologica = null, Medicamento $medicamento = null) {
        $this->descripcion = $descripcion;
        $this->observacionMedicamento = $observacionMedicamento;
        $this->dosisAdministradas = $dosisAdministradas;
        $this->fechaIniMedicamento = $fechaIniMedicamento;
        $this->fechaFinMedicamento = $fechaFinMedicamento;
        $this->medicamentoAdministrativo = $medicamentoAdministrativo;
        $this->administracionFarmacologica = $administracionFarmacologica;
        $this->medicamento = $medicamento;
    }

    public function getMedicamentoAdministrado() {
        return $this->descripcion;
    }

    public function setMedicamentoAdministrado(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getObservacionMedicamento() {
        return $this->observacionMedicamento;
    }

    public function setObservacionMedicamento(string $observacionMedicamento) {
        $this->observacionMedicamento = $observacionMedicamento;
    }

    public function getDosisAdministradas() {
        return $this->dosisAdministradas;
    }

    public function setDosisAdministradas(string $dosisAdministradas) {
        $this->dosisAdministradas = $dosisAdministradas;
    }

    public function getFechaIniMedicamento() {
        return $this->fechaIniMedicamento;
    }

    public function setFechaIniMedicamento(DateTime $fechaIniMedicamento) {
        $this->fechaIniMedicamento = $fechaIniMedicamento;
    }

    public function getFechaFinMedicamento() {
        return $this->fechaFinMedicamento;
    }

    public function setFechaFinMedicamento(DateTime $fechaFinMedicamento) {
        $this->fechaFinMedicamento = $fechaFinMedicamento;
    }

    public function getMedicamentoAdministrativo() {
        return $this->medicamentoAdministrativo;
    }

    public function setMedicamentoAdministrativo(string $medicamentoAdministrativo) {
        $this->medicamentoAdministrativo = $medicamentoAdministrativo;
    }

    public function getAdministracionFarmacologica() {
        return $this->administracionFarmacologica;
    }

    public function setAdministracionFarmacologica(AdministracionFarmacologica $administracionFarmacologica) {
        $this->administracionFarmacologica = $administracionFarmacologica;
    }

    public function getMedicamento() {
        return $this->medicamento;
    }

    public function setMedicamento(Medicamento $medicamento) {
        $this->medicamento = $medicamento;
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
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.38');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '29549-3');
        $code->setAttribute('displayName', 'Medicamentos administrados');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Terapéutica empleada');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($medicamentoAdmin) {
            return $medicamentoAdmin->getMedicamentoAdministrado();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $section->appendChild($entry);

        $substanceAdministration = $DOM->createElement('substanceAdministration', '');
        $entry->appendChild($substanceAdministration);

        $text = $DOM->createElement('text', '--Observaciones generales del medicamento administrado--');
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

        $comsumable = $DOM->createElement('comsumable', '');
        $substanceAdministration->appendChild($comsumable);

        $manufacturedProduct = $DOM->createElement('manufacturedProduct', '');
        $manufacturedProduct->setAttribute('classCode', 'MANU');
        $comsumable->appendChild($manufacturedProduct);

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