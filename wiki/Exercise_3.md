# Third exercise using Symfony (#The Challenge)
- - -
## Solution
[Go to the solution](..)

## Descripción del problema
Vamos a desarrollar una panel de administración para una tienda de alquiler de bicicletas, que tendrá 3 funcionalidades principales:

- Listar el inventario de bicicletas disponibles
- Calcular el precio de los alquileres

El precio de los alquileres se basa en el tipo de bicicleta alquilada y en el número de días de duración del alquiler. En el momento del alquiler, los clientes dicen por cuántos días quieren alquilar la bicicleta y pagan por adelantado. Si la bicicleta se devuelve tarde, en el momento de la devolución se cobra el alquiler de los días adicionales.

La tienda ofrece tres tipos de bicicleta:
- Bicicletas eléctricas: El coste del alquiler será el precio base multiplicado por el número de días de alquiler.
- Bicicletas normales: El coste del alquiler será el precio base por los primeros 3 días y después el precio base por cada día extra.
- Bicicletas antiguas: El coste del alquiler será el precio base por los primeros 5 días y después el precio base por cada día extra.

Dentro de cada tipo de bicicleta, habrá bicicletas premium y bicicletas básicas. El precio base es de 30 EUR para las premium y de 10EUR para las normales.

## Descripción del proyecto
Crea un proyecto Symfony que implemente una API REST que al menos permita las siguientes operaciones:
- Obtener el listado de bicicletas
- Añadir una nueva bicicleta al catálogo
- Alquilar una determinada bicicleta durante un determinado periodo de tiempo

Si crees que alguna parte del ejercicio no está clara, no te preocupes, decide por ti mismo lo que sería lógico o
lo que crees que podría aportar valor al proyecto y explica en pocas líneas por qué has tomado la decisión que has tomado.

Aunque no es obligatorio, se valorará el uso de la librería API Platform (https://api-platform.com/) de Symfony.

Tómate tu tiempo para el ejercicio, pero no te vuelvas demasiado loco. Si envías una solución que está incompleta de alguna manera pero justificas correctamente por qué decidiste enfocarte en otras partes más relevantes, la consideraremos igualmente válida.

Por favor, incluye un archivo README dentro del proyecto con las instrucciones para instalarse el proyecto y en el que además expliques las decisiones que has ido tomando durante el desarrollo, en qué partes has puesto más esfuerzos, en qué partes has puesto menos y por qué.
