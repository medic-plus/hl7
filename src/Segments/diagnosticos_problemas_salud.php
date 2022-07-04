<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Diagnostico;

class diagnosticos_problemas_salud {
    private string $descripcion;
    private ?DateTime $fechaIniProblemaDiagnostico;
    private ?DateTime $fechaFinProblemaDiagnostico;
    private int $identificadorUnicoAfeccion;
    private float $numeroAfeccion;
    private string $nombreTipoDiagnostico;
    private string $descripcionProblemaDiagnosticado;
    private ?Diagnostico $diagnostico;

    public function __construct(string $descripcion, DateTime $fechaIniProblemaDiagnostico = null, DateTime $fechaFinProblemaDiagnostico = null, int $identificadorUnicoAfeccion, float $numeroAfeccion, string $nombreTipoDiagnostico, string $descripcionProblemaDiagnosticado, Diagnostico $diagnostico = null) {
        $this->descripcion = $descripcion;
        $this->fechaIniProblemaDiagnostico = $fechaIniProblemaDiagnostico;
        $this->fechaFinProblemaDiagnostico = $fechaFinProblemaDiagnostico;
        $this->identificadorUnicoAfeccion = $identificadorUnicoAfeccion;
        $this->numeroAfeccion = $numeroAfeccion;
        $this->nombreTipoDiagnostico = $nombreTipoDiagnostico;
        $this->descripcionProblemaDiagnosticado = $descripcionProblemaDiagnosticado;
        $this->diagnostico = $diagnostico;
    }

    public function getDescripcionDiagnosticos() {
        return $this->descripcion;
    }

    public function setDescripcionDiagnosticos(string $descripcion) {
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

    public static function diagnosticoXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('title', 'Diagnosticos y problemas de salud');
        $documentoElement2 = $documento->createElement('text', 'Diagnosticos y problemas de salud');
        $documentoElement3 = $documento->createElement('thead', '');
        $documentoElement4 = $documento->createElement('tr', '');
        $documentoElement5 = $documento->createElement('th', 'Tipo');
        $documentoElement6 = $documento->createElement('th', 'Fecha');
        $documentoElement7 = $documento->createElement('th', 'CIE');
        $documentoElement8 = $documento->createElement('th', 'Diagnostico');
        $documentoElement9 = $documento->createElement('th', 'Observaciones');
        $documentoElement10 = $documento->createElement('tbody', '');
        $documentoElement11 = $documento->createElement('tr', '');
        $documentoElement12 = $documento->createElement('td', 'Tipo de diagnostico');
        $documentoElement13 = $documento->createElement('td', 'Fecha y hora en el cual se presento el problema diagnosticado');
        $documentoElement14 = $documento->createElement('td', 'Clave CIE 10 del diagnostico de acuerdo a catalogo');
        $documentoElement15 = $documento->createElement('td', 'Descripcion de la diagnostico escrito por el medico');
        $documentoElement16 = $documento->createElement('td', 'Observaciones adicionales acerca del diagnostico');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
        $documento->appendChild($documentoElement4);
        $documento->appendChild($documentoElement5);
        $documento->appendChild($documentoElement6);
        $documento->appendChild($documentoElement7);
        $documento->appendChild($documentoElement8);
        $documento->appendChild($documentoElement9);
        $documento->appendChild($documentoElement10);
        $documento->appendChild($documentoElement11);
        $documento->appendChild($documentoElement12);
        $documento->appendChild($documentoElement13);
        $documento->appendChild($documentoElement14);
        $documento->appendChild($documentoElement15);
        $documento->appendChild($documentoElement16);
    }
}

diagnosticos_problemas_salud::diagnosticoXML();
