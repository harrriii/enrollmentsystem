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
use App\Http\LazyDevs\LazyServices;


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
//   ini_set('max_execution_time', 300);

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

    public function lzDashboard()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $t =    'ld_user_current_wallet';

        $c =    [
                    DB::raw("format(amount,'#,0') as amount")
                ];
    
        $w =    [
                    ['user', '=', $id]
                ];

        $currentWalletBalance = library::__FETCHDATA($t,$c,null,$w);

        $name = $this->getUsername();


        // dd($currentWalletBalance);
   
        return view('pages/dashboard/developer/lz/dashboard',compact('name','id','role','currentWalletBalance'));
        
    }

    public function lzDashboard_head()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $t =    'ld_user_current_wallet';

        $c =    [
                    DB::raw("format(amount,'#,0') as amount")
                ];
    
        $w =    [
                    ['user', '=', $id]
                ];

        $currentWalletBalance = library::__FETCHDATA($t,$c,null,$w);

        $name = $this->getUsername();

        // dd($currentWalletBalance);
   
        return view('pages/dashboard/developer/lz/dashboard',compact('name','id','role','currentWalletBalance'));
        
    }

    public static function schedule()
    {
        return view('pages/dashboard/schedule');
    }


    public function getUsername()
    {
        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $t =    'users';

        $c =    [
                   'name'
                ];
    
        $w =    [
                    ['id', '=', $id]
                ];

        $name = library::__FETCHDATA($t,$c,null,$w);

        return $name[0]->name;

       
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
    public function getSubjects()
    {
        $t =    'subjects';

        $c =    [   
                    'subjects.subject_code',
                    'subjects.name',
                    'category', 
                    'lecture',
                    'laboratory',
                    'prerequisite',
                    'program_id',
                    'programs.name as program'
                    
                ];

        $j =    [
                    ['programs', 'programs.id', '=', 'subjects.program_id'],
                ];


        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                    );

        $subjects = library::__FETCHDATAN($d);

        return $subjects;
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
        else if($role == 'student')
        {
            $subjects = $this->getSubjects();

            return view('pages/dashboard/secretary/subjects',compact('role','subjects','id'));
        }
        else if($role == 'registrar')
        {

            // select course_code as a ,
            // (select count(course_code) from enlistment where course_code = a) 
            // from enlistment group by a

            // $t =    'enlistment';

            // $c =    [
            //             'course_code as a',
            //         ];

            // $xq =   [
            //             'qk' =>   'select',
            //             'qc' =>   [ DB::raw('count(course_code) as total') ],
            //             'qt' =>   'enlistment as b',
            //             'qw' =>  [
            //                         ['b.course_code', '=', 'a']
            //                     ]
            //         ];

            // $d = array  (
            //                 't'=>$t,
            //                 'c'=>$c,
            //                 // 'xq'=>$xq,
            //             );

            // $enlistment = library::__FETCHDATAN($d)
            // dd(library::__FETCHDATAN($d,1));

            // $t =    'enlistment';

            // $c =    [
            //             DB::raw('concat(fname," ",lname) as "student"'),
            //             'users.name as approvedBy',
            //             'subject_course.course_code as subjectCode', 
            //             'subjects.name as subject', 
            //             DB::raw('count(subjects.subject_code) as "no"')
            //         ];
    
            // // $j =    [
            // //             ['subjects', 'subjects.subject_code', '=', 'enlistment.subject_code'],
            // //             ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
            // //             ['users', 'users.id', '=', 'enlistment.approving_adviser']
            // //         ];

            // $lj =   [
                
            //     ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],
            //     ['student_year', 'student_profile.stud_id', '=', 'student_profile.stud_id'],
            //     ['student_course', 'student_course.stud_id', '=', 'student_profile.stud_id'],
            //     ['courses', 'courses.cour_code', '=', 'student_course.cour_code'],
            //     ['subject_course', 'subject_course.cour_code', '=', 'courses.cour_code'],
            //     ['subjects', 'subjects.subject_code', '=', 'subject_course.subject_code'],
            //     ['student_account', 'student_account.stud_id', '=', 'student_profile.stud_id'],
            //     ['users', 'users.id', '=', 'student_account.id']
            // ];
            
            // $w =    [
            //             ['current_status', '=', 'Approved']
            //         ];

            // $g =    'subjects.name';
            
            // // $enlistment = library::__FETCHDATA($t,$c,$j,$w,$g);

            // $enlistment = library::__FETCHDATA($t,$c,null,$w,null,null,$lj);

            $batch = $this->registrar_get_enlistmentBatches();

            $enlistment = $this->registrar_get_studentEnlistmentCount();


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

            $filter = $this->getEnlistmentBatches();

            $records = $this->adviser_get_enlistments($latestEnlistmentNo);

            $enlistment = $this->adviser_get_enlistments();

            $t =    'enlistment';

            $c =    [
                        '*'
                        
                    ];

            $w =    [
                        ['enl_batch','=',$latestEnlistmentNo],
                        ['current_status','=','For Approval'],
                    ];

            $d = array  (
                            't'=>$t,
                            'c'=>$c,
                            'w'=>$w
                        );
    
            $new = library::__FETCHDATAN($d);

            $t =    'enlistment';

            $c =    [
                        '*'
                        
                    ];

            $w =    [
                        ['enl_batch','=',$latestEnlistmentNo],
                        ['current_status','=','Approved'],
                    ];

            $d = array  (
                            't'=>$t,
                            'c'=>$c,
                            'w'=>$w
                        );
    
            $approved = library::__FETCHDATAN($d);

            $t =    'enlistment';

            $c =    [
                        '*'
                        
                    ];
            $w =    [
                        ['enl_batch','=',$latestEnlistmentNo],
                        ['current_status','=','Declined'],
                    ];

            $d = array  (
                            't'=>$t,
                            'c'=>$c,
                            'w'=>$w
                        );

            $declined = library::__FETCHDATAN($d);

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

            $yr = $this->student_get_year($studentId);

            $enlistments = $this->student_get_myEnlistments();

            $batches = $this->student_get_myEnlistmentBatches();

            $enlistedSubjects = $this->student_get_enlistedSubjects($studentId, $enlistmentno);

            $enlistedSubjects_a = array();

            foreach ($enlistedSubjects as $key => $z) {

                array_push($enlistedSubjects_a,$z->course_code);
            }

            $subjects = $this->student_get_enlistmentAvailableSubjects( $yr, $enlistedSubjects_a );

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
        else if($role == 'developer')
        {
            $subjects = $this->getSubjects();

            $name = $this->getUsername();

            return view('pages/dashboard/developer/subjects',compact('name','role','subjects','id'));
        }
        
       
    }



    // CUSTOM FUNCTIONS FOR REGISTRAR
    public function registrar_get_studentEnlistmentCount()
    {

        $t =    'enlistment_batch';

        $c =    [   
                    'enlistment_batch.no as subject',
                    'users.name as code',
                    'enl_startDate as total', 
                    'enl_endDate as enlEnd',
                    'status'
                    
                ];

        $j =    [
                    ['users', 'users.id', '=', 'enlistment_batch.startedBy']
                ];


        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                    );

        $batches = library::__FETCHDATAN($d);

        return $batches;

    }

    public function registrar_get_enlistmentBatches()
    {

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


        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                    );


        $batches = library::__FETCHDATAN($d);

        return $batches;

    }


    // CUSTOM FUNCTIONS FOR STUDENT MODULE
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

    // CUSTOM FUNCTION FOR ADVISER
    public function adviser_get_enlistmentrecords($latestEnlistmentNo)
    {

        $enlistments = null;

        $t =    'enlistment';

        $c =    [
    
                    'enlistment.id as code',
        
                    'student_profile.stud_id as studId',
        
                    'subjects.name as subject', 

                    DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
        
                    'enlistment_date as date',
        
                    'units',
        
                    'current_status',
        
                    'enl_batch'
                ];

        $j =    [
        
                    ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],

                    ['subject_course', 'subject_course.course_code', '=', 'enlistment.course_code'],
            
                    ['subjects', 'subjects.subject_code', '=', 'subject_course.subject_code']
            
                ];

        $w =    [

                    ['enl_batch','!=', $latestEnlistmentNo]
                
                ];
        
        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                        'w'=>$w,
                    );
            
        $enlistments = library::__FETCHDATAN($d);

        return $enlistments;

    }
    public function adviser_get_enlistments()
    {

        $enlistments = null;

        $t =    'enlistment';

        $c =    [
    
                    'enlistment.id as code',
        
                    'student_profile.stud_id as studId',
        
                    'subjects.name as subject', 

                    DB::raw('concat(student_profile.fname," ",student_profile.mname," ",student_profile.lname) as student'), 
        
                    'enlistment_date as date',
        
                    'units',
        
                    'current_status',
        
                    'enl_batch'
                ];

        $j =    [
        
                    ['student_profile', 'student_profile.stud_id', '=', 'enlistment.stud_id'],

                    ['subject_course', 'subject_course.course_code', '=', 'enlistment.course_code'],
            
                    ['subjects', 'subjects.subject_code', '=', 'subject_course.subject_code']
            
                ];

        
        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
      
                    );
            
        $enlistments = library::__FETCHDATAN($d);

        return $enlistments;

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


        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                        'w'=>$w,
                    );
        
        $yr = library::__FETCHDATAN($d);
                  
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

        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'w'=>$w,
                    );
    
        $data = library::__FETCHDATAN($d);
                
        foreach ($data as $key => $value) {

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

        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                        'w'=>$w,
                    );

        $subjects = library::__FETCHDATAN($d);

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
        
        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'w'=>$w,
                        'o'=>$o,
                    );

        $data = library::__FETCHDATAN($d);

        foreach ($data as $key => $value) {

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

        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'j'=>$j,
                    );

        $classes = library::__FETCHDATAN($d);  

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

        $d = array  (
                        't'=>$t,
                        'c'=>$c,
                        'lj'=>$lj,
                        'w'=>$w
                    );

        $subjects = library::__FETCHDATAN($d); 

        // $subjects = library::__FETCHDATA($t,$c,null,$w,null,null,$lj);
        
        // dd($subjects);


        
        return view('pages/dashboard/registrar/subjects',compact('role','subjects','id','data'));

    }

    public function getEnlistmentBatches()
    {
        $batches  = null;
        
        $t =    'enlistment_batch';

        $c =    [
                    'no', 
                ];

        $d = array (
            't'=>$t,
            'c'=>$c,
        );

        $batches  = library::__FETCHDATAN($d);

        return $batches;
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

    public function registrar_get_applicants($campus)
    {

        $applicants  = null;
        
        $t =    'applicant_basic_info as a';

        $c =    [
                    'a.student_id as studentId', 
                    'a.first_name', 
                    'a.middle_name', 
                    'a.last_name', 
                    'a.suffix', 
                    DB::raw('CONCAT(a.first_name," ",CONCAT_WS("",a.middle_name)," ",a.last_name," ",CONCAT_WS("",a.suffix)) as fullname'),
                    'a.nationality', 
                    'a.religion', 
                    'a.birth_date', 
                    'a.age', 
                    'a.civil_status', 
                    'a.gender', 
                    'a.birth_place', 
                    'a.mobile_no', 
                    'a.email_address', 
                    'a.name_of_spouse', 
                    'a.acr_no', 
                    'a.pass_no', 
                    'a.no_of_siblings',
                    DB::raw(DB::getTablePrefix().'b.student_type'),
                    DB::raw(DB::getTablePrefix().'b.semester'),
                    DB::raw(DB::getTablePrefix().'b.school_year_start'),
                    DB::raw(DB::getTablePrefix().'b.school_year_end'),
                    DB::raw(DB::getTablePrefix().'b.date_of_application'),
                    DB::raw(DB::getTablePrefix().'c.name as campus_name'),
                ];

        $j =    [
                    ['applicant_stud_info as b','b.student_id','=','a.student_id'],
                    ['campus_list as c','c.id','=','b.campus_id'],
                ];

        $w =    [
                    ['c.id','=',$campus]
                ];

        $d = array (
            't'=>$t,
            'c'=>$c,
            'j'=>$j,
            'w'=>$w
        );

        $applicants  = library::__FETCHDATAN($d);

        // dd($applicants);

        return $applicants;

    }

    public function registrar_show_applicant_information($applicantid)
    {

        $id = Auth::user()->id;


        $role = $this->getRole();

        $applicants  = null;
        
        $t =    'applicant_basic_info as a';

        $c =    [

                    'a.id as aid',
                    'b.id as bid',
                    'g.id as gid',
                    DB::raw('CONCAT(a.first_name," ",CONCAT_WS("",a.middle_name)," ",a.last_name," ",CONCAT_WS("",a.suffix)) as fullname'),
                    'a.student_id as studentId', 
                    'a.first_name', 
                    'a.middle_name', 
                    'a.last_name', 
                    'a.suffix', 
                    'a.nationality', 
                    'a.religion', 
                    'a.birth_date', 
                    'a.age', 
                    'a.civil_status', 
                    'a.gender', 
                    'a.birth_place', 
                    'a.mobile_no', 
                    'a.email_address', 
                    'a.name_of_spouse', 
                    'a.acr_no', 
                    'a.pass_no', 
                    'a.no_of_siblings',
                    'a.id_picture',
                    'b.student_type',
                    'b.semester',
                    'b.school_year_start',
                    'b.school_year_end',
                    'b.date_of_application',
                    'c.street_no',
                    'c.street',
                    'c.barangay',
                    'c.subdivision',
                    'c.city',
                    'c.zip_code',
                    'c.address_type',
                    'd.school_name as t_school_name',
                    'd.school_address as t_school_address',
                    'd.no_of_semester_enrolled as t_no_of_semester_enrolled',
                    'd.date_last_attended as t_date_last_attended',
                    'e.name as emergency_contact_name',
                    'e.relationship as emergency_contact_relationship',
                    'e.address as emergency_contact_address',
                    'e.mobile_no as emergency_contact_mobile_no',
                    'e.signature as emergency_contact_signature',
                    'e.how_did_you_learn_mlqu as emergency_contact_how_did_you_learn_mlqu',
                    'f.employment_type as employment_type',
                    'f.company as employment_company',
                    'f.address as employment_address',
                    'f.position as employment_position',
                    'g.first_name as family_first_name',
                    'g.middle_name as family_middle_name',
                    'g.last_name as family_last_name',
                    'g.suffix_name as family_suffix_name',
                    'g.occupation_name as family_occupation_name',
                    'g.income as family_income',
                    'g.parent_type as family_parent_type',
                    'j.name as campus_name',
                 
                ];

        $lj =    [
                    ['applicant_stud_info as b','b.student_id','=','a.student_id'],
                    ['campus_list as j','j.id','=','b.campus_id'],
                    ['applicant_address_info as c','c.student_id','=','a.student_id'],
                    ['applicant_cross_transferee_info as d','d.student_id','=','a.student_id'],
                    ['applicant_emergency_contact as e','e.student_id','=','a.student_id'],
                    ['applicant_employment_info as f','f.student_id','=','a.student_id'],
                    ['applicant_family_info as g','g.student_id','=','a.student_id'],
                ];

        $w =    [
                    ['a.student_id','=',$applicantid]
                ];

        $d = array (
            't'=>$t,
            'c'=>$c,
            'lj'=>$lj,
            'w'=>$w,
        );

        $applicants  = library::__FETCHDATAN($d);

        $scholastic_records = $this->registrar_get_scholastic_records($applicantid);

        $employment_information = $this->registrar_get_employment_information($applicantid);

        // dd($applicants);

        return view('pages/dashboard/registrar/admission/applicant-information',compact('role','applicantid','applicants','scholastic_records','employment_information'));
      

    }

    public function registrar_get_scholastic_records($applicantId)
    {

        $scholastic_records  = null;
        
        $t =    'applicant_scholastic_info';

        $c =    [
                 
                    'school_name',
                    'school_address',
                    'year_attended_start',
                    'year_attended_end',
                    'level',

                ];

        $g =    'id';

        $o =    ['year_attended_start','ASC'];
       

        $w =    [
                    ['student_id','=',$applicantId]
                ];

        $d = array (
            't'=>$t,
            'c'=>$c,
            'w'=>$w,
            'g'=>$g,
            'o'=>$o
        );

        $scholastic_records  = library::__FETCHDATAN($d);

        return $scholastic_records;

    }

    public function registrar_get_employment_information($applicantId)
    {

        $employment_info  = null;
        
        $t =    'applicant_employment_info';

        $c =    [
                 
                    'employment_type',
                    'company',
                    'address',
                    'position'

                ];

        $w =    [
                    ['student_id','=',$applicantId]
                ];

        $d = array (
            't'=>$t,
            'c'=>$c,
            'w'=>$w,
        );

        $employment_info  = library::__FETCHDATAN($d);

        return $employment_info;

    }

    public function registrar_admission_applicant()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $applicants = $this->registrar_get_applicants(1);



        return view('pages/dashboard/registrar/admission/applicant',compact('role','applicants'));
    }

    public function registrar_admission_evaluation()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();


            return view('pages/dashboard/registrar/admission/evaluation',compact('role'));
    }

    public function registrar_admission_examination()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();


            return view('pages/dashboard/registrar/admission/examination',compact('role'));
    }

    public function registrar_admission_interview()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();


        return view('pages/dashboard/registrar/admission/interview',compact('role'));
    }


    public function appointments()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $name = $this->getusername();

        $t =    'appointments';
        
        $c =    [   'name',
                    'id',
                    'purpose',
                    'date',
                    'time',
                    'status',
                    'approvedBy',
                ];

        $contents = library::__FETCHDATA($t,$c);

           
                
        return view('pages/dashboard/developer/lz/appointments',compact('id','role','contents', 'name'));

    }


    public function visitors()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $name = $this->getusername();

        $t =    'visitor_logs';
        
        $c =    [   
                    'id',
                    'name',
                    'purpose',                 
                    'time_in',
                    'time_out',   
                ];

        $contents = library::__FETCHDATA($t,$c);

           
                
        return view('pages/dashboard/developer/lz/visitors',compact('id','role','contents', 'name'));

    }


    public function residents()
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $name = $this->getusername();

        $t =    'residents';
        
        $c =    [   
                    'id',
                    'name',
                    'unit_no',                 
                    'mobile_no',
                    'tel_no',   
                ];

        $contents = library::__FETCHDATA($t,$c);

           
                
        return view('pages/dashboard/developer/lz/residents',compact('id','role','contents', 'name'));

    }

    public function contacts(){

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $name = $this->getusername();

        $t =    'contact_tracing';
        
        $c =    [   'id',
                    'name',
                    'mobile_no',
                    'entry_type', 
                    'date',
                    'time_in',
                    'time_out',   
                ];

        $contents = library::__FETCHDATA($t,$c);

           
                
        return view('pages/dashboard/developer/lz/contacts',compact('id','role','contents', 'name'));

    }


    public function systems(){

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $name = $this->getusername();

        $t =    'system_log';
        
        $c =    [   'id',
                    'name',
                    'activity',
                    'date',
                    'time',   
                ];

        $contents = library::__FETCHDATA($t,$c);

           
                
        return view('pages/dashboard/developer/lz/systems',compact('id','role','contents', 'name'));

    }

    public function gym(){

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $name = $this->getusername();

        $t =    'gym';
        
        $c =    [   'id',
                    'week_no',
                    'day',
                    'workout',
                    'reps',   
                    'sets',   
                    'weight',   
                ];

        $contents = library::__FETCHDATA($t,$c);

           
                
        return view('pages/dashboard/developer/lz/gym',compact('id','role','contents', 'name'));

    }


    public function personal_record(){

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $name = $this->getusername();

        $t =    'personal_record';
        
        $c =    [   'id',
                    'name', 
                    'workout',   
                    'weight', 
                    'date',  
                ];

        $contents = library::__FETCHDATA($t,$c);

           
                
        return view('pages/dashboard/developer/lz/records',compact('id','role','contents', 'name'));

    }


    public function super_admin_get_panels( $formId )
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $panels = $ld->getPanels($formId);

        $formName = $ld->getFormName($formId);

        return view('pages/dashboard/developer/panels',compact('id','role','panels','formId','formName'));
        
    }

    public function super_admin_get_rows( $formId, $panelId )
    {

        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $rows = $ld->getRows($formId, $panelId);

        $formName = $ld->getFormName($formId);

        $panelName = $ld->getPanelName($formId,$panelId);

        return view('pages/dashboard/developer/rows',compact('id','role','panelId','formId','rows','formName','panelName'));

    }

    public function super_admin_get_cols($formId, $panelId, $rowId)
    {
        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $cols = $ld->getColumns($formId, $panelId, $rowId);

        $formName = $ld->getFormName($formId);

        $panelName = $ld->getPanelName($formId, $panelId);

        $rowName = $ld->getRowName($formId, $panelId, $rowId);

        return view('pages/dashboard/developer/cols',compact('id','role','formId','panelId','rowId','cols','formName','panelName','rowName'));
        
    }

    public function super_admin_get_contents($formId, $panelId, $rowId, $columnId )
    {
        $id = Auth::user()->id;

        $role = $this->getRole();

        $ld = new LazyServices();

        $contents = $ld->getContents($formId, $panelId, $rowId, $columnId);

        $formName = $ld->getFormName($formId);

        $panelName = $ld->getPanelName($formId, $panelId);

        $rowName = $ld->getRowName($formId, $panelId, $rowId);
        
        $columnName = $ld->getColumnName($formId, $panelId, $rowId, $columnId);


        return view('pages/dashboard/developer/contents',compact(
                                                                'id',
                                                                'role',
                                                                'formId',
                                                                'panelId',
                                                                'rowId',
                                                                'columnId',
                                                                'contents',
                                                                'formName',
                                                                'panelName',
                                                                'rowName',
                                                                'columnName'
                                                            ));
        
    }

    

    // public function super_admin_contents()
    // {
    //     $id = Auth::user()->id;

    //     $role = $this->getRole();

    //     $t =    'forms_contents_list';

    //     $c =    [   
    //                 'forms_contents_list.id',
    //                 'label',
    //                 'element',
    //                 'forms_containers_cols_list.name',
    //                 'column_id',
    //                 'forms_containers_cols_list.orderNum',
    //                 'cc',
    //                 'tc',
    //                 'type',
    //                 'pf',
    //                 'iv',
    //                 'ov',
    //                 'input_group as ig',
    //                 'value',
    //             ];

    //     $j  =   [
    //                 ['forms_containers_cols_list', 'forms_containers_cols_list.id','=','forms_contents_list.column_id']
    //             ];

    //     $contents = library::__FETCHDATA($t,$c,$j);

    //     // dd($contents);

    //     return $contents;
    // }

    // public function getPanels( $formId )
    // {

    //     $id = Auth::user()->id;

    //     $role = $this->getRole();

    //     $t =    'forms_panels_list';

    //     $c =    [
    //                 'forms_panels_list.id',
    //                 'forms_panels_list.name',
    //                 'forms_panels_list.orn',
    //                 'forms_list.name as formName'
    //             ];

    //     $j =    [
            
    //                 ['forms_list', 'forms_list.id','=','forms_panels_list.form_id']

    //             ];

    //     $w =    [
    //                 ['form_id', '=', $formId ]
    //             ];

    //     $o =    ['orn', 'asc'];

    //     $panels = library::__FETCHDATA($t,$c,$j,$w,null,$o);

    //     $formName = $panels[0]->formName;

    //     return view('pages/dashboard/developer/panels',compact('id','role','panels','formName','formId'));

    // }

    // public function getRows( $panelId )
    // {

    //     $id = Auth::user()->id;

    //     $role = $this->getRole();

    //     $t =    'forms_containers_rows_list';

    //     $c =    [
    //                 'forms_containers_rows_list.id',
    //                 'forms_containers_rows_list.name',
    //                 'forms_containers_rows_list.orderNum',
    //                 'forms_panels_list.name as panelName',
    //                 'forms_list.name as formName',

    //             ];

    //     $j =    [

    //                 ['forms_panels_list', 'forms_panels_list.id','=','forms_containers_rows_list.panel_id'],

    //                 ['forms_list', 'forms_list.id','=','forms_panels_list.form_id'],
    //             ];

    //     $w =    [
    //                 [ 'panel_id', '=', $panelId ]
    //             ];

    //     $o =    ['orderNum', 'asc'];

    //     $rows = library::__FETCHDATA($t,$c,$j,$w,null,$o);

    //     $panelName = '';

    //     $formName = '';


    //     if( count($rows) > 0)
    //     {

    //         $panelName = $rows[0]->panelName;

    //         $formName = $rows[0]->formName;

    //     }

        


    //     return view('pages/dashboard/developer/rows',compact('id','role','rows','panelName','formName','panelId'));

    // }
    
    // public function getColumns( $rowId )
    // {

    //     $id = Auth::user()->id;

    //     $role = $this->getRole();

    //     $t =    'forms_containers_cols_list';

    //     $c =    [
    //                 'forms_containers_cols_list.id',
    //                 'forms_containers_cols_list.name',
    //                 'forms_containers_cols_list.orderNum',
    //                 'forms_containers_cols_list.col_type',
    //                 'forms_panels_list.name as panelName',
    //                 'forms_list.name as formName',
    //                 'forms_containers_rows_list.name as rowName',

    //             ];

    //     $j =    [

    //                 ['forms_containers_rows_list', 'forms_containers_rows_list.id','=','forms_containers_cols_list.row_id'],

    //                 ['forms_panels_list', 'forms_panels_list.id','=','forms_containers_rows_list.panel_id'],

    //                 ['forms_list', 'forms_list.id','=','forms_panels_list.form_id'],
    //             ];

    //     $w =    [
    //                 [ 'forms_containers_cols_list.row_id', '=', $rowId ]
    //             ];

    //     $o =    ['orderNum', 'asc'];

    //     $cols = library::__FETCHDATA($t,$c,$j,$w,null,$o);

    //     $panelName = '';
        
    //     $formName = '';
        
    //     $rowName = '';

    //     if( count($cols) > 0 )
    //     {
    //         $panelName = $cols[0]->panelName;

    //         $formName = $cols[0]->formName;

    //         $rowName = $cols[0]->rowName;
    //     }
        
        
    //     return view('pages/dashboard/developer/cols',compact('id','role','cols','panelName','formName','rowName','rowId'));

    // }

    
    // public function getContents( $colId )
    // {

    //     $id = Auth::user()->id;

    //     $role = $this->getRole();

    //     $t =    'forms_contents_list';

    //     $c =    [

    //                 'forms_contents_list.id',
    //                 'forms_contents_list.value',
    //                 'forms_contents_list.type',
    //                 'forms_contents_list.element',
    //                 'forms_contents_list.label',
    //                 'forms_contents_list.pf',
    //                 'forms_contents_list.iv',
    //                 'forms_contents_list.ov',
    //                 'forms_contents_list.input_group',
    //                 'forms_contents_list.tc',
    //                 'forms_contents_list.cc',
    //                 'forms_panels_list.name as panelName',
    //                 'forms_list.name as formName',
    //                 'forms_containers_rows_list.name as rowName',
    //                 'forms_containers_cols_list.name as colName',

    //             ];

    //     $j =    [

    //                 ['forms_containers_cols_list', 'forms_containers_cols_list.id','=','forms_contents_list.column_id'],

    //                 ['forms_containers_rows_list', 'forms_containers_rows_list.id','=','forms_containers_cols_list.row_id'],

    //                 ['forms_panels_list', 'forms_panels_list.id','=','forms_containers_rows_list.panel_id'],

    //                 ['forms_list', 'forms_list.id','=','forms_panels_list.form_id'],
    //             ];

    //     $w =    [
    //                 [ 'forms_contents_list.column_id', '=', $colId ]
    //             ];

    //     $contents = library::__FETCHDATA($t,$c,$j,$w);

    //     $panelName = '';
        
    //     $formName = '';
        
    //     $rowName = '';
        
    //     $colName = '';

    //     if( count($contents) > 0)
    //     {

    //         $panelName = $contents[0]->panelName;

    //         $formName = $contents[0]->formName;

    //         $rowName = $contents[0]->rowName;

    //         $colName = $contents[0]->colName;

    //     }

    //     return view('pages/dashboard/developer/contents',compact('id','role','contents','panelName','formName','rowName','colName','colId'));

    // }

    // public function viewContentInformation( $colId )
    // {

    //     $id = Auth::user()->id;

    //     $role = $this->getRole();

    //     $t =    'forms_contents_list';

    //     $c =    [

    //                 'forms_contents_list.id',
    //                 'forms_contents_list.value',
    //                 'forms_contents_list.type',
    //                 'forms_contents_list.element',
    //                 'forms_contents_list.label',
    //                 'forms_contents_list.pf',
    //                 'forms_contents_list.iv',
    //                 'forms_contents_list.ov',
    //                 'forms_contents_list.input_group',
    //                 'forms_contents_list.tc as tableCode',
    //                 'forms_contents_list.tc as columnCode',
    //                 'forms_panels_list.name as panelName',
    //                 'forms_list.name as formName',
    //                 'forms_containers_rows_list.name as rowName',
    //                 'forms_containers_cols_list.name as colName',

    //             ];

    //     $j =    [

    //                 ['forms_containers_cols_list', 'forms_containers_cols_list.id','=','forms_contents_list.column_id'],

    //                 ['forms_containers_rows_list', 'forms_containers_rows_list.id','=','forms_containers_cols_list.row_id'],

    //                 ['forms_panels_list', 'forms_panels_list.id','=','forms_containers_rows_list.panel_id'],

    //                 ['forms_list', 'forms_list.id','=','forms_panels_list.form_id'],
    //             ];

    //     $w =    [
    //                 [ 'forms_contents_list.column_id', '=', $colId ]
    //             ];

    //     $contents = library::__FETCHDATA($t,$c,$j,$w);

    //     $panelName = $contents[0]->panelName;

    //     $formName = $contents[0]->formName;

    //     $rowName = $contents[0]->rowName;

    //     $colName = $contents[0]->colName;

    //     return view('pages/dashboard/developer/contentinformation',compact('id','role','contents','panelName','formName','rowName','colName'));

    // }




   








}
