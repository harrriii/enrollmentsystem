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
use Exporter;


class __UNIVERSAL extends Controller
{
    use library;


    public static function s_cryptoJsAesDecrypt($passphrase, $jsonString){

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

        // dd($JSON);

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

        $f_t = null;

        $f_c = null;

        $f_j = null;

        $f_w = null;

        $f_g = null;

        $f_o = null;

        $f_lj = null;

        $f_wo = null;

        $id = null; 

        $role= null;

        $primaryKey = null;

        $filter = null;

        $selectedFilter = '*';

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

                if($v == 'filter')
                {

                    foreach ($JSON['filterData'] as $key => $v) {

                        if( isset($JSON['filterData']['f_t'])){

                            $f_t = $JSON['filterData']['f_t'];
                
                        }
                
                        if( isset($JSON['filterData']['f_c'])){
                
                            $f_c = $JSON['filterData']['f_c'];
                
                        }
                
                        if( isset($JSON['filterData']['f_j'])){
                
                            $f_j = $JSON['filterData']['f_j'];
                
                        }
                
                        if( isset($JSON['filterData']['f_w'])){
                
                            $f_w = $JSON['filterData']['f_w'];
                
                        }
                
                        if( isset($JSON['filterData']['f_g'])){
                
                            $f_g = $JSON['filterData']['f_g'];
                
                        }
                
                        if( isset($JSON['filterData']['f_o'])){
                
                            $f_o = $JSON['filterData']['f_o'];
                
                        }
                
                        if( isset($JSON['filterData']['f_lj'])){
                
                            $f_lj = $JSON['filterData']['f_lj'];
                
                        }
                
                        if( isset($JSON['filterData']['f_wo'])){
                
                            $f_wo = $JSON['filterData']['f_wo'];
                
                        }

                    }
                    if( isset($JSON['selectedFilter'])){
                
                        $selectedFilter = $JSON['selectedFilter'];
            
                    }
  
                    $filter = library::__FETCHDATA($f_t,$f_c,$f_j,$f_w,$f_g,$f_o,$f_lj,$f_wo);

                }

            }

        }

        $data = library::__FETCHDATA($t,$c,$j,$w,$g,$o,$lj,$wo);

        // dd($data);

        return view($JSON['url'],compact('id','role','primaryKey','data','filter','selectedFilter'));
       
    }

    public function __INSERT(Request $request)   
    {   

        $fileColumn = ''; 

        $TEMP = json_encode($request->all());

        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $TABLENAME = $TEMP['v1'];

        $TABLE_COLUMNS = Schema::getColumnListing($TABLENAME);

        $LATESTCODE = library::__FETCHLATESTCODE($TABLENAME,$TABLE_COLUMNS[0],$TABLE_COLUMNS[0],'DESC',5);

        $TEMP[$TABLE_COLUMNS[0]] = $LATESTCODE;

        $ARR = array();

        if( isset($TEMP['mi']) )
        {

            $DATA = base64_decode($TEMP['mi']);

            $JSON = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',$DATA);

            foreach ($JSON['_D'] as $key => $value) {

                for ($i=1; $i < count($TABLE_COLUMNS); $i++) { 
                  
                    // check if input = table column
                    if(in_array($TEMP[$TABLE_COLUMNS[$i]],$TABLE_COLUMNS))
                    {

                        return redirect()->back()->with('fail-message', 'Something went wrong!');

                    }
                    else
                    {

                        if($request->hasFile($TABLE_COLUMNS[$i]))
                        {

                            $file = $request->file($TABLE_COLUMNS[$i]);

                            $ARR[$TABLE_COLUMNS[$i]] = $file->getClientOriginalName();

                            $fileColumn = $TABLE_COLUMNS[$i];

                        }
                        else
                        {

                            if( isset($JSON['_TC']) )
                            {
                                $ARR[$JSON['_TC']] = $value;
                            }
                           
                            $ARR[$TABLE_COLUMNS[$i]] = $TEMP[$TABLE_COLUMNS[$i]];

                        }

                    }

                }

                dd($ARR);
                library::__STORE($TABLENAME,$ARR);
           
                if($fileColumn){

                    $this->__UPLOAD($request->file($fileColumn),$TEMP['v5']);

                }

            }
            
            
        }
        else
        {
            // CHECK IF THERES INPUT THAT MATCHES COLUMN NAME
            for ($i=1; $i < count($TABLE_COLUMNS); $i++) { 

                // dd($TEMP[$TABLE_COLUMNS[$i]]);

                if(in_array($TEMP[$TABLE_COLUMNS[$i]],$TABLE_COLUMNS))
                {

                    return redirect()->back()->with('fail-message', 'Something went wrong!');

                }
                else
                {

                    if($request->hasFile($TABLE_COLUMNS[$i]))
                    {

                        $file = $request->file($TABLE_COLUMNS[$i]);

                        $ARR[$TABLE_COLUMNS[$i]] = $file->getClientOriginalName();

                        $fileColumn = $TABLE_COLUMNS[$i];

                    }
                    else{

                        $ARR[$TABLE_COLUMNS[$i]] = $TEMP[$TABLE_COLUMNS[$i]];

                    }

                }
            
            }

            library::__STORE($TABLENAME,$ARR);
           
            if($fileColumn){

                $this->__UPLOAD($request->file($fileColumn),$TEMP['v5']);

            }

        }

        return redirect()->back()->with('success-message', $TEMP['v2']);

    }

    public function __UPLOAD($file, $filepath){

        $savePath = public_path($filepath);
        
        $file->move($savePath, $file->getClientOriginalName());

    }

    
    public function __EDIT(Request $request)
    {

        $fileColumn = '';

        $TEMP = json_encode($request->all());
         
        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $TABLENAME = $TEMP['v1'];

        $TABLE_COLUMNS = Schema::getColumnListing($TABLENAME);

        $ARR = array();
    
        $DATA = base64_decode($TEMP['v3']);

       
        $JSON = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',$DATA);

        $w = 0;

        foreach ($JSON as $key => $value) {


            for ($i=0; $i < count($value); $i++) { 

                $w++;

                $ARR[$TABLE_COLUMNS[0]] = $value[$i];

                for ($x=0; $x < count($TABLE_COLUMNS); $x++) { 

                    if( isset($TEMP['v4']) )
                    {
        
                        $D = base64_decode($TEMP['v4']);
        
                        $J = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',$D);

                        foreach ($J['data'] as $key => $v) {
                            
                            if( in_array($v[1], $TABLE_COLUMNS)){
                                
                                return redirect()->back()->with('fail-message','Something went wrong!');
                            }
                            else{
        
                               
                                if($TABLE_COLUMNS[$x] == $v[0]){

                                    if($request->hasFile($TABLE_COLUMNS[$x]))
                                    {
                
                                        $file = $request->file($TABLE_COLUMNS[$x]);
                
                                        $ARR[$TABLE_COLUMNS[$x]] = $file->getClientOriginalName();
                
                                        $fileColumn = $TABLE_COLUMNS[$x];
                
                                    }
                                    else
                                    {
        
                                        $ARR[$TABLE_COLUMNS[$x]] = $v[1];
                                    }
                
                                }

                            }
                         
                        }

                    }
                    else
                    {
                        
                        if( in_array($request[$TABLE_COLUMNS[$x]], $TABLE_COLUMNS)){
                            
                            return redirect()->back()->with('fail-message','Something went wrong!');
                        }
                        else{

                            if($request->hasFile($TABLE_COLUMNS[$x]))
                            {
        
                                $file = $request->file($TABLE_COLUMNS[$x]);
        
                                $ARR[$TABLE_COLUMNS[$x]] = $file->getClientOriginalName();
        
                                $fileColumn = $TABLE_COLUMNS[$x];
        
                            }
                            else
                            {
        
                                $ARR[$TABLE_COLUMNS[$x]] = $TEMP[$TABLE_COLUMNS[$x]];
        
                            }
        
                        }

                    }
              
                }

                library::__UPDATE($TABLENAME,$ARR,$TABLE_COLUMNS[0]);

               

                if($fileColumn){

                    $this->__UPLOAD($request->file($fileColumn),$TEMP['v5']);
    
                }
              
            }

        }

        return redirect()->back()->with('success-message',$TEMP['v2']);

    }

    public function __DELETE(Request $DATA)
    {   
        $TABLENAME = $DATA['v1'];

        $MESSAGE = $DATA['v2'];

        $TABLE_COLUMNS = Schema::getColumnListing($TABLENAME);

        $DATA = base64_decode($DATA['v3']);

        $JSON = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',$DATA);

        if( is_array($JSON) )
        {
            
            foreach ($JSON["_D"] as $key => $value) {
                
                library::__DESTROY($TABLENAME,$TABLE_COLUMNS,$value);

            }
            
        }
        else
        {
            
            library::__DESTROY($TABLENAME,$TABLE_COLUMNS,$DATA['v3']);

        }

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
