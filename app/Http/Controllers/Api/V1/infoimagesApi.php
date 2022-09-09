<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\infoimage;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\infoimagesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class infoimagesApi extends Controller{
	protected $selectColumns = [
		"id",
		"image",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.40]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$infoimage = infoimage::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$infoimage]);
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(infoimagesRequest $request)
    {
    	$data = $request->except("_token");
    	
                $data["image"] = "";
        $infoimage = infoimage::create($data); 
               if(request()->hasFile("image")){
              $infoimage->image = it()->upload("image","infoimages/".$infoimage->id);
              $infoimage->save();
              }

		  $infoimage = infoimage::with($this->arrWith())->find($infoimage->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$infoimage
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
                $infoimage = infoimage::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($infoimage) || empty($infoimage)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $infoimage
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new infoimagesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(infoimagesRequest $request,$id)
            {
            	$infoimage = infoimage::find($id);
            	if(is_null($infoimage) || empty($infoimage)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile("image")){
              it()->delete($infoimage->image);
              $data["image"] = it()->upload("image","infoimages/".$infoimage->id);
               }
              infoimage::where("id",$id)->update($data);

              $infoimage = infoimage::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $infoimage
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $infoimages = infoimage::find($id);
            	if(is_null($infoimages) || empty($infoimages)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($infoimages->image)){
               it()->delete($infoimages->image);
              }
               it()->delete("infoimage",$id);

               $infoimages->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $infoimages = infoimage::find($id);
	            	if(is_null($infoimages) || empty($infoimages)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($infoimages->image)){
                    	it()->delete($infoimages->image);
                    	}
                    	it()->delete("infoimage",$id);
                    	$infoimages->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $infoimages = infoimage::find($data);
	            	if(is_null($infoimages) || empty($infoimages)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($infoimages->image)){
                    	it()->delete($infoimages->image);
                    	}
                    	it()->delete("infoimage",$data);

                    $infoimages->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}