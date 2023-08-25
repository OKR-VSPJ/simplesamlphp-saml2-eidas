<?php

namespace OMSAML2\Chunks;

use DOMElement;
use SimpleSAML\XML\Chunk;

class EidasSPType
{
    const NS_EIDAS = 'http://eidas.europa.eu/saml-extensions';
    const LOCAL_NAME = 'SPType';
    const QUALIFIED_NAME = 'eidas:' . self::LOCAL_NAME;
    public $sptype = 'public';

    public function __construct(?DOMElement $xml = null)
    {
        if (!empty($xml)) {
            $this->sptype = $xml->nodeValue;
        }
    }

    public function toXML(DOMElement $parent): DOMElement
    {
        $sptype = $parent->ownerDocument->createElementNS(self::NS_EIDAS, self::QUALIFIED_NAME);
        $sptype->nodeValue = $this->sptype;

        $parent->appendChild($sptype);

        return $sptype;
    }
}