<?php
namespace  Blogable\Repository\Interfaces;

interface PerformInterface
{

    public function getAll();

    public function getBy($key,$value);

    public function getById($id);
}




