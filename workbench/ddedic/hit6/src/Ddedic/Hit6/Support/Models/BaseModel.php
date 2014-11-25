<?php
/**
 * Project: boiler.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 14:19
 */

namespace Ddedic\Hit6\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

abstract class BaseModel extends Model{

    use ValidatingTrait;

    protected $rules = [];
    protected $validationMessages = [];
    protected $fillable = [];


} 