<?php

namespace App\Http\Controllers;
use App\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    //
    public function addtag(Request $request){
		$nameTag = $request->input("hdNameTag");
		$tag = new Tags();
		$tag->tag_title = $nameTag;
		$tag->save();
		return $tag->tag_id;
	}
}
