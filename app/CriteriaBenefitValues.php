<?php

namespace App;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use Laravel\Lumen\Auth\Authorizable;

class CriteriaBenefitValues extends Model// implements AuthenticatableContract, AuthorizableContract
{
    protected $table = 'criterias_benefit_values';
    // use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','value',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];

    public function new($data)
    {
        $this->name = $data["name"];
        $this->value = $data["value"];

        $this->save();
    }

    public function isBenefit($id)
    {
        return DB::table('values_of_criteria')
            ->join('criterias', 'values_of_criteria.criteria_id', '=', 'criterias.id')
            ->select('criterias.category')
            ->where('values_of_criteria.id', $id)->get();
    }
}
