<?php

class R
{
    public function setup($dsn, $user, $password)
    {
        return $dsn . $user. $password;
    }

    public function freeze($freeze)
    {
        return $freeze;
    }

    public function debug($debug)
    {
        return $debug;
    }
}