# Second exercise using native PHP (#2)
- - -

### Solution
```php
<?php

declare(strict_types=1);

/**
 * @template T of array<string,  mixed>
 * @param T[] $array
 * @param array<key-of<T>, "ASC"|"DESC">|null $sortCriterion
 * @return T[]
 */
function immutableSort(array $array, array $sortCriterion = null): array
{
    $array = [...$array];

    if (empty($sortCriterion)) {
        return $array;
    }

    usort($array, static function ($a, $b) use ($sortCriterion) {
        foreach ($sortCriterion as $key => $order) {
            $aValue = $a[$key] ?? null;
            $bValue = $b[$key] ?? null;
            if ($aValue === $bValue) {
                continue;
            }
            return ($aValue <=> $bValue) * ($order === 'ASC' ? 1 : -1);
        }
        return 0;
    });

    return $array;
}

$array = [
    ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
    ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
    ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
    ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
    ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
];
$sortCriterion = ['age' => 'DESC', 'scoring' => 'DESC'];
var_dump(immutableSort($array, $sortCriterion));
```

### Description

Implementar una función PHP que ordene un array de arrays. La función recibirá dos parámetros, el primero con el array a ordenar, y el segundo parámetro será otro array con el criterio de ordenación, donde la key de cada elemento de este segundo array indicará sobre que propiedad hay que ordenar, y el valor de cada elemento indicará la dirección de ordenamiento (ascendente(ASC) o descendente (DESC)).

Por ejemplo, para el siguiente array y criterio de ordenación.
$array = [
['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
['user' => 'Mario', 'age' => 45, 'scoring' => 10],
['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],  
['user' => 'Mario', 'age' => 45, 'scoring' => 78],
['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
];
$sortCriterion = ['age' => 'DESC', 'scoring' => 'DESC'];
$result = fn($array, $sortCriterion);
// $result es  
[
['user' => 'Mario', 'age' => 45, 'scoring' => 78],
['user' => 'Mario', 'age' => 45, 'scoring' => 10],
['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
];

Si alguno de los elementos del array a ordenar no contiene la key por la que se pide ordenar, el valor para esa key se considerará null y el elemento se devolverá al principio de la lista si el orden es ASC o al final si el orden es DESC.

La función que desarrolles permitirá que el segundo parámetro puede ser null, pero en ese caso devolverá el resultado sin ningún tipo de reordenación.

El caso mostrado es solo un ejemplo, se ha de tener en cuenta que podría aceptar cualquier otro array con keys diferentes y número variable de key/values. Otro ejemplo válido sería este:
$array = [
['name' => 'cat', 'age' => 5, 'weight' => 3, 'height' => 24],
['name' => 'elephant', 'age' => 10, 'weight' => 10, 'height' => 3100],
];
