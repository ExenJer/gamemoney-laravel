<?php


namespace ExenJer\GamemoneyLaravel\Signature;

use ExenJer\GamemoneyLaravel\Signature\Contracts\Signature;


final class RSASignature implements Signature
{
    /**
     * @var string
     */
    private $privateKey;

    /**
     * @var string
     */
    private $passwordPhrase;

    /**
     * Signature constructor.
     *
     * @param string $privateKey
     * @param string $passwordPhrase
     */
    public function __construct(string $privateKey, string $passwordPhrase = '')
    {
        $this->privateKey = $privateKey;
        $this->passwordPhrase = $passwordPhrase;
    }

    /**
     * @TODO
     *
     * @param array $data
     * @return string
     */
    public function getSignature(array $data): string
    {
        return '';
    }
}
