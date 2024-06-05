<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','classroom_id'];

    public function classroom():BelongsTo{
        return $this->belongsTo(Classroom::class);
    }

    public static function list(){
        return self::all();
    }
    public static function store($request,$id=null){
        $data = $request->only('name','classroom_id');
        $data = self::updateOrCreate(['id'=>$id],$data);
        return $data;
    
}
}
