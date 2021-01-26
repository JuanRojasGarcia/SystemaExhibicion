using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.Odbc;

namespace ABCExhibicion
{
    public partial class FrmLocaciones
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

            dgvLocacion.Columns.Add(colText);
        }

        private bool fCrearGridLocacion(){
            bool bRegresa = true;
            dgvLocacion.RowHeadersVisible = false;
            dgvLocacion.AllowUserToAddRows = false;
            dgvLocacion.AllowUserToResizeColumns = false;
            dgvLocacion.AllowUserToDeleteRows= false;

            fPonerColBod("Num Locacion", "Num Locacion", 60, 1, true, 2, true, false, "");
            fPonerColBod("Municipio", "Municipio", 100, 2, true, 2, true, true, "");
            fPonerColBod("Locacion", "Locacion", 100, 3, true, 2, true, true, "");


            return bRegresa;
        }

        public void fLlegarGridLocacion(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "", sValor = "";
            int iRenglon = 0;


            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_abclocaciones 0,'', '',5");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    while(reader.Read()){
                        dgvLocacion.Rows.Add();

                        sValor = reader[0].ToString();
                        dgvLocacion.Rows[iRenglon].Cells["Num Locacion"].Value = sValor.Trim();

                        sValor = reader[1].ToString();
                        dgvLocacion.Rows[iRenglon].Cells["Municipio"].Value = sValor.Trim();

                        sValor = reader[2].ToString();
                        dgvLocacion.Rows[iRenglon].Cells["Locacion"].Value = sValor.Trim();

                        iRenglon++;
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "Listado Promoción", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

        public void fLimpiarGridLocacion(){
            dgvLocacion.Rows.Clear();
        }
    }
}
