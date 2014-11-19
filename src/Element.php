<?php

namespace Pillar\SimpleDom;

use DOMDocument;
use DOMElement;

class Element
{
    /**
     * @var DOMElement
     */
    protected $element;

    /**
     * @param DOMElement $element
     */
    public function __construct(DOMElement $element)
    {
        $this->element = $element;
    }

    /**
     * @param $name
     * @return Element[]
     */
    public function getElements($name)
    {
        $nodeList = $this->element->getElementsByTagName($name);
        $elements = [];

        foreach ($nodeList as $xmlElement) {
            $elements[] = new static($xmlElement);
        }

        return $elements;
    }

    /**
     * @param $name
     * @return Element
     */
    public function getElement($name)
    {
        $elements = $this->getElements($name);
        return reset($elements);
    }

    /**
     * @param $name
     * @return string
     */
    public function getValue($name)
    {
        $nodeList = $this->element->getElementsByTagName($name);
        $element = $nodeList->item(0);
        return $element->nodeValue;
    }

    /**
     * @param $name
     * @return array
     */
    public function getValues($name)
    {
        $nodeList = $this->element->getElementsByTagName($name);
        $values = [];

        foreach ($nodeList as $element) {
            $values[] = $element->nodeValue;
        }

        return $values;
    }

    /**
     * @return DOMElement
     */
    public function getDOMElement()
    {
        return $this->element;
    }

    /**
     * @param $xmlString
     * @return Element
     */
    public static function xml($xmlString)
    {
        $doc = new DOMDocument();
        $doc->loadXML($xmlString);
        return new static($doc->documentElement);
    }

    /**
     * @param $htmlString
     * @return Element
     */
    public static function html($htmlString)
    {
        $doc = new DOMDocument();
        $doc->loadHTML($htmlString);
        return new static($doc->documentElement);
    }
}
