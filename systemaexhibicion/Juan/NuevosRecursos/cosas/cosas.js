//Imprime los datos de cada row al dar click button

{ text: 'Eliminar', dataField: 'button', width: 100, columntype:'button', cellsrenderer: function () {
    return 'Eliminar';
  }, buttonclick: function (row, event) {

      var button = $(event.currentTarget);
      var grid = button.parents("[id^=jqxgrid]");
      
      var rowData = grid.jqxGrid('getrowdata', row);
      console.log(rowData);
      

  }
}]
