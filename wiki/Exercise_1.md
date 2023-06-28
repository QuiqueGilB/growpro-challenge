# First exercise using native PHP (#1)
- - -
### Solution
```php
<?php

declare(strict_types=1);

/** @return int[] */
function fnA(string $input): array
{
    preg_match_all('/@\[[\w\-_]+\]\(user-gpe-(\d+)\)/', $input, $matches);
    [, $ids] = $matches;
    return array_map('intval', $ids);
}

function fnB(string $input): string
{
    return preg_replace('/@\[([\w\-_]+)\]\(user-gpe-\d+\)/', '@$1', $input);
}

$text = "Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)";
var_dump(fnA($text));
var_dump(fnB($text));
```

### Description
Para un texto cualquiera dado, implementar dos funciones PHP:

(A) Devolver un array con los identificadores numéricos ordenados por orden, para el patrón @[Franklin](user-gpe-{{id}}), donde {{id}} será el identificador.

Por ejemplo, para el texto.
$text = “Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)”;
$result = fnA($text);
// $result será [1071, 1061]


(B) Devolver el texto reemplazando el patrón @[NameUser](user-gpe-identificador) por@NameUser.

Por ejemplo, para el texto.
$text = “Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)”;
$result = fnB($text);
// $result es “Hola @Franklin avisa a @Ludmina”