# Simple DOM

[![Build Status](https://travis-ci.org/wpillar/simple-dom.svg?branch=master)](https://travis-ci.org/wpillar/simple-dom) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/3aa237f1-a5d5-4d9b-8ba5-9059d893617a/mini.png)](https://insight.sensiolabs.com/projects/3aa237f1-a5d5-4d9b-8ba5-9059d893617a) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wpillar/simple-dom/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wpillar/simple-dom/?branch=master) ![PHP Version](http://img.shields.io/badge/php-~5.5-8892BF.svg)

A wrapper for PHP's DOMElement class that provides a nicer API for retrieving data from an element.

## Installation

It can be installed in whichever way you prefer, but we recommend [Composer][package].
```json
{
    "require": {
        "wpillar/simple-dom": "dev-master"
    }
}
```

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

foreach ($xml->getElements('Items') as $item) {
    $item->getValue('ASIN'); // 1477825274
    
    $item->getElement('ItemAtrributes'); // Pillar\SimpleDom\Element
    $item->getElement('ItemAttributes')->getValue('Title'); // 'From the Cradle'
    $item->getElement('ItemAttributes')->getValue('Actor'); // 'Brad Pitt'
    $item->getElement('ItemAttributes')->getValues('Actor'); // ['Brad Pitt', 'Angelina Jolie']
}
```


#### HTML

```php
$html = \Pillar\SimpleDom\Element::html('<!DOCTYPE html>
    <html>
        <head>
            <title>My special website</title>
        </head>
        <body>
            <h1>Welcome to My Special Website!</h1>
            <p>Hello World!</p>
            <p>My name is Will</p>
        </body>
    </html>
');

$html->getElement('head')->getValue('title'); // 'My special website'
$html->getElement('body')->getValue('h1'); // 'Welcome to My Special Website'
$html->getElement('body')->getValue('p'); // 'Hello World!'
$html->getElement('body')->getValues('p'); // ['Hello World!', 'My name is Will']
$html->getElements('p'); // Pillar\SimpleDom\Element[]
```

## Contributing

I prefer to use the [GitHub Flow][github-flow] for working. So please submit a PR with your proposed changes stating the case for adding the changes with any documentation and tests that are appropriate.

This library aims to adhere to [PSR-1][psr-1], [PSR-2][psr-2] and [PSR-4][psr-4] standards so please make sure contributions adhere to those standards too. Also, if you spot any existing violations of those standards, PRs to fix them are most welcome.

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

[package]: https://packagist.org/packages/wpillar/simple-dom
[github-flow]: https://guides.github.com/introduction/flow/index.html
[psr-1]: http://www.php-fig.org/psr/psr-1/
[psr-2]: http://www.php-fig.org/psr/psr-2/
[psr-4]: http://www.php-fig.org/psr/psr-4/
