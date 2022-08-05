<?php

namespace Medicplus\HL7;

use DOMDocument;
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
class DocumentParser {

    private Documento $documento;
    private DOMDocument $DOM;
    private \Medicplus\HL7\Config $config;

    /**
     * DocumentParser constructor
     *
     * @param \Medicplus\HL7\Config $config
     */
    public function __construct(?Config $config, ?Documento $documento) {
        $this->documento = $documento ?? new Documento();
        $this->config = $config ?? new Config();
        $this->resetDOM();
    }

    public function resetDOM() {
        $this->DOM = new DOMDocument('1.0', 'UTF-8');
        $this->DOM->preserveWhiteSpace = false;
        $this->DOM->formatOutput = true;
    }

    public function getDOM(): DOMDocument {
        return $this->DOM;
    }

    public function getDocumento(): Documento {
        return $this->documento;
    }

    public function setDocumento(Documento $documento) {
        $this->documento = $documento;
        $this->resetDOM();
    }

    public function parseAlergias() {
        if (sizeof($this->documento->getAlergias()) > 0) {
            $this->DOM = Alergias::parseXML($this->DOM, $this->documento->getAlergias());
        }
    }

    public function parseAntecedentesHeredofamiliares() {
        if (sizeof($this->documento->getDescripcionHeredofamiliar()) > 0) {
            $this->DOM = AntecedentesHeredofamiliares::parseXML($this->DOM, $this->documento->getDescripcionHeredofamiliar());
        }
    }

    public function parseAntecedentesNoPatologicos() {
        if (sizeof($this->documento->getAntecedentesPersonales()) > 0) {
            $this->DOM = AntecedentesNoPatologicos::parseXML($this->DOM, $this->documento->getAntecedentesPersonales());
        }
    }

    public function parseAntecedentesPatologicos() {
        if (sizeof($this->documento->getDescripcionAntecedente()) > 0) {
            $this->DOM = AntecedentesPatologicos::parseXML($this->DOM, $this->documento->getDescripcionAntecedente());
        }
    }

    public function parseDatosDestinarios() {
        if (sizeof($this->documento->getDatosAfiliaciones()) > 0) {
            $this->DOM = DatosDestinarios::parseXML($this->DOM, $this->documento->getDatosAfiliaciones());
        }
    }

    public function parseDiagnostico() {
        if (sizeof($this->documento->getDescripcionDiagnosticos()) > 0) {
            $this->DOM = Diagnosticos::parseXML($this->DOM, $this->documento->getDescripcionDiagnosticos());
        }
    }

    public function parseDiscapacidades() {
        if (sizeof($this->documento->getDescripcionDiscapacidades()) > 0) {
            $this->DOM = Discapacidades::parseXML($this->DOM, $this->documento->getDescripcionDiscapacidades());
        }
    }

    public function parseEvolucion() {
        if (sizeof($this->documento->getEvolucionPaciente()) > 0) {
            $this->DOM = Evolucion::parseXML($this->DOM, $this->documento->getEvolucionPaciente());
        }
    }

    public function parseImpresionDiagnostica() {
        if (sizeof($this->documento->getImpresionDiagnostica()) > 0) {
            $this->DOM = ImpresionDiagnostica::parseXML($this->DOM, $this->documento->getImpresionDiagnostica());
        }
    }

    public function parseMedicamentos() {
        if (sizeof($this->documento->getDescripcionMedicamentosPrevios()) > 0) {
            $this->DOM = Medicamentos::parseXML($this->DOM, $this->documento->getDescripcionMedicamentosPrevios());
        }
    }

    public function parseMedicamentosAdministrados() {
        if (sizeof($this->documento->getDescripcionMedicamento()) > 0) {
            $this->DOM = MedicamentosAdministrados::parseXML($this->DOM, $this->documento->getDescripcionMedicamento());
        }
    }

    public function parseMotivoReferencia() {
        if (sizeof($this->documento->getMotivoReferencia()) > 0) {
            $this->DOM = MotivoReferencia::parseXML($this->DOM, $this->documento->getMotivoReferencia());
        }
    }

    public function parsePlanTratamiento() {
        if (sizeof($this->documento->getPlanTratamientoTerapeuticas()) > 0) {
            $this->DOM = PlanTratamiento::parseXML($this->DOM, $this->documento->getPlanTratamientoTerapeuticas());
        }
    }

    public function parseProcedimientos() {
        if (sizeof($this->documento->getDescripcionProcedimiento()) > 0) {
            $this->DOM = Procedimientos::parseXML($this->DOM, $this->documento->getDescripcionProcedimiento());
        }
    }

    public function parsePronosticosSalud() {
        if (sizeof($this->documento->getPronosticoSalud()) > 0) {
            $this->DOM = PronosticosSalud::parseXML($this->DOM, $this->documento->getPronosticoSalud());
        }
    }

    public function parseResultadosEstudios() {
        if (sizeof($this->documento->getDescripcionEstudios()) > 0) {
            $this->DOM = ResultadosEstudios::parseXML($this->DOM, $this->documento->getDescripcionEstudios());
        }
    }

    public function parseSignosVitales() {
        if (sizeof($this->documento->getDescripcionSignosVitales()) > 0) {
            $this->DOM = SignosVitales::parseXML($this->DOM, $this->documento->getDescripcionSignosVitales());
        }
    }

    public function parseSintomatologia() {
        if (sizeof($this->documento->getManifestacionIniciales()) > 0) {
            $this->DOM = Sintomatologia::parseXML($this->DOM, $this->documento->getManifestacionIniciales());
        }
    }

    public function toXML() {
        $this->parseAlergias();
        $this->parseAntecedentesHeredofamiliares();
        $this->parseAntecedentesNoPatologicos();
        $this->parseAntecedentesPatologicos();
        $this->parseDatosDestinarios();
        $this->parseDiagnostico();
        $this->parseDiscapacidades();
        $this->parseEvolucion();
        $this->parseImpresionDiagnostica();
        $this->parseMedicamentos();
        $this->parseMedicamentosAdministrados();
        $this->parseMotivoReferencia();
        $this->parsePlanTratamiento();
        $this->parseProcedimientos();
        $this->parsePronosticosSalud();
        $this->parseResultadosEstudios();
        $this->parseSignosVitales();
        $this->parseSintomatologia();
        return $this->DOM->saveXML();
    }
}
