<?php

namespace Medicplus\HL7;

use DateTime;
use Medicplus\HL7\Catalogos\AdministracionFarmacologica;
use Medicplus\HL7\Catalogos\Medicamento;

class medicamento_previos_actuales_paciente {
    private string $descripcionMedicamentos;
    private string $medicamentoAdministrado;
    private string $dosisAdministrada;
    private ?DateTime $fechaIniUsoMedicamento;
    private ?DateTime $fechaFinUsoMedicamento;
    private string $observacionPrescripcion;
    private ?Medicamento $medicamento;
    private ?AdministracionFarmacologica $administracionFarmacologica;

    public function getDescripcionMedicamentos() {
        return $this->descripcionMedicamentos;
    }

    public function setDescripcionMedicamentos(string $descripcionMedicamentos) {
        $this->descripcionMedicamentos = $descripcionMedicamentos;
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
}