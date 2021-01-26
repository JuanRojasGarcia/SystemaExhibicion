using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.Odbc;
using System.Data;

namespace ABCExhibicion
{
    public partial class Ventas
    {
        int iTotalArticulos {get;set;}
        private void fPonerColBod(string sName, string sEncabezado, int iAncho, int iColumn, bool bVisible, int iAlineacion, bool bReadOnly, bool bToolTip, string sTextToolTip){
            DataGridViewContentAlignment dgx = new DataGridViewContentAlignment();

            if(iAlineacion == 1){
                dgx = DataGridViewContentAlignment.MiddleLeft;
            }else if (iAlineacion == 2){
                dgx = DataGridViewContentAlignment.MiddleCenter;
            }else if (iAlineacion == 3){
                dgx = DataGridViewContentAlignment.MiddleRight;
            }
            DataGridViewTextBoxColumn colText = new DataGridViewTextBoxColumn();
            if(bToolTip){
                colText.ToolTipText = sTextToolTip;
            }

            colText.HeaderText = sEncabezado;
            colText.Visible = bVisible;
            colText.Width = iAncho;
            colText.ReadOnly = bReadOnly;
            colText.Resizable = DataGridViewTriState.False;
            colText.SortMode = DataGridViewColumnSortMode.NotSortable;
            colText.Name = sName;
            colText.HeaderCell.Style.Alignment= DataGridViewContentAlignment.MiddleCenter;
            colText.DefaultCellStyle.Alignment = dgx;

            dgvVentas.Columns.Add(colText);
        }

        private void fPonerColBodArticulos(string sName, string sEncabezado, int iAncho, int iColumn, bool bVisible, int iAlineacion, bool bReadOnly, bool bToolTip, string sTextToolTip){
            DataGridViewContentAlignment dgx = new DataGridViewContentAlignment();

            if(iAlineacion == 1){
                dgx = DataGridViewContentAlignment.MiddleLeft;
            }else if (iAlineacion == 2){
                dgx = DataGridViewContentAlignment.MiddleCenter;
            }else if (iAlineacion == 3){
                dgx = DataGridViewContentAlignment.MiddleRight;
            }
            DataGridViewTextBoxColumn colText = new DataGridViewTextBoxColumn();

            if(bToolTip){
                colText.ToolTipText = sTextToolTip;
            }

            colText.HeaderText = sEncabezado;
            colText.Visible = bVisible;
            colText.Width = iAncho;
            colText.ReadOnly = bReadOnly;
            colText.Resizable = DataGridViewTriState.False;
            colText.SortMode = DataGridViewColumnSortMode.NotSortable;
            colText.Name = sName;
            colText.HeaderCell.Style.Alignment= DataGridViewContentAlignment.MiddleCenter;
            colText.DefaultCellStyle.Alignment = dgx;

            dgvAddArticulos.Columns.Add(colText);



        }

        
        private void fPonerColBodAbonosMensuales(string sName, string sEncabezado, int iAncho, int iColumn, bool bVisible, int iAlineacion, bool bReadOnly, bool bToolTip, string sTextToolTip){
            DataGridViewContentAlignment dgx = new DataGridViewContentAlignment();

            if(iAlineacion == 1){
                dgx = DataGridViewContentAlignment.MiddleLeft;
            }else if (iAlineacion == 2){
                dgx = DataGridViewContentAlignment.MiddleCenter;
            }else if (iAlineacion == 3){
                dgx = DataGridViewContentAlignment.MiddleRight;
            }
            DataGridViewTextBoxColumn colText = new DataGridViewTextBoxColumn();
            if(bToolTip){
                colText.ToolTipText = sTextToolTip;
            }

            colText.HeaderText = sEncabezado;
            colText.Visible = bVisible;
            colText.Width = iAncho;
            colText.ReadOnly = bReadOnly;
            colText.Resizable = DataGridViewTriState.False;
            colText.SortMode = DataGridViewColumnSortMode.NotSortable;
            colText.Name = sName;
            colText.HeaderCell.Style.Alignment= DataGridViewContentAlignment.MiddleCenter;
            colText.DefaultCellStyle.Alignment = dgx;

            dgvAbonosMensuales.Columns.Add(colText);

            

        }
        


