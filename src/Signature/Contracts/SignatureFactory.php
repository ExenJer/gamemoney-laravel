<?php


namespace ExenJer\GamemoneyLaravel\Signature\Contracts;


interface SignatureFactory
{
    /**
     * Get a HMAC instance of signature.
     *
     * @return Signature
     */
    public function getHmacSign(): Signature;
}
