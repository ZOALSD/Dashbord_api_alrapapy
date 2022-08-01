<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class product extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'products';
protected $fillable = [
		'id',
		'admin_id',
        'name',
        'price',
        'category_id',

        'image',
        'color',
      //  'size_id',
       'sizes',

        'desc_en',
        'desc_ar',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
   public function admin_id() {
	   return $this->hasOne(\App\Models\Admin::class, 'id', 'admin_id');
   }
	

	/**
    * category_id relation method
    * @param void
    * @return object data
    */
   public function category(){
      return $this->hasOne(\App\Models\category::class,'id','category_id');
   }

	/**
    * size_id relation method
    * @param void
    * @return object data
    */

   public function size(){
      return $this->hasMany(\App\Models\ProductSizes::class,'products_id','id');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($product) {
			//$product->category_id()->delete();
			//$product->category_id()->delete();
         });
   }
		
}
