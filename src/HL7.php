<?php

namespace MedicPlus\HL7;

use DOMDocument;
use MedicPlus\HL7\Alergias;

/**
 * Class HL7
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class HL7 {

    /**
     * @var  \Medicplus\HL7\Config
     */
    private $config;

    /**
     * HL7 constructor.
     *
     * @param \Medicplus\HL7\Config $config
     */
    public function __construct(Config $config) {
        $this->config = $config;
    }

    /**
     * @param $name
     *
     * @return  string
     */
    public function sayHello($name) {
        $greeting = $this->config->get('greeting');

        return $greeting . ' ' . $name;
    }

    public static function domDocument(): DOMDocument {
        $doc = new DOMDocument('1.0', 'UTF-8');
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        return $doc;
    }

    public static function metodoPrueba() {
        $xml = HL7::domDocument();
        $alergia = new Alergias();
        $alergia->setAlergias("prueba");
        $alergia->toXML($xml);
    }
}

//HL7::domDocument();
HL7::metodoPrueba();