        private bool fCrearGridVenta(){
            bool bRegresa = true;
            dgvVentas.RowHeadersVisible = false;
            dgvVentas.AllowUserToAddRows = false;
            dgvVentas.AllowUserToResizeColumns = false;
            dgvVentas.AllowUserToDeleteRows= false;

            fPonerColBod("Num Venta", "Num Venta", 60, 1, true, 2, true, false, "");
            fPonerColBod("Cliente", "Cliente", 60, 2, true, 2, true, false, "");
            fPonerColBod("$ Venta", "$ Venta", 80, 3, true, 2, true, false, "");
            fPonerColBod("Articulos Comprados", "Articulos \nComprados", 60, 4, true, 2, true, false, "");
            fPonerColBod("FechaVenta", "Fecha Venta", 80, 5, true, 2, true, false, "");
            fPonerColBod("FechaModificacionVenta", "Fecha \nModificacion", 80, 6, true, 2, true, false, "");

            return bRegresa;
        }

        private bool fCrearGridAddArticulo(){
            bool bRegresa = true;
            dgvAddArticulos.RowHeadersVisible = false;
            dgvAddArticulos.AllowUserToAddRows = false;
            dgvAddArticulos.AllowUserToResizeColumns = false;
            dgvAddArticulos.AllowUserToDeleteRows= false;

            fPonerColBodArticulos("Descripcion Articulo", "Descripcion \nArticulo", 100, 1, true, 2, true, false, "");
            fPonerColBodArticulos("Modelo", "Modelo", 60, 2, true, 2, true, false, "");
            fPonerColBodArticulos("Cantidad", "Cantidad", 80, 3, true, 2, false, false, "");
            fPonerColBodArticulos("Precio", "$ Precio", 60, 4, true, 2, true, false, "");
            fPonerColBodArticulos("Importe", "Importe", 80, 5, true, 2, true, false, "");

            return bRegresa;
        }

        private bool fCrearGridAbonosMensuales(){
            bool bRegresa = true;
            dgvAbonosMensuales.RowHeadersVisible = false;
            dgvAbonosMensuales.AllowUserToAddRows = false;
            dgvAbonosMensuales.AllowUserToResizeColumns = false;
            dgvAbonosMensuales.AllowUserToDeleteRows= false;

            fPonerColBodAbonosMensuales("Periodo de Abonos", "Periodo de \nAbonos", 100, 1, true, 2, true, false, "");
            fPonerColBodAbonosMensuales("Importe Abono", "Importe Abono", 60, 2, true, 2, true, false, "");
            fPonerColBodAbonosMensuales("Total a Pagar", "Total a Pagar", 80, 3, true, 2, true, false, "");
            fPonerColBodAbonosMensuales("Se Ahorra", "Se Ahorra", 60, 4, true, 2, true, false, "");
            fPonerColBodAbonosMensuales("Elegir", "Elegir", 80, 5, true, 2, true, false, "");

            return bRegresa;
        }

        public void fLlenarGridVenta(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "", sValor = "";
            int iRenglon = 0;


            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_ventas 0, 0, 0, 0, 0, 0, 0, 5");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    while(reader.Read()){
                        dgvVentas.Rows.Add();

                        sValor = reader[0].ToString();
                        dgvVentas.Rows[iRenglon].Cells["Num Venta"].Value = sValor.Trim();

                        sValor = reader[1].ToString();
                        dgvVentas.Rows[iRenglon].Cells["Cliente"].Value = sValor.Trim();

                        sValor = reader[2].ToString();
                        dgvVentas.Rows[iRenglon].Cells["$ Venta"].Value = sValor.Trim();

                        sValor = reader[3].ToString();
                        dgvVentas.Rows[iRenglon].Cells["Articulos Comprados"].Value = sValor.Trim();

                        sValor = reader[4].ToString();
                        dgvVentas.Rows[iRenglon].Cells["FechaVenta"].Value = sValor.Trim();

                        sValor = reader[5].ToString();
                        dgvVentas.Rows[iRenglon].Cells["FechaModificacionVenta"].Value = sValor.Trim();

                        iRenglon++;
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "Listado Promoción", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        } 
        
        int iRenglon = 0;
        int i = 0;


