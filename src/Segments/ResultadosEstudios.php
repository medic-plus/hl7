<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\TipoEstudio;
use Medicplus\HL7\Segments\Catalogos\TipoResultado;

class ResultadosEstudios {

    private string $descripcion;
    private string $identificadorEstudios;
    private string $nombreEstudios;
    private string $identificadorResultados;
    private string $nombreResultados;
    private ?DateTime $fechaHoraResultado;
    private string $valorResultado;
    private string $unidadResultado;
    private string $rangoResultado;
    private ?TipoEstudio $tipoEstudio;
    private ?TipoResultado $tipoResultado;

    public function __construct(string $descripcion, string $identificadorEstudios, string $nombreEstudios, string $identificadorResultados, string $nombreResultados, string $valorResultado, string $unidadResultado, string $rangoResultado, DateTime $fechaHoraResultado = null, TipoEstudio $tipoEstudio = null, TipoResultado $tipoResultado = null) {
        $this->descripcion = $descripcion;
        $this->identificadorEstudios = $identificadorEstudios;
        $this->nombreEstudios = $nombreEstudios;
        $this->identificadorResultados = $identificadorResultados;
        $this->nombreResultados = $nombreResultados;
        $this->fechaHoraResultado = $fechaHoraResultado;
        $this->valorResultado = $valorResultado;
        $this->unidadResultado = $unidadResultado;
        $this->rangoResultado = $rangoResultado;
        $this->tipoEstudio = $tipoEstudio;
        $this->tipoResultado = $tipoResultado;
    }

    public function getResultados() {
        return $this->descripcion;
    }

    public function setResultados(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getIdentificadorEstudios() {
        return $this->identificadorEstudios;
    }

    public function setIdentificadorEstudios(string $identificadorEstudios) {
        $this->identificadorEstudios = $identificadorEstudios;
    }

    public function getNombreEstudios() {
        return $this->nombreEstudios;
    }

    public function setNombreEstudios(string $nombreEstudios) {
        $this->nombreEstudios = $nombreEstudios;
    }

    public function getIdentificadorResultados() {
        return $this->identificadorResultados;
    }

    public function setIdentificadorResultados(string $identificadorResultados) {
        $this->identificadorResultados = $identificadorResultados;
    }

    public function getNombreResultados() {
        return $this->nombreResultados;
    }

    public function setNombreResultados(string $nombreResultados) {
        $this->nombreResultados = $nombreResultados;
    }

    public function getFechaHoraResultado() {
        return $this->fechaHoraResultado;
    }

    public function setFechaHoraResultado(DateTime $fechaHoraResultado) {
        $this->fechaHoraResultado = $fechaHoraResultado;
    }

    public function getValorResultado() {
        return $this->valorResultado;
    }

    public function setValorResultado(string $valorResultado) {
        $this->valorResultado = $valorResultado;
    }

    public function getUnidadResultado() {
        return $this->unidadResultado;
    }

    public function setUnidadResultado(string $unidadResultado) {
        $this->unidadResultado = $unidadResultado;
    }

    public function getRangoResultado() {
        return $this->rangoResultado;
    }

    public function setRangoResultado(string $rangoResultado) {
        $this->rangoResultado = $rangoResultado;
    }

    public function getTipoEstudio() {
        return $this->tipoEstudio;
    }

    public function setTipoEstudio(TipoEstudio $tipoEstudio) {
        $this->tipoEstudio = $tipoEstudio;
    }

    public function getTipoResultado() {
        return $this->tipoResultado;
    }

    public function setTipoResultado(TipoResultado $tipoResultado) {
        $this->tipoResultado = $tipoResultado;
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
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.3.1');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '30954-2');
        $code->setAttribute('displayName', 'Estudios de Laboratorio');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Estudios de laboratorio');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($resultado) {
            return $resultado->getResultados();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        $paragraph = $DOM->createElement('paragraph', '--Identificación de la batería de pruebas o estudios de laboratorio realizados--');
        $section->appendChild($paragraph);

        $entry = $DOM->createElement('entry', '');
        $section->appendChild($entry);

        $organizer = $DOM->createElement('organizer', '');
        $organizer->setAttribute('classCode', 'BATTERY');
        $organizer->setAttribute('moodCode', 'EVN');
        $entry->appendChild($organizer);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '--OID del sistema de codificación--');
        $code1->setAttribute('codeSystemName', '--Nombre del sistema de codificación--');
        $code1->setAttribute('code', '--Clave de la batería realizada--');
        $code1->setAttribute('displayName', '--Nombre de la batería');
        $organizer->appendChild($code1);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $organizer->appendChild($statusCode);

        $component = $DOM->createElement('component', '');
        $organizer->appendChild($component);

        $observation = $DOM->createElement('observation', '');
        $observation->setAttribute('classCode', 'OBS');
        $observation->setAttribute('moodCode', 'EVN');
        $component->appendChild($observation);

        $code2 = $DOM->createElement('code', '');
        $code2->setAttribute('codeSystem', '--OID del sistema de codificación--');
        $code2->setAttribute('codeSystemName', '--Nombre del sistema de codificación--');
        $code2->setAttribute('code', '--Clave de la prueba realizada--');
        $code2->setAttribute('displayName', '--Nombre de la prueba realizada--');
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

        $referenceRange = $DOM->createElement('referenceRange', '');
        $observation->appendChild($referenceRange);

        $observationRange = $DOM->createElement('observationRange', '');
        $referenceRange->appendChild($observationRange);

        $text = $DOM->createElement('text', '--Rango de referencia para el resultado--');
        $observationRange->appendChild($text);

        return $DOM;
    }
}