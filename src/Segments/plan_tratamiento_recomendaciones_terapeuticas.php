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

    public static function planXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Plan de tratamiento y recomendaciones terapeuticas');
        $documentoElement3 = $documento->createElement('text', 'Indicaciones generales que deben seguir el paciente y/o equipo de atencion, asi como un listado de los medicamentos prescritos al alta del paciente');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
    }
}

plan_tratamiento_recomendaciones_terapeuticas::planXML();
