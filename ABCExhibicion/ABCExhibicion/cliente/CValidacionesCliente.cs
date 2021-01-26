using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace ABCExhibicion
{
    public partial class FrmCliente
    {
        public bool validarGrabar()
        {
            bool bRegresa = false;
            string sObtenerLocacionid = "";
            int iClienteid;
            //int iLocacionid;
            string sClienteNom = "";

            iClienteid = Convert.ToInt32(txt_ClienteNum.Text);
            //iLocacionid =Convert.ToInt32( cmb_LocacionNom.Text);
            sClienteNom = txt_ClienteNom.Text;
            sObtenerLocacionid = cmb_LocacionNom.SelectedItem.ToString().Substring(0,cmb_LocacionNom.SelectedItem.ToString().IndexOf('-')).Trim();

            bRegresa = CAccesoDatos.GrabarCliente(iClienteid, Convert.ToInt32(sObtenerLocacionid), sClienteNom);
            
            return bRegresa;
        }

        public bool validarModificar()
        {
            bool bRegresa = false;
            string sObtenerLocacionid = "";

            int iClienteid;
            //int iLocacionid;
            string sClienteNom = "";

            iClienteid = Convert.ToInt32(txt_ClienteNum.Text);
            //iLocacionid =Convert.ToInt32( cmb_LocacionNom.Text);
            sClienteNom = txt_ClienteNom.Text;
            sObtenerLocacionid = cmb_LocacionNom.SelectedItem.ToString().Substring(0,cmb_LocacionNom.SelectedItem.ToString().IndexOf('-')).Trim();



            bRegresa = CAccesoDatos.ModificarCliente(iClienteid, Convert.ToInt32(sObtenerLocacionid), sClienteNom);
            if(bRegresa){
                btn_ModificarClick = true;
                fLimpiarCampos();
                fAtributosModificarEliminar();

            }
            
            return bRegresa;
        }

        public bool validarBuscar(ref List<CCliente> listaCliente)
        {
            bool bRegresa = false;
            string sClienteid = "";
            sClienteid = txt_ClienteNum.Text;

            if(!string.IsNullOrEmpty(sClienteid)){
                if(CAccesoDatos.BuscarCliente(sClienteid, ref listaCliente)){
                    btn_ConsultarClick = true;
                    bRegresa = true;
                    fAtributosConsultar();
                }
                btn_ConsultarClick = false;

            }else{
                MessageBox.Show("Favor de capturar un numero", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                bRegresa = false;
                btn_ConsultarClick = false;
                txt_ClienteNum.Focus();
            }


            return bRegresa;
        }

        public bool validarEliminar()
        {
            bool bRegresa = false;
            int iclienteid = 0;
            string sClienteNom = "";
            iclienteid = Convert.ToInt32(txt_ClienteNum.Text);
            sClienteNom = txt_ClienteNom.Text;


            if(MessageBox.Show("¿Desea Eliminar El cliente: " + iclienteid + " - " + sClienteNom, "ABCExhibicion", MessageBoxButtons.YesNo, MessageBoxIcon.Information) == DialogResult.Yes){
                CAccesoDatos.EliminarCliente(iclienteid);
                bRegresa = true;
                btn_EliminarClick = true;
                fLimpiarCampos();
                fAtributosModificarEliminar();
            }
            
            return bRegresa;
        }

        public bool ValidarNumeroCliente()
        {
            bool bRegresa = true;

            if (txt_ClienteNum.TextLength < 8 )
            {
                MessageBox.Show("El numero de Cliente Menor de 8 digitos","ABC Empleados",MessageBoxButtons.OK,MessageBoxIcon.Information);
                bRegresa = false;
            }

            return bRegresa;
        }
    }
}
