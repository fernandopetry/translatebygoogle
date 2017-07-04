# Tradução Single by Google Translate

**Exemplo de uso:**

```php
<?php
 require_once "vendor/autoload.php";

 use \Petry\Translate\Locale\pt_BR;
 use \Petry\Translate\Locale\en_US;

$txtSource = "Eu te amo";
$txtExpected = "I love you";

$translate = new \Petry\Translate\Translate($txtSource, new pt_BR, new en_US);

var_dump($translate->getTranslate());
```
