<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use Medicplus\HL7\Catalogos\CLUES;
use Medicplus\HL7\Catalogos\MotivoEgreso;
use Medicplus\HL7\Catalogos\TipoAsentamiento;
use Medicplus\HL7\Catalogos\TipoEncuentro;
use Medicplus\HL7\Catalogos\TipoVialidad;

class encuentro_medico {
    private string $identificadorEncuentro;
    private int $valorIdentificadorEncuentro;
    private ?DateTime $fechaIniEncuentro;
    private ?DateTime $fechaFinEncuentro;
    private int $cedulaProfesionalMedicoConsultorio;
    private string $nombreMedicoConsultorio;
    private string $apellidoPaternoMedicoConsultorio;
    private string $apellidoMaternoMedicoConsultorio;
    private int $organizacionConsultada;
    private string $nombreOrganizacionConsultada;
    private string $licenciaSanitariaConsultorio;
    private string $domicilioEstablecimientoResponsable;
    private string $nombreVialidadConsultorio;
    private float $numeroExteriorDomicilio;
    private string $alfanumericoNumeroExterior;
    private string $parteAlfanumericoExterior;
    private float $numeroInteriorDomicilio;
    private string $parteAlfanumericoInterior;
    private string $asentamientoDomicilio;
    private ?TipoEncuentro $tipoEncuentro;
    private ?MotivoEgreso $motivoEgreso;
    private ?CLUES $clues;
    private ?TipoVialidad $tipoVialidad;
    private ?TipoAsentamiento $tipoAsentamiento;

    public function getIdentificadorEncuentro() {
        return $this->identificadorEncuentro;
    }

    public function setIdentificadorEncuentro(string $identificadorEncuentro) {
        $this->identificadorEncuentro = $identificadorEncuentro;
    }

    public function getValorIdentificadorEncuentro() {
        return $this->valorIdentificadorEncuentro;
    }

    public function setValorIdentificadorEncuentro(int $valorIdentificadorEncuentro) {
        $this->valorIdentificadorEncuentro = $valorIdentificadorEncuentro;
    }

    public function getFechaIniEncuentro() {
        return $this->fechaIniEncuentro;
    }

    public function setFechaIniEncuentro(DateTime $fechaIniEncuentro) {
        $this->fechaIniEncuentro = $fechaIniEncuentro;
    }

    public function getFechaFinEncuentro() {
        return $this->fechaFinEncuentro;
    }

    public function setFechaFinEncuentro(DateTime $fechaFinEncuentro) {
        $this->fechaFinEncuentro = $fechaFinEncuentro;
    }

    public function getCedulaProfesionalMedicoConsultorio() {
        return $this->cedulaProfesionalMedicoConsultorio;
    }

    public function setCedulaProfesionalMedicoConsultorio(int $cedulaProfesionalMedicoConsultorio) {
        $this->cedulaProfesionalMedicoConsultorio = $cedulaProfesionalMedicoConsultorio;
    }

    public function getNombreMedicoconsultorio() {
        return $this->nombreMedicoConsultorio;
    }

    public function setNombreMedicoConsultorio(string $nombreMedicoConsultorio) {
        $this->nombreMedicoConsultorio = $nombreMedicoConsultorio;
    }

    public function getApellidoPaternoMedicoConsultorio() {
        return $this->apellidoPaternoMedicoConsultorio;
    }

    public function setApellidoPaternoMedicoConsultorio(string $apellidoPaternoMedicoConsultorio) {
        $this->apellidoPaternoMedicoConsultorio = $apellidoPaternoMedicoConsultorio;
    }

    public function getApellidoMaternoMedicoConsultorio() {
        return $this->apellidoMaternoMedicoConsultorio;
    }

    public function setApellidoMaternoMedicoConsultorio(string $apellidoMaternoMedicoConsultorio) {
        $this->apellidoMaternoMedicoConsultorio = $apellidoMaternoMedicoConsultorio;
    }

    public function getOrganizacionConsultada() {
        return $this->organizacionConsultada;
    }

