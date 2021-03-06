<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $fillable =[
       'name', 'Cubical_Number','Lcd_Code','Headset_Code','CPU_Detail','category_id','status_id'
    ];


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }


    public function status(){
        return $this->belongsTo(Status::class,'status_id');
    }


}
