CKEDITOR.on('dialogDefinition', function (ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;
  
    if (dialogName == 'image') {
        var infoTab = dialogDefinition.getContents('info');
        var hspace = infoTab.get('txtHSpace');
        var vspace = infoTab.get('txtVSpace');
        hspace['default'] = vspace['default'] = '10';
       
    }
});
