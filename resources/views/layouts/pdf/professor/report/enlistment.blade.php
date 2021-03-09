@extends('layouts.layout_forms')

@section('content')

    
<main class="container">

    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-2" src="/img/index/mlqu_logo.png" alt="" width="150" height="150">
        <h2>Enlisted Students Report</h2>
    </div>
    <div class="row border">
        <div class="col-sm">
            <div class="container p-2">

                <div class="row mr-0 ">
                    <div class="col-sm-2 border-right text-right">
                        <p class="text-muted">Professor :</p>
                    </div>
                    <div class="col-sm-4 ">
                        <p >Dr. Ben Tamuho</p>
                    </div>

                    <div class="col-sm-2 border-right text-right">
                        <p class="text-muted">Subject :</p>
                    </div>
                    <div class="col-sm-4">
                        <p >Physical Education</p>
                    </div>
                   
                </div>

                <div class="row mr-0 ">
                    <div class="col-sm-2 border-right text-right">
                        <p class="text-muted">Detail :</p>
                    </div>
                    <div class="col-sm-4 ">
                        <p >Some details here</p>
                    </div>

                    <div class="col-sm-2 border-right text-right">
                        <p class="text-muted">Detail :</p>
                    </div>
                    <div class="col-sm-4">
                        <p>Some details here</p>
                    </div>
                   
                </div>

            </div>
            

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th class="text-center"  width="20%">Student No</th>
                      <th width="15%">Name</th>
                      <th class="text-center" width="10%">Course</th>
                      <th class="text-center" width="10%">Year</th>
                      <th class="text-center" width="15%">Date Enlisted</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">GA-68520</td>
                      <td class="">Aubrey Mandoza</td>
                      <td class="text-center">IT</td>
                      <td class="text-center">Freshman</td>
                      <td class="text-center">
                        January 3, 2021
                      </td>
                    </tr>
          
                    
                    <tr>
                      <td class="text-center">GA-68520</td>
                      <td class="">Jay Aubrey Macalindong</td>
                      <td class="text-center">IT</td>
                      <td class="text-center">Freshman</td>
                      <td class="text-center">
                        January 3, 2020
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">GA-68523</td>
                      <td class="">Bytes Caliuan</td>
                      <td class="text-center">CS</td>
                      <td class="text-center">Sophomore</td>
                      <td class="text-center">
                        January 3, 2020
                      </td>
          
                    </tr>
                    <tr>
                      <td class="text-center">BM-68520</td>
                      <td class="">Dolly Jane Panico</td>
                      <td class="text-center">HRM</td>
                      <td class="text-center">Junior</td>
                      <td class="text-center">
                        January 3, 2020
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">GA-68320</td>
                      <td class="">Jepthe Carlos</td>
                      <td class="text-center">HRM</td>
                      <td class="text-center">Senior</td>
                      <td class="text-center">
                        January 3, 2021
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
        </div>
    </div>


</main>
    
@endsection


