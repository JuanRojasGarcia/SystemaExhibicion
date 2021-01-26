using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.Odbc;

namespace ABCExhibicion
{
    public partial class Configuracion
    {

        public bool validarModificar()
        {
            bool bRegresa = false;

            int iPlazoMaximo;

            iPlazoMaximo = Convert.ToInt32(numupdown_PlazoMaximo.Value);


            bRegresa = CAccesoDatos.ModificarConfiguracion(1, 0, 0, iPlazoMaximo);
                        
            return bRegresa;
        }

        public void fActualizarPlazoMaximoActual(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "";


            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_abconfiguracion 1, 0, 0, 0, 3");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    while(reader.Read()){

                        lbl_ConfPlazoActual.Text = reader["num_plazomaximo"].ToString();
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "Listado Promoción", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }

        public void fObtenerConfiguracion(){
            OdbcConnection odbcSql = new OdbcConnection();
            OdbcDataReader reader;
            string sComandoSQL = "";


            try{
                if(CAccesoDatos.abreconexionSql(odbcSql)){
                    sComandoSQL = string.Format("EXECUTE ComprasMuebles.dbo.proc_abconfiguracion 1, 0, 0, 0, 2");
                    reader = CAccesoDatos.ejecutarconsulta(sComandoSQL, odbcSql);
                    while(reader.Read()){
                        txt_Enganche.Text = reader["num_enganche"].ToString();
                        txt_tasaFinanciamiento.Text = reader["num_tasafinanciamiento"].ToString();
                        lbl_ConfPlazoActual.Text = reader["num_plazomaximo"].ToString();
                    }
                    reader.Close();
                }
                CAccesoDatos.cierraconexionSql(odbcSql);

            }catch(Exception ex){
                MessageBox.Show(ex.Message, "Listado Promoción", MessageBoxButtons.OK, MessageBoxIcon.Warning);

            }
        }
    }
}
