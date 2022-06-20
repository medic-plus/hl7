<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use Medicplus\HL7\Catalogos\AdministracionFarmacologica;
use Medicplus\HL7\Catalogos\Medicamento;

class medicamentos_administrados_durante_atencion {
    private string $descripcionMedicamentos;
    private string $observacionMedicamento;
    private string $dosisAdministradas;
    private ?DateTime $fechaIniMedicamento;
    private ?DateTime $fechaFinMedicamento;
    private string $medicamentoAdministrativo;
    private ?AdministracionFarmacologica $administracionFarmacologica;
    private ?Medicamento $medicamento;

    public function getDescripcionMedicamento() {
        return $this->descripcionMedicamentos;
    }

    public function setDescripcionMedicamentos(string $descripcionMedicamentos) {
        $this->descripcionMedicamentos = $descripcionMedicamentos;
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
}
