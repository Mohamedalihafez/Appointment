<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    static function upsertInstance($request)
    {
        $specialization = Specialization::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
            $request->all()
            );
        
        return $specialization;
    }

    //delete_data
    public function deleteInstance()
    {
        return $this->delete();
    }

    static function specializationData($request)
    {
        $specialization = Specialization::where('id', $request->specialization_id)->first();

        return  [ 'specialization' => $specialization ] ;

    }

    static function specializationDelete($request)
    {
        $specialization = Specialization::where('id', $request->specialization_id)->delete();
     
        return  [ 'specialization' => 'deleted'] ;
    }
    
    // Scopes
    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) 
        {
            $query->where('name','like','%'.$request['name'].'%');
        }

        return $query;
    }
  
}
