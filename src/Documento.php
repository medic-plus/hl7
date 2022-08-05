<?php

namespace Medicplus\HL7;

use Medicplus\HL7\Segments\Alergias;
use Medicplus\HL7\Segments\AntecedentesHeredofamiliares;
use Medicplus\HL7\Segments\AntecedentesNoPatologicos;
use Medicplus\HL7\Segments\AntecedentesPatologicos;
use Medicplus\HL7\Segments\DatosDestinarios;
use Medicplus\HL7\Segments\Diagnosticos;
use Medicplus\HL7\Segments\Discapacidades;
use Medicplus\HL7\Segments\Evolucion;
use Medicplus\HL7\Segments\ImpresionDiagnostica;
use Medicplus\HL7\Segments\Medicamentos;
use Medicplus\HL7\Segments\MedicamentosAdministrados;
use Medicplus\HL7\Segments\MotivoReferencia;
use Medicplus\HL7\Segments\PlanTratamiento;
use Medicplus\HL7\Segments\Procedimientos;
use Medicplus\HL7\Segments\PronosticosSalud;
use Medicplus\HL7\Segments\ResultadosEstudios;
use Medicplus\HL7\Segments\SignosVitales;
use Medicplus\HL7\Segments\Sintomatologia;

/**
 * Documento HL7
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class Documento {

    private array $alergias = [];
    private array $manifestacionIniciales = [];
    private array $antecedentesPersonales = [];
    private array $pronosticoSalud = [];
    private array $datosAfiliaciones = [];
    private array $evolucionPaciente = [];
    private array $planTratamientoTerapeuticas = [];
    private array $impresionDiagnostica = [];
    private array $descripcion = [];
    private array $motivoReferencia = [];

    public function addAlergia(Alergias $alergia) {
        array_push($this->alergias, $alergia);
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(array $alergias) {
        $this->alergias = $alergias;
    }

    public function addAntecedenteHeredofamilia(AntecedentesHeredofamiliares $descripcionHeredofamilia) {
        array_push($this->descripcion, $descripcionHeredofamilia);
    }

    public function getDescripcionHeredofamiliar() {
        return $this->descripcion;
    }

    public function setDescripcionHeredofamiliar(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addManifestacionInicial(Sintomatologia $manifestacionInicial) {
        array_push($this->manifestacionIniciales, $manifestacionInicial);
    }

    public function getManifestacionIniciales() {
        return $this->manifestacionIniciales;
    }

    public function setManifestacionIniciales(array $manifestacionIniciales) {
        $this->manifestacionIniciales = $manifestacionIniciales;
    }

    public function addAntecedentesPersonal(AntecedentesNoPatologicos $antecedentesPersonal) {
        array_push($this->antecedentesPersonales, $antecedentesPersonal);
    }

    public function getAntecedentesPersonales() {
        return $this->antecedentesPersonales;
    }

    public function setAntecedentesPersonales(array $antecedentesPersonales) {
        $this->antecedentesPersonales = $antecedentesPersonales;
    }

    public function addPronosticoSalud(PronosticosSalud $pronosticosDeSalud) {
        array_push($this->pronosticoSalud, $pronosticosDeSalud);
    }

    public function getPronosticoSalud() {
        return $this->pronosticoSalud;
    }

    public function setPronosticoSalud(array $pronosticoSalud) {
        $this->pronosticoSalud = $pronosticoSalud;
    }

    public function addDatosAfiliacion(DatosDestinarios $datosAfiliacion) {
        array_push($this->datosAfiliaciones, $datosAfiliacion);
    }

    public function getDatosAfiliaciones() {
        return $this->datosAfiliaciones;
    }

    public function setDatosAfiliaciones(array $datosAfiliaciones) {
        $this->datosAfiliaciones = $datosAfiliaciones;
    }

    public function addEvolucionPaciente(Evolucion $evolucionesPaciente) {
        array_push($this->evolucionPaciente, $evolucionesPaciente);
    }

    public function getEvolucionPaciente() {
        return $this->evolucionPaciente;
    }

    public function setEvolucionPaciente(array $evolucionPaciente) {
        $this->evolucionPaciente = $evolucionPaciente;
    }

    public function addPlanTratamientoTerapeuticas(PlanTratamiento $planTratamientos) {
        array_push($this->planTratamientoTerapeuticas, $planTratamientos);
    }

    public function getPlanTratamientoTerapeuticas() {
        return $this->planTratamientoTerapeuticas;
    }

    public function setPlanTratamientoTerapeuticas(array $planTratamientoTerapeuticas) {
        $this->planTratamientoTerapeuticas = $planTratamientoTerapeuticas;
    }

    public function addImpresionDiagnostica(ImpresionDiagnostica $impresionesDiagnosticas) {
        array_push($this->impresionDiagnostica, $impresionesDiagnosticas);
    }

    public function getImpresionDiagnostica() {
        return $this->impresionDiagnostica;
    }

    public function setImpresionDiagnostica(array $impresionDiagnostica) {
        $this->impresionDiagnostica = $impresionDiagnostica;
    }

    public function addAntecedenteHeredofamiliar(AntecedentesHeredofamiliares $descripcionHeredofamilia) {
        array_push($this->descripcion, $descripcionHeredofamilia);
    }

    public function addAntecedentePatologico(AntecedentesPatologicos $descripcionPatologico) {
        array_push($this->descripcion, $descripcionPatologico);
    }

    public function getDescripcionAntecedente() {
        return $this->descripcion;
    }

    public function setDescripcionAntecedente(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addSignosVitales(SignosVitales $descripcionSignoVital) {
        array_push($this->descripcion, $descripcionSignoVital);
    }

    public function getDescripcionSignosVitales() {
        return $this->descripcion;
    }

    public function setDescripcionSignosVitales(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addResultadosEstudios(ResultadosEstudios $descripcionResultado) {
        array_push($this->descripcion, $descripcionResultado);
    }

    public function getDescripcionEstudios() {
        return $this->descripcion;
    }

    public function setDescripcionEstudios(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addProcedimientos(Procedimientos $descripcionProcedimiento) {
        array_push($this->descripcion, $descripcionProcedimiento);
    }

    public function getDescripcionProcedimiento() {
        return $this->descripcion;
    }

    public function setDescripcionProcedimiento(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addDiscapacidades(Discapacidades $descripcionDiscapacidad) {
        array_push($this->descripcion, $descripcionDiscapacidad);
    }

    public function getDescripcionDiscapacidades() {
        return $this->descripcion;
    }

    public function setDescripcionDiscapacidades(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addMedicamentoAdministrativo(MedicamentosAdministrados $descripcionMedicamentoAdmin) {
        array_push($this->descripcion, $descripcionMedicamentoAdmin);
    }

    public function getDescripcionMedicamento() {
        return $this->descripcion;
    }

    public function setDescripcionMedicamento(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addMedicamentoPrevio(Medicamentos $descripcionMedicamentoPrevio) {
        array_push($this->descripcion, $descripcionMedicamentoPrevio);
    }

    public function getDescripcionMedicamentosPrevios() {
        return $this->descripcion;
    }

    public function setDescripcionMedicamentosPrevios(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addDiagnosticos(Diagnosticos $descripcionDiagnostico) {
        array_push($this->descripcion, $descripcionDiagnostico);
    }

    public function getDescripcionDiagnosticos() {
        return $this->descripcion;
    }

    public function setDescripcionDiagnosticos(array $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function addMotivoRerefencia(MotivoReferencia $motivosReferencias) {
        array_push($this->motivoReferencia, $motivosReferencias);
    }

    public function getMotivoReferencia() {
        return $this->motivoReferencia;
    }

    public function setMotivoReferencia(array $motivoReferencia) {
        $this->motivoReferencia = $motivoReferencia;
    }
}
