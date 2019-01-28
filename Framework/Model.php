<?php

namespace Core;



class Model
{
    private $created_at;
    private $updated_at;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $create_at
     */
    public function setCreatedAt($create_at)
    {
        $this->created_at = $create_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdatedAt($update_at)
    {
        $this->updated_at = $update_at;
    }

    public function     __construct()
    {
        $this->setCreatedAt(date('Y-m-d H:i:s'));
        $this->setUpdatedAt(date('Y-m-d H:i:s'));
    }
}