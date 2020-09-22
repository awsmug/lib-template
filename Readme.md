# Awesome Lib - Template

Template helper classes.

![](https://github.com/awsmug/lib-text-template/workflows/PHPUnit/badge.svg)

## Installation

Run the installation with composer.

```
composer require awsmug/lib-template:dev-develop
```

## Howto

### Text Template

Use of TextTemplate class:

```php
$template = 'Hello {name}!';

$values = ['name' => 'John'] ;

$content = TextTemplate::init( $template, $values )->render();
```

### Template file

Content in template.txt:

```
Hello {name}!
```

Use of TemplateFile class:

```php

$template_file = 'template.txt';

$values = ['name' => 'John'] ;

$content =  TemplateFile::init( $template_file, $variables )->render();
```

### PHP Template file

#### Simple variant

Content in Template.php:

```php
<?php

echo 'Hello {name}!'
```

Use of PhpTemplateFile class:

```php

$template_file = 'template.php';

$file = PhpFile::set( template_file );

$values = ['name' => 'John'] ;

$content =  PhpTemplateFile::init( $file, $values )->render();
```

#### Variant with PHP variables

Content in Template.php:

```php
<?php for( $i = 0; $i < $variables['count']; $i++  ): ?>
    {content}
<?php endforeach; ?>
```

Use of PhpTemplateFile class:

```php

$template_file = 'template.php';

$file = PhpFile::set( template_file );

$values = ['content' => 'This is my content'] ;

$variables = [ 'count' => 5 ];

$content =  PhpTemplateFile::init( $file, $values, $variables )->render();
```

### Setting delemiters

By default delimiters for variables are '{' and '}'. You can change this with the method  method *setDelimiters( \$openDelemiter, $closeDelimiter )* in all Template classes.

```php

$template = 'Hello [name]!';

$values = ['name' => 'John'] ;

$content = TextTemplate::init( $template, $values )->setDelimiters('[',']')->render();
```