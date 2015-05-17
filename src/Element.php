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
     * @param $name
     * @param $attributeName
     * @return string
     */
    public function getAttribute($name, $attributeName) {
        $nodeList = $this->element->getElementsByTagName($name);
        $element = $nodeList->item(0);
        if ($element->hasAttribute($attributeName)) {
            return $element->getAttribute($attributeName); 
        } else {
            return null;
        }
    }
    
    /**
     * @param $name
     * @param $attributeName
     * @param $preserveStructure = true
     * @return array
     */
    public function getAttributes($name, $attributeName, $preserveStructure = true) {
        $nodeList = $this->element->getElementsByTagName($name);
        $values = [];

        foreach ($nodeList as $element) {
            if ($element->hasAttribute($attributeName)) {
                $values[] = $element->getAttribute($attributeName); 
            } else {
                if($preserveStructure) { 
                    $values[] = null;    
                } else {
                    continue;
                }
            }
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
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator()
    {
        $elements = [];

        foreach ($this->getDOMElement()->childNodes as $key => $domElement) {
            $elements[$domElement->tagName] = new static($domElement);
        }

        return new \ArrayIterator($elements);
    }

    /**
     * @return string
     */
    public function asXml()
    {
        return $this->getDOMElement()->ownerDocument->saveXML($this->getDOMElement());
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
