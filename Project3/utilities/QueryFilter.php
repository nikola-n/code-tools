<?php
class QueryFilter{
    protected $query;
    protected $filters;

    public function __construct($query,$filters)
    {
        $this->query =$query;
        $this->filters=$filters;
    }
    public function apply()
    {
        foreach($this->filters as $name => $value)
        {
            if(! method_exists($this,$name)){
                continue;
            }
            if(strlen($value)){
                $this->$name($value);
            }else {
                $this->$name();
            }
            //$query->orWhere($name,$value);
        }
        return $this->query;
    }
}
