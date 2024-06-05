<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = ['id','name'];

    public function students(): HasMany{
        return $this->hasMany(Student::class);
    }

    public static function list(){
        return self::all();
    }
    public static function store($request,$id=null){
        $data = $request->only('name');
        $data = self::updateOrCreate(['id'=>$id],$data);
        return $data;
    }
}