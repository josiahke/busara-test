<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 02/11/2016
 * Time: 18:54
 */

namespace app;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    //
    protected $table = 'people';
    protected $fillable = ['id', 'name', 'age', 'phone'];

}