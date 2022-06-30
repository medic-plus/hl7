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
    public array $alergias = [];
    // public array $padecimiento = [];

    public function addAlergia(Alergias $alergia) {
        array_push($alergias, $alergia);
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(array $alergias) {
        $this->alergias = $alergias;
    }
}