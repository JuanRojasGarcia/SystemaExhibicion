<?php include_once "./menu.html"; ?>  <br> <br> <br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../NuevosRecursos/css/tablaData.css">
    <link rel="stylesheet" href="./js/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="./js/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxexport.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="./js/jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="./js/jqwidgets/jqxgrid.columnsresize.js"></script> 
    <script type="text/javascript" src="./js/jqwidgets/jqxdata.export.js"></script> 
    <script type="text/javascript" src="./js/jqwidgets/jqxgrid.export.js"></script> 
    <script type="text/javascript" src="./js/jqwidgets/jqxexport.js"></script> 
    <script type="text/javascript" src="./js/jqwidgets/jqxgrid.sort.js"></script> 
    <script type="text/javascript" src="./js/scripts/jszip.min.js"></script>
    <link rel="stylesheet" href="./js/jqwidgets/styles/jqx.classic.css" type="text/css" />
    <script type="text/javascript"  src="./js/jqxgrid.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">    
            <div class="container-fluid">
                <div class="col input-group mb-3">
                    <label for="tipos">Consultar: </label>
                    <select id="selectTipo" name="selectTipo">
                        <option value="optDefault" selected>Choose...</option>
                        <option value="optEmp">Empleados</option>
                        <option value="optCen">Centros</option>
                        <option value="optArt">Articulos</option>
                        <option value="optVen" >Ventas</option>
                    </select>
                </div>       
                
                <div class="card-body">
                    <div id="resEmp" style="display:none;">
                        <label for="inpnumEmp">Numero Empleado</label>
                        <input name="inpnumEmp" type="text" id="inpnumEmp"/> <br>
                        <label for="inpnomEmp">Nombre</label>
                        <input name="inpnomEmp" type="text" id="inpnomEmp" /><br>
                        <label for="inpapellEmp">Apellido</label>
                        <input name="inpapellEmp" type="text" id="inpapellEmp" />
                    </div>
                    <div id="resCen" style="display:none;">
                        <label for="inpnumCen">Numero Centro</label>
                        <input name="inpnumCen" type="text" id="inpnumCen"/> <br>
                        <label for="inpnomCen">Nombre</label>
                        <input name="inpnomCen" type="text" id="inpnomCen" /><br>
                    </div>
                    <div id="restArt" style="display:none;" >
                        <label for="inpskuArt">Sku</label>
                        <input name="inpskuArt" type="text" id="inpskuArt"/> <br>
                        <label for="inpdesArt">Descripcion</label>
                        <input name="inpdesArt" type="text" id="inpdesArt" /><br>
                        <label for="inpmodArt">Modelo</label>
                        <input name="inpmodArt" type="text" id="inpmodArt"/> <br>
                    </div>
                    <div id="resVen" style="display:none;">
                        <label for="inpfolVen">Folio</label>
                        <input name="inpfolVen" type="text" id="inpfolVen"/> <br>
                        <label for="inpnomVen">Nombre Empleado</label>
                        <input name="inpnomVen" type="text" id="inpnomVen" /><br>
                        <label for="inpfecVen">Fecha</label>
                        <input type="date" id="inpfecVen" name="inpfecVen" min="2021-01-01" max="2021-12-31">
                    </div>
                </div>

                <div id="jqxgrid"></div> <br>

                <div>
                    <a class="btn btn-danger"  href="./index.php"><i ></i>Cancel</a>
                    <button type="button"  class='btn btn-success' id="btnGenerar">Generar</button>
                    <button type="button"  class="btn btn-info" id="btnPdf">Exportar A PDF</button>

                </div>


            </div>
        </div>
    </div>
</body>
</html>

