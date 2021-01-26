using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.Odbc;
using System.Data;

namespace ABCExhibicion
{
    public partial class FrmCliente
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

            dgvCliente.Columns.Add(colText);
        }

        private bool fCrearGridCliente(){
            bool bRegresa = true;
            dgvCliente.RowHeadersVisible = false;
            dgvCliente.AllowUserToAddRows = false;
            dgvCliente.AllowUserToResizeColumns = false;
            dgvCliente.AllowUserToDeleteRows= false;

            fPonerColBod("Num Cliente", "Num Cliente", 60, 1, true, 2, true, false, "");
            fPonerColBod("Locacion", "Locacion", 60, 2, true, 2, true, true, "");
            fPonerColBod("Nombre", "Nombre", 70, 3, true, 2, true, true, "");
            fPonerColBod("Tipo Cliente", "Tipo Cliente", 100, 4, true, 2, true, true, "");
            fPonerColBod("Articulos Comprados", "Articulos Comprados", 60, 5, true, 2, true, false, "");
            fPonerColBod("Total Veces Compra", "Total Veces Compra", 60, 6, true, 2, true, false, "");
            fPonerColBod("Total Compra Gneral", "Total Compra Gneral", 60, 7, true, 2, true, false, "");
            fPonerColBod("Regalo", "Regalo", 100, 8, true, 2, true, true, "");

            return bRegresa;
        }

        public void fLlenarGridCliente(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "", sValor = "";
            int iRenglon = 0;


            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_abclientes 0, 0,'',5");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    while(reader.Read()){
                        dgvCliente.Rows.Add();

                        sValor = reader[0].ToString();
                        dgvCliente.Rows[iRenglon].Cells["Num Cliente"].Value = sValor.Trim();

                        sValor = reader[1].ToString();
                        dgvCliente.Rows[iRenglon].Cells["Locacion"].Value = sValor.Trim();

                        sValor = reader[2].ToString();
                        dgvCliente.Rows[iRenglon].Cells["Nombre"].Value = sValor.Trim();

                        sValor = reader[3].ToString();
                        dgvCliente.Rows[iRenglon].Cells["Tipo Cliente"].Value = sValor.Trim();

                        sValor = reader[4].ToString();
                        dgvCliente.Rows[iRenglon].Cells["Articulos Comprados"].Value = sValor.Trim();

                        sValor = reader[5].ToString();
                        dgvCliente.Rows[iRenglon].Cells["Total Veces Compra"].Value = sValor.Trim();

                        sValor = reader[6].ToString();
                        dgvCliente.Rows[iRenglon].Cells["Total Compra Gneral"].Value = sValor.Trim();

                        sValor = reader[7].ToString();
                        dgvCliente.Rows[iRenglon].Cells["Regalo"].Value = sValor.Trim();

                        iRenglon++;
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "Listado Promoción", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

        public void fLlenarLocaciones(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "";
            string sTexto = "";

            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_abclientes 0, 0,'',6");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    // if(reader.FieldCount > 0){
                    //     cmb_LocacionNom.Items.Add(" ");
                    // }
                    while(reader.Read()){
                        sTexto = reader[0].ToString() + " - " + reader[1].ToString();
                        cmb_LocacionNom.Items.Add(sTexto); 
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

        public void fLimpiarGridCliente(){
            dgvCliente.Rows.Clear();
        }
    }
}
