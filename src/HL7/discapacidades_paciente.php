<?php

namespace Medicplus\HL7;

use Medicplus\HL7\Catalogos\Discapacidad;

class discapacidad_paciente {
    private string $descripcionDiscapacidades;
    private int $identificadorUnicoDiscapacidad;
    private ?Discapacidad $discapacidad;

    public function getDescripcionDiscapacidades() {
        return $this->descripcionDiscapacidades;
    }

    public function setDescripcionDiscapacidades(string $descripcionDiscapacidades) {
        $this->descripcionDiscapacidades = $descripcionDiscapacidades;
    }

    public function getIdentificadorUnicoDiscapacidad() {
        return $this->identificadorUnicoDiscapacidad;
    }

    public function setIdentificadorUnicoDiscapacidad(int $identificadorUnicoDiscapacidad) {
        $this->identificadorUnicoDiscapacidad = $identificadorUnicoDiscapacidad;
    }

    public function getDiscapacidad() {
        return $this->discapacidad;
    }

    public function setDiscapacidad(Discapacidad $discapacidad) {
        $this->discapacidad = $discapacidad;
    }
}