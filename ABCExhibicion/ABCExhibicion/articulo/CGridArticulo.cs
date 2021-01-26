using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.Odbc;
using System.Data;


namespace ABCExhibicion
{
    public partial class  FrmArticulos
    {

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

            dgvArticulos.Columns.Add(colText);
        }

        private bool fCrearGridArticulo(){
            bool bRegresa = true;
            dgvArticulos.RowHeadersVisible = false;
            dgvArticulos.AllowUserToAddRows = false;
            dgvArticulos.AllowUserToResizeColumns = false;
            dgvArticulos.AllowUserToDeleteRows= false;

            fPonerColBod("Sku", "Sku", 60, 1, true, 2, true, false, "");
            fPonerColBod("Nombre", "Nombre", 100, 2, true, 2, true, true, "");
            fPonerColBod("Modelo", "Modelo", 100, 3, true, 2, true, true, "");
            fPonerColBod("Marca", "Marca", 100, 1, true, 2, true, true, "");
            fPonerColBod("Precio", "Precio", 60, 2, true, 2, true, false, "");
            fPonerColBod("Existencia", "Existencia", 60, 3, true, 2, true, false, "");



            return bRegresa;
        }

        public void fLlenarGridArticulo(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "", sValor = "";
            int iRenglon = 0;


            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_abcarticulos 0, '', '', '', 0, 0, 5");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    while(reader.Read()){
                        dgvArticulos.Rows.Add();

                        sValor = reader[0].ToString();
                        dgvArticulos.Rows[iRenglon].Cells["Sku"].Value = sValor.Trim();

                        sValor = reader[1].ToString();
                        dgvArticulos.Rows[iRenglon].Cells["Nombre"].Value = sValor.Trim();

                        sValor = reader[2].ToString();
                        dgvArticulos.Rows[iRenglon].Cells["Modelo"].Value = sValor.Trim();

                        sValor = reader[3].ToString();
                        dgvArticulos.Rows[iRenglon].Cells["Marca"].Value = sValor.Trim();

                        sValor = reader[4].ToString();
                        dgvArticulos.Rows[iRenglon].Cells["Precio"].Value = sValor.Trim();

                        sValor = reader[5].ToString();
                        dgvArticulos.Rows[iRenglon].Cells["Existencia"].Value = sValor.Trim();

                        iRenglon++;
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "Listado Promoción", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

        public void fLimpiarGridArticulo(){
            dgvArticulos.Rows.Clear();
        }

    }
}
