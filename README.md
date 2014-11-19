# Simple DOM

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3aa237f1-a5d5-4d9b-8ba5-9059d893617a/mini.png)](https://insight.sensiolabs.com/projects/3aa237f1-a5d5-4d9b-8ba5-9059d893617a) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wpillar/simple-dom/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wpillar/simple-dom/?branch=master)

A wrapper for PHP's DOMElement class that provides a nicer API for retrieving data from an element.

## Installation

## Usage

#### XML

```php
$xml = \Pillar\SimpleDom\Element::xml('<?xml version="1.0"?>
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
```


#### HTML

```php
$html = \Pillar\SimpleDom\Element::html('<!DOCTYPE html>
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
```

## Contributing

## License

The MIT License (MIT)

Copyright (c) 2014 Will Pillar

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

