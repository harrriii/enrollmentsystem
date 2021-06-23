<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use DB;
use View;
use response;
use Schema;
use Exporter;
use App\Models\User;
use App\Models\role_user;
use App\Models\subjects;
use App\Http\Traits\library;



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

    public function INIT_TABLES($INPUT)
    {
        $tables =   [
                        'enlistment_batch',                 #0
                        'enlistment',                       #1
                        'subjects',                         #2
                        'campus_list',                      #3
                        'enlistment_subject',               #4
                        'year_lvl',                         #5
                        'schools',                          #6
                        'subjects_units',                   #7
                        'applicant_basic_info',             #8
                        'applicant_address_info',           #9
                        'applicant_family_info',            #10
                        'forms_list',                       #11
                        'forms_panels_list',                #12
                        'forms_containers_rows_list',       #13
                        'forms_containers_cols_list',       #14
                        'forms_contents_list',              #15
                        'student_type_list',                #16
                        'semester_list',                    #17
                        'school_list',                      #18
                        'program_list',                     #19
                        'civil_status_list',                #20
                        'gender_list',                      #21
                        'employment_type_list',             #22
                        'hdfh_mlqu',                        #23
                        'applicant_stud_info',              #24
                        'applicant_scholastic_info',        #25
                        'applicant_employment_info',        #26
                        'applicant_cross_transferee_info',  #27
                        'applicant_emergency_contact',      #28
                        'temp_users',                       #29
                        'default_mailing_address',          #30
                        'ld_user_current_wallet',           #31
                        'test_lloyd',                       #32
                        'talpakan',                         #33 
                        'appointments',                     #34  
                        'visitor_logs',                     #35
                        'residents',                        #36  
                        'contact_tracing',                  #37
                        'system_log',                       #38
                        'gym',                              #39
                        'personal_record',                  #40

                    ];

        return $tables[$INPUT];
    }

    public function INIT_CONDITIONS($INPUT)
    {
        $conditions =   [
                        "=", 
                        ">", 
                        "<", 
                        ">=", 
                        "<=", 
                        "!=", 
                    ];

        return $conditions[$INPUT];
    }

    public function __FETCH($DATA)
    {
        
        $c = null;

        $j = null;

        $w = null;

        $g = null;

        $o = null;

        $lj = null;

        $wo = null;

        $wi = null;

        $DATA = base64_decode($DATA);

        $INPUT = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',$DATA);

        $TABLE = $this->INIT_TABLES( $INPUT["v1"] );

        $TABLE_COLUMNS = Schema::getColumnListing( $TABLE );

        $c = $this->PREP_INPUT( "COLUMN", $INPUT["v2"], $TABLE_COLUMNS );

        if( isset($INPUT["v3"]) )
        {

            foreach ( $INPUT["v3"] as $key => $value ) {

                if( isset($value["c1"]) ){
    
                    $j = $this->PREP_INPUT( "JOIN" ,[$value["c1"]], $TABLE_COLUMNS );

                }
    
                if( isset($value["c2"]) ){
    
                    $lj = $this->PREP_INPUT( $value["c2"], $TABLE_COLUMNS );
        
                }
    
                if( isset($value["c3"]) ){
    
                    $g = $this->PREP_INPUT( $value["c3"], $TABLE_COLUMNS );
        
                }
    
                if( isset($value["c4"]) ){
    
                    $o = $this->PREP_INPUT("ORDERBY", $value["c4"], $TABLE_COLUMNS );
                   
        
                }
    
                if( isset($value["c5"]) ){
    
                    $w = $this->PREP_INPUT( "WHERE", [$value["c5"]], $TABLE_COLUMNS );
        
                }
                
                if( isset($value["c6"]) ){
    
                    $wo = $this->PREP_INPUT( $value["c6"], $TABLE_COLUMNS );
        
                }
    
                if( isset($value["c7"]) ){
    
                    $wi = $this->PREP_INPUT( $value["c7"], $TABLE_COLUMNS );
        
                }
                
            }

        }

        $DATA = DB::table($TABLE);
  
        $DATA->select($c);

        if( isset($w) )
        {
            
            $DATA->where($w);
    
        }

        if( isset($j) )
        {
    
            foreach ($j as $key => $val) {
    
                $DATA->join($val[0],$val[1],$val[2],$val[3]);
    
            }
        }
    
        if( isset($lj) )
        {
    
            foreach ($lj as $key => $val) {
    
                $DATA->leftjoin($val[0],$val[1],$val[2],$val[3]);
    
            }
        }
    
        if( isset($g) )
        {
    
            $DATA->groupBy($g);
    
        }

        if( isset($o) )
        {
      
            $DATA->orderBy($o[0],$o[1]);
          
        }

        if( isset($wo) )
        {
    
            foreach ($wo as $key => $val) {
    
                $DATA->orWhere($val[0],$val[1],$val[2]);
    
            }

        }

        if( isset($wi) )
        {
    
            foreach ($wi as $key => $val) {
    
                $DATA->whereIn($val[0],[$val[1]]);
    
            }

        }



        // if($TABLE == 'forms_containers_cols_list'){
        // dd($DATA->toSql());
        // }
       
        // dd($DATA->toSql());

       
        $DATA = $DATA->get();

        // dd($DATA);


        return response()->json($DATA); 
       
    }

    public function PREP_INPUT($TYPE,$ARRAY,$TABLE_COLUMNS)
    {

        $output = array();
       
        foreach ( $ARRAY as $key => $value ) {

            if( $TYPE == "COLUMN" )
            {

                if( is_array( $value ) )
                {
                    $table = $this->INIT_TABLES($value[0]);

                    $table_columns = Schema::GetColumnListing($table);

                    $column = $table.'.'.$table_columns[$value[1]];

                    array_push( $output, $column );

                }
                else
                {   

                    array_push( $output, $TABLE_COLUMNS[$value] );

                }

            }

            
         

            if( $TYPE == "ORDERBY" )
            {
                

                if( is_array( $value ) )
                {
                    $table = $this->INIT_TABLES($value[0]);

                    $table_columns = Schema::GetColumnListing($table);

                    $output = [$table_columns[$value[1]], $value[2]];

                }
               

            }

            if( $TYPE == "WHERE" )
            {

                $condition = $this->INIT_CONDITIONS($value[1]);

                if( is_array($value[0]) )
                {

                    $table = $this->INIT_TABLES($value[0][0]);

                    $table_columns = Schema::GetColumnListing($table);

                    $column = $table.'.'.$table_columns[$value[0][1]];

                    array_push( $output, [ $column, $condition, $value[2] ] );

                }
                else
                {

                    array_push( $output, [ $TABLE_COLUMNS[$value[0]], $condition, $value[2] ] );

                }

            }

            if( $TYPE == "JOIN" )
            {

          

                foreach ($value as $key => $join) {
                    
                    $jointable = $this->INIT_TABLES($join[0][0]);

                    $jointable_columns = Schema::GetColumnListing($jointable);

                    $jointable_common = $jointable_columns[$join[0][1]];
               
                    
                    $condition = $this->INIT_CONDITIONS($join[1]);


                    $maintable = $this->INIT_TABLES($join[2][0]);

                    $maintable_columns = Schema::GetColumnListing($maintable);

                    $maintable_common = $maintable_columns[$join[2][1]];

                    array_push( $output, [$jointable ,$jointable.'.'.$jointable_common, $condition, $maintable.'.'.$maintable_common]  );

                 
                }









               
                // dd($output);
            }

        }


        
        return $output;
    }

    public function PREP_JOIN($ARRAY,$TABLE_COLUMNS)
    {
        $output = array();
        
        foreach ( $ARRAY as $key => $value ) {

            $condition = $this->INIT_CONDITIONS($value[1]);

            array_push( $output, [ $TABLE_COLUMNS[$value[0]], $condition, $value[2] ] );

        }

        return $output;
    }

    public function PREP_COLS($ARRAY,$TABLE_COLUMNS)
    {
        $columns = array();
        
        foreach ( $ARRAY as $key => $value ) {

            array_push($columns,$TABLE_COLUMNS[$value]);

        }

        return $columns;
    }

    public function __FETCHDATAN($DATA,$TEST=null)
    {

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

        if( isset($JSON['v1'])){

            $t = $JSON['v1'];

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

        // if( isset($JSON['whereOr'])){

        //     $wo = $JSON['whereOr'];

        // }
      
        $DATA = library::__FETCHDATA($t,$c,$j,$w,$g,$o,$lj,$wo);

     /*    if($TEST=='1')
        {
            dd($DATA->toSql());
        } */

        return response()->json($DATA); 

    }

    

    public function __INSERTN(Request $DATA)   
    {   
       
        $fileColumn = ''; 

        $TEMP = json_encode($DATA->all());

        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $TABLE = $this->INIT_TABLES( $TEMP["v1"] );

        $TABLE_COLUMNS = Schema::getColumnListing($TABLE);

        $LATESTCODE = library::__FETCHLATESTCODE($TABLE,$TABLE_COLUMNS[0],$TABLE_COLUMNS[0],'DESC',5);

        foreach ($TEMP as $key => $value) {
            
            if( $key != 'v1' && $key != 'v2' && $key != '_token' && $key != 'v3' )
            {

                $ARR[$TABLE_COLUMNS[$key]] = $value;

            }

        } 

        $ARR[$TABLE_COLUMNS[0]] = $LATESTCODE;

        library::__STORE($TABLE,$ARR);

        if( isset($TEMP['v2']) )
        {

            return redirect()->back()->with('success-message', $TEMP['v2']);

        }
        else
        {
            return '<small style="text-align:center; margin-top: 40px;">Lazy Modal</small><hr><br><h1 style="text-align:center; margin-top: 40px;">Alert Output Missing!</h1>';
        }

    }

    public function __DELETEN(Request $DATA)
    {       

        $TEMP = json_encode($DATA->all());

        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $TABLE = $this->INIT_TABLES( $TEMP["v1"] );

        $MESSAGE = $DATA['v2'];

        $TABLE_COLUMNS = Schema::getColumnListing($TABLE);

        $IDS = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',base64_decode($TEMP['v3']));

        if( is_array($IDS) )
        {
            
            foreach ( $IDS["_D"] as $key => $value ) {
                
                library::__DESTROY($TABLE,$TABLE_COLUMNS,$value);

            }
            
        }
    
        return redirect()->back()->with('success-message', $MESSAGE);

    }

    public function __EDITN(Request $DATA)
    {

        $fileColumn = '';

        $ARR = array();

        $PK = '';

        $TEMP = $DATA->all();

        $TEMP = json_encode($DATA->all());
        
        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);


        $TABLE = $this->INIT_TABLES( $TEMP["v1"] );

        $TABLE_COLUMNS = Schema::getColumnListing($TABLE);

        $EDITABLES = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',base64_decode($TEMP['v3']));

        if( is_array( $EDITABLES['_MD'] ) )
        {
            // NOT YET UPDATED
            // $MODIFYDATA = $this->cryptoJsAesDecrypt('mlqu-hash-password-2021',base64_decode($EDITABLES['_MD']));

            // foreach ($MODIFYDATA['data'] as $key => $value) {

            //     if( in_array( $value[1], $TABLE_COLUMNS ) )
            //     {

            //         return redirect()->back()->with('fail-message', 'Something went wrong!');

            //     }
            //     else
            //     {

            //         $ARR[$TABLE_COLUMNS[$value[0]]] = $value[1];

            //     }
            // }

        }
        else
        {   

            foreach ($TEMP as $key => $value) {
        
                if( $key != 'v1' && $key != 'v2' && $key != 'v3' && $key != '_token' )
                {

                    $ARR[$TABLE_COLUMNS[$key]] = $value;
    
                }
    
            }

            $ARR[$TABLE_COLUMNS[0]] = $EDITABLES['_MD'];

            library::__UPDATE($TABLE,$ARR,$TABLE_COLUMNS[0]);

        }
        

        
        
        return redirect()->back()->with('success-message',$TEMP['v2']);

        // }

    }













    public function __FETCHDATA($DATA)
    {

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
        // return redirect()->back()->with('fail-message', 'Something went wrong!');

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

                
                /* dd($ARR); */

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

        // dd($DATA);

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

    public function getVerificationCode( $applicantId )
    {

        $t =    'temp_users';

        $c =    [
                    'verification_code'
                ];
    
        $w =    [
                    ['applicant_id', '=', $applicantId ]
                ];

        $temp = library::__FETCHDATA($t,$c,null,$w,null);

        return $temp[0]->verification_code;

    }



    public function verifyApplication(Request $request)
    {

        $verificationCode = $this->getVerificationCode($request->applicantId);

        if( $verificationCode == $request->verificationCode )
        {
            return redirect()->back()->with('success-message', 'NOice');
        }
        else
        {

            return redirect()->back()->with('fail-message', 'Wrong wrong');

        }

    }

    public function submitApplication(Request $request)
    {
        $arr = array();
        dd($request->all());

        // applicant_id,
        // table_code, 
        // column_code,
        // value

        dd($request->applicant_id);

        if($request->hasFile('v'))
        {

            $uploadPath = '/uploaded/admission';

            $file = $request->file('v');

            $savedFileName =  $uploadPath.'/'.$applicant_id.' - '.$file->getClientOriginalName();

            array_push($arr,
                                [
                                
                                    'applicant_id' => $request->applicant_id,
                                
                                    'table_code'=>$request->tc,
                                
                                    'column_code'=>$request->cc,
                                
                                    'value'=>$savedFileName
                                
                                ]
                            );

            $this->__UPLOAD($file,$uploadPath);

        }
        else
        {

            array_push($arr,
                                [
                                
                                    'applicant_id' => $request->applicant_id,
                                
                                    'table_code'=>$request->tc,
                                
                                    'column_code'=>$request->cc,
                                
                                    'value'=>$request->v
                                ]
                            );

        }


        library::__STORE('temp_applicants',$arr);
     
    }


    public function getLatestApplicantId()
    {

        $t =    'temp_users';

        $c =    [
                    'applicant_id'
                ];

        $o =    ['applicant_id', 'desc'];

        $TEMP_CODE = library::__FETCHDATA($t,$c,null,null,null,$o);

        $TEMP_CODE = $TEMP_CODE[0]->applicant_id;

        if(!strpos($TEMP_CODE, '-')){

            $LATESTCODE = $TEMP_CODE += 1;
        }
        else{

            $TEMP = Str::of($TEMP_CODE)->after('-');

            $TEMP = (string) $TEMP;

            $TEMP1 = $TEMP += 1;

            $TEMP1 = str_pad($TEMP1,'5',"0",STR_PAD_LEFT);

            $TEMP = Str::of($TEMP_CODE)->before('-');

            $LATESTCODE = $TEMP.'-'.$TEMP1;
        }

        return $LATESTCODE;

    }

    public function createApplicantAccount( $applicantId )
    {   

        $verificationCode = $this->generateVerificationCode();

        library::__STORE('temp_users',[ 'applicantId' => $applicantId , 'email' => $email ,'verification_code' => $verificationCode ]);

    }

    public function generateVerificationCode()
    {
        $code = random_int(100000, 999999);

        return $code;
    }

    public function ld_topUpCurrentWallet( Request $DATA )
    {

        $primaryKey = '';

        $id = Auth::user()->id;

        $role = $this->getRole();

        $t =    'ld_user_current_wallet';

        $c =    [   'id',
                    'amount'
                ];
    
        $w =    [
                    ['user', '=', $id]
                ];

        $currentWalletBalance = library::__FETCHDATA($t,$c,null,$w);

        $fileColumn = ''; 

        $TEMP = json_encode($DATA->all());

        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $TABLE = $this->INIT_TABLES( $TEMP["v1"] );

        $TABLE_COLUMNS = Schema::getColumnListing($TABLE);

        $LATESTCODE = library::__FETCHLATESTCODE($TABLE,$TABLE_COLUMNS[0],$TABLE_COLUMNS[0],'DESC',5);

        foreach ($TEMP as $key => $value) {
            
            if( $key != 'v1' && $key != 'v2' && $key != '_token' && $key != 'v3' )
            {

                $ARR[$TABLE_COLUMNS[$key]] = $value;

            }

        }

        foreach ($currentWalletBalance as $key => $x) {

            $primaryKey = $x->id;

            $ARR['amount'] = $ARR['amount']+$x->amount;

        }

        if( count($currentWalletBalance) > 0 )
        {

            $ARR[$TABLE_COLUMNS[0]] = $primaryKey;

            library::__UPDATE($TABLE, $ARR, 'id');

        }
        else
        {
            library::__STORE($TABLE, $ARR);
        }

        if( isset($TEMP['v2']) )
        {

            return redirect()->back()->with('success-message', $TEMP['v2']);

        }
        else
        {
            return '<small style="text-align:center; margin-top: 40px;">Lazy Modal</small><hr><br><h1 style="text-align:center; margin-top: 40px;">Alert Output Missing!</h1>';
        }


    }

    public function ld_withDrawCurrentWallet( Request $DATA )
    {

        $primaryKey = '';

        $id = Auth::user()->id;

        $role = $this->getRole();

        $t =    'ld_user_current_wallet';

        $c =    [   'id',
                    'amount'
                ];
    
        $w =    [
                    ['user', '=', $id]
                ];

        $currentWalletBalance = library::__FETCHDATA($t,$c,null,$w);

        $fileColumn = ''; 

        $TEMP = json_encode($DATA->all());

        $TEMP = json_decode($TEMP);

        $TEMP = json_decode(json_encode($TEMP), true);

        $TABLE = $this->INIT_TABLES( $TEMP["v1"] );

        $TABLE_COLUMNS = Schema::getColumnListing($TABLE);

        $LATESTCODE = library::__FETCHLATESTCODE($TABLE,$TABLE_COLUMNS[0],$TABLE_COLUMNS[0],'DESC',5);

        foreach ($TEMP as $key => $value) {
            
            if( $key != 'v1' && $key != 'v2' && $key != '_token' && $key != 'v3' )
            {

                $ARR[$TABLE_COLUMNS[$key]] = $value;

            }

        }

        foreach ($currentWalletBalance as $key => $x) {

            $primaryKey = $x->id;

            $ARR['amount'] = $x->amount - $ARR['amount'];

        }

        $ARR[$TABLE_COLUMNS[0]] = $primaryKey;

        library::__UPDATE($TABLE, $ARR, 'id');

        if( isset($TEMP['v2']) )
        {

            return redirect()->back()->with('success-message', $TEMP['v2']);

        }
        else
        {
            return '<small style="text-align:center; margin-top: 40px;">Lazy Modal</small><hr><br><h1 style="text-align:center; margin-top: 40px;">Alert Output Missing!</h1>';
        }


    }

  




}
