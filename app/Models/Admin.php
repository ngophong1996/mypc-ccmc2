<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use App\Models\Base;

class Admin extends Base implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    public $title= "List of Admin account";
    public function listingConfigs(){
        $defaultListingConfigs = parent::defaultListingConfigs();
        $listingConfigs= array(
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

       return array_merge($listingConfigs, $defaultListingConfigs);
     }
}
