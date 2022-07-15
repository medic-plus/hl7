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

    public function __construct(string $descripcion, string $observacionMedicamento, string $dosisAdministradas, DateTime $fechaIniMedicamento = null, DateTime $fechaFinMedicamento = null, string $medicamentoAdministrativo, AdministracionFarmacologica $administracionFarmacologica = null, Medicamento $medicamento = null) {
        $this->descripcion = $descripcion;
        $this->observacionMedicamento = $observacionMedicamento;
        $this->dosisAdministradas = $dosisAdministradas;
        $this->fechaIniMedicamento = $fechaIniMedicamento;
        $this->fechaFinMedicamento = $fechaFinMedicamento;
        $this->medicamentoAdministrativo = $medicamentoAdministrativo;
        $this->administracionFarmacologica = $administracionFarmacologica;
        $this->medicamento = $medicamento;
    }

    public function getDescripcionMedicamento() {
        return $this->descripcion;
    }

    public function setDescripcionMedicamentos(string $descripcion) {
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

    public static function parserXML(DOMDocument $DOM, array $descripcion = []) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

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

        $descripcionContent = array_map(function ($descripcionMedicamentoAdmin) {
            return $descripcionMedicamentoAdmin->getAlergias();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        return $DOM;
    }
}