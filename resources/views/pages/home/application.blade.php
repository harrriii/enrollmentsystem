@extends('layouts.layout_home')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />

  <main class="container-fluid">

    <div class="row">
      
      <div class="col test"></div>

    </div>

    <div class=" pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      
      <h1 class="display-4" style="font-size:32pt;">Account Application</h1>

    </div>

    <div class="container">

      <div class="row ">

        <div class="col-lg-7 border rounded ">

          <div class="row" id="loading">

            <div class="col text-center" style="margin-top:80px;">
      
              <div class="spinner-border" role="status">
      
                <span class="sr-only">Loading...</span>
      
              </div>
      
            </div>
      
          </div>

       
            <div class="panelContainer" id="panelContainerId"></div>

            <div class="row my-2" id='btnRow'>

              <div class="col-lg-6 text-left" id="col_btn_prev"></div>

              <div class="col-lg-6  text-right" id="col_btn_next"></div>

            </div>


        </div>

        <div class="col-lg-5 ">

          <div class="pl-2 border rounded px-4 py-2"> 
            
            <div class="border-bottom">
             
              <label class="font-weight-bold text-muted" style="font-size:9pt;">List of Requirements Here</label>
            
            </div>
            
            <div class="bd-callout bd-callout-warning">
              
              <h5 id="conveying-meaning-to-assistive-technologies">Conveying meaning to assistive technologies</h5>
              
              <p>Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the <code>.sr-only</code> class.</p>
              
              <a id="tester">TEST LINK HERE</a>

              <div id="demo"></div>

            </div>

          </div>

        </div>
    
      </div>

    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="row">
        <div class="col-12 col-md">
          <img class="mb-2" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
          <small class="d-block mb-3 text-muted">&copy; 2017-2020</small>
        </div>
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Cool stuff</a></li>
            <li><a class="link-secondary" href="#">Random feature</a></li>
            <li><a class="link-secondary" href="#">Team feature</a></li>
            <li><a class="link-secondary" href="#">Stuff for students</a></li>
            <li><a class="link-secondary" href="#">Another one</a></li>
            <li><a class="link-secondary" href="#">Last time</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Resource</a></li>
            <li><a class="link-secondary" href="#">Resource name</a></li>
            <li><a class="link-secondary" href="#">Another resource</a></li>
            <li><a class="link-secondary" href="#">Final resource</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">School</a></li>
            <li><a class="link-secondary" href="#">Questions</a></li>
            <li><a class="link-secondary" href="#">Questions</a></li>
            <li><a class="link-secondary" href="#">Questions</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </main>

@include('inc\modal\modals') 
@endsection

@section('script')

  @include('inc\js\reuseable') 

  {{-- @include('inc\js\experimentals')  --}}

  @include('inc\js\home\application') 

@endsection
