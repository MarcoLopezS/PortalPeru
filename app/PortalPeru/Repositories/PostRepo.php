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

    //FILTRAR
    public function searchDeletes(array $data = array(), $paginate = false, $orderField, $orderType)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');
        $q = $this->getModel()->onlyTrashed()->select()->orderBy($orderField, $orderType);
        foreach ($data as $field => $value)
        {
            // slug_url -> filterBySlugUrl
            $filterMethod = 'filterBy' . studly_case($field);
            if (method_exists(get_called_class(), $filterMethod))
            {
                $this->$filterMethod($q, $value);
            }
            else
            {
                $q->where($field, $data[$field]);
            }
        }
        return $paginate ?
            $q->paginate()->appends($data)
            : $q->get();
    }
}