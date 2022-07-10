<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class category extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'categories';
protected $fillable = [
		'id',
		'admin_id',
        'name',
        'parent_id',
        'image',
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
	
 
	public function parent()
	{
	   return $this->hasOne(\App\Models\category::class, 'id', 'parent_id');
	}

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($category) {
         });
   }
		
}
