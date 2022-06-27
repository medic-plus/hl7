<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class pronosticos_salud_paciente {

    private string $pronosticoSalud;

    public function __construct(string $pronosticoSalud) {
        $this->pronosticoSalud = $pronosticoSalud;
    }

    public function getPronosticoSalud() {
        return $this->pronosticoSalud;
    }

    public function setPronosticoSalud(string $pronosticoSalud) {
        $this->pronosticoSalud = $pronosticoSalud;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Pronostico", $this->pronosticoSalud);
        $documento->appendChild($segmento);
    }
}