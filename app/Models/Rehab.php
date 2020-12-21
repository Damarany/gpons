<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;
use Laravel\Scout\Searchable;
class Rehab extends Model
{
//    use Notifiable;
//    use SearchableTrait;
    protected $table="rehab";

    protected $fillable=['id','code','dslam_ip','name','voice_ip','getway','vlan',
        'proxy','created_at','updated_at'];

    protected  $hidden=['created_at','updated_at'];
}
