<?php

namespace Medicplus\HL7;

/**
 * Class Sample
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class Sample {

    /**
     * @var  \Medicplus\HL7\Config
     */
    private $config;

    /**
     * Sample constructor.
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
}
