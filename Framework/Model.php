<?php

namespace Core;



class Model
{
    private $created_at;
    private $updated_at;
    public function __construct()
    {
        $this->setCreatedAt(date('Y-m-d H:i:s'));
        $this->setUpdatedAt(date('Y-m-d H:i:s'));
    }
    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        if ($this->created_at == '' || $this->created_at == null || empty($this->created_at)) {
            $this->setCreatedAt(date('Y-m-d H:i:s'));
        }
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
        if ($this->updated_at == '' || $this->updated_at == null || empty($this->updated_at)) {
            $this->setUpdatedAt(date('Y-m-d H:i:s'));
        }
        return $this->updated_at;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdatedAt($update_at)
    {
        $this->updated_at = $update_at;
    }

}