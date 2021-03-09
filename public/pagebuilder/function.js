$(document.body).ready(function(){

    alert('hello')

    const fs = require('fs');

    fs.readFile('page.json','utf-8',(err,jsonstring)=>{

        console.log(jsonstring)

    })

    // NavItem()

    item = 'TEST INPUT'

    test = ' '
        +'   <ul class="nav flex-column">'
        +'   <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted font-weight-bold" style="font-size: 8pt;">'
        +'   <span>Menu</span>'
        +'   </h6>'
        +'   <li class="nav-item py-0">'
        +'   <a class="nav-link py-1 ml-1" style="font-size: 9pt;" href="/dashboard" id="nv_dashboard">'
        +'   <i data-feather="clipboard"></i>'
        +item+
        +   '</a>'
        +   '</li>'
        +   '</ul>'


    

    $('#sidebarMenu .sidebar-sticky ').append(test);


})















