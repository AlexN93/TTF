<?php
namespace ApiBundle\Mappings;

use ApiBundle\Mappings\Specialized1;

class Specialized2 extends Specialized1 {
    protected $s2Rules;

    public function __construct() {
        parent::__construct();
        $this->s2Rules = parent::getRules();
        $this->overrideRules();
    }

    public function getRules() {
        return $this->s2Rules;
    }

    private function overrideRules(){
        $this->s2Rules["X"][true][true][false] = "T";
        $this->s2Rules["X"][true][false][true] = "S";
        $this->s2Rules["Y"]["S"] = function($d, $e, $f) {
            return $f + $d + ($d * $e / 100);
        };
    }
}