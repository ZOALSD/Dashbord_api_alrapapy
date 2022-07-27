<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Favorite;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\FavoritesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class FavoritesApi extends Controller{
	protected $selectColumns = [
		"id",
		"products_id",
		"user_id",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.40]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['products'];
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Favorite = Favorite::where('user_id',auth('sanctum')->id())->select($this->selectColumns)->with('products')->orderBy("id","desc")->get();
               return successResponseJson(["data"=>$Favorite]);
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
   // public function store(FavoritesRequest $request)//Request
    public function store(Request $request)//Request
    {
    	// $data = $request->except("_token");
    	
        $Favorite = Favorite::create(['user_id' => auth('sanctum')->id() , 'products_id' => $request->pro_id]); 

		  $Favorite = Favorite::with($this->arrWith())->find($Favorite->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Favorite
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.40]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $Favorite = Favorite::where('user_id',auth('sanctum')->id())->with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Favorite) || empty($Favorite)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Favorite
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            // public function updateFillableColumns() {
			// 	       $fillableCols = [];
			// 	       foreach (array_keys((new FavoritesRequest)->attributes()) as $fillableUpdate) {
  			// 	        if (!is_null(request($fillableUpdate))) {
			// 			  $fillableCols[$fillableUpdate] = request($fillableUpdate);
			// 			}
			// 	       }
  			// 	     return $fillableCols;
  	     	// 	}

            // public function update(FavoritesRequest $request,$id)
            // {
            // 	$Favorite = Favorite::find($id);
            // 	if(is_null($Favorite) || empty($Favorite)){
            // 	 return errorResponseJson([
            // 	  "message"=>trans("admin.undefinedRecord")
            // 	 ]);
  			//        }

            // 	$data = $this->updateFillableColumns();
                 
            //   Favorite::where("id",$id)->update($data);

            //   $Favorite = Favorite::with($this->arrWith())->find($id,$this->selectColumns);
            //   return successResponseJson([
            //    "message"=>trans("admin.updated"),
            //    "data"=> $Favorite
            //    ]);
            // }

            /**
             * Baboon Api Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $favorites = Favorite::where('user_id',auth('sanctum')->id())->find($id);
            	if(is_null($favorites) || empty($favorites)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("favorite",$id);

               $favorites->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			// public function multi_delete()
            // {
            //     $data = request("selected_data");
            //     if(is_array($data)){
            //         foreach($data as $id){
            //         $favorites = Favorite::find($id);
	        //     	if(is_null($favorites) || empty($favorites)){
	        //     	 return errorResponseJson([
	        //     	  "message"=>trans("admin.undefinedRecord")
	        //     	 ]);
	        //     	}

            //         	it()->delete("favorite",$id);
            //         	$favorites->delete();
            //         }
            //         return successResponseJson([
            //          "message"=>trans("admin.deleted")
            //         ]);
            //     }else {
            //         $favorites = Favorite::find($data);
	        //     	if(is_null($favorites) || empty($favorites)){
	        //     	 return errorResponseJson([
	        //     	  "message"=>trans("admin.undefinedRecord")
	        //     	 ]);
	        //     	}
 
            //         	it()->delete("favorite",$data);

            //         $favorites->delete();
            //         return successResponseJson([
            //          "message"=>trans("admin.deleted")
            //         ]);
            //     }
            // }

            
}