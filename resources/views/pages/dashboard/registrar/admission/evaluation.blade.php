@extends('layouts.layout_dashboard')

@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container-fluid">

        <div class="row">

            <div class="col ">

                <div class="box-1 p-0 mt-lg-5 mt-5" style="border-radius:10px;box-shadow: 0px 1px 11px -7px rgb(104, 104, 104);">

                    <div class="row">

                        <div class="col mx-4 my-3 mb-1 border-bottom pb-2 text-secondary">

                            Applicants For Evaluation
                        </div>

                    </div>

                    <div class="row p-0 px-2 pt-1 my-0">

                        <div class="col text-right m-3 mt-1 ">
                  
                            <a class="border rounded py-1 px-3 text-left text-muted" style="font-size:9pt;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                  
                                Filter
                  
                                <i class="ml-1" data-feather="chevron-down"></i>
                  
                            </a>                                                       

                            <div class="collapse pt-1" id="collapseExample">

                                <div class="card card-body" style="background:#F8F9FA">

                                    <div class="row">

                                        <div class="col-4 text-left">

                                            <label class="font-weight-bold" style="font-size:9pt;">Applicant Name</label>

                                            <input type="text" class="form-control form-control-sm"/>

                                        </div>

                                        <div class="col-4 text-left">

                                            <label class="font-weight-bold" style="font-size:9pt;">Date Submitted</label>
                
                                            <select class="custom-select custom-select-sm">
                
                                                <option selected>All</option>
                
                                                <option value="1">One</option>
                
                                                <option value="2">Two</option>
                
                                                <option value="3">Three</option>
                
                                            </select>

                                        </div>

                                        <div class="col-4 text-left">

                                            <label class="font-weight-bold" style="font-size:9pt;">School</label>
                        
                                            <select class="custom-select custom-select-sm">
                        
                                                <option selected>All</option>
                        
                                                <option value="1">One</option>
                        
                                                <option value="2">Two</option>
                        
                                                <option value="3">Three</option>
                        
                                            </select>

                                        </div>

                                    </div>
                                 
                                </div>
                 
                            </div>
            
                        </div>
                       
                    </div>
         
                    <div class="row">

                        <div class="col m-4">

                            <table class="table table-striped">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">First</th>

                                        <th scope="col">Last</th>

                                        <th scope="col">Handle</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <tr>

                                        <th scope="row">1</th>

                                        <td>Mark</td>

                                        <td>Otto</td>

                                        <td>@mdo</td>

                                    </tr>

                                    <tr>

                                        <th scope="row">2</th>

                                        <td>Jacob</td>

                                        <td>Thornton</td>

                                        <td>@fat</td>

                                    </tr>

                                    <tr>

                                        <th scope="row">3</th>

                                        <td>Larry</td>

                                        <td>the Bird</td>

                                        <td>@twitter</td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col ">

                <div class="box-1 p-0 mt-lg-5 mt-5" style="border-radius:10px;box-shadow: 0px 1px 11px -7px rgb(104, 104, 104);">

                    <div class="row">

                        <div class="col mx-4 my-3 mb-1 border-bottom pb-2 text-secondary">

                            Evaluation Records

                        </div>

                    </div>

                    <div class="row p-0 px-2 pt-1 my-0">

                        <div class="col text-right m-3 mt-1 ">
            
                            <a class="border rounded py-1 px-3 text-left text-muted" style="font-size:9pt;" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="multicollapse21">
               
                                Filter
               
                                <i class="ml-1" data-feather="chevron-down"></i>
               
                            </a>                                                       

                            <div class="collapse pt-1" id="collapse2">
                
                                <div class="card card-body" style="background:#F8F9FA">

                                    <div class="row">

                                        <div class="col-4 text-left">

                                            <label class="font-weight-bold" style="font-size:9pt;">Applicant Name</label>
                  
                                            <input type="text" class="form-control form-control-sm"/>

                                        </div>

                                        <div class="col-4 text-left">

                                            <label class="font-weight-bold" style="font-size:9pt;">Date Submitted</label>
             
                                            <select class="custom-select custom-select-sm">
             
                                                <option selected>All</option>
             
                                                <option value="1">One</option>
             
                                                <option value="2">Two</option>
             
                                                <option value="3">Three</option>
          
                                            </select>

                                        </div>

                                        <div class="col-4 text-left">

                                            <label class="font-weight-bold" style="font-size:9pt;">School</label>

                                            <select class="custom-select custom-select-sm">
              
                                                <option selected>All</option>
               
                                                <option value="1">One</option>
         
                                                <option value="2">Two</option>
         
                                                <option value="3">Three</option>
         
                                            </select>

                                        </div>

                                    </div>
             
                                </div>
            
                            </div>
         
                        </div>
                        
                    </div>

                    <div class="row">
                        
                        <div class="col m-4">
                            
                            <table class="table table-striped">
                                
                                <thead>
                 
                                    <tr>
                 
                                        <th scope="col">#</th>
                 
                                        <th scope="col">First</th>
                 
                                        <th scope="col">Last</th>
                 
                                        <th scope="col">Handle</th>
                 
                                    </tr>
                 
                                </thead>
                 
                                <tbody>
                 
                                    <tr>
                 
                                        <th scope="row">1</th>
                 
                                        <td>Mark</td>
                 
                                        <td>Otto</td>
                              
                                        <td>@mdo</td>
                 
                                </tr>
                          
                                <tr>
                          
                                    <th scope="row">2</th>
                          
                                    <td>Jacob</td>
                          
                                    <td>Thornton</td>
                          
                                    <td>@fat</td>
                          
                                </tr>
                          
                                <tr>
                          
                                    <th scope="row">3</th>
                          
                                    <td>Larry</td>
                          
                                    <td>the Bird</td>
                          
                                    <td>@twitter</td>
                          
                                </tr>
                          
                            </tbody>
                          
                        </table>
                        
                    </div>
            
                </div>

            </div>

        </div>
 
    </div>

 
</div>


    @include('inc\modal\modals') 

  </main>


@endsection

@section('script')

  @include('inc\js\reuseable') 

  @include('inc\js\dashboard\registrar\admission\applicant') 

@endsection

