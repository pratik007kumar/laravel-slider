<?php
namespace Pratik\ToDoEventCalender\Model;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{

	protected $table = 'todo_calender';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'start_dt','end_dt', 'description',
    ];
 
}
