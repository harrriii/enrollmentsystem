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
                        'subject_course.course_code as subjectCode', 
                        'subjects.name as subject', 
                        DB::raw('count(subjects.subject_code) as "no"')
                    ];
    
            // $j =    [
            //             ['subjects', 'subjects.subject_code', '=', 'enlistment.subject_code'],
            //             ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
            //             ['users', 'users.id', '=', 'enlistment.approving_adviser']
            //         ];

            $lj =   [
                
                ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
                ['student_year', 'student_profile.stud_id', '=', 'student_profile.stud_id'],
                ['student_course', 'student_course.stud_id', '=', 'student_profile.stud_id'],
                ['courses', 'courses.cour_code', '=', 'student_course.cour_code'],
                ['subject_course', 'subject_course.cour_code', '=', 'courses.cour_code'],
                ['subjects', 'subjects.subject_code', '=', 'subject_course.subject_code'],
                ['student_account', 'student_account.stud_id', '=', 'student_profile.stud_id'],
                ['users', 'users.id', '=', 'student_account.id']
            ];
            
            $w =    [
                        ['current_status', '=', 'Approved']
                    ];

            $g =    'subjects.name';
            
            // $enlistment = library::__FETCHDATA($t,$c,$j,$w,$g);

            $enlistment = library::__FETCHDATA($t,$c,null,$w,null,null,$lj);


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
                        ['current_status','=','For Approval'],
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

            $enlistmentno = $this->getLatestEnlistmentNo();

            $studentId = $this->getStudentId();

            $courses = $this->getCourses();

            $years = $this->getYears();

            // get student year
            $yr = $this->student_get_year($studentId);

            // get my enlistments
            $enlistments = $this->student_get_myEnlistments();

            // get enlistment batch
            $batches = $this->student_get_myEnlistmentBatches();

            // get enlisted subjects
            $enlistedSubjects = $this->student_get_enlistedSubjects($studentId, $enlistmentno);

            $enlistedSubjects_a = array();

            foreach ($enlistedSubjects as $key => $z) {

                array_push($enlistedSubjects_a,$z->course_code);
            }

            //get subjects available for enlistment
            $subjects = $this->student_get_enlistmentAvailableSubjects( $yr, $enlistedSubjects_a );
            
            // dd($enlistments);

            // $enlistments
            
            return view('pages/dashboard/student/enlistment',

                        compact(    
                                    'role',
                                    'batches',
                                    'enlistments',
                                    'subjects',
                                    'enlistmentno',
                                    'yr',
                                    'studentId',
                                    'enlistedSubjects',
                                    'subjects',
                                    'courses',
                                    'years'
                                )
                );

        }
       
    }



    // CUSTOM FUNCTIONS FOR STUDENT MODULE
    //GET SUBJECTS OPTIONS FOR ENLISTMENTS
    public function student_get_enlistmentAvailableSubjects($year,$enlistedSubjects)
    {

        $subjects = null;

        $t =    'enlistment_subject';

        $c =    [
                    'enlistment_subject.course_code as course_code',
                    'subjects.name as subject',
                    'subjects.category as subjectCategory',
                    'subjects.units as units',
                    'subjects.prerequisite as prerequisite',
                    'for_yr',
                    'cour_code'
                ];

        $j =    [
                    ['subject_course','subject_course.course_code','=','enlistment_subject.course_code'], 
                    ['subjects','subjects.subject_code','=','subject_course.subject_code'], 
                ];
        
        $w =    [
                    ['min_yr','<=',$year],
                    ['max_yr','>=',$year]
                ];

        $wni =  [
                    'subject_course.course_code',
                    $enlistedSubjects
                ];

        $d = array (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                        'w'=>$w,
                        'wni'=>$wni
                    );


        $subjects = library::__FETCHDATAN($d);

        return $subjects;

    }
    public function student_get_myEnlistments()
    {

        $enlistments = null;

        $t =    'enlistment';

        $c =    [
                    'enlistment.id as code',
                    'enlistment.course_code', 
                    'subjects.name as subject', 
                    DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
                    'users.name as approving', 
                    'enlistment_date as date',
                    'units',
                    'current_status as status'
                    // '*'
                ];

        $lj =   [
            
                    ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
                    ['student_year', 'student_profile.stud_id', '=', 'student_profile.stud_id'],
                    ['student_course', 'student_course.stud_id', '=', 'student_profile.stud_id'],
                    ['student_account', 'student_account.stud_id', '=', 'student_profile.stud_id'],
                    ['subject_course', 'subject_course.course_code', '=', 'enlistment.course_code'],
                    ['subjects', 'subjects.subject_code', '=', 'subject_course.subject_code'],
                    ['users', 'users.id', '=', 'student_account.id']
                ];
        
        $w =    [
                    ['student_account.userid', '=', Auth::user()->id]
                ];
 
        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'lj'=>$lj,
                        'w'=>$w,
                    );
                
        $enlistments = library::__FETCHDATAN($d);

        // dd($enlistments);

        return $enlistments;

    }
    public function student_get_myEnlistmentBatches()
    {

        $batches = null;

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

        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                        'w'=>$w,
                        'g'=>$g
                    );

        $batches = library::__FETCHDATAN($d);

        return $batches;

    }


    public function petitions()
    {
        
        $role = $this->getRole();

        $id = Auth::user()->id;

        if($role == 'student')
        {   

            $enlistedSubjects_a = array();

            // get enlistment batch
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

            // get my enlistments
            $t =    'enlistment';

            $c =    [
                        'enlistment.course_code', 
                        'subjects.name as subject', 
                        DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
                        'users.name as approving', 
                        'enlistment_date as date',
                        'units',
                        'current_status as status'
                    ];
    
            $lj =   [
                
                        ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
                        ['student_year', 'student_profile.stud_id', '=', 'student_profile.stud_id'],
                        ['student_course', 'student_course.stud_id', '=', 'student_profile.stud_id'],
                        ['courses', 'courses.cour_code', '=', 'student_course.cour_code'],
                        ['subject_course', 'subject_course.cour_code', '=', 'courses.cour_code'],
                        ['subjects', 'subjects.subject_code', '=', 'subject_course.subject_code'],
                        ['student_account', 'student_account.stud_id', '=', 'student_profile.stud_id'],
                        ['users', 'users.id', '=', 'student_account.id']
                    ];
            
            $w =    [
                        ['student_account.userid', '=', Auth::user()->id]
                    ];
                    
            $enlistment = library::__FETCHDATA($t,$c,null,$w,null,null,$lj);

            $studentId = $this->getStudentId();

            $enlistmentno = $this->getLatestEnlistmentNo();

            $yr = $this->student_get_year($studentId);

            $courses = $this->getCourses();

            $years = $this->getYears();

            $enlistedSubjects = $this->student_get_enlistedSubjects($studentId, $enlistmentno);

            foreach ($enlistedSubjects as $key => $z) {

                array_push($enlistedSubjects_a,$z->course_code);
            }

            //GET SUBJECTS OPTIONS FOR ENLISTMENTS
            $t =    'enlistment_subject';

            $c =    [
                        'enlistment_subject.course_code as course_code',
                        'subjects.name as subject',
                        'subjects.category as subjectCategory',
                        'subjects.units as units',
                        'subjects.prerequisite as prerequisite',
                        'for_yr',
                        'cour_code'
                    ];
    
            $j =    [
                        ['subject_course','subject_course.course_code','=','enlistment_subject.course_code'], 
                        ['subjects','subjects.subject_code','=','subject_course.subject_code'], 
                    ];
            
            $w =    [
                        ['min_yr','<=',$yr],
                        ['max_yr','>=',$yr]
                    ];

            $wni =  [
                        'subject_course.course_code',
                        $enlistedSubjects_a
                    ];

            $subjects = library::__FETCHDATA($t,$c,$j,$w,null,null,null,null,null,$wni);
            
            return view('pages/dashboard/student/petitions',compact('role','filter','enlistment','subjects','enlistmentno','yr','studentId','enlistedSubjects','enlistedSubjects_a','courses','years'));
        }
    }

    public function getYears()
    {

        $output = array();

        $t =    'year_lvl';

        $c =    [
                    '*'
                ];

        $output = library::__FETCHDATA($t,$c);

        return $output;

    }

    public function getCourses()
    {

        $output = array();

        $t =    'courses';

        $c =    [
                    'cour_code',
                    'cour_name'
                ];

        $output = library::__FETCHDATA($t,$c);

        return $output;

    }

    public function student_get_year($studentId)
    {
        $t =    'student_profile';

        $c =    [
                    'year_lvl.yr_value as yrValue'
                ];

        $j =    [
                    ['student_year', 'student_year.stud_id', '=', 'student_profile.stud_id'],
                    ['year_lvl', 'year_lvl.yr_code', '=', 'student_year.yr_code'],
                ];
        
        $w =    [
                    ['student_profile.stud_id','=',$studentId]
                ];
                
        $yr = library::__FETCHDATA($t,$c,$j,$w);

                  
        foreach ($yr as $key => $value) {

            $id = $value->yrValue;

        }

        return $id;

    }

    public function getStudentCourse($studentId)
    {
        $t =    'student_course';

        $c =    [
                    'cour_code'
                ];

      
        
        $w =    [
                    ['student_course.stud_id','=',$studentId]
                ];
                
        $yr = library::__FETCHDATA($t,$c,$j,$w);

                  
        foreach ($yr as $key => $value) {

            $id = $value->cour_code;

        }

        return $id;

    }

    public function student_get_enlistedSubjects( $studentid, $enlistmentBatch )
    {
        $t =    'enlistment';

        $c =    [

                    'subject_course.course_code',
                    'subjects.name as subject',
                    'subjects.units as units',

                    
                ];

        $j =    [

                    ['subject_course','subject_course.course_code','=','enlistment.course_code'], 
                    ['subjects','subjects.subject_code','=','subject_course.subject_code']

                ];

        $w =    [

                    ['stud_id','=',$studentid],
                    ['enl_batch','=',$enlistmentBatch]

                ];

        $subjects = library::__FETCHDATA($t,$c,$j,$w);
        
        return $subjects;
    }

    public function getLatestEnlistmentNo()
    {

        $id = '0';

        $t =    'enlistment_batch';

        $c =    [
                    'no', 
                    
                ];

        $w =    [
                    ['status','=','Open']
                ];

        $o =    ['no','DESC'];    

        $value = library::__FETCHDATA($t,$c,null,$w,null,$o);

        foreach ($value as $key => $value) {

            $id = $value->no;

            break;

        }

        return $id;
    }

    public function report()
    {
        return view('pages/dashboard/report');
    }

    public function studentprofile()
    {
        $role = $this->getRole();

        return view('pages/dashboard/student/profile',compact('role'));
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
                    'enlistment_subject.course_code as subjectCode',
                    'subjects.name as subject',
                    'for_yr as forYr', 
                    'min_yr as minYr',
                    'max_yr as maxYr'
                ];

        $lj =    [
                    ['subject_course','subject_course.course_code','=','enlistment_subject.course_code'], 
                    ['subjects', 'subjects.subject_code', '=', 'subject_course.subject_code'],
                    ['enlistment_batch', 'enlistment_batch.no', '=', 'enlistment_subject.enlistment_batch'],
                ];


        $w =    [ 
                    ['enlistment_batch.no','=',$data]
                ];

        $subjects = library::__FETCHDATA($t,$c,null,$w,null,null,$lj);
        
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

    public function getStudentId(){

        $t =    'student_account';

        $c =    [
                    'stud_id'
                ];

        $w =    [
                    ['userid','=',Auth::user()->id]
                ];
        
        $id = library::__FETCHDATA($t,$c,null,$w);
                
        foreach ($id as $key => $value) {

            $id = $value->stud_id;

        }

        return $id;

    }











}
