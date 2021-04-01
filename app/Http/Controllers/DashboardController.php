<?php


namespace App\Http\Controllers;
use PDF;
use Auth;
use App;
use DB;
use App\Models\User;
use App\Models\role_user;
use Illuminate\Http\Request;
use App\Http\Traits\library;


// require __DIR__ . '/vendor/autoload.php';



class DashboardController extends Controller
{

    
    use library;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function student()
    {
        return view('pages/dashboard/student');
    }
    public static function schedule()
    {
        return view('pages/dashboard/schedule');
    }

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

    public function index()
    {   
    
        $role = $this->getRole();

        $id = Auth::user()->id;

        if($role == 'administrator')
        {
            // $subjects = library::__FETCHDATA('subjects','*');

            return view('pages/dashboard/administrator/dashboard',compact('role','id'));
        }
        else if($role == 'secretary')
        {
            $subjects = library::__FETCHDATA('subjects','*');

            return view('pages/dashboard/secretary/subjects',compact('role','subjects','id'));
        }
        else if($role == 'registrar')
        {

            $t =    'enlistment';

            $c =    [
                        DB::raw('concat(fname," ",lname) as "student"'),
                        'users.name as approvedBy',
                        'subjects.subject_code as subjectCode', 
                        'subjects.name as subject', 
                        DB::raw('count(subjects.subject_code) as "no"')
                    ];
    
            $j =    [
                        ['subjects', 'subjects.subject_code', '=', 'enlistment.subject_code'],
                        ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
                        ['users', 'users.id', '=', 'enlistment.approving_adviser']
                    ];
            
            $w =    [
                        ['current_status', '=', 'Approved']
                    ];

            $g =    'subjects.name';
            
            $enlistment = library::__FETCHDATA($t,$c,$j,$w,$g);

            $t =    'enlistment_batch';

            $c =    [   
                        'enlistment_batch.no as no',
                        'users.name as startedBy',
                        'enl_startDate as enlStart', 
                        'enl_endDate as enlEnd',
                        'status'
                      
                    ];

            $j =    [
                        ['users', 'users.id', '=', 'enlistment_batch.startedBy']
                    ];
    
            $batch = library::__FETCHDATA($t,$c,$j);
            
            return view('pages/dashboard/registrar/enlistment',compact('role','enlistment','batch','id'));
        }
        else if($role == 'dean')
        {   

            $t =    'student_class_grade';

            $c =    [
                        'student_class_grade.id as no',
                        'subjects.name as subject',
                        'student_profile.stud_id as studentNo',
                        'grade', 
                        DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
                        'professor_profile.name as professor', 
                
                    ];
    
            $j =    [   
                        ['student_class_subject', 'student_class_subject.id', '=', 'student_class_grade.subject'],
                        ['student_class', 'student_class.id', '=', 'student_class_subject.student'],
                        ['student_profile', 'student_profile.stud_id', '=', 'student_class.stud_id'],
                        ['student_course', 'student_course.stud_id', '=', 'student_profile.stud_id'],
                        ['courses', 'courses.cour_code', '=', 'student_course.cour_code'],
                        ['professor_profile', 'professor_profile.id', '=', 'student_class_grade.givenBy'],
                        ['subjects', 'subjects.subject_code', '=', 'student_class_subject.subject_code']
                    ];
            $w =    [
                        ['status','=','for deans approval']
                    ];

            $grades = library::__FETCHDATA($t,$c,$j,$w);

            $id = Auth::user()->id;

            return view('pages/dashboard/dean/students',compact('id','role','grades'));
        }
        else if($role == 'adviser')
        {  

            $latestEnlistmentNo = $this->getLatestEnlistmentNo();
           
            $t =    'enlistment';

            $c =    [
     
                        'enlistment.id as code',
            
                        'student_profile.stud_id as studId',
            
                        'subjects.subject_code as subjectCode', 
            
                        'subjects.name as subject', 

                        DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
            
                        'enlistment_date as date',
            
                        'units',
            
                        'current_status',
            
                        'enl_batch'
                    ];
    
            $j =    [
         
                        ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
                
                        ['subjects', 'subjects.subject_code', '=', 'enlistment.subject_code']
               
                    ];
            $w =    [

                        ['enl_batch','!=', $latestEnlistmentNo]
                   
                    ];

            $records = library::__FETCHDATA($t,$c,$j,$w);

            $t =    'enlistment_batch';

            $c =    [
                        'no', 
                        
                    ];

            $filter = library::__FETCHDATA($t,$c);

            $t =    'enlistment';

            $c =    [
                        'enlistment.id as code',
                        'student_profile.stud_id as studId',
                        'subjects.subject_code as subjectCode', 
                        'subjects.name as subject', 
                        'concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student', 
                        'enlistment_date as date',
                        'units',
                        'current_status'
                    ];
    
            $j =    [
                        ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
                        ['subjects', 'subjects.subject_code', '=', 'enlistment.subject_code']
                    ];
        

            $enlistment = library::__FETCHDATA($t,$c,$j);


            $t =    'enlistment';

            $c =    [
                        '*'
                        
                    ];
            $w =    [
                        ['enl_batch','=',$latestEnlistmentNo],
                        ['current_status','=','FOR APPROVAL'],
                    ];
    
            $new = library::__FETCHDATA($t,$c,null,$w);

            $t =    'enlistment';

            $c =    [
                        '*'
                        
                    ];
            $w =    [
                        ['enl_batch','=',$latestEnlistmentNo],
                        ['current_status','=','Approved'],
                    ];
    
            $approved = library::__FETCHDATA($t,$c,null,$w);

            $t =    'enlistment';

            $c =    [
                        '*'
                        
                    ];
            $w =    [
                        ['enl_batch','=',$latestEnlistmentNo],
                        ['current_status','=','Declined'],
                    ];
    
            $declined = library::__FETCHDATA($t,$c,null,$w);
            
            $countNew = 0;
           
            $countApproved = 0;
           
            $countDeclined = 0;

            foreach ($new as $key => $value) {
         
                $countNew++;
         
            }

            foreach ($approved as $key => $value) {
        
                $countApproved++;
        
            }

            foreach ($declined as $key => $value) {
         
                $countDeclined++;
         
            }





            





            $id = Auth::user()->id;

            return view('pages/dashboard/courseadviser/enlistment',compact('role','records','enlistment','filter','id','countNew','countApproved','countDeclined'));
        }

        else if($role == 'student')
        {   
            $t =    'enlistment';

            $c =    [
                        'enlistment.enl_batch as enlismentbatch'
                    ];
    
            $j =    [
                        ['student_account', 'student_account.stud_id', '=', 'enlistment.stud_id']
                    ];
            
            $w =    [
                        ['userid','=',Auth::user()->id]
                    ];

            $g =    'enlistment.enl_batch';    


            $filter = library::__FETCHDATA($t,$c,$j,$w,$g);

            $t =    'enlistment';

            $c =    [
                        'subjects.subject_code as subjectCode', 
                        'subjects.name as subject', 
                        DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
                        'users.name as approving', 
                        'enlistment_date as date',
                        'units',
                        'current_status as status'
                    ];
    
            $j =    [
                        ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
                        ['subjects', 'subjects.subject_code', '=', 'enlistment.subject_code'],
                        ['student_account', 'student_account.stud_id', '=', 'enlistment.stud_id'],
                        ['users', 'users.id', '=', 'student_account.id']
                    ];
            
            $w =    [
                        ['student_account.userid', '=', Auth::user()->id]
                    ];
                    
            $enlistment = library::__FETCHDATA($t,$c,$j,$w);

            // dd($enlistment);

            // dd(Auth::user()->id);

            // dd($enlistment);
            return view('pages/dashboard/student/enlistment',compact('role','filter','enlistment'));
        }
       
    }


