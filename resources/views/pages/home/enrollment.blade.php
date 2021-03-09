
@extends('layouts.layout_home')

@section('content')


<main class="container-fluid">

    
  <div class="row">
    <div class="col test">
        
    </div>
  </div>
  <div class=" pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Enrollment</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at erat tellus. Ut sit amet urna eget eros rutrum fringilla vel a sapien. Donec sit amet lacus sed magna ullamcorper lobortis. </p>
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
            <form method="POST" action="/profile">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <h5 class="font-weight-bold">Student information</h5>
                        </div>
                    </div>
                    <div class="border rounded p-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1">Student No </label>
                                <input class="form-control form-control-sm" type="text" placeholder="Select student....">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1">Student Name </label>
                                <input class="form-control form-control-sm" type="text" >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="exampleFormControlInput1">Year </label>
                                <select class="form-control form-control-sm">
                                    {{-- <option>Freshmen</option>
                                    <option>Sophomore</option>
                                    <option>Junior</option>
                                    <option>Senior</option> --}}
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1">Course </label>
                                <select class="form-control form-control-sm">
                                    {{-- <option>BSIT</option>
                                    <option>BSCS</option>
                                    <option>BSHRM</option>
                                    <option>BSCOE</option> --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h5 class="font-weight-bold">Subjects Available</h5>
                        </div>
                    </div>
                    <div class="border rounded p-3 mt-0">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-7">
                                        <label class="font-weight-bold">Section A101 </label>
                                    </div>
                                    <div class="col-5">
                                        <input class="form-control form-control-sm text-right mb-2" type="text" placeholder="Search">
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> <input type="checkbox" aria-label="Checkbox for following text input"></th>
                                            <th>Subject</th>
                                            <th class="text-center">Day</th>
                                            <th width="30%" class="text-center">Time</th>
                                            <th>Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                        <th scope="row">
                                            <input type="checkbox" aria-label="Checkbox for following text input">
                                            </th>
                                        <td>Math</td>
                                        <td>T/TH</td>
                                        <td>7:00 AM - 8:00 AM</td>
                                        <td>3.0</td>
                                
                                        </tr>
                                        <tr>
                                            <th scope="row"> <input type="checkbox" aria-label="Checkbox for following text input"></th>
                                            <td>Science</td>
                                            <td>M/S</td>
                                            <td>7:00 AM - 8:00 AM</td>
                                            <td>2.0</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> <input type="checkbox" aria-label="Checkbox for following text input"></th>
                                            <td>Computer Network Fundamentals</td>
                                            <td>W/F</td>
                                            <td>7:00 AM - 8:00 AM</td>
                                            <td>3.0</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="row">
                                    <div class="col-7">
                                        <label class="font-weight-bold">Section A102 </label>
                                    </div>
                                    <div class="col-5">
                                        <input class="form-control form-control-sm text-right mb-2" type="text" placeholder="Search">
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> <input type="checkbox" aria-label="Checkbox for following text input"></th>
                                            <th>Subject</th>
                                            <th class="text-center">Day</th>
                                            <th width="30%" class="text-center">Time</th>
                                            <th>Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                        <th><input type="checkbox" aria-label="Checkbox for following text input">
                                        </th>
                                        <td>Physical Education</td>
                                        <td>W/F</td>
                                        <td>7:00 AM - 8:00 AM</td>
                                        <td>3.0</td>
                                
                                        </tr>
                                        <tr>
                                        <th> <input type="checkbox" aria-label="Checkbox for following text input"></th>
                                        <td>Foreign Language</td>
                                        <td>M/S</td>
                                        <td>7:00 AM - 8:00 AM</td>
                                        <td>2.0</td>
    
                                    
                                        </tr>
                                        <tr>
                                        <th> <input type="checkbox" aria-label="Checkbox for following text input"></th>
                                        <td>Philippine Government and Tax Reform</td>
                                        <td>T/TH</td>
                                        <td>7:00 AM - 8:00 AM</td>
                                        <td>3.0</td>
    
                                
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                  
                </div>
            </form>
        </div>

    <div class="col-sm">
        <div class="card">
            <div class="card-header">
                Summary of Selected Subjects
            </div>
            <div class="card-body">
                
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Section</th>
                        <th scope="col">Unit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Computer Network Fundamentals</td>
                        <td>A102</td>
                        <td>3.0</td>
                    </tr>
                    {{-- <tr>
                        <td>Science</td>
                        <td>A101</td>
                        <td>2.0</td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td>A101</td>
                        <td>3.0</td>
                    </tr>

                    <tr>
                        <td>Philippine Government and Tax Reform</td>
                        <td>A103</td>
                        <td>3.0</td>
                    </tr> --}}

                    <tr>
                    
                        <td></td>
                        
                        <td class="text-right font-weight-bold">Total Units :</td>
                        <td>3.0</td>
    
                
                    </tr>
    

                    
                </tbody>
                </table>

                <div class="row">
                    <div class="col-lg"></div>
                    <div class="col-sm text-right"><a href="#" id="a_submit" class="btn btn-primary ">Submit</a></div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    @include('inc\modal\modals') 
    </div>
</main>
@endsection
     
@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\home\enrollment') 

@endsection


