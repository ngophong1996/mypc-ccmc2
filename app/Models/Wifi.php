<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;

class wifi extends Base
{
    use HasFactory;
    protected $fillable = [
        'useremail',
        'address',
        'os',
        'description',
        'wifisent',
        'created_at',
        'updated_at'
    ];
    public $title="List of registered to use wifi network";
    public function listingConfigs(){
        $defaultListingConfigs = parent::defaultListingConfigs();
        $listingConfigs= array(
            array(
                'field' => 'id',
                'name'=>'ID',
                'type'=> 'text'
            ),
            array(
                'field' => "useremail",
                'name'=>'Email',
                'type'=> 'text'
            ),
            array(
                'field' => "address",
                'name'=>'MAC address',
                'type'=> 'text'
            ),
            array(
                'field' => "os",
                'name'=>'OS',
                'type'=> 'text'
            ),
            array(
                'field' => "description",
                'name'=>'Description',
                'type'=> 'text'
            ),
            array(
                'field' => "wifisent",
                'name'=>'Sent wifi-infor',
                'type'=> 'wifisent'
            ),
       );

       return array_merge($listingConfigs, $defaultListingConfigs);
     }
}
