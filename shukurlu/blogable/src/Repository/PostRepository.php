<?php
namespace Blogable\Repository;

use Blogable\Repository\Interfaces\PerformInterface;

class PostRepository implements PerformInterface
{
    public function __construct(Post $post)
    {

    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getBy($key, $value)
    {
        // TODO: Implement getBy() method.
    }
}