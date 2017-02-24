<?php

namespace OpenBibIdApi\Value\User;

use OpenBibIdApi\Value\FromDomDocumentInterface;
use OpenBibIdApi\Value\StringLiteral\StringLiteral;
use OpenBibIdApi\Value\ValueInterface;

class AutoLogin implements ValueInterface, FromDomDocumentInterface
{
    /**
     * The auto login url.
     *
     * @var StringLiteral
     */
    protected $autoLoginUrl;

    /**
     * The result code. One of AutoLogin::SUCCESS or AutoLogin::ACCESS_DENIED.
     *
     * @var StringLiteral
     */
    protected $code;

    /**
     * Force the use of static methods to create UserActivities objects.
     */
    private function __construct()
    {
    }

    /**
     * Builds a AutoLogin object from XML.
     *
     * @param \DomDocument $xml
     *   The xml tree containing the autologin.
     *
     * @return AutoLogin
     *   A AutoLogin object.
     */
    public static function fromXml(\DOMDocument $xml)
    {
        $static = new static();

        $url = $xml->getElementsByTagName('resource');
        $static->autoLoginUrl = StringLiteral::fromXml($url);

        $code = $xml->getElementsByTagName('code');
        $static->code = StringLiteral::fromXml($code);

        return $static;
    }

    /**
     * Get the autologin url.
     *
     * @return StringLiteral
     *    The autologin url.
     */
    public function getAutoLoginUrl()
    {
        return $this->autoLoginUrl;
    }

    /**
     * Get the result code. One of 'SUCCESS' or 'AccessDenied'.
     *
     * @return StringLiteral
     *   The result code.
     */
    public function getCode()
    {
        return $this->code;
    }
}
