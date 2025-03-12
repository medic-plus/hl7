<?php

foreach (glob(__DIR__ . "/Sections/*.php") as $archivo) {
    require_once $archivo;
}

foreach (glob(__DIR__ . "/Catalogues/*.php") as $archivo) {
    require_once $archivo;
}

require_once 'attributes.php';
require '../vendor/autoload.php';

use Spatie\ArrayToXml\ArrayToXml;

class Patient {
    protected $attributes;

    function __construct()
    {
        $this->attributes = new Attributes();
    }

    public function __set($name, $value) {
        if (property_exists($this->attributes, $name)) {
            $this->attributes->$name = $value;
        } else {
           echo "La variable $name no existe\n";
        }
    }

    private function getFile() {
        return array_merge_recursive(
            SeccionHeader::getHeader($this),
            SeccionPaciente::getPatientSection($this),
            InformationRecipientSection::getInformationRecipientSection($this),
            AuthorSection::getAuthorSection($this),
            DataEntererSection::getDataEntererSection($this),
            CustodianSection::getCustodianSection($this),
            LegaluthenticatorSection::getLegalAuthenticatorSection($this),
            DocumentationOfSection::getDocumentOfSection($this),
            ComponentOfSection::getComponentOfSection($this),
            ComponentsSection::getComponentsSection($this)
        );
    }

    protected function deleteNulls($array) {
        foreach ($array as $key => $value) {
    
            if (is_array($value)) {
    
                $array[$key] = $this->deleteNulls($value);
                
                if (empty($array[$key])) {
                    unset($array[$key]);
                }
            }
            
        }
    
        return array_filter($array, function ($v) {
            return $v !== null;
        });
    }
    

    function export() {
        $array_to_xml = new ArrayToXml($this->getFile(), 'ClinicalDocument');
        $array_to_xml->setDomProperties(['formatOutput' => 'true']);
        $xml = $array_to_xml->toXml();
        file_put_contents('xml.xml', $xml);
    }
}

$p = new Patient();
$p->export();

?>