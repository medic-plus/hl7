<?php

namespace Medicplus\HL7;

use Medicplus\HL7\Segments\Alergias;

/**
 * Documento HL7
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class Documento {

    private array $alergias = [];
    private array $antecedentesPatologicos = [];
    private array $manifestacionIniciales = [];
    private array $antecedentesPersonales = [];

    public function addAlergia(Alergias $alergia) {
        array_push($this->alergias, $alergia);
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(array $alergias) {
        $this->alergias = $alergias;
    }


    public function addAntecedentesPatologicos(Alergias $antecedentePatologico) {
        array_push($this->antecedentesPatologicos, $antecedentePatologico);
    }

    public function getAntecendentesPatologicos() {
        return $this->antecedentesPatologicos;
    }

    public function setAntecedentesPatologicos(array $antecedentesPatologicos) {
        $this->antecedentesPatologicos = $antecedentesPatologicos;
    }

    public function addManifestacionInicial(Alergias $manifestacionInicial) {
        array_push($this->manifestacionIniciales, $manifestacionInicial);
    }

    public function getManifestacionIniciales() {
        return $this->manifestacionIniciales;
    }

    public function setManifestacionIniciales(array $manifestacionIniciales) {
        $this->manifestacionIniciales = $manifestacionIniciales;
    }

    public function addAntecedentesPersonal(Alergias $antecedentesPersonal) {
        array_push($this->antecedentesPersonales, $antecedentesPersonal);
    }

    public function getAntecedentesPersonales() {
        return $this->antecedentesPersonales;
    }

    public function setAntecedentesPersonales(array $antecedentesPersonales) {
        $this->antecedentesPersonales = $antecedentesPersonales;
    }
}
