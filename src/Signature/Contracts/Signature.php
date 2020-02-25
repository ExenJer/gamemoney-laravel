<?php

namespace ExenJer\GamemoneyLaravel\Signature\Contracts;


interface Signature
{
    /**
     * Get a hashed signature.
     *
     * @param array $data
     * @return string
     */
    public function getSignature(array $data): string;
}
