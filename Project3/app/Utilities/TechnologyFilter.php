<?php
namespace App\Utilities;

class TechnologyFilter extends QueryFilter {

    //    public function search($query = '')
    //    {
    //        $this->query->where('technology_name','like',"%$query%");
    //    }
    public function img($img ='')
    {
        $this->query->where('img', $img);
    }
    public function courses($courses ='')
    {
        $this->query->whereHas('courses', function ($q) use ($courses)
        {
            $q->where('name',$courses);
        });
    }
    public function types($types = '')
    {
        $this->query->whereHas('courses',function ($q) use ($types)
        {
            $q->where('type',$types);
        });
    }
}
