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

    public static function parseXML(DOMDocument $DOM, array $planTratamientoTerapeuticas = []) {
        if (sizeof($planTratamientoTerapeuticas) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

        $section = $DOM->createElement('templateId', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.10');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '18776-5');
        $code->setAttribute('displayName', 'Plan de tratamiento');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Plan de tratamiento y recomendaciones terapeuticas');
        $section->appendChild($title);

        $planTratamientoTerapeuticasContent = array_map(function ($alergia) {
            return $alergia->getAlergias();
        }, $planTratamientoTerapeuticas);
        $text = $DOM->createElement('text', implode("\n", $planTratamientoTerapeuticasContent));
        $section->appendChild($text);

        return $DOM;
    }
}
