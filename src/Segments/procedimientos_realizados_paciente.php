<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Padecimiento;
use Medicplus\HL7\Segments\Catalogos\ServicioProcedimiento;

class procedicmientos_realizados_paciente {
    private string $descripcionProcedimiento;
    private string $descripcionRealizado;
    private ?DateTime $fechaProcedimiento;
    private int $cedulaProfesionalMedico;
    private string $nombreMedicoResponsable;
    private string $apellidoPaternoMedicoResponsable;
    private string $apellidoMaternoMedicoResponsable;
    private string $nombreServicioRealizado;
    private ?Padecimiento $padecimiento;
    private ?ServicioProcedimiento $servicioProcedimiento;

    public function __construct(string $descripcionProcedimiento, string $descripcionRealizado, DateTime $fechaProcedimiento = null, int $cedulaProfesionalMedico, string $nombreMedicoResponsable, string $apellidoPaternoMedicoResponsable, string $apellidoMaternoMedicoResponsable, string $nombreServicioRealizado, Padecimiento $padecimiento = null, ServicioProcedimiento $servicioProcedimiento = null) {
        $this->descripcionProcedimiento = $descripcionProcedimiento;
        $this->descripcionRealizado = $descripcionRealizado;
        $this->fechaProcedimiento = $fechaProcedimiento;
        $this->cedulaProfesionalMedico = $cedulaProfesionalMedico;
        $this->nombreMedicoResponsable = $nombreMedicoResponsable;
        $this->apellidoPaternoMedicoResponsable = $apellidoPaternoMedicoResponsable;
        $this->apellidoMaternoMedicoResponsable = $apellidoMaternoMedicoResponsable;
        $this->nombreServicioRealizado = $nombreServicioRealizado;
        $this->padecimiento = $padecimiento;
        $this->servicioProcedimiento = $servicioProcedimiento;
    }

    public function getDescripcionProcedimiento() {
        return $this->descripcionProcedimiento;
    }

    public function setDescripcionProcedimiento(string $descripcionProcedimiento) {
        $this->descripcionProcedimiento = $descripcionProcedimiento;
    }

    public function getDescripcionRealizado() {
        return $this->descripcionRealizado;
    }

    public function setDescripcionRealizado(string $descripcionRealizado) {
        $this->descripcionRealizado = $descripcionRealizado;
    }

    public function getFechaProcedimiento() {
        return $this->fechaProcedimiento;
    }

    public function setFechaProcedimiento(DateTime $fechaProcedimiento) {
        $this->fechaProcedimiento = $fechaProcedimiento;
    }

    public function getCedulaProfesionalMedico() {
        return $this->cedulaProfesionalMedico;
    }

    public function setCedulaProfesionalMedico(int $cedulaProfesionalMedico) {
        $this->cedulaProfesionalMedico = $cedulaProfesionalMedico;
    }

    public function getNombreMedicoResponsable() {
        return $this->nombreMedicoResponsable;
    }

    public function setNombreMedicoResponsable(string $nombreMedicoResponsable) {
        $this->nombreMedicoResponsable = $nombreMedicoResponsable;
    }

    public function getApellidoPaternoMedicoResponsable() {
        return $this->apellidoPaternoMedicoResponsable;
    }

    public function setApellidoPaternoMedicoResponsable(string $apellidoPaternoMedicoResponsable) {
        $this->apellidoPaternoMedicoResponsable = $apellidoPaternoMedicoResponsable;
    }

    public function getApellidoMaternoMedicoResponsable() {
        return $this->apellidoMaternoMedicoResponsable;
    }

    public function setApellidoMaternoMedicoResponsable(string $apellidoMaternoMedicoResponsable) {
        $this->apellidoMaternoMedicoResponsable = $apellidoMaternoMedicoResponsable;
    }

    public function getNombreServicioRealizado() {
        return $this->nombreServicioRealizado;
    }

    public function setNombreServicioRealizado(string $nombreServicioRealizado) {
        $this->nombreServicioRealizado = $nombreServicioRealizado;
    }

    public function getPadecimiento() {
        return $this->padecimiento;
    }

    public function setPadecimiento(Padecimiento $padecimiento) {
        $this->padecimiento = $padecimiento;
    }

    public function getServicioProcedimiento() {
        return $this->servicioProcedimiento;
    }

    public function setServicioProcedimiento(ServicioProcedimiento $servicioProcedimiento) {
        $this->servicioProcedimiento = $servicioProcedimiento;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcionProcedimiento);
        $documento->appendChild($segmento);
    }

    public static function procedimientosXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Procedimientos quirurgicos y terapeuticos');
        $documentoElement3 = $documento->createElement('text', '');
        $documentoElement4 = $documento->createElement('table', '');
        $documentoElement5 = $documento->createElement('thead', '');
        $documentoElement6 = $documento->createElement('tr', '');
        $documentoElement7 = $documento->createElement('th', 'CIE9-MC');
        $documentoElement8 = $documento->createElement('th', 'Procedimiento');
        $documentoElement9 = $documento->createElement('th', 'Estado');
        $documentoElement10 = $documento->createElement('th', 'Activo');
        $documentoElement11 = $documento->createElement('tbody', '');
        $documentoElement12 = $documento->createElement('tr', '');
        $documentoElement13 = $documento->createElement('td', 'Valor del identificador del procedimiento de acuerdo a catalogo CIE9-MC');
        $documentoElement14 = $documento->createElement('td', 'Nombre del procedimiento de acuerdo a catalogo CIE9-MC');
        $documentoElement15 = $documento->createElement('td', 'Situacion actual en la que se encuentra el procedimiento');
        $documentoElement16 = $documento->createElement('td', 'Señalamiento si el procedimiento se encuentra activo (Si/No)');
        $documentoElement17 = $documento->createElement('td', 'Observaciones adicionales acerca del procedimiento');
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
        $documento->appendChild($documentoElement17);
    }
}

procedicmientos_realizados_paciente::procedimientosXML();
