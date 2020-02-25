<?php


namespace ExenJer\GamemoneyLaravel\Signature;


use ExenJer\GamemoneyLaravel\Signature\Contracts\SignatureFactory;
use ExenJer\GamemoneyLaravel\Signature\Contracts\Signature as SignatureInterface;
use Illuminate\Contracts\Config\Repository as Config;

class Signature implements SignatureFactory
{
    /**
     * @var Config
     */
    private $config;

    /**
     * Signature constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return SignatureInterface
     */
    public function getHmacSign(): SignatureInterface
    {
        return new HmacSignature($this->config->get('gamemoney.hmac'));
    }

    /**
     * @return SignatureInterface
     */
    public function getRSASign(): SignatureInterface
    {
        return new RSASignature('');
    }
}
