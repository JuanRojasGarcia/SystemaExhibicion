using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace ABCExhibicion
{
    public partial class FrmLocaciones : Form
    {

        //Variables bool para Cambiar los atributos de los controls 
        public bool btn_ModificarClick = false;
        public bool btn_EliminarClick = false;
        public bool btn_ConsultarClick = false;

        public FrmLocaciones()
        {
            InitializeComponent();
            fMostrarLocaciones();
            fConfiguracionControles();          
        }
        public void fMostrarLocaciones()
        {
            fCrearGridLocacion();    
            fLlegarGridLocacion();                      
        }

        private void btn_Agregar_Click(object sender, EventArgs e)
        {          
            if(txt_LocacionNum.Text != "" && txt_LocacionMunicipio.Text != "" && txt_Locacion.Text != ""){
                bool bRegresa = false;
                // bool bRegresaNum = true;

                // bRegresaNum = ValidarNumeroCentro();

                // if(bRegresaNum){
                //    bRegresa = validarGrabar();
                // }
                bRegresa = validarGrabar();
                if(bRegresa){
                    //btn_AgregarClick = true;
                    fLimpiarCampos();
                    fLimpiarGridLocacion();
                    fLlegarGridLocacion(); 
                }
            }else{
                MessageBox.Show("Ingresa Todos Los Datos", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
  

            // if (txt_CenNum.Text != "" && txt_CentroNom.Text != "" )
            //     {
                                                
            //         con.Open();
            //         cmd = new SqlCommand("proc_abcentros", con);
            //         cmd.CommandType = CommandType.StoredProcedure;
            //         cmd.Parameters.AddWithValue("@iCentroid", txt_CenNum.Text);
            //         cmd.Parameters.AddWithValue("@cCentroNom", txt_CentroNom.Text);
            //         cmd.Parameters.AddWithValue("@iOpcion", 1);
                    
            //         SqlDataReader reader = cmd.ExecuteReader();
            //         reader.Read();
            //             if(Convert.ToInt32(reader["Error"]) == 1){
            //                 MessageBox.Show("Codigo Centro Existente");
            //                 con.Close();
            //             }else{
            //                 cmd.Parameters.Clear();
            //                 con.Close();

            //                 btn_AgregarClick = true;
                
            //                 fLimpiarCamposCentros();
            //                 //fMostrarCentros();  
            //             }                              
                            
            //     }
            //     else {
            //         MessageBox.Show("Ingrese todos los atributos");
            //     }

        }

        private void btn_Modificar_Click(object sender, EventArgs e)
        {            
            string sLocacionid = "";
            sLocacionid = txt_LocacionNum.Text;
            
            if(!string.IsNullOrEmpty(sLocacionid)){
                validarModificar();
                fLimpiarGridLocacion();
                fLlegarGridLocacion(); 
            }else{
                MessageBox.Show("Captura Numero de Centro", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                txt_LocacionNum.Focus();
            }

            // if (txt_CenNum.Text != "")
            // {
            //     con.Open();
            //     cmd = new SqlCommand("proc_abcentros", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iCentroid", txt_CenNum.Text);
            //     cmd.Parameters.AddWithValue("@cCentroNom", txt_CentroNom.Text);
            //     cmd.Parameters.AddWithValue("@iOpcion", 2);
            //     cmd.ExecuteNonQuery();
            //     cmd.Parameters.Clear();
            //     con.Close();

            //     btn_ModificarClick = true;

            //     fLimpiarCamposCentros();
            //     //fMostrarCentros();
            //     fAtributosModificarEliminar();
            // }
            // else
            // {
            //     MessageBox.Show("Ingrese el Codigo del Centro");
            // }
        }

        private void btn_Eliminar_Click(object sender, EventArgs e)
        {
            bool bRegresa = false;
            string sLocacionid = "";
            sLocacionid = txt_LocacionNum.Text;
            
            if(!string.IsNullOrEmpty(sLocacionid)){
                bRegresa = validarEliminar();
                
            }else{
                MessageBox.Show("Captura Numero de Locacion", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                txt_LocacionNum.Focus();
            }

            if(bRegresa){
                fLimpiarCampos();
                fLimpiarGridLocacion();
                fLlegarGridLocacion(); 
            }
            // if (txt_CenNum.Text != "")
            // {
            //     con.Open();
            //     cmd = new SqlCommand("proc_abcentros", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iCentroid", txt_CenNum.Text);
            //     cmd.Parameters.AddWithValue("@cCentroNom", "");
            //     cmd.Parameters.AddWithValue("@iOpcion", 3);
            //     cmd.ExecuteNonQuery();
            //     cmd.Parameters.Clear();
            //     con.Close();

            //     btn_EliminarClick = true;

            //     fLimpiarCamposCentros();
            //     //fMostrarCentros();
            //     fAtributosModificarEliminar();
            // }
            // else
            // {
            //     MessageBox.Show("Ingrese el Codigo del Centro");
            // }


        }

        private void btn_Consultar_Click(object sender, EventArgs e)
        {
            bool bRegresa = false;
            List<CLocacion> listaLocaciones = new List<CLocacion>();
            bRegresa = validarBuscar(ref listaLocaciones);

            if(bRegresa){
                txt_LocacionMunicipio.Text = listaLocaciones[0].sMunicipio;
                txt_Locacion.Text = listaLocaciones[0].sLocacion;
            }

            // if (txt_CenNum.Text != "") {

            //     con.Open();
            //     cmd = new SqlCommand("proc_abcentros", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iCentroid", txt_CenNum.Text);
            //     cmd.Parameters.AddWithValue("@cCentroNom", "");
            //     cmd.Parameters.AddWithValue("@iOpcion", 4);

            //         SqlDataReader reader = cmd.ExecuteReader();

            //         if (reader.Read())
            //         {
            //             txt_CentroNom.Text = reader[1].ToString();


            //             cmd.Parameters.Clear();
            //             con.Close();

            //             btn_ConsultarClick = true;
 
            //         }else {
            //             MessageBox.Show("Codigo Centro no Existe");
            //             btn_ConsultarClick = false;
                        
            //         }
            //         con.Close();
                
                   
            // }else{
            //     MessageBox.Show("Ingrese el Codigo del Centro");
            // }

        }

        #region Funciones Para Modificar Los Atributos de Los Controles

        public void fConfiguracionControles()
        {
            txt_LocacionMunicipio.Enabled = false;
            txt_LocacionNum.Enabled = false;
            txt_Locacion.Enabled = false;

            btn_Agregar.Visible = false;
            btn_Consultar.Visible = false;
            btn_Eliminar.Visible = false;
            btn_Modificar.Visible = false;
      
        }

        public void fAtributosConsultar()
        {                       
            if (btn_ConsultarClick == true && rdb_ModificarCentro.Checked == true)
            {
                txt_LocacionNum.Enabled = false;
                txt_LocacionMunicipio.Enabled = true;
                txt_Locacion.Enabled = true;


                btn_Modificar.Visible = true;
            }
            if (btn_ConsultarClick == true && rdb_EliminarCentro.Checked == true)
            {
                txt_LocacionMunicipio.Enabled = false;
                txt_Locacion.Enabled = false;

                btn_Eliminar.Visible = true;
            }
        }

        public void fAtributosModificarEliminar()
        {
            if (btn_ModificarClick == true)
            {

                txt_LocacionNum.Enabled = true;
                txt_LocacionMunicipio.Enabled = false;
                txt_Locacion.Enabled = false;

                btn_Modificar.Visible = false;
                btn_Consultar.Visible = true;
            }

            if (btn_EliminarClick == true)
            {
                txt_LocacionNum.Enabled = true;
                txt_LocacionMunicipio.Enabled = false;
                txt_Locacion.Enabled = false;

                btn_Consultar.Visible = true;
                btn_Eliminar.Visible = false;
            }        
        }

        public void fHabilitarAtributosRdb()
        {

            if (rdb_AgregarCentro.Checked == true)
            {
                txt_LocacionNum.Enabled = true;
                txt_LocacionMunicipio.Enabled = true;
                txt_Locacion.Enabled = true;


                btn_Agregar.Visible = true;
                btn_Consultar.Visible = false;
                btn_Eliminar.Visible = false;
                btn_Modificar.Visible = false;

                rdb_EliminarCentro.Checked = false;
                rdb_ModificarCentro.Checked = false;

                fLimpiarCampos();

            }

            if (rdb_ModificarCentro.Checked == true)
            {
                txt_LocacionNum.Enabled = true;
                txt_LocacionMunicipio.Enabled = false;
                txt_Locacion.Enabled = false;

                btn_Consultar.Visible = true;
                btn_ConsultarClick = false;
                btn_Agregar.Visible = false;
                btn_Eliminar.Visible = false;
                btn_Modificar.Visible = false;

                rdb_AgregarCentro.Checked = false;
                rdb_EliminarCentro.Checked = false;

                fLimpiarCampos();
            }

            if (rdb_EliminarCentro.Checked == true) {

                txt_LocacionNum.Enabled = true;
                txt_LocacionMunicipio.Enabled = false;
                txt_Locacion.Enabled = false;


                btn_Consultar.Visible = true;
                btn_ConsultarClick = false;
                btn_Agregar.Visible = false;
                btn_Eliminar.Visible = false;
                btn_Modificar.Visible = false;

                rdb_AgregarCentro.Checked = false;
                rdb_ModificarCentro.Checked = false;

                fLimpiarCampos();
            }
        }

        #endregion

        public void fLimpiarCampos()
        {
            txt_LocacionNum.Text = "";
            txt_LocacionMunicipio.Text = "";
            txt_Locacion.Text = "";
        } 

        private void rdb_AgregarCentro_CheckedChanged(object sender, EventArgs e)
        {
            fHabilitarAtributosRdb();
        }

        private void rdb_ModificarCentro_CheckedChanged(object sender, EventArgs e)
        {
            fHabilitarAtributosRdb();
        }

        private void rdb_EliminarCentro_CheckedChanged(object sender, EventArgs e)
        {
            fHabilitarAtributosRdb();
        }
        





        private void btn_CentrosRegresar_Click(object sender, EventArgs e)
        {
            this.Hide();
            FrmVentas formexhibicion = new FrmVentas();
            formexhibicion.StartPosition = FormStartPosition.CenterScreen;
            formexhibicion.ShowDialog(this);
            formexhibicion.Dispose();
            formexhibicion = null;
            this.Close();
        }



        private void txt_LocacionNum_TextChanged(object sender, EventArgs e)
        {
            txt_LocacionNum.Text = CValidacionesGenerales.ValidarNumero(txt_LocacionNum.Text, txt_LocacionNum);
        }

        private void txt_LocacionMunicipio_TextChanged(object sender, EventArgs e)
        {
            txt_LocacionMunicipio.Text = CValidacionesGenerales.ValidarString(txt_LocacionMunicipio.Text, txt_LocacionMunicipio);
        }

        private void txt_Locacion_TextChanged(object sender, EventArgs e)
        {
            txt_Locacion.Text = CValidacionesGenerales.ValidarString(txt_Locacion.Text, txt_LocacionMunicipio);
        }

        private void FrmLocaciones_Load(object sender, EventArgs e)
        {
            fConfiguracionControles();  
        }

        
        
        

       

    }
}

