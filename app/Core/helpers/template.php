<?php

/** 
 * 
 * @return string
 */
function view(string $view, array $data): string
{
    return app()->view($view, $data);
}
