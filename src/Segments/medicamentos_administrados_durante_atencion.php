<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\AdministracionFarmacologica;
use Medicplus\HL7\Segments\Catalogos\Medicamento;

class medicamentos_administrados_durante_atencion {
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

    public static function medicamentosAdminXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Terapeutica empleada');
        $documentoElement3 = $documento->createElement('tr', '');
        $documentoElement4 = $documento->createElement('th', 'Medicamento');
        $documentoElement5 = $documento->createElement('th', 'Via de administracion');
        $documentoElement6 = $documento->createElement('th', 'Dosis');
        $documentoElement7 = $documento->createElement('th', 'Fecha de inicio');
        $documentoElement8 = $documento->createElement('th', 'Fecha de fin');
        $documentoElement9 = $documento->createElement('th', 'Obs. prescripcion');
        $documentoElement10 = $documento->createElement('tbody', '');
        $documentoElement11 = $documento->createElement('tr', '');
        $documentoElement12 = $documento->createElement('td', 'Nombre del medicamento / substancia activa');
        $documentoElement13 = $documento->createElement('td', 'Via de administracion');
        $documentoElement14 = $documento->createElement('td', 'Dosis por administrar');
        $documentoElement15 = $documento->createElement('td', 'Fecha y hora de termino de administracion de medicamento');
        $documentoElement16 = $documento->createElement('td', 'Observaciones adicionales acerca de  la prescripcion');
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
    }
}

medicamentos_administrados_durante_atencion::medicamentosAdminXML();