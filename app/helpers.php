<?php

if (!function_exists('authIdCredential')) {
    function authIdCredential(): int|null
    {
        return request()->authIdCredential ?? null;
    }
}

if (!function_exists('authIdPerson')) {
    function authIdPerson(): int|null
    {
        return request()->authIdPerson ?? null;
    }
}
