<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use DB;
use View;
use response;
use Schema;
use App\Models\User;
use App\Models\role_user;
use App\Models\subjects;
use App\Http\Traits\library;

class __UNIVERSAL extends Controller
{
    use library;


    public function cryptoJsAesDecrypt($passphrase, $jsonString){

        $jsondata = json_decode($jsonString, true);

        $salt = hex2bin($jsondata["s"]);

        $ct = base64_decode($jsondata["ct"]);

        $iv  = hex2bin($jsondata["iv"]);

        $concatedPassphrase = $passphrase.$salt;

        $md5 = array();
        
        $md5[0] = md5($concatedPassphrase, true);

        $result = $md5[0];

        for ($i = 1; $i < 3; $i++) {

            $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);

            $result .= $md5[$i];

        }

        $key = substr($result, 0, 32);

        $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);

        return json_decode($data, true);

    }
    
    public function __FETCHDATA($DATA){

        $DATA = base64_decode($DATA);

        $JSON = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',$DATA);

        $t = null;

        $c = null;

        $j = null;

        $w = null;

        $g = null;

        $o = null;

        $lj = null;

        $wo = null;

        if( isset($JSON['table'])){

            $t = $JSON['table'];

        }

        if( isset($JSON['column'])){

            $c = $JSON['column'];

        }

        if( isset($JSON['join'])){

            $j = $JSON['join'];

        }

        if( isset($JSON['where'])){

            $w = $JSON['where'];

        }

        if( isset($JSON['group'])){

            $g = $JSON['group'];

        }

        if( isset($JSON['order'])){

            $o = $JSON['order'];

        }

        if( isset($JSON['leftJoin'])){

            $lj = $JSON['leftJoin'];

        }

        if( isset($JSON['whereOr'])){

            $wo = $JSON['whereOr'];

        }
      
        $DATA = library::__FETCHDATA($t,$c,$j,$w,$g,$o,$lj,$wo);

        return response()->json($DATA); 
    }

    public function __SHOW( $DATA ){

        
        $DATA = base64_decode($DATA);

        $JSON = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',$DATA);

        $t = null;

        $c = null;

        $j = null;

        $w = null;

        $g = null;

        $o = null;

        $lj = null;

        $wo = null;

        $id = null; 

        $role= null;

        $primaryKey = null;

        $arrayCompact = array();

        if( isset($JSON['t'])){

            $t = $JSON['t'];

        }

        if( isset($JSON['c'])){

            $c = $JSON['c'];

        }

        if( isset($JSON['j'])){

            $j = $JSON['j'];

        }

        if( isset($JSON['w'])){

            $w = $JSON['w'];

        }

        if( isset($JSON['g'])){

            $g = $JSON['g'];

        }

        if( isset($JSON['o'])){

            $o = $JSON['o'];

        }

        if( isset($JSON['lj'])){

            $lj = $JSON['lj'];

        }

        if( isset($JSON['wo'])){

            $wo = $JSON['wo'];

        }

        if( isset($JSON['transferWith']) ){

            foreach ($JSON['transferWith'] as $key => $v) {
                
                if($v == 'id')
                {

                    $id = Auth::user()->id;

                }

                if($v == 'role')
                {

                    $role = $this->getRole();

                }

                if($v == 'primaryKey')
                {
                    
                    $primaryKey = $JSON['primaryKey'];

                }

            }

        }

        $data = library::__FETCHDATA($t,$c,$j,$w,$g,$o,$lj,$wo);

        return view($JSON['url'],compact('id','role','primaryKey','data'));
       
    }


    public static function __INSERT(Request $request)   
    {   

        $TEMP = json_encode($request->all());

        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $TABLENAME = $TEMP['v1'];

        $TABLE_COLUMNS = Schema::getColumnListing($TABLENAME);
        
        $LATESTCODE = library::__FETCHLATESTCODE($TABLENAME,$TABLE_COLUMNS[0],$TABLE_COLUMNS[0],'DESC',5);

        $TEMP[$TABLE_COLUMNS[0]] = $LATESTCODE;
       
        $ARR = array();

        for ($i=0; $i < count($TABLE_COLUMNS); $i++) { 

            if(in_array($TEMP[$TABLE_COLUMNS[$i]],$TABLE_COLUMNS))
            {

                return redirect()->back()->with('fail-message', 'Something went wrong!');

            }
            else
            {

                $ARR[$TABLE_COLUMNS[$i]] = $TEMP[$TABLE_COLUMNS[$i]];

            }
           
        }


        // //validator for unique entry
        // if(isset($TEMP['v4'])){

          
        //     dd( $TEMP['v4']);

        // }
        // else{

          

        // }

        library::__STORE($TABLENAME,$ARR);

        return redirect()->back()->with('success-message', $TEMP['v2']);
    }

    
    public function __EDIT(Request $request)
    {

        $TEMP = json_encode($request->all());
         
        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $TABLENAME = $TEMP['v1'];

        $TABLE_COLUMNS = Schema::getColumnListing($TABLENAME);

        $ARR = array();

        for ($i=0; $i < count($TABLE_COLUMNS); $i++) { 

            if(isset($TEMP['v4'])){

                $DATA = base64_decode($TEMP['v4']);

                $JSON = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',$DATA);
 
                foreach ($JSON['data'] as $key => $value) {
                    
                    if( in_array($value[1], $TABLE_COLUMNS)){
                        
                        return redirect()->back()->with('fail-message','Something went wrong!');
                    }
                    else{

                        if($TABLE_COLUMNS[$i] == $value[0]){

                            $ARR[$TABLE_COLUMNS[$i]] =  $value[1];
        
                        }
                    }
                }
            }
            else{

                if( in_array($request[$TABLE_COLUMNS[$i]], $TABLE_COLUMNS)){
                  
                    return redirect()->back()->with('fail-message','Something went wrong!');
                }
                else{

                    $ARR[$TABLE_COLUMNS[$i]] = $request[$TABLE_COLUMNS[$i]];
                    
                }
            }
        }   

        $ARR[$TABLE_COLUMNS[0]] = $TEMP['v3'];

        library::__UPDATE($TABLENAME,$ARR,$TABLE_COLUMNS[0]);

        return redirect()->back()->with('success-message',$TEMP['v2']);
    }

    public static function __DELETE(Request $DATA)
    {   
        $TABLENAME = $DATA['v1'];

        $MESSAGE = $DATA['v2'];

        $TABLE_COLUMNS = Schema::getColumnListing($TABLENAME);

        library::__DESTROY($TABLENAME,$TABLE_COLUMNS,$DATA['v3']);

        return redirect()->back()->with('success-message', $MESSAGE);
    }

// CUSTOM
    public function getRole()
    {
        $t =    'role_user';

        $c =    [
                    'name'
                ];
    
        $w =    [
                    ['user_id', '=', Auth::user()->id ]
                ];

        $temp = library::__FETCHDATA($t,$c,null,$w,null);
        
        $id = Auth::user()->id;

        $role = json_decode(json_encode($temp), true);
        
        $role = $role[0]['name'];

        return $role;
    }





}
