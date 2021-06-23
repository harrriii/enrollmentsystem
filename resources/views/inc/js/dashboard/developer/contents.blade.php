<script type="text/javascript">

    $(document.body).ready(function(){
 
        $('#nv_dashboard').addClass('active');

        flipChevy('btn1', 'cl1')

        flipChevy('btn2', 'cl2')

        flipChevy('btn3', 'cl3')

    })

    $('#btn_add').click('',function (){

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi'),$(this).attr('cli'),$(this).attr('cni')];

        zmodal.InitInsertModal( 'Add Content' , '', v3)

        zmodal.addLabelR('Content Label', 'form-label mt-2')

        zmodal.addTextBox('label','txtLabel')

        zmodal.addLabelR('Element', 'form-label mt-2')

        zmodal.addSelect('element','txtElement')

        zmodal.addSource('txtElement','formz-default-elements')

        zmodal.addLabelR('Type', 'form-label mt-2')

        zmodal.addSelect('type','txtType')

        zmodal.addSource('txtType','trigger',   [{
                                                    'triggerId':'txtElement',
                                                    'appendId':'txtType',
                                                    'Condition':'triggerValue',
                                                    'Storage':'defaultElements',
                                                    
                                                }])
        
        zmodal.addLabelR('Table Code', 'form-label mt-2')

        zmodal.addTextBox('tc','txtTableCode')

        zmodal.addLabelR('Column Code', 'form-label mt-2')

        zmodal.addTextBox('cc','txtColumnCode')

        zmodal.addLabelR('Pull From Table Code', 'form-label mt-2')

        zmodal.addTextBox('pf','txtLabel')

        zmodal.addLabelR('Id value of Table Code', 'form-label mt-2')

        zmodal.addTextBox('iV','txtLabel')

        zmodal.addLabelR('Output value of Table Code', 'form-label mt-2')

        zmodal.addTextBox('oV','txtLabel')

        zmodal.addLabelR('Default Value', 'form-label mt-2')

        zmodal.addTextBox('value','txtLabel')

        zmodal.addTextBox('insertType','txtLabel','content','','','hidden')

        zmodal.AlertOutput( 'Content added succesfully')

        zmodal.Url( '/LazyInsert')

        zmodal.Show();
      
    })


    $('.edit').click('',function (){

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi'),$(this).attr('cli'),$(this).attr('cni')];

        zmodal.InitUpdateModalSingle("Content Information",'',v3);

        zmodal.addLabel('Content label');

        zmodal.addTextBox('label','txtLabel',$(this).attr('zl'),'form-control');

        zmodal.addLabel('Element','mt-2');

        zmodal.addSelect('element','txtElement')

        zmodal.addSource('txtElement','formz-default-elements')

        zmodal.addLabel('Type','mt-2');

        zmodal.addSelect('type','txtType')

        zmodal.addSource('txtType','trigger',   [{
                                                    'triggerId':'txtElement',
                                                    'appendId':'txtType',
                                                    'Condition':'triggerValue',
                                                    'Storage':'defaultElements',
                                                    
                                                }])
    
        zmodal.addLabel('Default Value','mt-2');

        zmodal.addTextBox('value','txtdv',$(this).attr('zv'),'form-control');

        if( $(this).attr('zt') == 'text' )
        {
            zmodal.addLabel('Placeholder','mt-2');

            zmodal.addTextBox('placeholder','txtdv',$(this).attr('ph'),'form-control');

        }

        if( $(this).attr('zt') == 'select' )
        {

            zmodal.addLabel('Pull Data From Table Code','mt-2');

            zmodal.addTextBox('pf','txtpf',$(this).attr('pf'),'form-control');

            zmodal.addLabel('Id value from Column Code','mt-2');

            zmodal.addTextBox('iV','txtiv',$(this).attr('iv'),'form-control');

            zmodal.addLabel('Output value from Column Code','mt-2');

            zmodal.addTextBox('oV','txtov',$(this).attr('ov'),'form-control');
            
        }

        zmodal.addLabel('Table Code','mt-2');

        zmodal.addTextBox('tc','txttc',$(this).attr('tc'),'form-control');

        zmodal.addLabel('Column Code','mt-2');

        zmodal.addTextBox('cc','txtcc',$(this).attr('cc'),'form-control');

        zmodal.AlertOutput('Content Information updated successfully.')

        zmodal.addTextBox('updateType','txtLabel','content','','','hidden')

        zmodal.Url('/LazyUpdate');

        zmodal.Show();
        
        zmodal.addSource('txtType','value', [{
                                                'appendId':'txtType',
                                                'value':$(this).attr('zt'),
                                            }])

    })


    $('.delete').click('',function (){

        let zmodal = new LazyModal();

        let v3 = [$(this).attr('fmi'),$(this).attr('pni'),$(this).attr('rwi'),$(this).attr('cli'),$(this).attr('cni')];

        zmodal.InitDeleteModal('Delete Content', '', v3);

        zmodal.addLabel('Do you want to delete this Content?')

        zmodal.AlertOutput('Content deleted successfully.')

        zmodal.addTextBox('deleteType','txtLabel','content','','','hidden')

        zmodal.Url('/LazyDelete');

        zmodal.Show();

    })

    $('.show').click('',function ()  {

        let zmodal = new LazyModal();

        zmodal.InitViewModal("Content Information");

        zmodal.addLabel('Content label');

        zmodal.addTextBox('6','txtLabel',$(this).attr('zl'),'form-control','','readonly');

        zmodal.addLabel('element','mt-2');

        zmodal.addTextBox('5','txtElement',$(this).attr('ze'),'form-control','','readonly');

        zmodal.addLabel('Type','mt-2');

        zmodal.addTextBox('4','txttype',$(this).attr('zt'),'form-control','','readonly');

        zmodal.addLabel('Default Value','mt-2');

        zmodal.addTextBox('11','txtdv',$(this).attr('zv'),'form-control','','readonly');

        if( $(this).attr('zt') == 'text' )
        {
            zmodal.addLabel('Placeholder','mt-2');

            zmodal.addTextBox('11','txtdv',$(this).attr('ph'),'form-control','','readonly');

        }

        if( $(this).attr('zt') == 'select' )
        {

            zmodal.addLabel('Pull Data From Table Code','mt-2');

            zmodal.addTextBox('7','txtpf',$(this).attr('pf'),'form-control','','readonly');

            zmodal.addLabel('Id value from Column Code','mt-2');

            zmodal.addTextBox('8','txtiv',$(this).attr('iv'),'form-control','','readonly');

            zmodal.addLabel('Output value from Column Code','mt-2');

            zmodal.addTextBox('9','txtov',$(this).attr('ov'),'form-control','','readonly');
            
        }
       
        zmodal.addLabel('Table Code','mt-2');

        zmodal.addTextBox('2','txttc',$(this).attr('tc'),'form-control','','readonly');

        zmodal.addLabel('Column Code','mt-2');

        zmodal.addTextBox('3','txtcc',$(this).attr('cc'),'form-control','','readonly');

        zmodal.Show();

    })

    $('.show_c').click('',function ()  {

        location.href = '/FORM/PANELS/ROWS/COLUMNS/'+$(this).attr('fi')+'/'+$(this).attr('pi')+'/'+$(this).attr('ri');

    })

    $('.show_r').click('',function ()  {

        location.href = '/FORM/PANELS/ROWS/'+$(this).attr('fi')+'/'+$(this).attr('pi');

    })

    $('.show_p').click('',function ()  {

        location.href = '/FORM/PANELS/'+$(this).attr('fi');

    })

    $('.show_f').click('',function ()  {

    location.href = '/dashboard/forms';

    })

    


    var i = 0 ;

   

     function flipChevy (btnId, iconId)
     {
        $('body').on('click', '#'+btnId, function () {


            if( i == 0)
            {
                $('#'+iconId).addClass('flipUp');
                    i =1;
            }
            else
            {
                $('#'+iconId).removeClass('flipUp');
                                
                    i =0;

            }

        })

     }

  </script>