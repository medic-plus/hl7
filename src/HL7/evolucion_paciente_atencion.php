<?php

namespace Medicplus\HL7;

use DOMDocument;

class evolucion_paciente_atencion {
    private string $evolucionPaciente;

    public function getEvolucionPaciente() {
        return $this->evolucionPaciente;
    }

    public function setEvolucionPaciente(string $evolucionPaciente) {
        $this->evolucionPaciente = $evolucionPaciente;
    }

    // public function toXML(DOMDocument $doc, $evolucionPaciente) {
    //     $evolucionPaciente = $doc->createElement($evolucionPaciente);
    //     $text = $doc->createTextNode($this->value);
    //     $evolucionPaciente->appendChild($text);
    //     return $evolucionPaciente;
    // }
}