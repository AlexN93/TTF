<?php

namespace ApiBundle\Handler;

interface MappingHandlerInterface
{
    /**
     * Post Parameters, creates a new Parameters object.
     *
     * @api
     *
     * @param Request $request
     *
     * @return ItemInterface
     */
    public function post($request);

    /**
     * Get all Parameters.
     *
     * @api
     *
     * @return Parameter
     */
    public function getAll();

    /**
     * Get a Parameter.
     *
     * @api
     *
     * @param int $id
     *
     * @return ItemInterface
     */
    public function get($id);
}
