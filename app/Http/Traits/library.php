<?php
namespace App\Http\Traits;
use Auth;
use DB;
use Schema;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\User;
// use App\Models\subjects;
// use App\Models\student_profile;
// use App\Models\enlistment;
// use App\Models\student_account;
// use App\Models\classes;

trait library
{
    
    public static function __FETCHDATA($TABLE, $COLUMN, $_JOIN = null, $_WHERE = null, $_GRPBY = null, $_ORDBY = null, $_LJOIN = null, $_WHEREOR = null,$_WHEREIN = null, $_WHERENOTIN = null)
    {   

        if ($COLUMN == '*'){

            $TABLE_COLUMNS = Schema::getColumnListing($TABLE);

        }
        else{
            
            if( is_array ( $COLUMN ) ){
            
                for ($i=0; $i < sizeof($COLUMN) ; $i++) { 

                    if(strpos($COLUMN[$i], 'concat')  !== false){
  
                        $COLUMN[$i] = DB::raw($COLUMN[$i]);
  
                    }
                }
            }
            
            $TABLE_COLUMNS = $COLUMN;

        }

        $DATA = DB::table($TABLE);

        $DATA->select($TABLE_COLUMNS);

        if( isset($_JOIN) )
        {
    
            foreach ($_JOIN as $key => $val) {
    
                $DATA->join($val[0],$val[1],$val[2],$val[3]);
    
            }
        }
    
        if( isset($_LJOIN) )
        {
    
            foreach ($_LJOIN as $key => $val) {
    
                $DATA->leftjoin($val[0],$val[1],$val[2],$val[3]);
    
            }
        }
    
        if( isset($_WHERE) )
        {
    
            $DATA->where($_WHERE);
    
        }
    
        if( isset($_GRPBY) )
        {
    
            $DATA->groupBy($_GRPBY);
    
        }
        if( isset($_ORDBY) )
        {
            $DATA->orderBy($_ORDBY[0],$_ORDBY[1]);
          
        }
        if( isset($_WHEREOR) )
        {
    
            foreach ($_WHEREOR as $key => $val) {
    
                $DATA->orWhere($val[0],$val[1],$val[2]);
    
            }
    
        }

        if( isset($_WHEREIN) )
        {
    
            foreach ($_WHEREIN as $key => $val) {
    
                $DATA->whereIn($val[0],[$val[1]]);
    
            }
    
        }

        if( isset($_WHERENOTIN) )
        {

            $DATA->whereNotIn($_WHERENOTIN[0],$_WHERENOTIN[1]);
    
        }

     /*    if($TABLE == 'subject_course_year'){
            dd($DATA->toSql()) ;
        } */
       
       
        return $DATA->get();
    }

