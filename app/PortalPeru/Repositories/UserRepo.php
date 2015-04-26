<?php namespace PortalPeru\Repositories;

use PortalPeru\Entities\User;

class UserRepo extends BaseRepo{

    public function getModel()
    {
        return new User;
    }

    public $filters = ['email'];

    public function filterByEmail($q, $value)
    {
        $q->where('email', 'LIKE', "%$value%");
    }

    //FILTRAR
    public function searchReportero(array $data = array(), $paginate = false, $orderField, $orderType)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');
        $q = $this->getModel()->select()->whereType('reportero')->orderBy($orderField, $orderType);
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

    //FILTRAR
    public function searchUsers(array $data = array(), $paginate = false, $orderField, $orderType)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');
        $q = $this->getModel()->select()->whereType('admin')->orWhere('type','editor')->orderBy($orderField, $orderType);
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