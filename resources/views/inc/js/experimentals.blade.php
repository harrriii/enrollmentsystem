<script type="text/javascript">

var zcontent = [];

var data = [];

var submitbutton = 'Add';

var closebutton = 'Close';

var title = '';

var url = '';

var addtl = [];

var v1 = '';

var alertoutput = '';

var size = '';

var ids = [];

class LazyModal {

    constructor()
    {
        zcontent = [];

        data = [];

        addtl = [];

        url = '' ;
    }

    addLabel( value = '' , zclass = 'form-label', zstyle = '' )
    {
        
        if(zstyle)
        {
            zcontent.push(
                        {
                            _E: 'label',

                            _C: zclass,

                            _V: value,

                            _S: zstyle
                        }
                    )
        }
        else
        {
            zcontent.push(
                        {
                            _E: 'label',

                            _C: zclass,

                            _V: value,
                        }
                    )
        }
        
        
    }

    addLabelR( value = '' , zclass = 'form-label', zstyle = '' )
    {
        
        
        if(zstyle)
        {
            zcontent.push(
                        {
                            _E: 'label',

                            _C: zclass,

                            _V: value,

                            _S: zstyle
                        }
                    )

                    zcontent.push(
                        {
                            _E: 'label',

                            _C: 'form-label mt-2 ml-1',

                            _V: '*',

                            _S: 'color: red;'
                        }
                    )
        }
        else
        {
            zcontent.push(
                        {
                            _E: 'label',

                            _C: zclass,

                            _V: value,
                        }
                    )

            zcontent.push(
                {
                    _E: 'label',

                    _C: 'form-label mt-2 ml-1',

                    _V: '*',

                    _S: 'color: red;'
                }
            )
        }
        
        
    }

    addRow( id = '' )
    {

        zcontent.push(
                        {
                            _E: 'row',

                            _I: id,
                        }
                    )

    }

    addColumn( row = '', columnCount = '', columnSize = '' )
    {

        if( columnSize == 'sm')
        {

            zcontent.push(
                        {
                            _E: 'col',

                            _N: columnCount,

                            _SM: true,

                            _R: row
                        }
                    )
            
        }
        else if( columnSize == 'lg')
        {

            zcontent.push(
                        {
                            _E: 'col',

                            _N: columnCount,

                            _LG: true,

                            _R: row

                        }
                    )

        }
        

    }
 
    addTextBox( zname = '', id = '', zvalue = '' , zclass = 'form-control', placeholder = '', attr = '' )
    {
        
        zcontent.push(
                        {
                            _E: 'input',

                            _T: 'text',

                            _C: zclass,

                            _P: placeholder,

                            _N: zname,

                            _I: id,

                            _V: zvalue,

                            _A: attr,
                        }
                    )
        
    }

    addSelect( zname = '', id = '', source = '', zclass = 'custom-select form-control' )
    {
        
        zcontent.push(
                        {
                            _E: 'select',

                            _I: id,

                            _N: zname,

                            _C: zclass,
                        }
                    )
        
    }

    addOption( id = '', innervalue = '' , outputvalue = '' )
    {

        addtl.push(
                    {
                            _E: 'option',

                            _IV: innervalue,

                            _FS: id,

                            _OV: outputvalue,
                    }
        );
        
    }

    addCustomOption( id = '', zv1 = '', zv21 = '', zv22 = '', defaultValue = '' , defaultOutput = '', condition = '')
    {

        d =  JSON.stringify({

            v1: zv1,

            v2: [zv21 ,zv22],

        })

        encyptedData = encryptData(d,hp);

        if( defaultValue && defaultOutput )
        {

            addtl.push(
                        {
                                _E: 'option',

                                _IV: defaultValue,

                                _FS: id,

                                _OV: defaultOutput,
                        }
                    );

        }

        addtl.push({
                        _E: 'option-fetch-value',

                        _U: '/UNIV/FETCHJS/',

                        _ED: encyptedData,

                        _I: id,
                  })
        
    }

    addTabContainer( id )
    {
        
        zcontent.push(
                        {
                            _E: 'container-tab',

                            _I: id,
                        }
                    )

    }

    addTab(  zid , tid , zti, zname )
    {
        
        zcontent.push(
                        {
                            _E: 'tab',

                            _AT: tid,

                            _I: zid,

                            _TI: zti,
                            
                            _N: zname,
                        }
                    )
                    
    }




    InitViewModal( ztitle )
    {
        title = ztitle
        closebutton = 'Close';
    }

    InitViewModalXL(ztitle )
    {
        title = ztitle
        closebutton = 'Close';
        size = 'xl';
    }

    InitInsertModal( ztitle , zv1)
    {
        title = ztitle
        submitbutton = 'Add';
        closebutton = 'Close';
        url = '/UNIV/INSERT';
        v1 = zv1;
    }

    InitDeleteModal( ztitle, zv1, c)
    {
        title = ztitle
        url = '/UNIV/DELETE';
        v1 = zv1;
        submitbutton = 'Confirm';
        closebutton = 'Close';

        d = JSON.stringify({

            _D: c

        })

        ids = encryptData(d,hp);
        
    }

    InitUpdateModalSingle( ztitle , zv1, c)
    {
        title = ztitle
        submitbutton = 'Update';
        closebutton = 'Close';
        url = '/UNIV/EDIT';
        v1 = zv1;

        d = JSON.stringify({
         
            _MD: c

        })

        ids = encryptData(d,hp);
    }

    InitUpdateModalXl(ztitle , zv1)
    {
        title = ztitle
        submitbutton = 'Update';
        closebutton = 'Close';
        url = '/UNIV/UPDATE';
        v1 = zv1;
        size = 'xl';
    }

    Title( ztitle )
    {
        title = ztitle;
    }

    SubmitButton( zsubmitbutton = '' )
    {
        submitbutton = zsubmitbutton;
    }

    CloseButton( zclosebutton = '' )
    {
       closebutton = zclosebutton;
    }

    Url( zurl )
    {
        url = zurl;
    }

    AlertOutput( zalertoutput )
    {
       alertoutput = zalertoutput;
    }


    Show()
    {

        data =  {

                    modalTitle: title,

                    modalContent: zcontent,

                    buttonSubmit:  submitbutton,

                    buttonCancel: closebutton,

                    url: url,

                    v1: v1,

                    v2: alertoutput,

                    modalSize: size,

                    v3: ids

                }

        __BUILDERN(data);

        if(addtl)
        {

            __ADDTL(addtl);

        }
  
    }

}










</script>