    public static function __FETCHDATAN($DATA, $TEST=null)
    {

        $TABLE = null;

        $TABLE_COLUMNS = null;
  
        $COLUMN = null; 
   
        $_JOIN = null; 
   
        $_WHERE = null; 
   
        $_GRPBY = null; 
   
        $_ORDBY = null; 
   
        $_LJOIN = null; 
   
        $_WHEREOR = null;
   
        $_WHEREIN = null; 
   
        $_WHERENOTIN = null;

        $SUBQUERY = null;

        if( isset( $DATA['t'] ) )
        {
            $TABLE = $DATA['t'];
        }

        if( isset( $DATA['c'] ) )
        {
            $COLUMN = $DATA['c'];
            
            if ($COLUMN == '*')
            {

                $TABLE_COLUMNS = Schema::getColumnListing($TABLE);
    
            }
            else{
                
                if( is_array ( $COLUMN ) ){
                
                    for ($i=0; $i < sizeof($COLUMN) ; $i++) { 
    
                        if(strpos($COLUMN[$i], 'concat')  !== false){
      
                            $COLUMN[$i] = DB::raw($COLUMN[$i]);
      
                        }
                    }
                }
                
                $TABLE_COLUMNS = $COLUMN;
    
            }
        }

        $QUERY = DB::table($TABLE);

        if( isset( $DATA['xq'] ) )
        {

            $SUBQUERY = DB::table($DATA['xq']['qt']);

            if( $DATA['xq']['qk'] == 'select' )
            {

                if( is_array ( $DATA['xq']['qc'] ) ){
                
                    for ( $i = 0 ; $i < sizeof($DATA['xq']['qc']); $i++ ) { 
    
                        if(strpos($DATA['xq']['qc'][$i], 'concat')  !== false){
    
                            $DATA['xq']['qc'][$i] = DB::raw($DATA['qc'][$i]);
    
                        }
                    }
                }

                $SUBQUERY->select($DATA['xq']['qc']);

            }

            if( isset( $DATA['xq']['qw'] ) )
            {

                $SUBQUERY->where( $DATA['xq']['qw']);

            }

            // $SUBQUERY->toSql();

        }

        // if( isset( $SUBQUERY ) )
        // {

        //     // array_push($TABLE_COLUMNS,DB::raw("({$SUBQUERY->tosql()}) as sub"));
          
        //     // $QUERY->select($TABLE_COLUMNS);

        //     // dd();   

        //     // dd($SUBQUERY->toSql());

            

        //     $QUERY->addSelect($TABLE_COLUMNS);


        //     $QUERY->selectSub($SUBQUERY->tosql(),'total');

        //     // dd($DATA['xq']['qw']);

        //     // dd($SUBQUERY);


        //     dd( $QUERY->tosql() );
            


        //     // dd( $QUERY->getbindings());
        //     // dd( $SUBQUERY->getbindings());
            
        //     // dd( $SUBQUERY->toSql());

        //     // dd( $QUERY->getBindings() );

            
        //     // dd( $SUBQUERY->get() );
           
            
        //     // dd( $TABLE_COLUMNS );
            

        //     // $QUERY->select( $TABLE_COLUMNS, $SUBQUERY->toSql() );



        //     // dd($SUBQUERY->toSql());



        //     // $other->groupBy('something');
        //     // $other->groupBy('foo');
        //     // $other->groupBy('bar');
          
        //     // $other->get();
        // }
        // else
        // {
        
        //     $QUERY->select($TABLE_COLUMNS);

        // }


        $QUERY->select($TABLE_COLUMNS);

        if( isset( $DATA['j'] ) )
        {
    
            foreach ($DATA['j'] as $key => $val) {
    
                $QUERY->join($val[0],$val[1],$val[2],$val[3]);
    
            }
        }
    
        if( isset( $DATA['lj'] ) )
        {
    
            foreach ($DATA['lj'] as $key => $val) {
    
                $QUERY->leftjoin($val[0],$val[1],$val[2],$val[3]);
    
            }
        }
    
        if( isset( $DATA['w'] ) )
        {
    
            $QUERY->where($DATA['w']);
    
        }
    
        if( isset( $DATA['g'] ) )
        {
    
            $QUERY->groupBy($DATA['g']);
    
        }
        if( isset( $DATA['o'] ) )
        {
      
            $QUERY->orderBy($DATA['o'][0],$DATA['o'][1]);
          
        }
        if( isset( $DATA['wo'] ) )
        {
    
            foreach ($DATA['wo'] as $key => $val) {
    
                $QUERY->orWhere($val[0],$val[1],$val[2]);
    
            }
    
        }

        if( isset( $DATA['wi'] ) )
        {
    
            foreach ($DATA['wi'] as $key => $val) {
    
                $QUERY->whereIn($val[0],[$val[1]]);
    
            }
    
        }

        if( isset( $DATA['wni'] ) )
        {

            $QUERY->whereNotIn($DATA['wni'][0],$DATA['wni'][1]);
    
        }

        // if( $TEST == '1' )
        // {
        //    
        // }
       
        // $QUERY->get();
        // dd( DB::enableQueryLog() );

        // dd($QUERY->toSql());

        return $QUERY->get();
        
    }

    public static function __FETCHLATESTCODE($TABLE, $COLUMN, $ORDERBY, $ARR, $PAD)
    {
        if ($COLUMN == '*'){

            $TABLE_COLUMNS = Schema::getColumnListing($TABLE);
        }
        else{

            $TABLE_COLUMNS = $COLUMN;
        }

        $DATA = DB::table($TABLE);

        $DATA->select($TABLE_COLUMNS);

        $DATA->orderBy($ORDERBY, $ARR);

        if($DATA->pluck($TABLE_COLUMNS)->count()>0){

            $TEMP_CODE = $DATA->pluck($TABLE_COLUMNS)[0];
            
            if(!strpos($TEMP_CODE, '-')){

                $LATESTCODE = $TEMP_CODE += 1;
            }
            else{

                $TEMP = Str::of($TEMP_CODE)->after('-');

                $TEMP = (string) $TEMP;

                $TEMP1 = $TEMP += 1;

                $TEMP1 = str_pad($TEMP1,$PAD,"0",STR_PAD_LEFT);

                $TEMP = Str::of($TEMP_CODE)->before('-');

                $LATESTCODE = $TEMP.'-'.$TEMP1;
            }

            return $LATESTCODE;
        }
 

    }

    public static function __STORE($TABLE, $DATA)
    {
        DB::table($TABLE)->insert($DATA);
    }

    public static function __UPDATE($TABLE, $DATA, $PRIMARY)
    {
        // dd($DATA);
        DB::table($TABLE)->where($PRIMARY,'=', $DATA[$PRIMARY])->update($DATA);
    }

    public static function __DESTROY($TABLE, $TABLECOLUMN, $PRIMARYCODE)
    {   
        DB::table($TABLE)->where($TABLECOLUMN[0],'=', $PRIMARYCODE)->delete();
    }







































