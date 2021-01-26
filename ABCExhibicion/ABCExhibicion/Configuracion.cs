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
    public partial class Configuracion : Form
    {
        public Configuracion()
        {
            InitializeComponent();
            fObtenerConfiguracion();
            fConfiguracionControles();
        }

        
        // public void fObtenerConfiguracion()
        // {

        //     con.Open();
        //     DataTable dt = new DataTable();
        //     cmd = new SqlCommand("proc_abconfiguracion", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iConfid", 1);
        //     cmd.Parameters.AddWithValue("@iConfTasaFinanciamiento", 0);
        //     cmd.Parameters.AddWithValue("@iConfEnganche", 0);
        //     cmd.Parameters.AddWithValue("@iConfPlazoMaximo", 0);
        //     cmd.Parameters.AddWithValue("@iOpcion", 2);

        //     SqlDataReader reader = cmd.ExecuteReader();
        //     reader.Read();
       
        //     txt_tasaFinanciamiento.Text = reader["num_tasafinanciamiento"].ToString();
        //     txt_Enganche.Text = reader["num_enganche"].ToString();
        //     lbl_ConfPlazoActual.Text = reader["num_plazomaximo"].ToString();
            
        //     cmd.Parameters.Clear();
        //     con.Close(); 
        // }

        public void fConfiguracionControles()
        {
            txt_tasaFinanciamiento.Enabled = false;
            txt_Enganche.Enabled = false;
                      
        }

        private void btn_ModificarConf_Click(object sender, EventArgs e)
        {

            string sPlazoMaximo = "";
            sPlazoMaximo = Convert.ToString( numupdown_PlazoMaximo.Value);

            if (!string.IsNullOrEmpty(sPlazoMaximo))
            {
                validarModificar();
                fActualizarPlazoMaximoActual();
                // fLimpiarGridCliente();
                // fLlenarGridCliente();
            }
            else
            {
                MessageBox.Show("Captura Numero de Centro", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                numupdown_PlazoMaximo.Focus();
            }

            // if (txt_PlazoMaximo.Text != "")
            // {
            //     con.Open();
            //     cmd = new SqlCommand("proc_abconfiguracion", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iConfid", 1);
            //     cmd.Parameters.AddWithValue("@iConfTasaFinanciamiento", 0);
            //     cmd.Parameters.AddWithValue("@iConfEnganche", 0);
            //     cmd.Parameters.AddWithValue("@iConfPlazoMaximo", txt_PlazoMaximo.Text);
            //     cmd.Parameters.AddWithValue("@iOpcion", 1);
            //     cmd.ExecuteNonQuery();
                
            //     txt_PlazoMaximo.Text = "";
            //     cmd.Parameters.Clear();
            //     con.Close();

            //     fActualizarPlazoMAximo();




            // }
            // else
            // {
            //     MessageBox.Show("Ingrese el Codigo del Articulo");
            // }
        }

        // public void fActualizarPlazoMAximo()
        // {
        //     con.Open();
        //     cmd = new SqlCommand("proc_abconfiguracion", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iConfid", 1);
        //     cmd.Parameters.AddWithValue("@iConfTasaFinanciamiento", 0);
        //     cmd.Parameters.AddWithValue("@iConfEnganche", 0);
        //     cmd.Parameters.AddWithValue("@iConfPlazoMaximo", 0);
        //     cmd.Parameters.AddWithValue("@iOpcion", 3);

        //     SqlDataReader reader = cmd.ExecuteReader();
        //     reader.Read();

        //     lbl_ConfPlazoActual.Text = reader["num_plazomaximo"].ToString();
            
        //     cmd.Parameters.Clear();
        //     con.Close();
        // }

        private void btn_ConfiguracionRegresar_Click(object sender, EventArgs e)
        {
            this.Hide();
            FrmVentas formexhibicion = new FrmVentas();
            formexhibicion.StartPosition = FormStartPosition.CenterScreen;
            formexhibicion.ShowDialog(this);
            formexhibicion.Dispose();
            formexhibicion = null;
            this.Close();
        }

        private void FrmConfiguracion_Load(object sender, EventArgs e)
        {

        }


    }
}
