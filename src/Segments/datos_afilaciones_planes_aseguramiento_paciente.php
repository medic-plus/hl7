<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class datos_afiliaciones_planos_aseguramiento_paciente {
    private string $datosAfiliaciones;

    public function getDatosAfiliaciones() {
        return $this->datosAfiliaciones;
    }

    public function setDatosAfiliaciones(string $datosAfiliaciones) {
        $this->datosAfiliaciones = $datosAfiliaciones;
    }

    // public function toXML(DOMDocument $doc, $datosAfiliaciones) {
    //     $datosAfiliaciones = $doc->createElement($datosAfiliaciones);
    //     $text = $doc->createTextNode($this->value);
    //     $datosAfiliaciones->appendChild($text);
    //     return $datosAfiliaciones;
    // }
}
