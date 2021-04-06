
@extends('layouts.layout_home')

@section('content')

<main class="container-fluid">



    <div class="row mt-4 text-center">
        <div class="col-lg-12 p-0 m-0">
            <div class="mlqu-color border rounded p-1">
                <h5 id="txtEnlistmentBanner"></h5>
                <small id="txtEnlistmentDate"></small>
                <small id="txtEnlistmentBatch" no="" hidden></small>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 p-0 m-0">
            
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src={{ URL::to('/img/index/carousel1.jpeg') }} class="d-block" style="width:100%;" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src={{ URL::to('/img/index/carousel2.jpeg') }} class="d-block" style="width:100%" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src={{ URL::to('/img/index/carousel3.jpeg') }} class="d-block" style="width:100%" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>


    <div class="pageContent" hidden>

   

    <div class=" pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Enlistment</h1>
        <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at dolor eros. Sed blandit in eros non luctus. Phasellus vehicula, ligula vitae mattis euismod, quam sapien consectetur sem, a fringilla magna erat eget dolor. Aliquam suscipit lorem eu magna varius, pharetra vestibulum ligula sollicitudin.</small>
    </div>

    <div class="container">
        <div class="container">
            @if(session()->has('success-message'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success">
                        {{ session()->get('success-message') }}
                        </div>
                    </div>
                </div>
            @endif
        
            @if(session()->has('fail-message'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger">
                        {{ session()->get('fail-message') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    <div class="row">
        <div class="col-lg">
            <div class="alert alert-success" id="alert_enlistment" hidden>
                
            </div>
        </div>
    </div>

    <form action="enlistment" method="post">
      
        <div class="row">
        
            <div class="col-lg">
            
                <div class="form-group">
        
                    <div class="row p-0">
        
                        <div class="col">
        
                            <h5 class="font-weight-bold">Student information</h5>
        
                        </div>
        
                    </div>
        
                    <div class="border rounded p-3">
        
                        <div class="row">
        
                            <div class="col-6">
        
                                <label for="exampleFormControlInput1">Student No </label>
        
                                <input class="form-control form-control-sm" type="text" placeholder="Select student...." autocomplete="off" id="txtStudentNo">
        
                            </div>
        
                            <div class="col-6">
        
                                <label for="exampleFormControlInput1">Student Name </label>
        
                                <input class="form-control form-control-sm" type="text" readonly id="txtName">
        
                            </div>
        
                        </div>
        
                        <div class="row mt-2">
        
                            <div class="col-6">
        
                                <label for="exampleFormControlInput1">Year </label>
        
                                <input class="form-control form-control-sm" type="text" readonly no="" id="txtYear">
        
                            </div>
        
                            <div class="col-6">
        
                                <label for="exampleFormControlInput1">Course</label>
        
                                <input class="form-control form-control-sm" type="text" readonly id="txtCourse">
        
                            </div>
        
                        </div>
        
                    </div>
        
                    <div class="row pt-3">

                        <div class="col">

                            <h5 class="font-weight-bold">Subjects</h5>

                        </div>

                    </div>

                    <div class="row mt-3" id="noSubjectField">
             
                        <div class="col">
             
                            <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" >
             
                                No Subject Available.
             
                            </div>
             
                        </div>
             
                    </div>

                    <div class="border rounded p-3" id="subjectField" hidden>

                        <div class="row mt-3" >

                            <div class="col border-bottom">

                                <div class="row">

                                    <div class="col-7">

                                        <label for="exampleFormControlInput1 ">Major Subjects Available* </label>

                                    </div>

                                    <div class="col-5" id="txtSearch_major">

                                        <input class="form-control form-control-sm text-right mb-2" type="text" id="txtSearchMajor" placeholder="Search">

                                    </div>
                                    
                            </div>

                            <div class="row">

                                <div class="col" id="empty_major"></div>

                            </div>

                            <table class="table" id="tbl_major">

                                <thead style="font-size:10pt;">

                                    <tr>

                                        <th scope="col"><input type="checkbox" aria-label="Checkbox for following text input"></th>

                                        <th scope="col">Subject</th>

                                        <th scope="col">Prerequisite</th>

                                        <th scope="col">Unit</th>

                                    </tr>

                                </thead>

                                <tbody style="font-size: 9pt"></tbody>

                            </table>

                        </div>

                    </div>

                    <div class="row mt-4" >

                        <div class="col border-bottom">

                            <div class="row">

                                <div class="col-7">

                                    <label for="exampleFormControlInput1 ">Minor Subjects Available* </label>

                                </div>

                                <div class="col-5" id="txtSearch_minor">

                                    <input class="form-control form-control-sm text-right mb-2" type="text" id="txtSearchMinor" placeholder="Search">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col" id="empty_minor"></div>

                            </div>

                            <table class="table" id="tbl_minor">

                                <thead style="font-size:10pt;">

                                    <tr>

                                        <th scope="col"> <input type="checkbox" aria-label="Checkbox for following text input"></th>

                                        <th scope="col">Subject</th>

                                        <th scope="col">Prerequisite</th>

                                        <th scope="col">Unit</th>

                                        
                                    </tr>
         
                                </thead>
         
                                <tbody style="font-size: 9pt"></tbody>
         
                            </table>
         
                        </div>
         
                    </div>

                    <div class="row mt-4" >

                        <div class="col ">

                            <div class="row">

                                <div class="col-7">

                                    <label for="exampleFormControlInput1 ">Other Subjects Available </label>

                                </div>

                                <div class="col-5" id="txtSearch_other">

                                    <input class="form-control form-control-sm text-right mb-2" type="text" id="txtSearchOther" placeholder="Search">

                                </div>

                            </div>
                            
                            <div class="row">
             
                                <div class="col" id="empty_other">

                                </div>
        
                            </div>
     
                            <table class="table" id="tbl_other">
     
                                <thead style="font-size:10pt;">
     
                                    <tr>
     
                                        <th scope="col"> <input type="checkbox" aria-label="Checkbox for following text input"></th>
     
                                        <th scope="col">Subject</th>
     
                                        <th scope="col">Prerequisite</th>
     
                                        <th scope="col">Unit</th>
            
                                    </tr>
    
                                </thead>
    
                                <tbody style="font-size: 9pt"></tbody>
    
                            </table>
    
                        </div>
    
                    </div>
                
                </div>    
                    
                </div>
                
            </div>

            <div class="col-sm">

                <div class="card" style="margin-top:28px;">

                    <div class="card-header">

                        Summary of Selected Subjects

                    </div>

                    <div class="card-body">

                        <table class="table" id="tbl_selected">
         
                            <thead>
         
                                <tr>
                                
                                    <th scope="col">Subject</th>
            
                                    <th scope="col">Unit</th>

                                </tr>
        
                            </thead>
        
                            <tbody>
        
                            </tbody>
                            
                        </table>
        
                        <div class="alert alert-secondary text-secondary"  style="background:#F7F7F7" role="alert" id="alert_noSelected">
        
                            No selected subjects found.
        
                        </div>
        
                        <div class="row">
        
                            <div class="col-lg"></div>
        
                            <div class="col-sm text-right"> <button type="button" class="btn text-light" style="background:#7A353C;height:30px;font-size:9pt;"  no=''  id="btn_submit">Submit</button></div>
        
                        </div>
                        
                    </div>
        
                </div>
        
            </div>
    
        </div>
  
    </form>

    @include('inc\modal\modals') 
    
</div>

</div>

@endsection


     
@section('script')

    @include('inc\js\reuseable') 

    @include('inc\js\home\enlisment') 

@endsection


