<?php include_once "./menu.html"; ?> <br> <br>
<link href="../NuevosRecursos/css/consultas.css" rel="stylesheet" />
<div id="layoutSidenav">
    <div id="layoutSidenav_content">     
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form style="word-spacing: 200pt;"> 
                        <label class="label"><input type="radio" name="optradio" id="radEmp" >Empleados</label>
                        <label class="label"><input type="radio" name="optradio" id="radCen" >Centros</label>
                        <label class="label"><input type="radio" name="optradio" id="radArt" >Articulos</label>
                </div>
            </div> 
            <button type="button" style="float:right;" class="btn btn-success" id="btnPdf">Generar PDF</button>

            <form class="card" style="float:none; margin:auto; margin-top:40px; display:none;" id="formSearch">
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group">
                            <!--<div class="fa fa-search"></div>-->
                            <input type="text" name="search_text" id="search_text" placeholder="Buscar Numero Empleado" class="form-control" style="border-radius: 25px; display:none;">
                            <input type="text" name="search_text" id="search_textCen" placeholder="Buscar Numero Centro" class="form-control" style="border-radius: 25px; display:none;">
                            <input type="text" name="search_text" id="search_textArt" placeholder="Buscar Descripcion" class="form-control" style="border-radius: 25px; display:none;">
                        </div>
                    </div>
                    <div id="result" style="display:none;"></div>
                    <div id="resultCen" style="display:none;"></div>
                    <div id="resultArt" style="display:none;"></div>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="js/js_consultas.js"></script>
