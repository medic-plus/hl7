<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class antecedentes_heredofamiliares_paciente {
    private string $descripcion;
    private bool $presenciaHipertension;
    private bool $presenciaDislipidemias;
    private bool $presenciaDiabetes;

    public function __construct(string $descripcion, bool $presenciaHipertension, bool $presenciaDislipidemias, bool $presenciaDiabetes) {
        $this->descripcion = $descripcion;
        $this->presenciaHipertension = $presenciaHipertension;
        $this->presenciaDislipidemias = $presenciaDislipidemias;
        $this->presenciaDiabetes = $presenciaDiabetes;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPresenciaHipertension() {
        return $this->presenciaHipertension;
    }

    public function setPresenciaHipertension(bool $presenciaHipertension) {
        $this->presenciaHipertension = $presenciaHipertension;
    }

    public function getPresenciaDislipidemias() {
        return $this->presenciaDislipidemias;
    }

    public function setPresenciaDislipidemias(bool $presenciaDislipidemias) {
        $this->presenciaDislipidemias = $presenciaDislipidemias;
    }

    public function getPresenciaDiabetes() {
        return $this->presenciaDiabetes;
    }

    public function setPresenciaDiabetes(bool $presenciaDiabetes) {
        $this->presenciaDiabetes = $presenciaDiabetes;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }
}