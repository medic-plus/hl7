<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class evolucion_paciente_atencion {
    private string $evolucionPaciente;

    public function __construct(string $evolucionPaciente) {
        $this->evolucionPaciente = $evolucionPaciente;
    }

    public function getEvolucionPaciente() {
        return $this->evolucionPaciente;
    }

    public function setEvolucionPaciente(string $evolucionPaciente) {
        $this->evolucionPaciente = $evolucionPaciente;
    }

    public function toXML(DOMDocument $documento) {
        $segmemto = $documento->createElement("Evolucion", $this->evolucionPaciente);
        $documento->appendChild($segmemto);
    }
}