    public function getLatestEnlistmentNo()
    {

        $t =    'enlistment_batch';

        $c =    [
                    'no', 
                    
                ];

        $o =    ['no','DESC'];    

        $value = library::__FETCHDATA($t,$c,null,null,null,$o);

        if($value)
        {
          
            $value = json_decode($value,true);

            $output = $value[0];

            return $output['no'];

        }
        else
        {
            return '';
        }

    }
    

    public function report()
    {
        return view('pages/dashboard/report');
    }

    public function studentprofile()
    {
        // $role = library::getRole();

        // return view('pages/dashboard/student/profile',compact('role'));
    }

    public function printreport()
    {
        // $html ='<h1>Bill</h1><p>You owe me money, dude.</p>';
        // $pdf =PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0)->save('1.pdf');
        // return $pdf->stream('1.pdf');
        // // $html = "ge";
        // // $pdf = PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0)->save('test.pdf');
        // // $pdf->setTemporaryFolder("C:/xampp/htdocs/mlqu2/public/pdf");
        // // return $pdf->stream('test.pdf');

        return view('layouts/pdf/professor/report/enlistment');

    }

    

    public function getClass()
    {       

        $role = $this->getRole();
        
        $t =    'classes';

        $c =    [
                    'classes.year as yearNo',
                    'classes.term as termNo',
                    'classes.adviser as professorNo',
                    'classes.id as no',
                    'classes.school_year as schoolYearNo',
                    'users.name as created',
                    'created_date as date',
                    'professor_profile.name as professor',
                    'section',
                    'room',
                    'max_student as maxstudent',
                    'year_lvl.yr_name',
                    'terms.term',
                    'school_year.school_year'
                ];

        $j =    [
                    ['professor_profile', 'professor_profile.id', '=', 'classes.adviser'],
                    ['terms', 'terms.term', '=', 'classes.term'],
                    ['year_lvl', 'year_lvl.yr_code', '=', 'classes.year'],
                    ['school_year', 'school_year.id', '=', 'classes.school_year'],
                    ['users', 'users.id', '=', 'classes.created_by']
                ];

        $o =    'classes.id';


        $classes = library::__FETCHDATA($t,$c,$j,null,null,$o);

        $id = Auth::user()->id;

        return view('pages/dashboard/registrar/class',compact('classes','role','id'));
    }

