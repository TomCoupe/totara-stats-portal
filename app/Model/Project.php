<?php
declare(strict_types=1);

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // If your table name is 'projects', you can omit this
    protected $table = 'projects';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    // Allow mass-assign on these columns
    protected $fillable = [
        'name',
        'description',
        'php_version',
        'totara_version',
        'mysql_version',
        'total_courses',
        'total_users',
    ];

    protected $casts = [
        'total_courses' => 'int',
        'total_users'   => 'int',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];
}
