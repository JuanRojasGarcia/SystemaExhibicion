<?php include_once "./menu.html"; ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../NuevosRecursos/css/filtros.css">
    <link rel="stylesheet" href="./js/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="./js/jqwidgets/styles/jqx.classic.css" type="text/css" />

    <title>Filtros</title>
</head>
<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">    
            <div class="container-fluid">
                <div class="row"></div>

                    <div class="consultar">

                        <label for="tipos">Consultar: </label>
                        <select  class="selectpicker" id="selectTipo" name="selectTipo" >
                            <option value="optDefault" selected>Choose...</option>
                            <option value="optEmp">Empleados</option>
                            <option value="optCen">Centros</option>
                            <option value="optArt">Articulos</option>
                            <option value="optVen" >Ventas</option>
                        </select>

                    </div>
                
                    <div class="card-body">

                        <div class="form-group" id="resEmp" style="display:none;">
                            <div class="form-group row">
                                <label for="inpnomEmp" class="col-sm-0 col-form-label">Nombre</label>
                                <div class="col-md-3">
                                    <input class="form-control" name="inpnomEmp" type="text" id="inpnomEmp" value "" onkeypress="return soloLetras(event)" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inpapellEmp" class="col-sm-0 col-form-label">Apellido</label>
                                <div class="col-md-3">
                                    <input class="form-control" name="inpapellEmp" type="text" id="inpapellEmp" onkeypress="return soloLetras(event)" />
                                </div>
                            </div>
                            
                        </div>


                        <div class="form-group" id="resCen" style="display:none;">

                            <div class="form-group row">
                                <label for="inpnumCen" class="col-sm-0 col-form-label">Numero Centro</label>
                                <div class="col-sm-2">
                                    <input class="form-control" name="inpnumCen" type="text" id="inpnumCen"   onkeypress="return soloNumeros(event)" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inpnomCen" class="col-sm-0 col-form-label">Nombre</label>
                                <div class="col-md-3">
                                    <input class="form-control" name="inpnomCen" type="text" id="inpnomCen" onkeypress="return soloLetras(event)" />
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group" id="restArt" style="display:none;">

                            <div class="form-group row">
                                <label for="inpskuArt" class="col-sm-0 col-form-label">Sku</label>
                                <div class="col-sm-2">
                                    <input class="form-control" name="inpskuArt" type="text" id="inpskuArt"   onkeypress="return soloNumeros(event)" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inpdesArt" class="col-sm-0 col-form-label">Descripcion</label>
                                <div class="col-md-3">
                                    <input class="form-control" name="inpdesArt" type="text" id="inpdesArt" onkeypress="return soloLetras(event)" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inpmodArt" class="col-sm-0 col-form-label">Modelo</label>
                                <div class="col-md-3">
                                    <input class="form-control" name="inpmodArt" type="text" id="inpmodArt" onkeypress="return Modelo(event)" />
                                </div>
                            </div>

                        </div>

                        
                        <div class="form-group" id="resVen" style="display:none;">

                            <div class="form-group row">
                                <label for="inpnomVen" class="col-sm-0 col-form-label">Nombre Empleado</label>
                                <div class="col-md-3">
                                    <input class="form-control" name="inpnomVen" type="text" id="inpnomVen"   onkeypress="return soloLetras(event)" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inpapellVen" class="col-sm-0 col-form-label">Apellido Empleado</label>
                                <div class="col-md-3">
                                    <input class="form-control" name="inpapellVen" type="text" id="inpapellVen" onkeypress="return soloLetras(event)" />
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label for="inpfecVen">Fecha Inicial</label>
                                        <input class="form-control" name="inpfecVen" type="date" id="inpfecVen" value="2021-01-01"/>                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inpfecFinVen" >Fecha Final</label>
                                        <input class="form-control" name="inpfecFinVen" type="date" id="inpfecFinVen" value="2021-01-01"/>
                                </div>

                            </div>

                        </div>



                    <div id="jqxgrid" ></div> <br>

                    <div >
                        <a class="btn btn-danger"  href="./index.php"><i ></i>Cancel</a>
                        <button type="button"  class='btn btn-success' id="btnGenerar">Generar</button>
                        <!-- <a href="./ajax/fpdf_Example.php" type="button"  class="btn btn-info" id="btnPdf">Exportar A PDF</a> -->
                        <button type="button" style="display:none;" class="btn btn-info" id="btnPdf">Exportar A PDF</button>
                        <!-- <a href="./ajax/fpdf_Example.php?data=data" download="file.pdf">link</a> -->

                    </div>
                </div>


            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="./js/scripts/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxgrid.pager.js"></script> 
<script type="text/javascript" src="./js/jqwidgets/jqxpanel.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="./js/jqwidgets/jqxdropdownlist.js"></script>
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
<script type="text/javascript" src="./js/scripts/demos.js"></script>
<script src="./js/js_filtros.js"></script>
<script src="js/js_funcGenerales.js"></script>


