<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'fullname',
                  'email',
                  'Birthday',
                  'reg_date',
                  'major_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the major for this model.
     *
     * @return App\Models\Major
     */
    public function major()
    {
        return $this->belongsTo('App\Models\Major','major_id');
    }

    /**
     * Set the reg_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setRegDateAttribute($value)
    {
        $this->attributes['reg_date'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y', $value) : null;
    }

    /**
     * Get reg_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getRegDateAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    }

}
