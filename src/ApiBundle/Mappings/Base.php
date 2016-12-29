<?php
namespace ApiBundle\Mappings;

class Base {
    protected $rules;

    public function __construct() {
        $this->rules = array(
            "X" => array (
                true => array(
            		true => array(
            			false => "S",
            			true => "R"
            		)
            	),
                false => array(
            		true => array(
            			true => "T"
            		)
            	)
            ),
            "Y" => array (
                "S" => function($d, $e, $f) {
                    return $d + ($d * $e / 100);
                },
                "R" => function($d, $e, $f) {
                    return $d + ($d * ($e - $f) / 100);
                },
                "T" => function($d, $e, $f) {
                    return $d - ($d * $f / 100);
                }
            )
        );
    }

    public function getRules() {
        return $this->rules;
    }
}
