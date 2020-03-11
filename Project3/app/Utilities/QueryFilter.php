<?php
namespace App\Utilities;

abstract class QueryFilter {

    protected $query;
    protected $filters;

    public function __construct($query,$filters)
    {
        $this->query =$query;
        $this->filters=$filters;
    }
    public function apply()
    {
        //name e ime na kolona vo tablea, value se vrednostite
        foreach($this->filters as $name => $value)
        {
            //method exists se odnesuva na metodite vo course filterot.
            if(! method_exists($this,$name)){
                continue;
            }
            if(strlen($value)){
                $this->$name($value);
            }else {
                $this->$name();
            }
        }
        return $this->query;
    }
}
