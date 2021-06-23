<div class="container-fluid">

  <div class="row">

    <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block sidebar collapse" style="background:#061325">

      <div class="sidebar-sticky pt-3 "  >
    
        <div class="accordion customScroll"  style="overflow-x:hidden; overflow-y: auto; max-height:50%; width: 100%;"  id="menuAccordion" >

          <div class="item-1">

            <a class="btn btn-link btn-block text-left chevron pb-0 mb-0  a-lazy-color-gray"   type="button" id="btn1" data-toggle="collapse" data-target="#collapseOne">

                <i class="fas fa-paste fa-lg pr-1"style="font-size:15pt;" ></i>
                
                <label class="" style="font-size:15pt;"> Dashboard</label>
    
            </a>

          </div>

          <div class="item-2">

            <a class="btn btn-link btn-block text-left chevron pb-0 mb-0  a-lazy-color-gray"   type="button" id="btn1" href="/dashboard/personal_record">

                <i class="fas fa-paste fa-lg pr-1"style="font-size:15pt;" ></i>
                
                <label class="" style="font-size:15pt;"> Personal Record</label>

            </a>

          </div>

          <div class="item-3">

            <a class="btn btn-link btn-block text-left chevron pb-0 mb-0  a-lazy-color-gray"   type="button" id="btn1" href="/dashboard/gym">

                <i class="fas fa-paste fa-lg pr-1"style="font-size:15pt;" ></i>
                
                <label class="" style="font-size:15pt;">Routine</label>

            </a>

          </div>



        </div>
        
      </div>

    </nav>

    @yield('content')

  </div>

</div>