        public void fLlenarGridAddArticulo(ref List<CAddArticulo> listaArticulo)
        {
            string SCadenaArticulo = "";
            SCadenaArticulo = cmb_VentaArticulo.SelectedItem.ToString();

            string sCadenaNombre = SCadenaArticulo.Substring(6);
            // MessageBox.Show(Convert.ToString(sCadenaNombre));

            try
            {
                
                for (i = 0; i < listaArticulo.Count; i++)
                {
                    // MessageBox.Show(Convert.ToString(iRenglon));

                    // MessageBox.Show(Convert.ToString(sCadenaNombre + " " + iRenglon));
                    // MessageBox.Show(Convert.ToString(listaArticulo[i].sDescripcion+ " " + iRenglon));
                    if (iRenglon < 7){

                        dgvAddArticulos.Rows.Add();

                        // iTotalArticulos = Convert.ToInt32( listaArticulo[i].iCantidad.ToString());

                        dPrecio = Convert.ToDecimal( listaArticulo[i].dPrecio.ToString("###,###,###,###,##.00")) * (1 + (dTasaFinanciamiento * iPlazoMaximo) / 100);
                        dImporte = dPrecio * listaArticulo[i].iCantidad;
                        
                        dgvAddArticulos.Rows[iRenglon].Cells["Descripcion Articulo"].Value = listaArticulo[i].sDescripcion.ToString();
                        dgvAddArticulos.Rows[iRenglon].Cells["Modelo"].Value = listaArticulo[i].sModelo.ToString();
                        dgvAddArticulos.Rows[iRenglon].Cells["Cantidad"].Value = listaArticulo[i].iCantidad.ToString();
                        dgvAddArticulos.Rows[iRenglon].Cells["Precio"].Value = dPrecio.ToString("###,###,###,###,##.00");
                        dgvAddArticulos.Rows[iRenglon].Cells["Importe"].Value = dImporte.ToString("###,###,###,###,##.00");


                        dEnganche = Convert.ToDecimal((iEnganchePorcentaje * 0.01)) * (Convert.ToDecimal( dgvAddArticulos.Rows.Cast<DataGridViewRow>().Sum(t => Convert.ToDecimal(t.Cells[4].Value))));

                        dBonificacionEnganche = dEnganche  * ((dTasaFinanciamiento * iPlazoMaximo) / 100);
                        dTotalAdeudo = Convert.ToDecimal(dgvAddArticulos.Rows.Cast<DataGridViewRow>().Sum(t => Convert.ToDecimal(t.Cells[4].Value))) - dEnganche - dBonificacionEnganche;
                        dPrecioAlContado = dTotalAdeudo / (1 + ((dTasaFinanciamiento * iPlazoMaximo) / 100));

                        txt_VentasEnganche.Text = Convert.ToString(Math.Round( dEnganche,2).ToString("###,###,###,###,##.00"));
                        txt_VentaBoniEng.Text = Convert.ToString(Math.Round(dBonificacionEnganche,2).ToString("###,###,###,###,##.00"));
                        txt_VentaTotal.Text = Convert.ToString(Math.Round(dTotalAdeudo,2).ToString("###,###,###,###,##.00"));

                        

                        // MessageBox.Show(Convert.ToString(iRenglon));
                        //MessageBox.Show(Convert.ToString(dgvAddArticulos.Rows[iRenglon].Cells["Descripcion Articulo"].Value + " " + iRenglon));
                        iRenglon++;


                        // iTotalArticulos = dgvAddArticulos.Rows.Cast<DataGridViewRow>().Sum(t => Convert.ToInt32(t.Cells[2].Value));
                        
                        iTotalArticulos = 0;

                        for (int z = 0; z < dgvAddArticulos.Rows.Count; ++z)
                        {

                            iTotalArticulos +=  Convert.ToInt32(dgvAddArticulos.Rows[z].Cells[2].Value);
                        }

                        // DataGridViewRow dgvr = (DataGridViewRow) dgvAddArticulos.CurrentRow.Clone();
                        // dgvr.Cells[0].Value = listaArticulo[i].sDescripcion.ToString().Clone();
                        // dgvr.Cells[1].Value = listaArticulo[i].sModelo.ToString().Clone();
                        // dgvr.Cells[2].Value = listaArticulo[i].iCantidad.ToString().Clone();
                        // dgvr.Cells[3].Value = listaArticulo[i].dPrecio.ToString("###,###,###,###,##.00").Clone();
                        // dgvr.Cells[4].Value = listaArticulo[i].dImporte.ToString("###,###,###,###,##.00").Clone();

                        // dgvAddArticulos.Rows.Add(dgvr);

                    }else{
                        MessageBox.Show("No Se Puede Agregar el Mismo Articulo", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                    }          
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Warning);
            }
        }

        int iRenglonAbonos = 0;
        int x = 3;
        public void fLlenarGridAbonosMensuales()
        {
            String sAbonos = "Abonos de";
            String sTotalAPagar = "Total A Pagar";
            String sSeAhorra = "Se Ahorra";

            try
            {
                
                for (x = 3; x <= iPlazoMaximo; x += 3)
                {

                    // MessageBox.Show(Convert.ToString(x));
                    // MessageBox.Show(Convert.ToString(iRenglonAbonos));
                    dgvAbonosMensuales.Rows.Add();  


                    dTotalAPagar = dPrecioAlContado * (1 + (dTasaFinanciamiento * x) / 100);
                    dImporteAbono = dTotalAPagar / x;
                    dImporteAhorra = dTotalAdeudo - dTotalAPagar;

                    dgvAbonosMensuales.Rows[iRenglonAbonos].Cells["Periodo de Abonos"].Value = x + " " + sAbonos ;
                    dgvAbonosMensuales.Rows[iRenglonAbonos].Cells["Importe Abono"].Value = Math.Round(dImporteAbono,2).ToString("###,###,###,###,##.00");
                    dgvAbonosMensuales.Rows[iRenglonAbonos].Cells["Total a Pagar"].Value = sTotalAPagar + " " + Math.Round(dTotalAPagar,2).ToString("###,###,###,###,##.00");
                    dgvAbonosMensuales.Rows[iRenglonAbonos].Cells["Se Ahorra"].Value = sSeAhorra + " " + Math.Round(dImporteAhorra,2).ToString("###,###,###,###,##.00");

                    iRenglonAbonos++;



                }
            }catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Warning);
            }
        }       

        
        public void fLlenarClientes(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "";
            string sTexto = "";

            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_ventas 0, 0, 0, 0, 0, 0, 0, 6");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    // if(reader.FieldCount > 0){
                    //     cmb_LocacionNom.Items.Add(" ");
                    // }
                    while(reader.Read()){
                        sTexto = reader[0].ToString() + " - " + reader[1].ToString();
                        cmb_VentaCliente.Items.Add(sTexto); 
                        cmb_VentaClienteFrm.Items.Add(sTexto);
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

        public void fLlenarArticulos(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "";
            string sTexto = "";

            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_ventas 0, 0, 0, 0, 0, 0, 0, 7");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    // if(reader.FieldCount > 0){
                    //     cmb_LocacionNom.Items.Add(" ");
                    // }
                    while(reader.Read()){
                        sTexto = reader[0].ToString() + " - " + reader[1].ToString();
                        cmb_VentaArticulo.Items.Add(sTexto); 
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

        public void fObtenerNombreLocacion(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "";
            string sTexto = "";
            sTexto = cmb_VentaCliente.SelectedItem.ToString().Substring(0,cmb_VentaCliente.SelectedItem.ToString().IndexOf('-')).Trim();;

            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_ventas 0, {0}, 0, 0, 0, 0, 0, 8",Convert.ToInt32(sTexto));
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    // if(reader.FieldCount > 0){
                    //     cmb_LocacionNom.Items.Add(" ");
                    // }
                    while(reader.Read()){
                        lbl_VentasGetLocacion.Text = reader["des_locacion"].ToString();
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

        public void fObtenerConfiguracion(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "";

            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_ventas 0, 0, 0, 0, 0, 0, 0, 10");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    // if(reader.FieldCount > 0){
                    //     cmb_LocacionNom.Items.Add(" ");
                    // }
                    while(reader.Read()){
                        dTasaFinanciamiento = Convert.ToDecimal(reader["num_tasafinanciamiento"].ToString());
                        iPlazoMaximo = Convert.ToInt32(reader["num_plazomaximo"].ToString());
                        iEnganchePorcentaje = Convert.ToInt32(reader["num_enganche"].ToString());
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

       
        public void fLimpiarGridVentas(){
            dgvVentas.Rows.Clear();
        }

        public void flimpiarGridArticulos(){
            dgvAddArticulos.Rows.Clear();
            iRenglon = 0;
        }
    }
}
 

