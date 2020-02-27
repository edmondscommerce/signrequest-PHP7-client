<?php declare(strict_types=1);
# https://jane.readthedocs.io/en/latest/OpenAPI/generate.html#configuration-file
return [
    'openapi-file' => __DIR__ . '/SignRequest-OpenAPI3-Swagger.json',
    'namespace'    => 'SignRequest\\Client',
    'directory'    => __DIR__ . '/src/Client',
    'client'       => 'psr18',
];