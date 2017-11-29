<?php

interface DatabaseDAO
{
    public function create($health_connection);

    public function update($health_connection);

    public function get($health_connection, $id);

    public function lists($health_connection);

    public function delete($health_connection, $id);
}