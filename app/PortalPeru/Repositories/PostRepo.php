<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Post;

class PostRepo extends BaseRepo{

    public function getModel()
    {
        return new Post;
    }

    public $filters = ['search', 'category', 'publicar'];

    public function filterByCategory($q, $value)
    {
        $q->where('category_id', $value);
    }
}