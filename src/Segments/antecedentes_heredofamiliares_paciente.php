<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class antecedentes_heredofamiliares_paciente {
    private string $descripcionHeredofamiliares;
    private bool $presenciaHipertension;
    private bool $presenciaDislipidemias;
    private bool $presenciaDiabetes;

    public function getDescripcionHeredofamilia() {
        return $this->descripcionHeredofamiliares;
    }

    public function setDescripcionHeredofamilia(string $descripcionHeredofamiliares) {
        $this->descripcionHeredofamiliares = $descripcionHeredofamiliares;
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

    // public function toXML(DOMDocument $doc, $descripcionHeredofamiliares) {
    //     $descripcionHeredofamiliares = $doc->createElement($descripcionHeredofamiliares);
    //     $text = $doc->createTextNode($this->value);
    //     $descripcionHeredofamiliares->appendChild($text);
    //     return $descripcionHeredofamiliares;
    // }
}
