<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use Medicplus\HL7\Catalogos\SignoVital;

class signos_vitales {
    private string $descripcionSignosVitales;
    private string $nombreSignoVital;
    private ?DateTime $fechaSignoVital;
    private string $resultadoMedicionSignoVital;
    private ?SignoVital $signoVital;

    public function getDescripcionSignosVitales() {
        return $this->descripcionSignosVitales;
    }

    public function setDescripcionSignosVitales(string $descripcionSignosVitales) {
        $this->descripcionSignosVitales = $descripcionSignosVitales;
    }

    public function getNombreSignoVital() {
        return $this->nombreSignoVital;
    }

    public function setNombreSignoVital(string $nombreSignoVital) {
        $this->nombreSignoVital = $nombreSignoVital;
    }

    public function getFechaSignoVital() {
        return $this->fechaSignoVital;
    }

    public function setFechaSignoVital(DateTime $fechaSignoVital) {
        $this->fechaSignoVital = $fechaSignoVital;
    }

    public function getResultadoMedicionSignoVital() {
        return $this->resultadoMedicionSignoVital;
    }

    public function setResultadoMedicionSignoVital(string $resultadoMedicionSignoVital) {
        $this->resultadoMedicionSignoVital = $resultadoMedicionSignoVital;
    }

    public function getSignoVital() {
        return $this->signoVital;
    }

    public function setSignoVital(SignoVital $signoVital) {
        $this->signoVital = $signoVital;
    }
}
