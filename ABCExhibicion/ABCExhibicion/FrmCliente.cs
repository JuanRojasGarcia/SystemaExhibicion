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
    public partial class FrmCliente : Form
    {

        public bool btn_ModificarClick = false;
        public bool btn_EliminarClick = false;
        public bool btn_ConsultarClick = false;


        public FrmCliente()
        {
            InitializeComponent();
            fMostrarClientes();
            fConfiguracionControles();
            fLlenarLocaciones();
            
        }

        private void FrmCliente_Load(object sender, EventArgs e)
        {

        }

        private void btn_Agregar_Click(object sender, EventArgs e)
        {
            if (txt_ClienteNum.Text != "" && txt_ClienteNom.Text != "" && cmb_LocacionNom.Text != "")
            {
                bool bRegresa = false;
                bool bRegresaNum = true;

                bRegresaNum = ValidarNumeroCliente();

                if(bRegresaNum){
                   bRegresa = validarGrabar();
                }
               // bRegresa = validarGrabar();
                if (bRegresa)
                {
                    //btn_AgregarClick = true;
                    fLimpiarCampos();
                    fLimpiarGridCliente();
                    fLlenarGridCliente();
                }
            }
            else
            {
                MessageBox.Show("Ingresa Todos Los Datos", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }

            // if (txt_ClienteNum.Text != "" && cmb_LocacionNom.Text != "" && txt_ClienteNom.Text != "" )
            // {

            //     con.Open();
            //     cmd = new SqlCommand("proc_abclientes", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iClienteid", txt_ClienteNum.Text);
            //     cmd.Parameters.AddWithValue("@cCentroNum", cmb_LocacionNom.Text);
            //     cmd.Parameters.AddWithValue("@cClienteNom", txt_ClienteNom.Text);
            //     cmd.Parameters.AddWithValue("@iOpcion", 1);

            //     SqlDataReader reader = cmd.ExecuteReader();
            //     reader.Read();

            //     if (Convert.ToInt32(reader["Error"]) == 1 )
            //     {
            //         MessageBox.Show("Codigo Cliente Existente");
            //         con.Close();
            //     }
            //     else
            //     {
            //         cmd.Parameters.Clear();
            //         con.Close();

            //         btn_AgregarClick = true;

            //         fLimpiarCampos();
            //         fMostrarClientes();
            //     }

            // }
            // else
            // {
            //     MessageBox.Show("Ingrese todos los Clientes");
            // }

        }

        private void btn_Modificar_Click(object sender, EventArgs e)
        {
            string sClienteid = "";
            sClienteid = txt_ClienteNum.Text;

            if (!string.IsNullOrEmpty(sClienteid))
            {
                validarModificar();
                fLimpiarGridCliente();
                fLlenarGridCliente();
            }
            else
            {
                MessageBox.Show("Captura Numero de Centro", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                txt_ClienteNum.Focus();
            }

            // if (txt_ClienteNum.Text != "")
            // {
            //     con.Open();
            //     cmd = new SqlCommand("proc_abclientes", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iClienteid", txt_ClienteNum.Text);
            //     cmd.Parameters.AddWithValue("@cCentroNum", cmb_LocacionNom.Text);
            //     cmd.Parameters.AddWithValue("@cClienteNom", txt_ClienteNom.Text);
            //     cmd.Parameters.AddWithValue("@iOpcion", 2);
            //     cmd.ExecuteNonQuery();
            //     cmd.Parameters.Clear();
            //     con.Close();

            //     btn_ModificarClick = true;

            //     fLimpiarCampos();
            //     fMostrarClientes();
            //     fAtributosModificarEliminar();
            // }
            // else
            // {
            //     MessageBox.Show("Ingrese el Codigo del Cliente");
            // }
        }

        private void btn_Eliminar_Click(object sender, EventArgs e)
        {
            bool bRegresa = false;
            string sClienteid = "";
            sClienteid = txt_ClienteNum.Text;

            if (!string.IsNullOrEmpty(sClienteid))
            {
                bRegresa = validarEliminar();

            }
            else
            {
                MessageBox.Show("Captura Numero de Locacion", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                txt_ClienteNum.Focus();
            }

            if (bRegresa)
            {
                fLimpiarCampos();
                fLimpiarGridCliente();
                fLlenarGridCliente();
            }
            // if (txt_ClienteNum.Text != "")
            // {
            //     con.Open();
            //     cmd = new SqlCommand("proc_abclientes", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iClienteid", txt_ClienteNum.Text);
            //     cmd.Parameters.AddWithValue("@cCentroNum", 0);
            //     cmd.Parameters.AddWithValue("@cClienteNom", "");
            //     cmd.Parameters.AddWithValue("@cClienteApell", "");
            //     cmd.Parameters.AddWithValue("@cClienteRfc", "");
            //     cmd.Parameters.AddWithValue("@iOpcion", 3);
            //     cmd.ExecuteNonQuery();
            //     cmd.Parameters.Clear();
            //     con.Close();

            //     btn_EliminarClick = true;

            //     fLimpiarCampos();
            //     fMostrarClientes();
            //     fAtributosModificarEliminar();
            // }
            // else
            // {
            //     MessageBox.Show("Ingrese el Codigo del Cliente");
            // }
        }

        private void btn_Consultar_Click(object sender, EventArgs e)
        {
            bool bRegresa = false;
            List<CCliente> listaCliente = new List<CCliente>();
            bRegresa = validarBuscar(ref listaCliente);

            if (bRegresa)
            {
                cmb_LocacionNom.Text = listaCliente[0].iLocalidad.ToString() + " - " + listaCliente[0].sLocalidad;
                txt_ClienteNom.Text = listaCliente[0].sClienteNom;
            }


            // if (txt_ClienteNum.Text != "")
            // {

            //     con.Open();
            //     cmd = new SqlCommand("proc_abclientes", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iClienteid", txt_ClienteNum.Text);
            //     cmd.Parameters.AddWithValue("@cCentroNum", 0);
            //     cmd.Parameters.AddWithValue("@cClienteNom", "");
            //     cmd.Parameters.AddWithValue("@cClienteApell", "");
            //     cmd.Parameters.AddWithValue("@cClienteRfc", "");
            //     cmd.Parameters.AddWithValue("@iOpcion", 4);

            //     SqlDataReader reader = cmd.ExecuteReader();

            //     if (reader.Read())
            //     {
            //         cmb_LocacionNom.Text = reader[1].ToString();
            //         txt_ClienteNom.Text = reader[2].ToString();



            //         cmd.Parameters.Clear();
            //         con.Close();

            //         btn_ConsultarClick = true;

            //     }
            //     else
            //     {
            //         MessageBox.Show("Codigo Cliente no Existe");
            //         btn_ConsultarClick = false;

            //     }
            //     con.Close();


            // }
            // else
            // {
            //     MessageBox.Show("Ingrese el Codigo del Cliente");
            // }

            // fAtributosConsultar();
        }


        public void fMostrarClientes()
        {
            // con.Open();
            // DataTable dt = new DataTable();
            // cmd = new SqlCommand("proc_abclientes", con);
            // cmd.CommandType = CommandType.StoredProcedure;
            // cmd.Parameters.AddWithValue("@iClienteid", 0);
            // cmd.Parameters.AddWithValue("@cCentroNum", 0);
            // cmd.Parameters.AddWithValue("@cClienteNom", "");
            // cmd.Parameters.AddWithValue("@cClienteApell", "");
            // cmd.Parameters.AddWithValue("@cClienteRfc", "");
            // cmd.Parameters.AddWithValue("@iOpcion", 5);
            // cmd.ExecuteNonQuery();
            // adapt = new SqlDataAdapter(cmd);
            // adapt.Fill(dt);
            // dgvCliente.DataSource = dt;
            // cmd.Parameters.Clear();
            // con.Close();
            fCrearGridCliente();
            fLlenarGridCliente();
        }

        #region Funciones Para Modificar Los Atributos de Los Controles

        public void fConfiguracionControles()
        {
            txt_ClienteNum.Enabled = false;
            cmb_LocacionNom.Enabled = false;
            txt_ClienteNom.Enabled = false;


            btn_Agregar.Visible = false;
            btn_Consultar.Visible = false;
            btn_Eliminar.Visible = false;
            btn_Modificar.Visible = false;

            cmb_LocacionNom.DropDownStyle = ComboBoxStyle.DropDownList;


        }

        public void fAtributosConsultar()
        {
            if (btn_ConsultarClick == true && rdb_Modificar.Checked == true)
            {
                txt_ClienteNum.Enabled = true;
                cmb_LocacionNom.Enabled = true;
                txt_ClienteNom.Enabled = true;


                btn_Modificar.Visible = true;
            }
            if (btn_ConsultarClick == true && rdb_Eliminar.Checked == true)
            {
                txt_ClienteNum.Enabled = false;
                cmb_LocacionNom.Enabled = false;
                txt_ClienteNom.Enabled = false;


                btn_Eliminar.Visible = true;
            }
        }

        public void fAtributosModificarEliminar()
        {
            if (btn_ModificarClick == true)
            {

                txt_ClienteNum.Enabled = true;
                cmb_LocacionNom.Enabled = false;
                txt_ClienteNom.Enabled = false;


                btn_Modificar.Visible = false;
                btn_Consultar.Visible = true;
            }

            if (btn_EliminarClick == true)
            {
                txt_ClienteNum.Enabled = true;
                cmb_LocacionNom.Enabled = false;
                txt_ClienteNom.Enabled = false;


                btn_Consultar.Visible = true;
                btn_Eliminar.Visible = false;
            }
        }

        public void fHabilitarAtributosRdb()
        {

            if (rdb_Agregar.Checked == true)
            {
                txt_ClienteNum.Enabled = true;
                cmb_LocacionNom.Enabled = true;
                txt_ClienteNom.Enabled = true;


                btn_Agregar.Visible = true;
                btn_Consultar.Visible = false;
                btn_Eliminar.Visible = false;
                btn_Modificar.Visible = false;

                rdb_Eliminar.Checked = false;
                rdb_Modificar.Checked = false;

                fLimpiarCampos();

            }

            if (rdb_Modificar.Checked == true)
            {
                txt_ClienteNum.Enabled = true;
                cmb_LocacionNom.Enabled = false;
                txt_ClienteNom.Enabled = false;


                btn_Consultar.Visible = true;
                btn_ConsultarClick = false;
                btn_Agregar.Visible = false;
                btn_Eliminar.Visible = false;
                btn_Modificar.Visible = false;

                rdb_Agregar.Checked = false;
                rdb_Eliminar.Checked = false;

                fLimpiarCampos();
            }

            if (rdb_Eliminar.Checked == true)
            {

                txt_ClienteNum.Enabled = true;
                cmb_LocacionNom.Enabled = false;
                txt_ClienteNom.Enabled = false;



                btn_Consultar.Visible = true;
                btn_ConsultarClick = false;
                btn_Agregar.Visible = false;
                btn_Eliminar.Visible = false;
                btn_Modificar.Visible = false;

                rdb_Agregar.Checked = false;
                rdb_Modificar.Checked = false;

                fLimpiarCampos();
            }
        }

        #endregion

        public void fLimpiarCampos()
        {
            txt_ClienteNum.Text = "";
            cmb_LocacionNom.SelectedIndex = -1;
            txt_ClienteNom.Text = "";


        }


        private void rdb_Agregar_CheckedChanged(object sender, EventArgs e)
        {

            fHabilitarAtributosRdb();

        }

        private void rdb_Modificar_CheckedChanged(object sender, EventArgs e)
        {

            fHabilitarAtributosRdb();
        }

        private void rdb_Eliminar_CheckedChanged(object sender, EventArgs e)
        {

            fHabilitarAtributosRdb();
        }

        private void txt_ClienteNum_TextChanged(object sender, EventArgs e)
        {
            txt_ClienteNum.Text = CValidacionesGenerales.ValidarNumero(txt_ClienteNum.Text, txt_ClienteNum);
        }

        private void btn_ClienteRegresar_Click(object sender, EventArgs e)
        {
            this.Hide();
            FrmVentas formexhibicion = new FrmVentas();
            formexhibicion.StartPosition = FormStartPosition.CenterScreen;
            formexhibicion.ShowDialog(this);
            formexhibicion.Dispose();
            formexhibicion = null;
            this.Close();
        }

        private void txt_ClienteNom_TextChanged(object sender, EventArgs e)
        {
            txt_ClienteNom.Text = CValidacionesGenerales.ValidarString(txt_ClienteNom.Text, txt_ClienteNom);
        }

        private void cmb_LocacionNom_SelectedIndexChanged(object sender, EventArgs e)
        {

        }


    }



}
