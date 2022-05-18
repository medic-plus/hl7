<?php

namespace Medicplus\HL7\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class HL7
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class HL7 extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'hl7.sample';
    }
}
