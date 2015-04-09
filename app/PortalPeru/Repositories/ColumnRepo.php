<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\Column;

class ColumnRepo extends BaseRepo{

    public function getModel()
    {
        return new Column;
    }

    public $filters = ['search', 'publicar'];

    public function searchColumn(array $data = array(), $paginate = false, $orderField, $orderType, $idColumnist)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');
        $q = $this->getModel()->select()->where('columnist_id', $idColumnist)->orderBy($orderField, $orderType);
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