    public function getEnlistmentSubjects($data){

        $id = Auth::user()->id;

        $role = $this->getRole();

        $t =    'enlistment_subject';

        $c =    [   
                    'enlistment_subject.no',
                    'subjects.subject_code as subjectCode',
                    'subjects.name as subject',
                    'for_yr as forYr', 
                    'min_yr as minYr',
                    'max_yr as maxYr'
                ];

        $j =    [
                    ['subjects', 'subjects.subject_code', '=', 'enlistment_subject.subject_code'],
                    ['enlistment_batch', 'enlistment_batch.no', '=', 'enlistment_subject.enlistment_batch'],
                ];


        $w =    [ 
                    ['enlistment_batch.no','=',$data]
                ];

        $subjects = library::__FETCHDATA($t,$c,$j,$w);
        
        // dd($data);


        
        return view('pages/dashboard/registrar/subjects',compact('role','subjects','id','data'));

    }

    public function grades()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $t =    'grades';

        $c =    [   
                    'enlistment_subject.no',
                    'subjects.subject_code as subjectCode',
                    'subjects.name as subject',
                    'for_yr as forYr', 
                    'min_yr as minYr',
                    'max_yr as maxYr'
                ];

        $j =    [
                    ['subjects', 'subjects.subject_code', '=', 'enlistment_subject.subject_code'],
                    ['enlistment_batch', 'enlistment_batch.no', '=', 'enlistment_subject.enlistment_batch'],
                ];


        $w =    [ 
                    ['enlistment_batch.no','=',$data]
                ];

        $subjects = library::__FETCHDATA($t,$c,$j,$w);
 
        return view('pages/dashboard/registrar/subjects',compact('role','subjects','id','data'));

    }











}
