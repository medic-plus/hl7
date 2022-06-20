<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Catalogos\AntecendentePatologico;

class antecedente_patologicos_paciente {
    private string $descripcionPatologico;
    private ?DateTime $fechaDiabetes;
    private ?DateTime $fechaHipertension;
    private ?DateTime $fechaHipertiroidismo;
    private string $antecedentePersonalPatologico;
    private ?AntecendentePatologico $antecedentePatologico;

    public function getDescripcionPatologico() {
        return $this->descripcionPatologico;
    }

    public function setDescripcionPatologico(string $descripcionPatologico) {
        $this->descripcionPatologico = $descripcionPatologico;
    }

    public function getFechaDiabetes() {
        return $this->fechaDiabetes;
    }

    public function setFechaDiabetes(DateTime $fechaDiabetes) {
        $this->fechaDiabetes = $fechaDiabetes;
    }

    public function getFechaHipertension() {
        return $this->fechaHipertension;
    }

    public function setFechaHipertension(DateTime $fechaHipertension) {
        $this->fechaHipertension = $fechaHipertension;
    }
    public function getFechaHipertiroidismo() {
        return $this->fechaHipertiroidismo;
    }

    public function setFechaHipertiroidismo(DateTime $fechaHipertiroidismo) {
        $this->fechaHipertiroidismo = $fechaHipertiroidismo;
    }

    public function getAntecedentePersonalPatologico() {
        return $this->antecedentePersonalPatologico;
    }

    public function setAntecedentePersonalPatologico(string $antecedentePersonalPatologico) {
        $this->antecedentePersonalPatologico = $antecedentePersonalPatologico;
    }

    public function getAntecedentePatologico() {
        return $this->antecedentePatologico;
    }

    public function setAntecedentePatologico(AntecendentePatologico $antecedentePatologico) {
        $this->antecedentePatologico = $antecedentePatologico;
    }

    // public function toXML(DOMDocument $doc, $descripcionPatologico) {
    //     $descripcionPatologico = $doc->createElement($descripcionPatologico);
    //     $text = $doc->createTextNode($this->value);
    //     $descripcionPatologico->appendChild($text);
    //     return $descripcionPatologico;
    // }
}
