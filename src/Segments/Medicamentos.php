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

    public function __construct(string $descripcion, string $medicamentoAdministrado, string $dosisAdministrada, DateTime $fechaIniUsoMedicamento = null, DateTime $fechaFinUsoMedicamento = null, string $observacionPrescripcion, Medicamento $medicamento = null, AdministracionFarmacologica $administracionFarmacologica = null) {
        $this->descripcion = $descripcion;
        $this->medicamentoAdministrado = $medicamentoAdministrado;
        $this->dosisAdministrada = $dosisAdministrada;
        $this->fechaIniUsoMedicamento = $fechaIniUsoMedicamento;
        $this->fechaFinUsoMedicamento = $fechaFinUsoMedicamento;
        $this->observacionPrescripcion = $observacionPrescripcion;
        $this->medicamento = $medicamento;
        $this->administracionFarmacologica = $administracionFarmacologica;
    }

    public function getDescripcionMedicamentosPrevios() {
        return $this->descripcion;
    }

    public function setDescripcionMedicamentosPrevios(string $descripcion) {
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

    public static function parserXML(DOMDocument $DOM, array $descripcion = []) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

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

        $descripcionContent = array_map(function ($descripcionMedicamentoPrevio) {
            return $descripcionMedicamentoPrevio->getAlergias();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        return $DOM;
    }
}