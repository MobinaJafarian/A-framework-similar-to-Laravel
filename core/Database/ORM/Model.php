<?php

namespace Core\Database\ORM;

use Core\Database\Traits\HasQueryBuilder;
use Core\Database\Traits\HasAttributes;
use Core\Database\Traits\HasCRUD;

abstract class Model
{
    use HasQueryBuilder, HasAttributes, HasCRUD;

    protected $table;

    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    protected $primaryKey = 'id';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';

    protected $deletedAt = null;

    protected $collection = [];

}