    public function setOrganizacionConsultada(int $organizacionConsultada) {
        $this->organizacionConsultada = $organizacionConsultada;
    }

    public function getNombreOrganizacionConsultada() {
        return $this->nombreOrganizacionConsultada;
    }

    public function setNombreOriganizacionConsultada(string $nombreOrganizacionConsultada) {
        $this->nombreOrganizacionConsultada = $nombreOrganizacionConsultada;
    }

    public function getLicenciaSanitariaConsultorio() {
        return $this->licenciaSanitariaConsultorio;
    }

    public function setLicenciaSanitariaConsultorio(string $licenciaSanitariaConsultorio) {
        $this->licenciaSanitariaConsultorio = $licenciaSanitariaConsultorio;
    }

    public function getDomicilioEstablecimientoResponsable() {
        return $this->domicilioEstablecimientoResponsable;
    }

    public function setDomicilioEstablecimientoResponsable(string $domicilioEstablecimientoResponsable) {
        $this->domicilioEstablecimientoResponsable = $domicilioEstablecimientoResponsable;
    }

    public function getNombreVialidadConsultorio() {
        return $this->nombreVialidadConsultorio;
    }

    public function setNombreVialidadConsultorio(string $nombreVialidadConsultorio) {
        $this->nombreVialidadConsultorio = $nombreVialidadConsultorio;
    }

    public function getNumeroExteriorDomicilio() {
        return $this->numeroExteriorDomicilio;
    }

    public function setNumeroExteriorDomicilio(float $numeroExteriorDomicilio) {
        $this->numeroExteriorDomicilio = $numeroExteriorDomicilio;
    }

    public function getAlfanumericoNumeroExterior() {
        return $this->alfanumericoNumeroExterior;
    }

    public function setAlfanumericoNumeroExterior(string $alfanumericoNumeroExterior) {
        $this->alfanumericoNumeroExterior = $alfanumericoNumeroExterior;
    }

    public function getParteAlfanumericoExterior() {
        return $this->parteAlfanumericoExterior;
    }

    public function setParteAlfanumericoExterior(string $parteAlfanumericoExterior) {
        $this->parteAlfanumericoExterior = $parteAlfanumericoExterior;
    }

    public function getNumeroInteriorDomicilio() {
        return $this->numeroInteriorDomicilio;
    }

    public function setNumeroInteriorDomicilio(float $numeroInteriorDomicilio) {
        $this->numeroInteriorDomicilio = $numeroInteriorDomicilio;
    }

    public function getParteAlfanumericoInterior() {
        return $this->parteAlfanumericoInterior;
    }

    public function setParteAlfanumericoInterior(string $parteAlfanumericoInterior) {
        $this->parteAlfanumericoInterior = $parteAlfanumericoInterior;
    }

    public function getAsentamientoDomicilio() {
        return $this->asentamientoDomicilio;
    }

    public function setAsentamientoDomicilio(string $asentamientoDomicilio) {
        $this->asentamientoDomicilio = $asentamientoDomicilio;
    }

    public function getTipoEncuentro() {
        return $this->tipoEncuentro;
    }

    public function setTipoEncuentro(TipoEncuentro $tipoEncuentro) {
        $this->tipoEncuentro = $tipoEncuentro;
    }

    public function getMotivoEgreso() {
        return $this->motivoEgreso;
    }

    public function setMotivoEgreso(MotivoEgreso $motivoEgreso) {
        $this->motivoEgreso = $motivoEgreso;
    }

    public function getClues() {
        return $this->clues;
    }

    public function setClues(CLUES $clues) {
        $this->clues = $clues;
    }

    public function getTipoVialidad() {
        return $this->tipoVialidad;
    }

    public function setTipoVialidad(TipoVialidad $tipoVialidad) {
        $this->tipoVialidad = $tipoVialidad;
    }

    public function getTipoAnsetamiento() {
        return $this->tipoAsentamiento;
    }

    public function setTipoAsentamiento(TipoAsentamiento $tipoAsentamiento) {
        $this->tipoAsentamiento = $tipoAsentamiento;
    }
}
