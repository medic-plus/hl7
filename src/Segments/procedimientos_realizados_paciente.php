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
}