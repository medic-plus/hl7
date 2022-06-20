<?php

namespace Medicplus\HL7;

use DOMDocument;

class plan_tratamiento_recomendaciones_terapeuticas {
    private string $planTratamientoTerapeuticas;

    public function getPlanTratamientoTerapeuticas() {
        return $this->planTratamientoTerapeuticas;
    }

    public function setPlanTratamientoTerapeuticas(string $planTratamientoTerapeuticas) {
        $this->planTratamientoTerapeuticas = $planTratamientoTerapeuticas;
    }

    // public function toXML(DOMDocument $doc, $planTratamientoTerapeuticas) {
    //     $planTratamientoTerapeuticas = $doc->createElement($planTratamientoTerapeuticas);
    //     $text = $doc->createTextNode($this->value);
    //     $planTratamientoTerapeuticas->appendChild($text);
    //     return $planTratamientoTerapeuticas;
    // }
}