using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.Odbc;

namespace ABCExhibicion
{
    public partial class Ventas
    {
        public bool validarGrabar()
        {
            bool bRegresa = false;
            
            CAddArticulo listaVenta = new CAddArticulo();
            string sObtenerClientes = "";
            decimal iTotalVenta;
            // int iArticulosComprados = 0;
            dtFechaHoy = DateTime.Now.ToString("MM/dd/yyyy H:mm");      
            // iArticulosComprados = Convert.ToInt32(listaVenta.iCantidad.ToString());
            // string sFechaModificacion = "";


            sObtenerClientes = cmb_VentaCliente.SelectedItem.ToString().Substring(0,cmb_VentaCliente.SelectedItem.ToString().IndexOf('-')).Trim();
            iTotalVenta = Convert.ToDecimal(txt_VentaTotal.Text);

            bRegresa = CAccesoDatos.GrabarVenta(Convert.ToInt32(sObtenerClientes), iTotalVenta, iTotalArticulos, dtFechaHoy);
            
            return bRegresa;
        }

        public bool validarModificar()
        {
            bool bRegresa = false;
            
            string sObtenerClientes = " ";
            decimal dTotalVenta;  
            int iVentaid = 0;


            dTotalVenta = Convert.ToDecimal(txt_TotalVenta.Text);
            sObtenerClientes = cmb_VentaClienteFrm.SelectedItem.ToString().Substring(0,cmb_VentaClienteFrm.SelectedItem.ToString().IndexOf('-')).Trim();
            iVentaid = Convert.ToInt32( txt_Codigo.Text);
            dtFechaHoy = DateTime.Now.ToString("MM/dd/yyyy H:mm"); 




            bRegresa = CAccesoDatos.ModificarVenta( iVentaid, Convert.ToInt32(sObtenerClientes), dTotalVenta, dtFechaHoy);
            if(bRegresa){
                btn_ModificarClick = true;
                fLimpiarCamposVentas();
                fAtributosModificarEliminar();

            }
            
            return bRegresa;
        }

        public bool validarBuscar(ref List<CVenta> listaVenta)
        {
            bool bRegresa = false;
            string sVentaid = "";
            sVentaid = txt_Codigo.Text;

            if(!string.IsNullOrEmpty(sVentaid)){
                if(CAccesoDatos.BuscarVenta(sVentaid, ref listaVenta)){
                    btn_ConsultarClick = true;
                    bRegresa = true;
                    fAtributosConsultar();
                }
                btn_ConsultarClick = false;

            }else{
                MessageBox.Show("Favor de capturar un numero", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                bRegresa = false;
                btn_ConsultarClick = false;
                txt_Codigo.Focus();
            }


            return bRegresa;
        }

        public bool validarBuscarArticulo(ref List<CAddArticulo> listaArticulo)
        {
            bool bRegresa = false;
            string sArticuloid = "";
            sArticuloid = cmb_VentaArticulo.SelectedItem.ToString().Substring(0,cmb_VentaArticulo.SelectedItem.ToString().IndexOf('-')).Trim();

            if(!string.IsNullOrEmpty(sArticuloid)){
                if(CAccesoDatos.BuscarArticulo(sArticuloid, ref listaArticulo)){
                    btn_ConsultarClick = true;
                    bRegresa = true;
                    fAtributosConsultar();
                }
                btn_ConsultarClick = false;

            }else{
                MessageBox.Show("Favor de capturar un numero", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                bRegresa = false;
                btn_ConsultarClick = false;
                txt_Codigo.Focus();
            }


            return bRegresa;
        }

        public bool validarEliminar()
        {
            bool bRegresa = false;
            int iVentaid = 0;
            iVentaid = Convert.ToInt32(txt_Codigo.Text);


            if(MessageBox.Show("¿Desea Eliminar El cliente: " + iVentaid , "ABCExhibicion", MessageBoxButtons.YesNo, MessageBoxIcon.Information) == DialogResult.Yes){
                CAccesoDatos.EliminarVenta(iVentaid);
                bRegresa = true;
                btn_EliminarClick = true;
                fLimpiarCamposVentas();
                fAtributosModificarEliminar();
            }
            
            return bRegresa;
        }


    }
}
