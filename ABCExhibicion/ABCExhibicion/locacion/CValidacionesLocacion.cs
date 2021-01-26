using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data;
using System.Data.SqlClient;

namespace ABCExhibicion
{
    public partial class FrmLocaciones
    {

        public bool validarGrabar()
        {
            bool bRegresa = false;
            int iLocacionid;
            string sMunicipio = "";
            string sLocacion = "";

            iLocacionid = Convert.ToInt32(txt_LocacionNum.Text);
            sMunicipio = txt_LocacionMunicipio.Text;
            sLocacion = txt_Locacion.Text;

            bRegresa = CAccesoDatos.GrabarLocacion(iLocacionid, sMunicipio,sLocacion);
            
            return bRegresa;
        }

        public bool validarModificar()
        {
            bool bRegresa = false;
            int iLocacionid = 0;
            string sMunicipio = " ";
            string sLocacion = "";

            iLocacionid = Convert.ToInt32(txt_LocacionNum.Text);
            sMunicipio = txt_LocacionMunicipio.Text;
            sLocacion = txt_Locacion.Text;


            bRegresa = CAccesoDatos.ModificarLocacion(iLocacionid, sMunicipio, sLocacion);
            if(bRegresa){
                btn_ModificarClick = true;
                fLimpiarCampos();
                fAtributosModificarEliminar();

            }
            
            return bRegresa;
        }

        public bool validarBuscar(ref List<CLocacion> listaLocacion)
        {
            bool bRegresa = false;
            string sLocacionid = "";
            sLocacionid = txt_LocacionNum.Text;

            if(!string.IsNullOrEmpty(sLocacionid)){
                if(CAccesoDatos.BuscarLocacion(sLocacionid, ref listaLocacion)){
                    btn_ConsultarClick = true;
                    bRegresa = true;
                    fAtributosConsultar();
                }
                btn_ConsultarClick = false;

            }else{
                MessageBox.Show("Favor de capturar un numero", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                bRegresa = false;
                btn_ConsultarClick = false;
                txt_LocacionNum.Focus();
            }


            return bRegresa;
        }

        public bool validarEliminar()
        {
            bool bRegresa = false;
            int iLocacionid = 0;

            iLocacionid = Convert.ToInt32(txt_LocacionNum.Text);

            if(MessageBox.Show("¿Desea Eliminar la Locacion: " + iLocacionid, "ABCExhibicion", MessageBoxButtons.YesNo, MessageBoxIcon.Information) == DialogResult.Yes){
                CAccesoDatos.EliminarLocacion(iLocacionid);
                bRegresa = true;
                btn_EliminarClick = true;
                fLimpiarCampos();
                fAtributosModificarEliminar();
            }
            
            return bRegresa;
        }

        // public bool ValidarNumeroLocacion()
        // {
        //     bool bRegresa = true;

        //     if (txt_LocacionNum.TextLength < 6 || txt_LocacionNum.TextLength > 6)
        //     {
        //         MessageBox.Show("El numero de Centro Menor o mayor a 6 digitos","ABC Empleados",MessageBoxButtons.OK,MessageBoxIcon.Information);
        //         bRegresa = false;
        //     }

        //     return bRegresa;
        // }
    }

}


