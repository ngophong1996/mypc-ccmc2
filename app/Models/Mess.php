<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;


class mess extends Base
{
    use HasFactory;
    protected $table = 'messes';
    public $timestamps = true;
    protected $fillable = [
        'username',
        'useremail',
        'class',
        'content',
       

    ];

    public $title = "Message";
    public function listingConfigs(){
        $defaultListingConfigs = parent::defaultListingConfigs();
        $listingConfigs= array(
            array(
                'field' => 'id',
                'name'=>'ID',
                'type'=> 'text'
            ),
            array(
                'field' => "username",
                'name'=>'Name',
                'type'=> 'text'
            ),
            array(
                'field' => "useremail",
                'name'=>'Email',
                'type'=> 'text'
            ),
            array(
                'field' => "class",
                'name'=>'Class',
                'type'=> 'text'
            ),
            array(
                'field' => "content",
                'name'=>'Content',
                'type'=> 'text'
            )
       );

       return array_merge($listingConfigs, $defaultListingConfigs);
     }
}
