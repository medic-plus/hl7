<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class plan_tratamiento_recomendaciones_terapeuticas {
    private string $planTratamientoTerapeuticas;

    public function __construct(string $planTratamientoTerapeuticas) {
        $this->planTratamientoTerapeuticas = $planTratamientoTerapeuticas;
    }

    public function getPlanTratamientoTerapeuticas() {
        return $this->planTratamientoTerapeuticas;
    }

    public function setPlanTratamientoTerapeuticas(string $planTratamientoTerapeuticas) {
        $this->planTratamientoTerapeuticas = $planTratamientoTerapeuticas;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("PlanTratamiento", $this->planTratamientoTerapeuticas);
        $documento->appendChild($segmento);
    }
}