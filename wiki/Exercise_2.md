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