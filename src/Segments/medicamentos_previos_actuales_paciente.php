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
}