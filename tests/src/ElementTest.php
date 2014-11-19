<?php

namespace Pillar\SimpleDom;

use Mockery as m;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $domElement = m::mock(\DOMElement::class);
        $element = new Element($domElement);

        $this->assertInstanceOf(Element::class, $element);
    }

    public function testGetElements()
    {
        $a = m::mock(\DOMElement::class);

        $domElement = m::mock(\DOMElement::class);
        $domElement->shouldReceive('getElementsByTagName')
            ->with('foo')
            ->once()
            ->andReturn([$a]);

        $element = new Element($domElement);
        $elements = $element->getElements('foo');

        $this->assertCount(1, $elements);
    }

    public function testGetElement()
    {
        $a = m::mock(\DOMElement::class);

        $domElement = m::mock(\DOMElement::class);
        $domElement->shouldReceive('getElementsByTagName')
            ->with('foo')
            ->once()
            ->andReturn([$a]);

        $element = new Element($domElement);
        $element = $element->getElement('foo');

        $this->assertInstanceOf(Element::class, $element);
    }

    public function testGetValue()
    {
        $a = new \DOMElement('foo', 'bar');

        $domNodeList = m::mock(\DOMNodeList::class);
        $domNodeList->shouldReceive('item')
            ->with(0)
            ->once()
            ->andReturn($a);

        $domElement = m::mock(\DOMElement::class);
        $domElement->shouldReceive('getElementsByTagName')
            ->with('foo')
            ->once()
            ->andReturn($domNodeList);

        $element = new Element($domElement);
        $value = $element->getValue('foo');

        $this->assertEquals($value, 'bar');
    }

    public function testGetValues()
    {
        $a = new \DOMElement('foo', 'bar');
        $b = new \DOMElement('foo', 'baz');

        $domElement = m::mock(\DOMElement::class);
        $domElement->shouldReceive('getElementsByTagName')
            ->with('foo')
            ->once()
            ->andReturn([$a, $b]);

        $element = new Element($domElement);
        $values = $element->getValues('foo');

        $this->assertCount(2, $values);
        $this->assertContains('bar', $values);
        $this->assertContains('baz', $values);
    }

    public function testGetDOMElement()
    {
        $domElement = m::mock(\DOMElement::class);
        $element = new Element($domElement);

        $this->assertInstanceOf(\DOMElement::class, $element->getDOMElement());
    }

    public function testXml()
    {
        $xml = Element::xml('<?xml version="1.0"?>
            <Response>
                <Items>
                    <Item>
                        <ASIN>1477825274</ASIN>
                        <ItemAttributes>
                            <Title>From the Cradle</Title>
                            <Actor>Brad Pitt</Actor>
                            <Actor>Angelina Jolie</Actor>
                        </ItemAttributes>
                    </Item>
                </Items>
            </Response>
        ');

        $this->assertInstanceOf(Element::class, $xml);
    }

    public function testHtml()
    {
        $html = Element::html('<!DOCTYPE html>
            <html>
                <head>
                    <title>graze.com | nature delivered</title>
                </head>
                <body>
                    <h1>Welcome to Graze!</h1>
                    <p>Hello World!</p>
                    <p>My name is Will</p>
                </body>
            </html>
        ');

        $this->assertInstanceOf(Element::class, $html);
    }
}
