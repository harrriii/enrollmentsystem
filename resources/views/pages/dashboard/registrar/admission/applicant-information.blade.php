@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    @php

        $scholastic_record = [];
        
    @endphp

    @foreach ($applicants as $applicant)

    @php

        $first_name = $applicant->first_name;

        $middle_name = $applicant->middle_name;

        $last_name = $applicant->last_name;

        $suffix = $applicant->suffix;

        $nationality = $applicant->nationality;

        $religion = $applicant->religion;

        $birth_date = $applicant->birth_date;
       
        $age = $applicant->age;
       
        $civil_status = $applicant->civil_status;
       
        $gender = $applicant->gender;
       
        $birth_place = $applicant->birth_place;
       
        $mobile_no = $applicant->mobile_no;
      
        $email_address = $applicant->email_address;
      
        $name_of_spouse = $applicant->name_of_spouse;
      
        $acr_no = $applicant->acr_no;
      
        $pass_no = $applicant->pass_no;
      
        $no_of_siblings = $applicant->no_of_siblings;
      
        $id_picture = $applicant->id_picture;
      
        $student_type = $applicant->student_type;
      
        $semester = $applicant->semester;
      
        $school_year_start = $applicant->school_year_start;
      
        $school_year_end = $applicant->school_year_end;
      
        $date_of_application = $applicant->date_of_application;
      
        $street_no = $applicant->street_no;
      
        $street = $applicant->street;
      
        $barangay = $applicant->barangay;
      
        $subdivision = $applicant->subdivision;
      
        $city = $applicant->city;
      
        $zip_code = $applicant->zip_code;
      
        $address_type = $applicant->address_type;
      
        $school_name = $applicant->t_school_name;
      
        $school_address = $applicant->t_school_address;
      
        $no_of_semester_enrolled = $applicant->t_no_of_semester_enrolled;
      
        $date_last_attended = $applicant->t_date_last_attended;
      
        $emergency_contact_name = $applicant->emergency_contact_name;
      
        $emergency_contact_relationship = $applicant->emergency_contact_relationship;
      
        $emergency_contact_address = $applicant->emergency_contact_address;
      
        $emergency_contact_mobile_no = $applicant->emergency_contact_mobile_no;
      
        $emergency_contact_signature = $applicant->emergency_contact_signature;
      
        $emergency_contact_how_did_you_learn_mlqu = $applicant->emergency_contact_how_did_you_learn_mlqu;
      
        $employment_type = $applicant->employment_type;
      
        $employment_company = $applicant->employment_company;
      
        $employment_address = $applicant->employment_address;
      
        $employment_position = $applicant->employment_position;

        if ($applicant->family_parent_type == "Father") {

            $father_first_name = $applicant->family_first_name;

            $father_middle_name = $applicant->family_middle_name;

            $father_last_name = $applicant->family_last_name;

            $father_suffix_name = $applicant->family_suffix_name;

            $father_occupation = $applicant->family_occupation_name;

            $father_income = $applicant->family_income;

            $gfid = $applicant->gid;
        }
        else {
            
            $mother_first_name = $applicant->family_first_name;

            $mother_middle_name = $applicant->family_middle_name;

            $mother_last_name = $applicant->family_last_name;

            $mother_suffix_name = $applicant->family_suffix_name;

            $mother_occupation = $applicant->family_occupation_name;

            $mother_income = $applicant->family_income;

            $gmid = $applicant->gid;

            
        }

        $campus_name = $applicant->campus_name;

    @endphp
        
    @endforeach

        <div class="container-fluid" >

            <div class="row">

                <div class="col">

                    <div class="box-1 p-0 mt-lg-5 mt-5" style="border-radius:10px;box-shadow: 0px 1px 11px -7px rgb(104, 104, 104);">

                        <div class="row">

                            <div class="col mx-4 my-3 mb-1 border-bottom pb-2 text-secondary">

                                Applicants Information

                            </div>

                        </div>

                        <div class="row mb-4">

                            <div class="col-lg-9 d-none d-sm-none d-lg-block ">

                                <div class="px-4 mb-4">

                                    <div class="">

                                        <div class="container">

                                            <div class="row mb-2">

                                                <div class="col border-bottom">
                                                
                                                    <div class="row">

                                                        <div class="col-lg-11 px-0">
                                                            
                                                            <h6 class="font-weight-bold text-muted mt-4 "> Basic Information </h6>
                                                            
                                                        </div>
                                                            
                                                        <div class="col-lg-1 px-0">
                                                            
                                                            <a code1="basicinformation" code="{{$applicantid}}" class="text-muted float-right btnedit"><i data-feather="edit" id="btnEdit_basicInformation" class="mt-4"></i><i data-feather="check-circle" id="btnSubmit_basicInformation" class="mt-4"></i></a>
                                                        
                                                        </div>

                                                    </div>
                                                    
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="pr-lg-1 col-lg-4">

                                            <label style="font-size:9pt;" class="text-muted">First Name</label>

                                                <input readonly name="4" class="form-control form-control-sm" type="text" value="{{$first_name}}" id="applicant_txtFirstName">
                                                
                                            </div>

                                            <div class="px-lg-1 col-lg-3">

                                            
                                            <label style="font-size:9pt;" class="text-muted">Middle Name</label>
                                                
                                                <input readonly name="5" class="form-control form-control-sm" type="text" value="{{$middle_name}}" id="applicant_txtMiddleName" >

                                            </div>

                                            <div class="px-lg-1 col-lg-3">

                                            <label style="font-size:9pt;" class="text-muted">Last Name</label>
                        
                                                <input readonly name="6" class="form-control form-control-sm" type="text" value="{{$last_name}}" id="applicant_txtLastName" >

                                            </div>

                                            <div class="pl-lg-1 col-lg-2">

                                            <label style="font-size:9pt;" class="text-muted">Suffix</label>
                        
                                            <input readonly name="7" class="form-control form-control-sm" type="text" value="{{$suffix}}" id="applicant_txtSuffix" >

                                            </div>

                                        </div>

                                        <label style="font-size:9pt;" class="text-muted mt-2">Nationality</label>
                        
                                        <input readonly name="8" class="form-control form-control-sm" type="text" value="{{$nationality}}" id="applicant_txtNationality">
                        
                                        <label style="font-size:9pt;" class="text-muted mt-2">Religion</label>
                        
                                        <input readonly name="9" class="form-control form-control-sm" type="text" value="{{$religion}}" id="applicant_txtReligion">
                        
                                        <div class="row">

                                            <div class="pr-1  col-lg-4">
                        
                                                <label style="font-size:9pt;" class="text-muted mt-2">Civil Status</label>
                                                
                                                <select class="custom-select-sm custom-select" id="applicant_selCivilStatus" disabled>

                                                    @if (!empty($civil_status))
    
                                                        <option value="">{{$civil_status}}</option>
                                                        
                                                    @endif
    
                                                </select>
                            
                                            </div>
                        
                                            <div class="pr-1 pl-1  col-lg-3">
                        
                                                <label style="font-size:9pt;" class="text-muted mt-2">Gender</label>
                                                
                                                <select class="custom-select-sm custom-select " id="applicant_selGender" disabled>

                                                    @if (!empty($gender))
    
                                                        <option value="">{{$gender}}</option>
                                                        
                                                    @endif
    
                                                </select>

                                            </div>

                                            <div class="pr-1 pl-1 col-lg-3">
                        
                                            <label style="font-size:9pt;" class="text-muted mt-2">Birth Date</label>
                        
                                            <input readonly name="10" class="form-control form-control-sm" type="date" value="{{$birth_date}}" id="applicant_txtBirthDate">
                        
                                            </div>
                        
                                            <div class="pl-1  col-lg-2">
                        
                                                <label style="font-size:9pt;" class="text-muted mt-2">Age</label>
                        
                                                <input readonly name="11" class="form-control form-control-sm pr-0" type="number" value="{{$age}}" id="applicant_txtAge">
                        
                                            </div>
                        
                                        </div>

                                        @if (!empty($name_of_spouse))

                                            <label style="font-size:9pt;" class="text-muted mt-2">Name of Spouse</label>
                                        
                                            <input readonly name=18 class="form-control form-control-sm" type="text" value="{{$name_of_spouse}}" id="applicant_nameOfSpouse" >

                                        @endif

                                        <div class="row">

                                            <div class="pr-1 col-lg-6">

                                                <label style="font-size:9pt;" class="text-muted mt-2">A.C.R No</label>
                        
                                                <input readonly name=19 class="form-control form-control-sm" type="text" value="{{$acr_no}}" id="applicant_txtAcrNo">

                                            </div>

                                            <div class="px-1 col-lg-4">

                                                <label style="font-size:9pt;" class="text-muted mt-2">Pass No</label>
                        
                                                <input readonly name=20 class="form-control form-control-sm" type="text" value="{{$pass_no}}" id="applicant_txtPassNo">
                                                
                                            </div>

                                            <div class="pl-1 col-lg-2">

                                                <label style="font-size:9pt;" class="text-muted mt-2">No of Siblings</label>
                        
                                                <input readonly name=21 class="form-control form-control-sm" type="number" value="{{$no_of_siblings}}" id="applicant_txtNoOfSiblings">
                        
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6 pr-1">

                                                <label style="font-size:9pt;" class="text-muted mt-2">Email Address</label>
                        
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$email_address}}" id="applicant_txtEmailAddress">

                                            </div>

                                            <div class="col-lg-6 pl-1">

                                                <label style="font-size:9pt;" class="text-muted mt-2">Mobile No</label>
                        
                                                <input readonly class="form-control form-control-sm" type="number" value="{{$mobile_no}}" id="applicant_txtMobileNo">

                                            </div>

                                        </div>

                                        <input hidden name='v1' value='8'>

                                        <input hidden name='0' value={{$applicant->aid}}>

                                        <input hidden name='ff' value='true'>

                                    </div>


                                    <div class="container">

                                        <div class="row mb-2 mt-4">

                                            <div class="col border-bottom">
                                            
                                                <div class="row ">

                                                    <div class="col-lg-11 px-0">
                                                        
                                                        <h6 class="font-weight-bold text-muted mt-4 "> Address Information </h6>
                                                        
                                                    </div>
                                                        
                                                    <div class="col-lg-1 px-0">
                                                        
                                                        {{-- <a code1="addressinformation" code="{{$applicantid}}" class="text-muted float-right btnedit">
                                                            
                                                            <i data-feather="edit" id="btnEdit_addressInformation" class="mt-4"></i>
                                                            
                                                            <i data-feather="check-square" id="btnSubmit_addressInformation" class="mt-4"></i>
                                                        
                                                        </a> --}}
                                                        
                                                    </div>

                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="pr-1 col-lg-1">

                                            <label style="font-size:9pt;" class="text-muted mt-2">No</label>
                                    
                                            <input readonly name=4 class="form-control form-control-sm" id="address_no" type="text" value="{{$street_no}}" >

                                        </div>

                                        <div class="px-1 col-lg-2">

                                            <label style="font-size:9pt;" class="text-muted mt-2">Street</label>
                                    
                                            <input readonly name=5 class="form-control form-control-sm" id="address_street" type="text" value="{{$street}}" >

                                        </div>

                                        <div class="px-1 col-lg-5">
                                            
                                            <label style="font-size:9pt;" class="text-muted mt-2">Barangay</label>
                                    
                                            <input readonly name=6 class="form-control form-control-sm" id="address_barangay" type="text" value="{{$barangay}}" >

                                        </div>

                                        <div class="pl-1 col-lg-4">
                                            
                                            <label style="font-size:9pt;" class="text-muted mt-2">City</label>
                                    
                                            <input readonly name=8 class="form-control form-control-sm" id="address_city" type="text" value="{{$city}}" >

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="pr-1 col-lg-3">

                                            <label style="font-size:9pt;" class="text-muted mt-2">Zip Code</label>
                                    
                                            <input readonly name=9 class="form-control form-control-sm" id="address_zip_code" type="text" value="{{$zip_code}}" >

                                        </div>

                                        <div class="px-1 col-lg-5">

                                            <label style="font-size:9pt;" class="text-muted mt-2">Subdivision</label>
                                    
                                            <input readonly name=7 class="form-control form-control-sm" id="address_subdivision" type="text" value="{{$subdivision}}" >

                                        </div>

                                        <div class="pl-1 col-lg-4">
                                            
                                            <label style="font-size:9pt;" class="text-muted mt-2">Address Type</label>

                                            <select name=10 class="custom-select-sm custom-select" id="address_type" disabled>

                                                @if (!empty($address_type))

                                                    <option readonly value="">{{$address_type}}</option>
                                                    
                                                @endif

                                            </select>
                                    
                                        </div>
                                
                                    </div>

                                    <input hidden name='v1' value='9'>

                                    <input hidden name='0' value={{$applicant->bid}}>

                                    <input hidden name='ff' value='true'>
    

                                    <form action="/UNIV/EDIT" id="form_familyFatherInformation" method="POST">

                                        @csrf

                                        <div class="container">

                                            <div class="row mb-2 mt-4">

                                                <div class="col border-bottom">
                                                
                                                    <div class="row ">

                                                        <div class="col-lg-11 px-0">
                                                            
                                                            <h6 class="font-weight-bold text-muted mt-4 "> Family Information </h6>
                                                            
                                                        </div>
                                                            
                                                        <div class="col-lg-1 px-0"></div>

                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row mb-1 mt-2">

                                                <div class="col">
                                                
                                                    <div class="row ">

                                                        <div class="col-lg-11 px-0">
                                                            
                                                        </div>
                                                            
                                                        <div class="col-lg-1 px-0">
                                                            
                                                            {{-- <a code1="familyinformation" code="{{$applicantid}}" class="text-muted float-right btnedit">

                                                                <i data-feather="edit" id="btnEdit_familyFatherInformation" class="mt-4"></i>

                                                                <i data-feather="check-square" id="btnSubmit_familyFatherInformation" class="mt-4"></i>

                                                            </a> --}}
                                                                
                                                        </div>

                                                    </div>
                                                    
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="pr-lg-1 col-lg-4">

                                                <label style="font-size:9pt;" class="text-muted">Father's Name</label>
                            
                                                <input readonly name=4 id="txtFatherFirstName" class="form-control form-control-sm" type="text" value="{{$father_first_name}}" >

                                            </div>

                                            <div class="px-lg-1 col-lg-3">

                                                <label style="font-size:9pt;" class="text-muted">Middle Name</label>
                            
                                                <input readonly name=5 id="txtFatherMiddleName" class="form-control form-control-sm" type="text" value="{{$father_middle_name}}" >

                                            </div>

                                            <div class="px-lg-1 col-lg-3">

                                                <label style="font-size:9pt;" class="text-muted">Last Name</label>
                            
                                                <input readonly name=6 id="txtFatherLastName" class="form-control form-control-sm" type="text" value="{{$father_last_name}}" >

                                            </div>

                                            <div class="pl-lg-1 col-lg-2">

                                                <label style="font-size:9pt;" class="text-muted">Suffix</label>
                            
                                                <input readonly name=7 id="txtFatherSuffix" class="form-control form-control-sm" type="text" value="{{$father_suffix_name}}" >
    
                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col-lg-7 pr-1">

                                                <label style="font-size:9pt;" class="text-muted">Occupation</label>
                        
                                                <input readonly name=8 id="txtFatherOccupation" class="form-control form-control-sm" type="text" value="{{$father_occupation}}" >

                                            </div>

                                            <div class="col-lg-5 pl-1">

                                                <label style="font-size:9pt;" class="text-muted">Income</label>
                        
                                                <input readonly name=9 id="txtFatherIncome" class="form-control form-control-sm" type="text" value="{{$father_income}}" >
                                                
                                                <input hidden name=10 value="Father" >

                                            </div>

                                        </div>

                                        <input hidden name='v1' value='10'>

                                        <input hidden name='0' value={{$gfid}}>

                                        <input hidden name='ff' value='true'>

                                    </form>

                                    <form action="/UNIV/EDIT" id="form_familyMotherInformation" method="POST">
    
                                        @csrf

                                        <div class="row mt-2">

                                            <div class="pr-lg-1 col-lg-4">

                                            <label style="font-size:9pt;" class="text-muted">Mother's Name</label>
                        
                                            <input readonly name=4 class="form-control form-control-sm" type="text" value="{{$mother_first_name}}" >

                                            </div>

                                            <div class="px-lg-1 col-lg-3">

                                            <label style="font-size:9pt;" class="text-muted">Middle Name</label>
                        
                                            <input readonly name=5 class="form-control form-control-sm" type="text" value="{{$mother_middle_name}}" >

                                            </div>

                                            <div class="px-lg-1 col-lg-3">

                                            <label style="font-size:9pt;" class="text-muted">Last Name</label>
                        
                                            <input readonly name=6 class="form-control form-control-sm" type="text" value="{{$mother_last_name}}" >

                                            </div>

                                            <div class="pl-lg-1 col-lg-2">

                                            <label style="font-size:9pt;" class="text-muted">Suffix</label>
                        
                                            <input readonly name=7 class="form-control form-control-sm" type="text" value="{{$mother_suffix_name}}" >

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col-lg-7 pr-1">

                                                <label style="font-size:9pt;" class="text-muted">Occupation</label>
                        
                                                <input readonly name=8 class="form-control form-control-sm" type="text" value="{{$mother_occupation}}" >

                                            </div>

                                            <div class="col-lg-5 pl-1">

                                                <label style="font-size:9pt;" class="text-muted">Income</label>
                        
                                                <input readonly name=9 class="form-control form-control-sm" type="text" value="{{$mother_income}}" >

                                            </div>

                                        </div>

                                        <input hidden name='v1' value='10'>

                                        <input hidden name='0' value={{$gmid}}>

                                        <input hidden name='ff' value='true'>

                                    </form>
                                        

                                  
                                  

                                    <div class="container">

                                        <div class="row mb-2 mt-4">

                                            <div class="col border-bottom">
                                            
                                                <div class="row ">

                                                    <div class="col-lg-11 px-0">
                                                        
                                                        <h6 class="font-weight-bold text-muted mt-4 "> Scholastic Information </h6>
                                                        
                                                    </div>
                                                        
                                                    <div class="col-lg-1 px-0">
                                                        
                                                        {{-- <a code1="scholasticinformation" code="{{$applicantid}}" class="text-muted float-right btnedit"><i data-feather="edit" class="mt-4"></i><i data-feather="check-square" class="mt-4 d-none"></i></a> --}}
                                                        
                                                    </div>

                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>

                                    @foreach ($scholastic_records as $record)    

                                        <div class="row">

                                            <div class="col-lg">

                                                <h6 class=" text-muted mt-4 border-bottom text-center font-weight-bold font-italic" style="font-size: 9pt;"> {{$record->level}}</h6>

                                                <label style="font-size:9pt;" class="text-muted mt-2">School Name</label>
                                
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$record->school_name}}" >

                                                <label style="font-size:9pt;" class="text-muted mt-2">School Address</label>
                                
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$record->school_name}}" >

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6 pr-1">

                                                <label style="font-size:9pt;" class="text-muted mt-2">Year Start</label>
                                
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$record->year_attended_start}}" >

                                            </div>

                                            <div class="col-lg-6 pl-1">

                                                <label style="font-size:9pt;" class="text-muted mt-2">Year End</label>
                                
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$record->year_attended_end}}" >

                                            </div>

                                        </div>
                                        
                                    @endforeach

                                    <div class="container">

                                        <div class="row mb-2 mt-4">

                                            <div class="col border-bottom">
                                            
                                                <div class="row ">

                                                    <div class="col-lg-11 px-0">
                                                        
                                                        <h6 class="font-weight-bold text-muted mt-4 "> Employment Information </h6>
                                                        
                                                    </div>
                                                        
                                                    <div class="col-lg-1 px-0">
                                                        
                                                        {{-- <a code1="employmentinformation" code="{{$applicantid}}" class="text-muted float-right btnedit"><i data-feather="edit" class="mt-4"></i><i data-feather="check-square" class="mt-4 d-none"></i></a> --}}
                                                        
                                                    </div>

                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>

                                    @foreach ($employment_information as $information)    

                                        <div class="row">

                                            <div class="col-lg">

                                                
                                                <label style="font-size:9pt;" class="text-muted mt-2">Company</label>
                                
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$information->company}}" >
                                                
                                                <label style="font-size:9pt;" class="text-muted mt-2">Address</label>
                                
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$information->address}}" >

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6 pr-1">

                                                <label style="font-size:9pt;" class="text-muted mt-2">Employment Type</label>
                                
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$information->employment_type}}" >

                                            </div>

                                            <div class="col-lg-6 pl-1">

                                                <label style="font-size:9pt;" class="text-muted mt-2">Position</label>
                                
                                                <input readonly class="form-control form-control-sm" type="text" value="{{$information->position}}" >

                                            </div>

                                        </div>
                                        
                                    @endforeach

                                    <div class="container">

                                        <div class="row mb-2 mt-4">

                                            <div class="col border-bottom">
                                            
                                                <div class="row ">

                                                    <div class="col-lg-11 px-0">
                                                        
                                                        <h6 class="font-weight-bold text-muted mt-4 "> Student Information </h6>
                                                        
                                                    </div>
                                                        
                                                    <div class="col-lg-1 px-0">
                                                        
                                                        {{-- <a code1="studentinformation" code="{{$applicantid}}" class="text-muted float-right btnedit"><i data-feather="edit" class="mt-4"></i><i data-feather="check-square" class="mt-4 d-none"></i></a> --}}
                                                        
                                                    </div>

                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6">

                                            <label style="font-size:9pt;" class="text-muted mt-2">Student Type</label>
                                    
                                            <select class="custom-select-sm custom-select" id="selStudentType">

                                                @if (!empty($student_type))

                                                    <option readonly value="">{{$student_type}}</option>
                                                    
                                                @endif

                                            </select>

                                        </div>
                                        
                                        <div class="col-lg-6">

                                            <label style="font-size:9pt;" class="text-muted mt-2">Semester</label>
                    
                                            <select class="custom-select-sm custom-select" id="selSemester">

                                                @if (!empty($semester))

                                                    <option readonly value="">{{$semester}}</option>
                                                    
                                                @endif
                                                
                                            </select>

                                        </div>

                                    </div>
                    
                                    <div class="row">
                    
                                        <div class="col-6">
                    
                                        <label style="font-size:9pt;" class="text-muted mt-2">School Year Start</label>
                    
                                        <select class="custom-select-sm custom-select" id="selSchoolYearStart">
                                            
                                            @if (!empty($school_year_start))

                                            <option readonly value="">{{$school_year_start}}</option>
                                                    
                                            @endif

                                        </select>
                    
                                        </div>
                    
                                        <div class="col-6">
                    
                                        <label style="font-size:9pt;" class="text-muted mt-2">School Year End</label>
                    
                                        <select class="custom-select-sm custom-select" id="selSchoolYearEnd">

                                            @if (!empty($school_year_end))

                                            <option readonly value="">{{$school_year_end}}</option>
                                                    
                                            @endif

                                        </select>
                    
                                        </div>
                    
                                    </div>
                    
                                    <label style="font-size:9pt;" class="text-muted mt-2">Date of Application</label>
                    
                                    <input readonly class="form-control form-control-sm" type="date" value="{{$date_of_application}}" id="txtDateOfApplication">
                    
                                    <label style="font-size:9pt;" class="text-muted mt-2">Campus</label>
                    
                                    <select class="custom-select-sm custom-select" id="selCampus">

                                        @if (!empty($campus_name))

                                            <option readonly value="">{{$campus_name}}</option>
                                                
                                        @endif

                                    </select>
                
                                </div>

                            </div>

                            <div class="col-lg-3 d-none d-lg-block">

                                <img src="{{asset("$id_picture")}}" class="  " style="width: 200px; height: 200px; border-radius:10px;">

                                <div class="mt-3">

                                    <small class="font-weight-bold text-center text-muted mt-5"> Applicant Signature </small>

                                    <img src="{{asset("$emergency_contact_signature")}}" class=" " style="width: 200px; height: 60px; border-radius:10px;">

                                </div>

                            </div>

                            <div class="col d-block d-sm-none">

                                <div class="row" >

                                    <div class="col">

                                        <img src="{{asset("img/index/img1.jpg")}}" class=" rounded mx-auto d-block  " style="width: 200px; height: 200px; border-radius:10px;">

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- <div class=" d-sm-block d-lg-none ">

                            <div class="p-4 mx-2">

                                <label style="font-size:9pt;" class="text-muted">First Name</label>

                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->first_name}}" id=>

                                <label style="font-size:9pt;" class="text-muted mt-2">Middle Name</label>

                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->middle_name}}" id="sm_txtMiddleName">

                                <label style="font-size:9pt;" class="text-muted mt-2">Last Name</label>

                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->last_name}}" id="sm_txtLastName">

                                <label style="font-size:9pt;" class="text-muted mt-2">Suffix</label>

                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->suffix}}" id="sm_txtSuffix">

                                <label style="font-size:9pt;" class="text-muted mt-2">Nationality</label>
                
                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->nationality}}" id="sm_txtNationality">
                
                                <label style="font-size:9pt;" class="text-muted mt-2">Religion</label>
                
                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->religion}}" id="sm_txtReligion">
                
                                <div class="row">
                
                                    <div class="col-9">
                
                                    <label style="font-size:9pt;" class="text-muted mt-2">Birth Date</label>
                
                                    <input readonly class="form-control form-control-sm" type="date" value="{{$applicant->birth_date}}" id="sm_txtBirthDate">
                
                                    </div>
                
                                    <div class="col-3">
                
                                    <label style="font-size:9pt;" class="text-muted mt-2">Age</label>
                
                                    <input readonly class="form-control form-control-sm" type="number" value="{{$applicant->age}}" id="sm_txtAge">
                
                                    </div>
                
                                </div>
                
                                <label style="font-size:9pt;" class="text-muted mt-2">Mobile No</label>
                
                                <input readonly class="form-control form-control-sm" type="number" value="{{$applicant->mobile_no}}" id="sm_txtMobileNo">
                
                                <label style="font-size:9pt;" class="text-muted mt-2">Email Address</label>
                
                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->email_address}}" id="sm_txtEmailAddress">
                
                                <label style="font-size:9pt;" class="text-muted mt-2">A.C.R No</label>
                
                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->acr_no}}" id="sm_txtAcrNo">
                
                                <label style="font-size:9pt;" class="text-muted mt-2">Pass No</label>
                
                                <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->pass_no}}" id="sm_txtPassNo">
                
                                @if (!empty($applicant->name_of_spouse))

                                    <label style="font-size:9pt;" class="text-muted mt-2">Name of Spouse</label>
                                
                                    <input readonly class="form-control form-control-sm" type="text" value="{{$applicant->name_of_spouse}}" id="sm_txtNameOfSpouse">

                                @endif

                                <h6 class="font-weight-bold text-muted mt-5 border-bottom"> Address Information </h6>

                                <div class="row">

                                    <div class="col-lg">

                                    </div>

                                </div>

                
                                <h6 class="font-weight-bold text-muted mt-5 border-bottom"> Student Information </h6>

                                <div class="row">

                                    <div class="col-lg-6">

                                        <label style="font-size:9pt;" class="text-muted mt-2">Student Type</label>
                                
                                        <select class="custom-select-sm custom-select" id="sm_selStudentType">

                                            @if (!empty($applicant->student_type))

                                                <option readonly value="">{{$applicant->student_type}}</option>
                                                
                                            @endif

                                        </select>

                                    </div>
                                    
                                    <div class="col-lg-6">

                                        <label style="font-size:9pt;" class="text-muted mt-2">Semester</label>
                
                                        <select class="custom-select-sm custom-select" id="sm_selSemester">

                                            @if (!empty($applicant->semester))

                                                <option readonly value="">{{$applicant->semester}}</option>
                                                
                                            @endif
                                            
                                        </select>

                                    </div>

                                </div>
                
                                <div class="row">
                
                                    <div class="col-6">
                
                                    <label style="font-size:9pt;" class="text-muted mt-2">School Year Start</label>
                
                                    <select class="custom-select-sm custom-select" id="sm_selSchoolYearStart">
                                        
                                        @if (!empty($applicant->school_year_start))

                                            <option readonly value="">{{$applicant->school_year_start}}</option>
                                                
                                        @endif

                                    </select>
                
                                    </div>
                
                                    <div class="col-6">
                
                                    <label style="font-size:9pt;" class="text-muted mt-2">School Year End</label>
                
                                    <select class="custom-select-sm custom-select" id="sm_selSchoolYearEnd">

                                        @if (!empty($applicant->school_year_end))

                                            <option readonly value="">{{$applicant->school_year_end}}</option>
                                                
                                        @endif

                                    </select>
                
                                    </div>
                
                                </div>
                
                                <label style="font-size:9pt;" class="text-muted mt-2">Date of Application</label>
                
                                <input readonly class="form-control form-control-sm" type="date" value="{{$applicant->date_of_application}}" id="sm_txtDateOfApplication">
                
                                <label style="font-size:9pt;" class="text-muted mt-2">Campus</label>
                
                                <select class="custom-select-sm custom-select" id="sm_selCampus">

                                    @if (!empty($applicant->campus_name))

                                        <option readonly value="">{{$applicant->campus_name}}</option>
                                            
                                    @endif

                                </select>

                                <div class="row">

                                    <div class="col">

                                        <h6 class="font-weight-bold text-center text-muted mt-5"> Applicant Signature </h6>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col">

                                        <div class="mt-3">
        
                                            <img src="{{asset("$applicant->id_picture")}}" class=" rounded mx-auto d-block " style="width: 200px; height: 60px; border-radius:10px;">
        
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div> --}}

                    </div>
                    
                </div>

            </div>

        </div>
    

    @include('inc\modal\modals') 

  </main>


@endsection

@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\experimentals') 


  @include('inc\js\dashboard\registrar\admission\applicant') 

@endsection

