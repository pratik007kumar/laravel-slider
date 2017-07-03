<?php
namespace Pratik\Slider\Model;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{

	protected $table = 'slides';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'start_dt','end_dt', 'description',
    ];
 
}
