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
    public partial class Ventas : Form
    {

        SqlConnection con = new SqlConnection("Data Source=10.28.146.71;Initial Catalog=ComprasMuebles;User ID=sysdesarrollo;Password=fl9s9FKLGJUT5YAoqtJFTn9MtQgVo9Zn");
        SqlCommand cmd;
        SqlDataAdapter adapt;

        //Variables bool para Cambiar los atributos de los controls 
        public bool btn_AgregarClick = false;
        public bool btn_ModificarClick = false;
        public bool btn_EliminarClick = false;
        public bool btn_ConsultarClick = false;

        public bool btn_AgregarArticuloClick = false;
        decimal dTasaFinanciamiento {get; set;}
        int  iPlazoMaximo { get; set;}
        int iEnganchePorcentaje {get; set;}

        decimal dImporte {get; set;}
        decimal dEnganche {get; set;}
        decimal dBonificacionEnganche {get; set;}
        decimal dTotalAdeudo {get;set;}
        decimal dTotalAPagar {get;set;}
        decimal dPrecioAlContado {get;set;}
        decimal dImporteAbono {get;set;}
        decimal dImporteAhorra { get; set; }
        Boolean bDttrue {get;set;}
        string dtFechaHoy { get; set; }
        decimal dPrecio { get; set; }


        public Ventas()
        {
            InitializeComponent();
            //fObtenerArticulos();
            fLlenarArticulos();
            //fObtenerClientes();
            fLlenarClientes();
            fObtenerConfiguracion();
            fConfiguracionControles();
            fMostrarVentas();
            fCrearGridAddArticulo();
            fCrearGridAbonosMensuales();
        }

        private void FrmVentas_Load(object sender, EventArgs e)
        {


        }

        private void cmb_VentaCliente_SelectedIndexChanged(object sender, EventArgs e)
        {

            fObtenerNombreLocacion();
            // con.Open();
            // cmd = new SqlCommand("proc_ventas", con);
            // cmd.CommandType = CommandType.StoredProcedure;
            // cmd.Parameters.AddWithValue("@iVentaid", 0);
            // cmd.Parameters.AddWithValue("@iClienteid", cmb_VentaCliente.Text);
            // cmd.Parameters.AddWithValue("@cClienteNombre", 0);
            // cmd.Parameters.AddWithValue("@cArticuloNombre", "");
            // cmd.Parameters.AddWithValue("@iArticuloid", 0);
            // cmd.Parameters.AddWithValue("@iTotalVenta", 0);
            // cmd.Parameters.AddWithValue("@iFechaVenta", 0);
            // cmd.Parameters.AddWithValue("@iOpcion", 8);

            // //string str = (string)cmb_VentaCliente.Items[1];
            // //MessageBox.Show(str);

            // cmd.ExecuteNonQuery();
            // SqlDataReader reader = cmd.ExecuteReader();
            // reader.Read();
            // lbl_VentasRFCResult.Text = reader["nom_cliente"].ToString();
  
            // con.Close();
      
        }
        // int iRenglon = 0;
        private void btn_AgregarArticulo_Click(object sender, EventArgs e)
        {

            btn_AgregarArticuloClick = true;
            bool bRegresa = false;
            List<CAddArticulo> listaArticulos = new List<CAddArticulo>();
            bRegresa = validarBuscarArticulo(ref listaArticulos);

            if(bRegresa){
                fLlenarGridAddArticulo(ref listaArticulos);
            }

            // MessageBox.Show(Convert.ToString(iRenglon++));



            
            // fAgregarArticuloData();
        }

        private void dgvAddArticulos_CellEnter(object sender, DataGridViewCellEventArgs e)
        {
            dgvAddArticulos[e.ColumnIndex, e.RowIndex].Style
                .SelectionBackColor = Color.Blue;
        }

        private void dgvAddArticulos_CellLeave(object sender, DataGridViewCellEventArgs e)
        {
            dgvAddArticulos[e.ColumnIndex, e.RowIndex].Style
                .SelectionBackColor = Color.Empty;
        }


        private void btn_VentasCancelar_Click(object sender, EventArgs e)
        {

            cmb_VentaCliente.Enabled = true; ;
            cmb_VentaArticulo.Enabled = true;
            btn_AgregarArticulo.Enabled = true;
            btn_VentasSiguente.Visible = true;
            btn_VentasGrabar.Visible = false;
            lbl_VentasAbonosMensuales.Visible = false;
            

            cmb_VentaCliente.Text = "";
            cmb_VentaArticulo.Text = "";
            lbl_VentasGetLocacion.Text = "";
            txt_VentaBoniEng.Text = "";
            txt_VentasEnganche.Text = "";
            txt_VentaTotal.Text = "";

            dgvAbonosMensuales.Visible = false;
            dgvAbonosMensuales.DataSource = null;

            flimpiarGridArticulos();
 
        }

        // public void fObtenerArticulos()
        // {

        //     con.Open();
        //     cmd = new SqlCommand("proc_ventas", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iVentaid", 0);
        //     cmd.Parameters.AddWithValue("@iClienteid", 0);
        //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
        //     cmd.Parameters.AddWithValue("@cArticuloNombre", "");
        //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
        //     cmd.Parameters.AddWithValue("@iTotalVenta", 0);
        //     cmd.Parameters.AddWithValue("@iFechaVenta", 0);
        //     cmd.Parameters.AddWithValue("@iOpcion", 7);

        //     cmd.ExecuteNonQuery();
        //     SqlDataReader reader = cmd.ExecuteReader();


        //     while (reader.Read())
        //     {
        //         cmb_VentaArticulo.Items.Add(reader[0].ToString());
        //         cmd.Parameters.Clear();
        //     }     
        //     con.Close();

        // }

        // public void fObtenerClientes()
        // {
        //     con.Open();
        //     cmd = new SqlCommand("proc_ventas", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iVentaid", 0);
        //     cmd.Parameters.AddWithValue("@iClienteid", 0);
        //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
        //     cmd.Parameters.AddWithValue("@cArticuloNombre", "");
        //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
        //     cmd.Parameters.AddWithValue("@iTotalVenta", 0);
        //     cmd.Parameters.AddWithValue("@iFechaVenta", 0);
        //     cmd.Parameters.AddWithValue("@iOpcion", 6);

        //     cmd.ExecuteNonQuery();
        //     SqlDataReader reader = cmd.ExecuteReader();


        //     while (reader.Read())
        //     {
        //         cmb_VentaCliente.Items.Add(reader[0].ToString());
        //         cmd.Parameters.Clear();

        //     }     
        //     con.Close();

        // }

        // public void fObtenerConfiguracion()
        // {

            
        //    con.Open();
        //    DataTable dt = new DataTable();
        //     cmd = new SqlCommand("proc_ventas", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iVentaid", 0);
        //     cmd.Parameters.AddWithValue("@iClienteid", 0);
        //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
        //     cmd.Parameters.AddWithValue("@cArticuloNombre", "");
        //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
        //     cmd.Parameters.AddWithValue("@iTotalVenta", 0);
        //     cmd.Parameters.AddWithValue("@iFechaVenta", 0);
        //     cmd.Parameters.AddWithValue("@iOpcion", 10);

        //    cmd.ExecuteNonQuery();
        //    SqlDataReader reader = cmd.ExecuteReader();
        //    reader.Read(); 

        //    dTasaFinanciamiento = Convert.ToDecimal(reader["num_tasafinanciamiento"].ToString());
        //    iPlazoMaximo = Convert.ToInt32(reader["num_plazomaximo"].ToString());
        //    iEnganchePorcentaje = Convert.ToInt32(reader["num_enganche"].ToString());

        //    cmd.Parameters.Clear();
        //    con.Close();
        // }

        // private void dataGridView1_SelectionChanged(object sender, EventArgs e)
        // {
        //     dgvAddArticulos.CurrentCell = dgvAddArticulos.CurrentRow.Cells["Cantidad"];
        //     dgvAddArticulos.BeginEdit(true);
           
        // }

        // private void fAgregarArticuloData() {
        //     con.Open();
        //     DataTable dt = new DataTable();
        //     DataRow dr = dt.NewRow();
        //     cmd = new SqlCommand("proc_ventas", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iVentaid", 0);
        //     cmd.Parameters.AddWithValue("@iClienteid", 0);
        //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
        //     cmd.Parameters.AddWithValue("@cArticuloNombre", cmb_VentaArticulo.Text);
        //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
        //     cmd.Parameters.AddWithValue("@iTotalVenta", 0);
        //     cmd.Parameters.AddWithValue("@iFechaVenta", 0);
        //     cmd.Parameters.AddWithValue("@iOpcion", 9);

        //     cmd.ExecuteNonQuery();
        //     SqlDataReader reader = cmd.ExecuteReader();
        //     reader.Read();

        //     dt.Columns.Add("Descripcion Articulo");
        //     dt.Columns.Add("Modelo");
        //     dt.Columns.Add("Cantidad");
        //     dt.Columns.Add("Precio");
        //     dt.Columns.Add("Importe");

        //     dPrecio = Convert.ToDecimal(reader["num_preciounitario"]) * (1 + (dTasaFinanciamiento * iPlazoMaximo) / 100);

        //     dr[0] = reader["des_articulo"].ToString();

        //     dr[1] = reader["des_modelo"].ToString();
        //     dr[2] = 2;
        //     dr[3] = Math.Round( dPrecio,2);
        //     dImporte = Convert.ToDecimal(dr[3]) * Convert.ToInt32(dr[2]);
        //     dr[4] = Math.Round(dImporte,2);

        //     dEnganche = Convert.ToDecimal((iEnganchePorcentaje * 0.01)) * dImporte;
        //     dBonificacionEnganche = dEnganche * ((dTasaFinanciamiento * iPlazoMaximo) / 100);
        //     dTotalAdeudo = dImporte - dEnganche -dBonificacionEnganche;
        //     dPrecioAlContado = dTotalAdeudo / (1 + ((dTasaFinanciamiento * iPlazoMaximo) / 100));

        //     txt_VentasEnganche.Text = Convert.ToString(Math.Round( dEnganche,2));
        //     txt_VentaBoniEng.Text = Convert.ToString(Math.Round(dBonificacionEnganche,2));
        //     txt_VentaTotal.Text = Convert.ToString(Math.Round(dTotalAdeudo,2));

        //     dt.Rows.Add(dr);
        //     dgvAddArticulos.DataSource = dt;
        //     cmd.Parameters.Clear();


        //     con.Close();
        // }

        public void fConfiguracionControles(){
            lbl_VentasAbonosMensuales.Visible = false;
            dgvAbonosMensuales.Visible = false;
            btn_VentasGrabar.Visible = false;

            cmb_VentaClienteFrm.Enabled = false;
            txt_Codigo.Enabled = false;
            txt_FechaVenta.Enabled = false;
            txt_TotalVenta.Enabled = false;

            btn_Consultar.Visible = false;
            btn_Eliminar.Visible = false;
            btn_Modificar.Visible = false;

        }

        private void btn_VentasSiguente_Click(object sender, EventArgs e)
        {
            if(cmb_VentaCliente.Text != "" && cmb_VentaArticulo.Text != "" && btn_AgregarArticuloClick == true){
                cmb_VentaCliente.Enabled = false;;
                cmb_VentaArticulo.Enabled = false;
                btn_AgregarArticulo.Enabled = false;
                btn_VentasSiguente.Visible = false;

                lbl_VentasAbonosMensuales.Visible = true;
                dgvAbonosMensuales.Visible = true;         
                fLlenarGridAbonosMensuales();
                // String sAbonos = "Abonos de";
                // String sTotalAPagar = "Total A Pagar";
                // String sSeAhorra = "Se Ahorra";

                // DataTable dt = new DataTable();
                // DataRow dr = dt.NewRow();

                // dt.Columns.Add("Periodo de Abonos");
                // dt.Columns.Add("Importe Abono");
                // dt.Columns.Add("Total a Pagar");
                // dt.Columns.Add("Se ahorra");
                // dt.Columns.Add("Elegir", typeof(Boolean));

                // for (int i = 3; i <= iPlazoMaximo; i += 3){              
    
                //     dTotalAPagar = dPrecioAlContado * (1 + (dTasaFinanciamiento * i) / 100);
                //     dImporteAbono = dTotalAPagar / i;
                //     dImporteAhorra = dTotalAdeudo - dTotalAPagar;

                //     dr[0] = i + " " + sAbonos ;
                //     dr[1] = Math.Round(dImporteAbono,2);
                //     dr[2] = sTotalAPagar + " " + Math.Round(dTotalAPagar,2);
                //     dr[3] = sSeAhorra + " " + Math.Round(dImporteAhorra,2);

                //     if(i == 3 ){
                //         dr[4] = false;
                //     }
                    

                //     dt.Rows.Add(dr.ItemArray);               

                // }

                btn_VentasGrabar.Visible = true;

            }else{
                MessageBox.Show("Selecciona un Cliente y Agrege un Articulo");
            }
        }


        private void btn_VentasGrabar_Click(object sender, EventArgs e)
        {

            bool bRegresa = false ;
            bRegresa = validarGrabar();

               // bRegresa = validarGrabar();
            if (bRegresa)
            {
                //btn_AgregarClick = true;
                fLimpiarGridVentas();
                flimpiarGridArticulos();
                fLlenarGridVenta();

                cmb_VentaCliente.Enabled = true; 
                cmb_VentaArticulo.Enabled = true;
                btn_AgregarArticulo.Enabled = true;
                btn_VentasSiguente.Visible = true;
                btn_VentasGrabar.Visible = false;
                lbl_VentasAbonosMensuales.Visible = false;
                dgvAbonosMensuales.Visible = false;

                cmb_VentaCliente.Text = "";
                cmb_VentaArticulo.Text = "";
                lbl_VentasGetLocacion.Text = "";
                txt_VentaBoniEng.Text = "";
                txt_VentasEnganche.Text = "";
                txt_VentaTotal.Text = "";


                dgvAbonosMensuales.DataSource = null;
 
            }

            // dtFechaHoy = Convert.ToDateTime( DateTime.Now.ToString("d-M-yyyy"));            
            // if (bDttrue == false)
            // {
            //     con.Open();
            //     cmd = new SqlCommand("proc_ventas", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iVentaid", 0);
            //     cmd.Parameters.AddWithValue("@iClienteid", cmb_VentaCliente.Text);
            //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
            //     cmd.Parameters.AddWithValue("@cArticuloNombre", "");
            //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
            //     cmd.Parameters.AddWithValue("@iTotalVenta", txt_VentaTotal.Text);
            //     cmd.Parameters.AddWithValue("@iFechaVenta", dtFechaHoy);
            //     cmd.Parameters.AddWithValue("@iOpcion", 1);
                
            //     SqlDataReader reader = cmd.ExecuteReader();
            //     reader.Read();

            //     cmd.Parameters.Clear();
            //     con.Close();

                    
            //     MessageBox.Show("Se ha Generado la Venta");

            //     this.Hide();
            //     FrmVentas formexhibicion = new FrmVentas();
            //     formexhibicion.StartPosition = FormStartPosition.CenterScreen;
            //     formexhibicion.ShowDialog(this);
            //     formexhibicion.Dispose();
            //     formexhibicion = null;
            //     this.Close();
            // }


        }

        private void btn_VentasREgresar_Click(object sender, EventArgs e)
        {
            this.Hide();
            FrmVentas formexhibicion = new FrmVentas();
            formexhibicion.StartPosition = FormStartPosition.CenterScreen;
            formexhibicion.ShowDialog(this);
            formexhibicion.Dispose();
            formexhibicion = null;
            this.Close();
        }

        private void menuStrip1_ItemClicked(object sender, ToolStripItemClickedEventArgs e)
        {

        }

        private void btn_Modificar_Click(object sender, EventArgs e)
        {

            string sVentaid = "";
            sVentaid = txt_Codigo.Text;

            if (!string.IsNullOrEmpty(sVentaid))
            {
                validarModificar();
                fLimpiarGridVentas();
                fLlenarGridVenta();
            }
            else
            {
                MessageBox.Show("Captura Numero de Centro", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                txt_Codigo.Focus();
            }

            // if (txt_Codigo.Text != "")
            // {
            //     con.Open();
            //     cmd = new SqlCommand("proc_ventas", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iVentaid", txt_Codigo.Text);
            //     cmd.Parameters.AddWithValue("@iClienteid", txt_Cliente.Text);
            //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
            //     cmd.Parameters.AddWithValue("@cArticuloNombre", "");
            //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
            //     cmd.Parameters.AddWithValue("@iTotalVenta", txt_TotalVenta.Text);
            //     cmd.Parameters.AddWithValue("@iFechaVenta", Convert.ToDateTime( txt_FechaVenta.Text));
            //     cmd.Parameters.AddWithValue("@iOpcion", 2);

            //     cmd.ExecuteNonQuery();
            //     cmd.Parameters.Clear();
            //     con.Close();

            //     btn_ModificarClick = true;

            //     fLimpiarCamposVentas();
            //     fMostrarVentas();
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
            string sVentaid = "";
            sVentaid = txt_Codigo.Text;

            if (!string.IsNullOrEmpty(sVentaid))
            {
                bRegresa = validarEliminar();

            }
            else
            {
                MessageBox.Show("Captura Numero de Locacion", "ABCExhibicion", MessageBoxButtons.OK, MessageBoxIcon.Information);
                txt_Codigo.Focus();
            }

            if (bRegresa)
            {
                fLimpiarCamposVentas();
                fLimpiarGridVentas();
                fLlenarGridVenta();
            }

            // if (txt_Codigo.Text != "")
            // {
            //     con.Open();
            //     cmd = new SqlCommand("proc_ventas", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iVentaid", txt_Codigo.Text);
            //     cmd.Parameters.AddWithValue("@iClienteid", 0);
            //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
            //     cmd.Parameters.AddWithValue("@cArticuloNombre", "");
            //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
            //     cmd.Parameters.AddWithValue("@iTotalVenta", 0);
            //     cmd.Parameters.AddWithValue("@iFechaVenta", 0);
            //     cmd.Parameters.AddWithValue("@iOpcion", 3);
            //     cmd.ExecuteNonQuery();
            //     cmd.Parameters.Clear();
            //     con.Close();

            //     btn_EliminarClick = true;

            //     fLimpiarCamposVentas();
            //     fMostrarVentas();
            //     fAtributosModificarEliminar();
            //     fObtenerTotalVentas();
            // }
            // else
            // {
            //     MessageBox.Show("Ingrese el Codigo del Cliente");
            // }
        }

        private void btn_Consultar_Click(object sender, EventArgs e)
        {

            bool bRegresa = false;
            List<CVenta> listaVenta = new List<CVenta>();
            bRegresa = validarBuscar(ref listaVenta);

            if (bRegresa)
            {
                cmb_VentaClienteFrm.Text = listaVenta[0].iClienteid.ToString() + " - " + listaVenta[0].sClienteNom;
                txt_TotalVenta.Text = listaVenta[0].dTotalVenta.ToString();
                txt_FechaVenta.Text = listaVenta[0].dtFecha;
            }

            // if (txt_Codigo.Text != "")
            // {

            //     con.Open();
            //     cmd = new SqlCommand("proc_ventas", con);
            //     cmd.CommandType = CommandType.StoredProcedure;
            //     cmd.Parameters.AddWithValue("@iVentaid", txt_Codigo.Text);
            //     cmd.Parameters.AddWithValue("@iClienteid", 0);
            //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
            //     cmd.Parameters.AddWithValue("@cArticuloNombre", "");
            //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
            //     cmd.Parameters.AddWithValue("@iTotalVenta", 0);
            //     cmd.Parameters.AddWithValue("@iFechaVenta", 0);
            //     cmd.Parameters.AddWithValue("@iOpcion", 4);

            //     SqlDataReader reader = cmd.ExecuteReader();

            //     if (reader.Read())
            //     {                    
            //         txt_Cliente.Text = reader[1].ToString();
            //         txt_TotalVenta.Text = reader[2].ToString();
            //         txt_FechaVenta.Text = reader[3].ToString();                    

            //         cmd.Parameters.Clear();
            //         con.Close();

            //         btn_ConsultarClick = true;

            //     }
            //     else
            //     {
            //         MessageBox.Show("Codigo Venta no Existe");
            //         btn_ConsultarClick = false;

            //     }
            //     con.Close();


            // }
            // else
            // {
            //     MessageBox.Show("Ingrese el Codigo de la Venta");
            // }

            // fAtributosConsultar();
        }


        public void fMostrarVentas()
        {
            // con.Open();
            // DataTable dt = new DataTable();
            // cmd = new SqlCommand("proc_ventas", con);
            // cmd.CommandType = CommandType.StoredProcedure;
            // cmd.Parameters.AddWithValue("@iVentaid", 0);
            // cmd.Parameters.AddWithValue("@iClienteid", 0);
            // cmd.Parameters.AddWithValue("@cClienteNombre", "");
            // cmd.Parameters.AddWithValue("@cArticuloNombre", "");
            // cmd.Parameters.AddWithValue("@iArticuloid", 0);
            // cmd.Parameters.AddWithValue("@iTotalVenta", 0);
            // cmd.Parameters.AddWithValue("@iFechaVenta", 0);
            // cmd.Parameters.AddWithValue("@iOpcion", 5);
            // cmd.ExecuteNonQuery();
            // adapt = new SqlDataAdapter(cmd);
            // adapt.Fill(dt);
            // dgvVentas.DataSource = dt;
            // cmd.Parameters.Clear();
            // con.Close();
            fCrearGridVenta();
            fLlenarGridVenta();
        }



        #region Funciones Para Modificar Los Atributos de Los Controles



        public void fAtributosConsultar()
        {
            if (btn_ConsultarClick == true && rdb_Modificar.Checked == true)
            {
                cmb_VentaClienteFrm.Enabled = true;
                txt_Codigo.Enabled = true;
                txt_FechaVenta.Enabled = true;
                txt_TotalVenta.Enabled = true;

                btn_Modificar.Visible = true;
            }
            if (btn_ConsultarClick == true && rdb_Eliminar.Checked == true)
            {
                cmb_VentaClienteFrm.Enabled = false;
                txt_Codigo.Enabled = false;
                txt_FechaVenta.Enabled = false;
                txt_TotalVenta.Enabled = false;

                btn_Eliminar.Visible = true;
            }
        }

        public void fAtributosModificarEliminar()
        {
            if (btn_ModificarClick == true)
            {

                txt_Codigo.Enabled = true;
                cmb_VentaClienteFrm.Enabled = false;
                txt_FechaVenta.Enabled = false;
                txt_TotalVenta.Enabled = false;


                btn_Modificar.Visible = false;
                btn_Consultar.Visible = true;
            }

            if (btn_EliminarClick == true)
            {
                txt_Codigo.Enabled = true;
                cmb_VentaClienteFrm.Enabled = false;
                txt_FechaVenta.Enabled = false;
                txt_TotalVenta.Enabled = false;

                btn_Consultar.Visible = true;
                btn_Eliminar.Visible = false;
            }
        }

        public void fHabilitarAtributosRdb()
        {

            if (rdb_Modificar.Checked == true)
            {
                txt_Codigo.Enabled = true;
                cmb_VentaClienteFrm.Enabled = false;
                txt_FechaVenta.Enabled = false;
                txt_TotalVenta.Enabled = false;

                btn_Consultar.Visible = true;
                btn_ConsultarClick = false;
                btn_Eliminar.Visible = false;
                btn_Modificar.Visible = false;


                rdb_Eliminar.Checked = false;

                fLimpiarCamposVentas();
            }

            if (rdb_Eliminar.Checked == true)
            {

                txt_Codigo.Enabled = true;
                cmb_VentaClienteFrm.Enabled = false;
                txt_FechaVenta.Enabled = false;
                txt_TotalVenta.Enabled = false;


                btn_Consultar.Visible = true;
                btn_ConsultarClick = false;
                btn_Eliminar.Visible = false;
                btn_Modificar.Visible = false;

                rdb_Modificar.Checked = false;

                fLimpiarCamposVentas();
            }
        }

        #endregion

        public void fLimpiarCamposVentas()
        {
            cmb_VentaClienteFrm.Text = "";
            txt_Codigo.Text = "";
            txt_FechaVenta.Text = "";
            txt_TotalVenta.Text = "";

        }

        private void dgvAddArticulos_CellContentClick_1(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void dgvAbonosMensuales_CellContentClick_1(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void rdb_Modificar_CheckedChanged_1(object sender, EventArgs e)
        {
            fHabilitarAtributosRdb();
        }

        private void rdb_Eliminar_CheckedChanged_1(object sender, EventArgs e)
        {
            fHabilitarAtributosRdb();
        }

        private void txt_FechaVenta_TextChanged(object sender, EventArgs e)
        {

        }

        private void txt_TotalVenta_TextChanged(object sender, EventArgs e)
        {

        }

        private void txt_Codigo_TextChanged(object sender, EventArgs e)
        {

        }

        private void cmb_VentaClienteFrm_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void dgvVentas_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }



        // public void fObtenerTotalArticulos(){
        //     con.Open();
        //     cmd = new SqlCommand("proc_abcarticulos", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
        //     cmd.Parameters.AddWithValue("@cArticuloNom", "");
        //     cmd.Parameters.AddWithValue("@cArticuloModelo", "");
        //     cmd.Parameters.AddWithValue("@cArticuloMarca", "");
        //     cmd.Parameters.AddWithValue("@dArticuloPrecio", 0);
        //     cmd.Parameters.AddWithValue("@iArticuloExistencia", 0);
        //     cmd.Parameters.AddWithValue("@iOpcion", 6);
        //     cmd.ExecuteNonQuery();
        //     SqlDataReader reader = cmd.ExecuteReader();
        //     reader.Read();                    
        //     lbl_TAR.Text = reader["total"].ToString();

        //     cmd.Parameters.Clear();
        //     con.Close();
        // }

        // public void fObtenerTotalLocaciones(){
        //     con.Open();
        //     cmd = new SqlCommand("proc_abclocaciones", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iLocacionid", 0);
        //     cmd.Parameters.AddWithValue("@cMunicipio", "");
        //     cmd.Parameters.AddWithValue("@cLocacion", "");
        //     cmd.Parameters.AddWithValue("@iOpcion", 6);
        //     cmd.ExecuteNonQuery();
        //     SqlDataReader reader = cmd.ExecuteReader();
        //     reader.Read();                    
        //     lbl_TCE.Text = reader["total"].ToString();

        //     cmd.Parameters.Clear();
        //     con.Close();
        // }

        // public void fObtenerTotalClientes(){
        //     con.Open();
        //     cmd = new SqlCommand("proc_abclientes", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iClienteid", 0);
        //     cmd.Parameters.AddWithValue("@iLocacionid", 0);
        //     cmd.Parameters.AddWithValue("@cClienteNom", "");
        //     cmd.Parameters.AddWithValue("@iOpcion", 7);
        //     cmd.ExecuteNonQuery();
        //     SqlDataReader reader = cmd.ExecuteReader();
        //     reader.Read();                    
        //     lbl_TCL.Text = reader["total"].ToString();

        //     cmd.Parameters.Clear();
        //     con.Close();
        // }

        // public void fObtenerTotalVentas(){
        //     con.Open();
        //     cmd = new SqlCommand("proc_ventas", con);
        //     cmd.CommandType = CommandType.StoredProcedure;
        //     cmd.Parameters.AddWithValue("@iVentaid", 0);
        //     cmd.Parameters.AddWithValue("@iClienteid", 0);
        //     cmd.Parameters.AddWithValue("@cClienteNombre", "");
        //     cmd.Parameters.AddWithValue("@cArticuloNombre", "");
        //     cmd.Parameters.AddWithValue("@iArticuloid", 0);
        //     cmd.Parameters.AddWithValue("@iTotalVenta", 0);
        //     cmd.Parameters.AddWithValue("@iFechaVenta", 0);
        //     cmd.Parameters.AddWithValue("@iOpcion", 11);
        //     cmd.ExecuteNonQuery();
        //     SqlDataReader reader = cmd.ExecuteReader();
        //     reader.Read();                    
        //     lbl_TVE.Text = reader["total"].ToString();

        //     cmd.Parameters.Clear();
        //     con.Close();
        // }

    }
}
