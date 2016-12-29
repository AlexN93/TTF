<?php
namespace ApiBundle\Mappings;

use ApiBundle\Mappings\Base;

class Specialized1 extends Base {
    protected $s1Rules;

    public function __construct() {
        parent::__construct();
        $this->s1Rules = parent::getRules();
        $this->overrideRules();
    }

    public function getRules() {
        return $this->s1Rules;
    }

    private function overrideRules() {
        $this->s1Rules["Y"]["R"] = function($d, $e, $f) {
            return 2 * $d + ($d * $e / 100);
        };
    }
}