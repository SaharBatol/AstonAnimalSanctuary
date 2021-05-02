<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    public function img ()
    {
        return 'images/' . $this -> breed . ".jpg";
    }

    protected $guarded = [];

    public function getPathAttribute () {
        return $this -> path ();
    }

    public function path ()
    {
        return '/animal/' . $this -> id;
    }

    protected $fillable = [
        'name',
        'breed'
    ];
}
