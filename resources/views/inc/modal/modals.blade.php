

<!-- Modal -->
<div class="row">
  <div class="col">
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal_studentSearch"  >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Student Search</h5>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-sm-7"></div>
                <div class="col-sm-5">
                  <input class="form-control form-control-sm text-right mb-2" type="text" id="txtStudentSearch" placeholder="Search">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <table class="table table-striped" id="tbl_studentSearch">
                    <thead style="font-size: 10pt; ">
                        <tr >
                            <th scope="col" width="10%"></th>
                            <th scope="col" width="30%">Student No</th>
                            <th scope="col" class="text-center" width="60%">Name</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 9pt"></tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn mlqu-color text-light" style="height: 30px; font-size:9pt;" data-dismiss="modal" id="btn_select">Select</button>
            <button type="button" class="btn mlqu-color text-light" style="height: 30px; font-size:9pt;" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@php
    
  $formAttr = array(
                      'action' => 'App\Http\Controllers\StudentRegistrationController@store',
                      'method' => 'POST',
                      'class' => 'needs-validation',
                      'novalidate' => ''
                    );

  $textRequireAttr = array(
                            'class' => 'form-control', 
                            'required' => ''
                          );

  $textRequireDataPickerAttr = array(
    'class' => 'form-control', 
    'required' => '',
    'data-provide' => 'datepicker',
    'autocomplete' => 'off'
  );

  $textAttr = array(
    'class' => 'form-control'
  );

  $customSelectRequireAttr = array(
    'class' => 'custom-select form-control',
    'require' =>''
  ); 
  $buttonSubmitAttr = array(
    'class' => 'btn btn-sm mlqu-color',
    'style' => 'background:#7A353C;height:25px;width:80px'
  );

@endphp

    
<!-- Add Modal -->
  <div class="modal fade" id="modal_univ" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" ></h5>
        </div>

        {!!
            Form::open(['id'=>'form_univ']);
        !!} 

          <div class="modal-body">
            <div class="container">

         

            </div>
          </div>
          <div class="modal-footer">

          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
{{-- end Add Modal --}}

<!-- Add Modal -->
<div class="modal fade" id="modal_univ_table" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" ></h5>
      </div>

      {{-- {!!
          Form::open(['id'=>'form_univ']);
      !!}  --}}

        <div class="modal-body">
          <div class="container">

            <h5>Student Information</h5>

            <div class=" container-fluid border rounded p-2">
              <div class="row px-0 py-0 m-0 pl-2 pt-2">
                <div class="col-lg-2 ">
                  <label class="font-weight-normal" style="font-size:10pt;">Student No:</label>
                </div>
                <div class="col-lg-4 ">
                  <label class="font-weight-bold" style="font-size:9pt;" id="txtStudentNo"></label>
                </div>
                <div class="col-lg-2 ">
                  <label class="font-weight-normal" style="font-size:10pt;">Year :</label>
                </div>
                <div class="col-lg-4">
                  <label class="font-weight-bold " style="font-size:9pt;" id="txtYear">Freshman</label>
                </div>
              </div>
              <div class="row px-0 py-0 m-0 pl-2 ">
                <div class="col-lg-2 ">
                  <label class="font-weight-normal" style="font-size:10pt;">Student:</label>
                </div>
                <div class="col-lg-4 ">
                  <label class="font-weight-bold " style="font-size:9pt;" id="txtStudentName">King Dranreb Languido</label>
                </div>
                
                <div class="col-lg-2 ">
                  <label class="font-weight-normal" style="font-size:10pt;">Course :</label>
                </div>
                <div class="col-lg-4 ">
                  <label class="font-weight-bold " style="font-size:9pt;" id="txtCourse">Bachelor of Science in Information Technology</label>
                </div>
              </div>
              
            </div>

  
              <div class="row py-2">
                <div class="col-lg-9 pt-1 pr-0 text-right">
                  <label class="" style="font-size:10pt;">School Year</label>
                </div>
                <div class="col-lg-3">
                  <select class="font-weight-bold custom-select" style="font-size:9pt;">
                    <option value="">2020-2021 1st</option>
                    <option value="">2020-2021 2nd</option>
                    <option value="">2019-2020 1st</option>
                    <option value="">2019-2020 2nd</option>
                    <option value="">2018-2019 1st</option>
                    <option value="">2018-2019 2nd</option>
                  </select>
                </div>
              </div>
            

            <table class="table table-striped" style="font-size:10pt" id="tbl_univ">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Prerequisite</th>
                  <th>Subject</th>
                  <th class="text-center">Grade</th>
                  <th>Professor</th>
                  <th class="text-center">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >1</td>
                  <td>Computer Programming 1</td>
                  <td>Computer Programming 2</td>
                  <td class="text-center">3.0</td>
                  <td>Prof Lolita Mendoza</td>
                  <td class="text-center">INC</td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-sm mlqu-color" id="btn_submit" data-dismiss="modal" style="background:#7A353C;height:25px;width:80px">Close</button>
        
        
        </div>

      {{-- {!! Form::close() !!} --}}
    </div>
  </div>
</div>
{{-- end Add Modal --}}
