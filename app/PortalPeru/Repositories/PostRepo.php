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

    //NOTICIAS
    public function showPostCatPag($category, $paginate)
    {
        return $this->getModel()->where('category_id', $category)
                                ->where('publicar', 1)
                                ->orderBy('published_at','desc')
                                ->paginate($paginate);
    }

    //NOTICIAS DIFERENTES
    public function showPostCatPagID($category, $paginate, $ids)
    {
        return $this->getModel()->where('category_id', $category)
                                ->where('publicar', 1)
                                ->where(function($query) use ($ids)
                                {
                                    for ($i=0; $i < $ids->count(); $i++) {
                                        $query->where('id', '<>', $ids[$i]->id);
                                    }
                                })
                                ->orderBy('published_at','desc')
                                ->paginate($paginate);
    }
}