    // public static function getSubjects()
    // {
    //     $subjects = DB::table('subjects')
    //     ->select(
    //                 'subject_code', 
    //                 'name', 
    //                 'category',
    //                 'units'
    //             )
    //     ->get();
    //     return $subjects;
    // }

   


    // public static function getStudentName()
    // {   
    //     $name = DB::table('student_profile')
    //     ->select(
    //                 DB::raw("CONCAT(fname,' ',lname) AS name"),
    //                 'student_profile.stud_id AS studentid'
    //             )
    //     ->join('student_account', 'student_account.stud_id', '=', 'student_profile.stud_id')
    //     ->where('student_account.userid','=',Auth::user()->id)
    //     ->get();

    //     return $name;
    // }
    // public static function getClasses()
    // {       
    //     $classes = classes::select (
    //                                 'classes.id as no',
    //                                 'users.name as created',
    //                                 'created_date as date',
    //                                 'professor_profile.name as professor',
    //                                 'section',
    //                                 'room',
    //                                 'max_student as maxstudent'
    //                             )
    //             ->join('professor_profile', 'professor_profile.id', '=', 'classes.adviser')
    //             ->join('users', 'users.id', '=', 'classes.created_by')
    //             ->get();
    //     return $classes;
    // }



    // public static function getFilter($f)
    // {   
    //     if( $f == 'enlistment')
    //     {   
    //         $obj =  enlistment::select(
    //                                     'subjects.subject_code as code', 
    //                                     'subjects.name as subject'
    //                                 )
    //             ->join('subjects', 'subjects.subject_code', '=', 'enlistment.subject_code')
    //             ->where('approving_adviser','=',Auth::user()->id)
    //             ->groupBy('subjects.name')
    //             ->get();
    //     }
    //     else if( $f == 'dean')
    //     {   

    //     }

    //     return $obj;
    // }

    // public static function getEnlistedStudents(){

    //     $enlistment = DB::table('enlistment')
    //         ->select(   
    //                     'subjects.subject_code as subjectCode', 
    //                     'subjects.name as subject', 
    //                     DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
    //                     'users.name as approving', 
    //                     'enlistment_date as date',
    //                     'units'
    //                 )
    //         ->join('student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id')
    //         ->join('subjects', 'subjects.subject_code', '=', 'enlistment.subject_code')
    //         ->join('users', 'users.id', '=', 'enlistment.approving_adviser')
    //         ->where('approving_adviser', '=', Auth::user()->id)
    //         ->get();
    //     return $enlistment;
    // }
    // public static function getEnlistments($role)
    // {
    //     $user = User::findOrFail(Auth::user()->id);

    //     if( $role == 'adviser' ){

    //         $enlistment = DB::table('enlistment')
    //         ->select(   
    //                     'subjects.subject_code as subjectCode', 
    //                     'subjects.name as subject', 
    //                     DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
    //                     'users.name as approving', 
    //                     'enlistment_date as date',
    //                     'units'
    //                 )
    //         ->join('student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id')
    //         ->join('subjects', 'subjects.subject_code', '=', 'enlistment.subject_code')
    //         ->join('users', 'users.id', '=', 'enlistment.approving_adviser')
    //         ->where('approving_adviser', '=', Auth::user()->id)
    //         ->get();

    //     }
    //     else if( $role == 'student' ){

    //         $enlistment = DB::table('enlistment')
    //         ->select(   
    //                     'subjects.subject_code as subjectCode', 
    //                     'subjects.name as subject', 
    //                     DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
    //                     'users.name as approving', 
    //                     'enlistment_date as date',
    //                     'units',
    //                     'current_status as status'
    //                 )
    //         ->join('student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id')
    //         ->join('subjects', 'subjects.subject_code', '=', 'enlistment.subject_code')
    //         ->join('student_account', 'student_account.stud_id', '=', 'enlistment.stud_id')
    //         ->join('users', 'users.id', '=', 'enlistment.approving_adviser')
    //         ->where('student_account.userid', '=', Auth::user()->id)
    //         ->get();
    //     }
    //     else if( $role == 'registrar' ){    


    //         $enlistment = DB::table('enlistment')
    //         ->select(   
    //                     'subjects.subject_code as subjectCode', 
    //                     'subjects.name as subject', 
    //                     DB::raw('count(subjects.subject_code) as "no"')
    //                 )
    //         ->join('subjects', 'subjects.subject_code', '=', 'enlistment.subject_code')
    //         ->where('current_status', '=', 'Approved')
    //         ->groupBy('subjects.name')
    //         ->get();

    //         // dd($enlistment);
    //     }


    //     return $enlistment;
    // }

    
    // public static function getStudents()
    // {
    //     $subjects = DB::table('subjects')
    //     ->select(
    //                 'subject_code', 
    //                 'name', 
    //                 'category'
    //             )
    //     ->get();
    //     return $subjects;
    // }






    

}
