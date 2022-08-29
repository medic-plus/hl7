<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\SignoVital;

class SignosVitales {
    private string $descripcion;
    private string $nombre;
    private ?DateTime $fechaSignoVital;
    private string $resultadoMedicion;
    private ?SignoVital $signoVital;

    public function __construct(string $descripcion, string $nombre, string $resultadoMedicion, DateTime $fechaSignoVital = null, SignoVital $signoVital = null) {
        $this->descripcion = $descripcion;
        $this->nombre = $nombre;
        $this->fechaSignoVital = $fechaSignoVital;
        $this->resultadoMedicion = $resultadoMedicion;
        $this->signoVital = $signoVital;
    }

    public function getSignosVitales() {
        return $this->descripcion;
    }

    public function setSignosVitales(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getNombreSignoVital() {
        return $this->nombre;
    }

    public function setNombreSignoVital(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getFechaSignoVital() {
        return $this->fechaSignoVital;
    }

    public function setFechaSignoVital(DateTime $fechaSignoVital) {
        $this->fechaSignoVital = $fechaSignoVital;
    }

    public function getResultadoMedicionSignoVital() {
        return $this->resultadoMedicion;
    }

    public function setResultadoMedicionSignoVital(string $resultadoMedicion) {
        $this->resultadoMedicion = $resultadoMedicion;
    }

    public function getSignoVital() {
        return $this->signoVital;
    }

    public function setSignoVital(SignoVital $signoVital) {
        $this->signoVital = $signoVital;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function parseXML(DOMDocument $DOM, array $descripcion = []) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.4');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '8716-3');
        $code->setAttribute('displayName', 'Signos Vitales');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Signos Vitales');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($signoVital) {
            return $signoVital->getSignosVitales();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $section->appendChild($entry);

        $organizer = $DOM->createElement('organizer', '');
        $entry->appendChild($organizer);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code1->setAttribute('codeSystemName', 'SNOMED CT');
        $code1->setAttribute('code', '46680005');
        $code1->setAttribute('displayName', 'Signos vitales');
        $organizer->appendChild($code1);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $organizer->appendChild($statusCode);

        $component1 = $DOM->createElement('component', '');
        $organizer->appendChild($component1);

        $observation = $DOM->createElement('observation', '');
        $observation->setAttribute('classCode', 'OBS');
        $observation->setAttribute('moodCode', 'EVN');
        $component1->appendChild($observation);

        $code2 = $DOM->createElement('code', '');
        $code2->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code2->setAttribute('codeSystemName', 'LOINC');
        $code2->setAttribute('code', '--Valor del identificador del signo vital a medir--');
        $code2->setAttribute('displayName', '--Nombre del signo vital a medir--');
        $observation->appendChild($code2);

        $statusCode1 = $DOM->createElement('statusCode', '');
        $statusCode1->setAttribute('code', 'completed');
        $observation->appendChild($statusCode1);

        $effectiveTime = $DOM->createElement('effectiveTime', '');
        $effectiveTime->setAttribute('value', '--aaaammddhhiiss--');
        $observation->appendChild($effectiveTime);

        $value = $DOM->createElement('value', '');
        $value->setAttribute('xsi:type', 'PQ');
        $value->setAttribute('value', '--Resultado de la medición--');
        $value->setAttribute('unit', '--Unidad de expresión del resultado--');
        $observation->appendChild($value);

        return $DOM;
    }
}