<?php

function dateToString(DateTimeInterface $date): string
{
    return $date->format(DateTimeInterface::ATOM);
}

/**
 * @throws Exception
 */
function stringToDate(string $date): DateTimeImmutable
{
    return new DateTimeImmutable($date);
}

/**
 * @param array $values
 * @return string
 */
function jsonEncode(array $values): string
{
    return (string) json_encode($values);
}

/**
 * @param string $json
 * @return array
 */
function jsonDecode(string $json): array
{
    $data = json_decode($json, true);

    if (JSON_ERROR_NONE !== json_last_error()) {
        throw new RuntimeException('Unable to parse response body into JSON: ' . json_last_error());
    }

    return (array) $data;
}


function authControllerPath(string $controller): string
{
    return base_path("src/BoundedContext/Auth/Infrastructure/Controllers/{$controller}.php");
}
function sharedPathOnBoundedContext(string $path = ''): string
{
    return base_path("src/BoundedContext/Shared/{$path}");
}

function sharedPath(string $path = ''): string
{
    return base_path("src/Shared/{$path}");
}
