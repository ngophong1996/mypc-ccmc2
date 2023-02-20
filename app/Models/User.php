<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Base;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasApiTokens, HasFactory, Notifiable;
    public $title="List of users";
    public function listingconfigs(){
        return array(
            array(
                'field' => 'id',
                'name'=>'ID',
                'type'=> 'text'
            ),
            array(
                'field' => "name",
                'name'=>'Name',
                'type'=> 'text'
            ),
            array(
                'field' => "email",
                'name'=>'Email',
                'type'=> 'text'
            ),
            array(
                'field' => "class",
                'name'=>'Class',
                'type'=> 'text'
            ),
             array(
                 'field' => "updated_at",
                 'name'=>'updated_at',
                 'type'=> 'text'
             ),
             array(
                 'field' => "created_at",
                 'name'=>'created_at',
                 'type'=> 'text'
             ),
             array(
                'field' => "copy",
                'name'=>'copy',
                'type'=> 'copy'
            ),
            array(
                'field' => "edit",
                'name'=>'edit',
                'type'=> 'edit'
            ),
            array(
                'field' => "delete",
                'name'=>'delete',
                'type'=> 'delete'
            )
 
        );
        
     }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'class',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   
}
