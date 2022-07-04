<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\AdministracionFarmacologica;
use Medicplus\HL7\Segments\Catalogos\Medicamento;

class medicamento_previos_actuales_paciente {
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

    public function getDescripcionMedicamentos() {
        return $this->descripcion;
    }

    public function setDescripcionMedicamentos(string $descripcion) {
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

    public static function medicamentosPreviosXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Historial farmacologico');
        $documentoElement3 = $documento->createElement('text', '');
        $documentoElement4 = $documento->createElement('thead', '');
        $documentoElement5 = $documento->createElement('tr', '');
        $documentoElement6 = $documento->createElement('th', 'Medicamento');
        $documentoElement7 = $documento->createElement('th', 'Via de administracion');
        $documentoElement8 = $documento->createElement('th', 'Dosis');
        $documentoElement9 = $documento->createElement('th', 'Fecha de inicio');
        $documentoElement10 = $documento->createElement('th', 'Fecha de fin');
        $documentoElement11 = $documento->createElement('th', 'Obs. prescripcion');
        $documentoElement12 = $documento->createElement('tbody', '');
        $documentoElement13 = $documento->createElement('tr', '');
        $documentoElement14 = $documento->createElement('td', 'Nombre del medicamento/substancia activa');
        $documentoElement15 = $documento->createElement('td', 'Via de administracion');
        $documentoElement16 = $documento->createElement('td', 'Dosis pos administrar');
        $documentoElement17 = $documento->createElement('td', 'Fecha y hora de inicio de administracion de medicamento');
        $documentoElement18 = $documento->createElement('td', 'Fecha y hora de termino de administracion de medicamento');
        $documentoElement19 = $documento->createElement('td', 'Observaciones adicionales acerca de la prescripcion');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
        $documento->appendChild($documentoElement4);
        $documento->appendChild($documentoElement5);
        $documento->appendChild($documentoElement6);
        $documento->appendChild($documentoElement7);
        $documento->appendChild($documentoElement8);
        $documento->appendChild($documentoElement9);
        $documento->appendChild($documentoElement10);
        $documento->appendChild($documentoElement11);
        $documento->appendChild($documentoElement12);
        $documento->appendChild($documentoElement13);
        $documento->appendChild($documentoElement14);
        $documento->appendChild($documentoElement15);
        $documento->appendChild($documentoElement16);
        $documento->appendChild($documentoElement17);
        $documento->appendChild($documentoElement18);
        $documento->appendChild($documentoElement19);
    }
}

medicamento_previos_actuales_paciente::medicamentosPreviosXML();