<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    //
    public static function getpagination(){}
    public static function Listword($id=null){
        if($id==null){
        return DB::table('words')
        ->join('lang','lang.code','words.lang_ws')
        ->paginate(30);
        //->join('lang','lang.id','words.lang_m')
        //->get();
        }
        else{
            return DB::table('words')->where('id',$id)->get()->first();
        }
    }
    public static function SaveWord($data,$id=null){
        if($id==null){
        DB::table('words')->insert($data);
        }
        else{
            DB::table('words')->where('id',$id)
            ->update($data);
        }
    }
    public static function delword($id){
        DB::table('words')->where('id',$id)->delete();
    }
}
