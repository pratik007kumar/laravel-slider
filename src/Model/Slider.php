<?php
namespace Pratik\Slider\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

	protected $table = 'slider';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'start_dt','end_dt', 'description',
    ];
 
 	public function slides() {

		return $this->hasMany('\Pratik\Slider\Model\Slides');
	}
}
