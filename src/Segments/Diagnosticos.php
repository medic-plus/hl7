<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Diagnostico;

class Diagnosticos {
    private string $descripcion;
    private ?DateTime $fechaIniProblemaDiagnostico;
    private ?DateTime $fechaFinProblemaDiagnostico;
    private int $identificadorUnicoAfeccion;
    private float $numeroAfeccion;
    private string $nombreTipoDiagnostico;
    private string $descripcionProblemaDiagnosticado;
    private ?Diagnostico $diagnostico;

    public function __construct(string $descripcion, int $identificadorUnicoAfeccion, float $numeroAfeccion, string $nombreTipoDiagnostico, string $descripcionProblemaDiagnosticado, DateTime $fechaIniProblemaDiagnostico = null, DateTime $fechaFinProblemaDiagnostico = null, Diagnostico $diagnostico = null) {
        $this->descripcion = $descripcion;
        $this->fechaIniProblemaDiagnostico = $fechaIniProblemaDiagnostico;
        $this->fechaFinProblemaDiagnostico = $fechaFinProblemaDiagnostico;
        $this->identificadorUnicoAfeccion = $identificadorUnicoAfeccion;
        $this->numeroAfeccion = $numeroAfeccion;
        $this->nombreTipoDiagnostico = $nombreTipoDiagnostico;
        $this->descripcionProblemaDiagnosticado = $descripcionProblemaDiagnosticado;
        $this->diagnostico = $diagnostico;
    }

    public function getDiagnosticos() {
        return $this->descripcion;
    }

    public function setDiagnosticos(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFechaIniProblemaDiagnostico() {
        return $this->fechaIniProblemaDiagnostico;
    }

    public function setFechaIniProblemaDiagnostico(DateTime $fechaIniProblemaDiagnostico) {
        $this->fechaIniProblemaDiagnostico = $fechaIniProblemaDiagnostico;
    }

    public function getFechaFinProblemaDiagnostico() {
        return $this->fechaFinProblemaDiagnostico;
    }

    public function setFechaFinProblemaDiagnostico(DateTime $fechaFinProblemaDiagnostico) {
        $this->fechaFinProblemaDiagnostico = $fechaFinProblemaDiagnostico;
    }

    public function getIdentificadorUnicoAfeccion() {
        return $this->identificadorUnicoAfeccion;
    }

    public function setIdentificadorUnicoAfeccion(int $identificadorUnicoAfeccion) {
        $this->identificadorUnicoAfeccion = $identificadorUnicoAfeccion;
    }

    public function getNumeroAfeccion() {
        return $this->numeroAfeccion;
    }

    public function setNumeroAfeccion(float $numeroAfeccion) {
        $this->numeroAfeccion = $numeroAfeccion;
    }

    public function getNombreTipoDiagnostico() {
        return $this->nombreTipoDiagnostico;
    }

    public function setNombreTipoDiagnostico(string $nombreTipoDiagnostico) {
        $this->nombreTipoDiagnostico = $nombreTipoDiagnostico;
    }

    public function getDescripcionProblemaDiagnosticado() {
        return $this->descripcionProblemaDiagnosticado;
    }

    public function setDescripcionProblemaDiagnosticado(string $descripcionProblemaDiagnosticado) {
        $this->descripcionProblemaDiagnosticado = $descripcionProblemaDiagnosticado;
    }

    public function getDiagnostico() {
        return $this->diagnostico;
    }

    public function setDiagnostico(Diagnostico $diagnostico) {
        $this->diagnostico = $diagnostico;
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
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.5');
        $section->appendChild($templateId);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.5.1');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '11450-4');
        $code->setAttribute('displayName', 'Lista de Problemas');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Diagnósticos y problemas de salud');
        $section->appendChild($title);

        $descripcionsContent = array_map(function ($descripcionDiagnostico) {
            return $descripcionDiagnostico->getDiagnosticos();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionsContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $entry->setAttribute('typeCode', 'DRIV');
        $section->appendChild($entry);

        $act = $DOM->createElement('act', '');
        $act->setAttribute('classCode', 'ACT');
        $act->setAttribute('moodCode', 'EVN');
        $entry->appendChild($act);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.5.6');
        $code1->setAttribute('code', 'CONC');
        $code1->setAttribute('displayName', 'Concern');
        $act->appendChild($code1);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $act->appendChild($statusCode);

        $effectiveTime = $DOM->createElement('effectiveTime', '');
        $act->appendChild($effectiveTime);

        $low = $DOM->createElement('low', '');
        $low->setAttribute('value', '--Fecha y hora de inicio de la afección / problema--');
        $effectiveTime->appendChild($low);

        $high = $DOM->createElement('high', '');
        $high->setAttribute('value', '--Fecha y hora de término de la afección / problema--');
        $effectiveTime->appendChild($high);

        $entryRelationship = $DOM->createElement('entryRelationship', '');
        $entryRelationship->setAttribute('typeCode', 'SUBJ');
        $act->appendChild($entryRelationship);

        $observation = $DOM->createElement('observation', '');
        $observation->setAttribute('classCode', 'OBS');
        $observation->setAttribute('moodCode', 'EVN');
        $entryRelationship->appendChild($observation);

        $id = $DOM->createElement('id', '');
        $id->setAttribute('root', '--Identificador único de la afección--');
        $id->setAttribute('extension', '--Número de la afección--');
        $observation->appendChild($id);

        $code2 = $DOM->createElement('code', '');
        $code2->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code2->setAttribute('codeSystemName', 'SNOMED CT');
        $code2->setAttribute('code', '282291009');
        $code2->setAttribute('displayName', 'Diagnóstico');
        $observation->appendChild($code2);

        $text = $DOM->createElement('text', '--Descripción en texto libre del diagnóstico introducido por el médico--');
        $observation->appendChild($text);

        $statusCode1 = $DOM->createElement('statusCode', '');
        $statusCode1->setAttribute('code', 'completed');
        $observation->appendChild($statusCode1);

        $value = $DOM->createElement('value', '');
        $value->setAttribute('xsi:type', 'CE');
        $value->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value->setAttribute('codeSystemName', 'ICD-10');
        $value->setAttribute('code', '--Valor del identificador del diagnóstico de acuerdo a catálogo--');
        $value->setAttribute('displayName', '--Nombre del diagnóstico de acuerdo a catálogo--');
        $observation->appendChild($value);

        return $DOM;
    }
}
