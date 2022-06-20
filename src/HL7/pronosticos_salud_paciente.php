<?php

namespace Medicplus\HL7;

use DOMDocument;

class pronosticos_salud_paciente {

    private string $pronosticoSalud;

    public function getPronosticoSalud() {
        return $this->pronosticoSalud;
    }

    public function setPronosticoSalud(string $pronosticoSalud) {
        $this->pronosticoSalud = $pronosticoSalud;
    }

    // public function toXML(DOMDocument $doc, $pronosticoSalud) {
    //     $pronosticoSalud = $doc->createElement($pronosticoSalud);
    //     $text = $doc->createTextNode($this->value);
    //     $pronosticoSalud->appendChild($text);
    //     return $pronosticoSalud;
    // }
}