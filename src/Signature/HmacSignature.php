<?php


namespace ExenJer\GamemoneyLaravel\Signature;


use ExenJer\GamemoneyLaravel\Signature\Contracts\Signature;
use ExenJer\GamemoneyLaravel\Utilities\Arr;

class HmacSignature implements Signature
{
    /**
     * @var string
     */
    private $privateKey;

    /**
     * HmacSignature constructor.
     *
     * @param string $privateKey
     */
    public function __construct(string $privateKey)
    {
        $this->privateKey = $privateKey;
    }

    /**
     * @param array $data
     * @return string
     */
    public function getSignature(array $data): string
    {
        return hash_hmac('sha256', Arr::toSignString($data), $this->privateKey);
    }
}
