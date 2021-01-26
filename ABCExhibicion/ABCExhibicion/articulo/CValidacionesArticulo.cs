using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.Odbc;
using System.Data;

namespace ABCExhibicion
{
    public partial class FrmArticulos
    {
        public bool validarGrabar()
        {
            bool bRegresa = false;
            int iArticuloid;
            string sArticuloNom = "";
            string sModelo ="";
            string sMarca = "";
            decimal dPrecio;
            int iExistencia;

            iArticuloid = Convert.ToInt32(txt_iduarticulo.Text);
            sArticuloNom = txt_nombre.Text;
            sModelo = txt_Modelo.Text;
            sMarca = txt_Marca.Text;
            dPrecio =Convert.ToDecimal( txt_Precio.Text);
            iExistencia = Convert.ToInt32( txt_Stock.Text);

            bRegresa = CAccesoDatos.GrabarArticulo(iArticuloid, sArticuloNom, sModelo, sMarca, dPrecio,iExistencia);
            
            return bRegresa;
        }

        public bool validarModificar()
        {
            bool bRegresa = false;
            int iArticuloid;
            string sArticuloNom = "";
            string sModelo ="";
            string sMarca = "";            
            decimal dPrecio;
            int iExistencia;

            iArticuloid = Convert.ToInt32(txt_iduarticulo.Text);
            sArticuloNom = txt_nombre.Text;
            sModelo = txt_Modelo.Text;
            sMarca = txt_Marca.Text;            
            dPrecio =Convert.ToDecimal( txt_Precio.Text);
            iExistencia = Convert.ToInt32( txt_Stock.Text);


            bRegresa = CAccesoDatos.ModificarArticulo(iArticuloid, sArticuloNom, sModelo, sMarca, dPrecio, iExistencia);
            if(bRegresa){
                btn_ModificarClick = true;
                fLimpiarCampos();
                fAtributosModificarEliminar();

            }
            
            return bRegresa;
        }

        public bool validarBuscar(ref List<CArticulo> listaArticulos)
        {
            bool bRegresa = false;
            string sArticuloid = "";
            sArticuloid = txt_iduarticulo.Text;

            if(!string.IsNullOrEmpty(sArticuloid)){
                if(CAccesoDatos.BuscarArticulo(sArticuloid, ref listaArticulos)){
                    btn_ConsultarClick = true;
                    bRegresa = true;
                    fAtributosConsultar();
                }
                btn_ConsultarClick = false;

            }else{
                MessageBox.Show("Favor de capturar un numero", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                bRegresa = false;
                btn_ConsultarClick = false;
                txt_iduarticulo.Focus();
            }


            return bRegresa;
        }

        public bool validarEliminar()
        {
            bool bRegresa = false;
            int sArticuloid = 0;

            sArticuloid = Convert.ToInt32(txt_iduarticulo.Text);

            if(MessageBox.Show("¿Desea Eliminar El Articulo: " + sArticuloid, "ABCExhibicion", MessageBoxButtons.YesNo, MessageBoxIcon.Information) == DialogResult.Yes){
                CAccesoDatos.EliminarArticulo(sArticuloid);
                bRegresa = true;
                btn_EliminarClick = true;
                fLimpiarCampos();
                fAtributosModificarEliminar();
            }
            
            return bRegresa;
        }

        public bool ValidarNumeroArticulo()
        {
            bool bRegresa = true;

            if (txt_iduarticulo.TextLength < 3)
            {
                MessageBox.Show("El numero de Centro Menor 3 digitos","ABC Empleados",MessageBoxButtons.OK,MessageBoxIcon.Information);
                bRegresa = false;
            }

            return bRegresa;
        }
    }
}
