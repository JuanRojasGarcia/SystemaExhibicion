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
    public partial class FrmVentas : Form
    {

        
        SqlConnection con = new SqlConnection("Data Source=10.28.146.71;Initial Catalog=ComprasMuebles;User ID=sysdesarrollo;Password=fl9s9FKLGJUT5YAoqtJFTn9MtQgVo9Zn");
        SqlCommand cmd;
        SqlDataAdapter adapt;

        //Variables bool para Cambiar los atributos de los controls 
        public bool btn_AgregarClick = false;
        public bool btn_ModificarClick = false;
        public bool btn_EliminarClick = false;
        public bool btn_ConsultarClick = false;
        
        public FrmVentas()
        {

            InitializeComponent();        
            this.StartPosition = FormStartPosition.CenterScreen;
        }

        private void articulosToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.Hide();
            FrmArticulos formArticulos = new FrmArticulos();
            formArticulos.StartPosition = FormStartPosition.CenterScreen;
            formArticulos.ShowDialog(this);
            formArticulos.Dispose();
            formArticulos = null;
            this.Close();
        }

        private void locacionesToolStripMenuItem_Click_1(object sender, EventArgs e)
        {
            this.Hide();
            FrmLocaciones frmLocaciones = new FrmLocaciones();
            frmLocaciones.StartPosition = FormStartPosition.CenterScreen;
            frmLocaciones.ShowDialog(this);
            frmLocaciones.Dispose();
            frmLocaciones = null;
            this.Close();
        }
    

        private void FrmAbcExhibicion_Load(object sender, EventArgs e)
        {
            
        }

        private void configuracionToolStripMenuItem_Click(object sender, EventArgs e)
        {

            this.Hide();
            Configuracion formConfiguracion = new Configuracion();
            formConfiguracion.StartPosition = FormStartPosition.CenterScreen;
            formConfiguracion.ShowDialog(this);
            formConfiguracion.Dispose();
            formConfiguracion = null;
            this.Close();
        }

        private void locacionesToolStripMenuItem_Click(object sender, EventArgs e)
        {

            this.Hide();
            FrmLocaciones frmLocaciones = new FrmLocaciones();
            frmLocaciones.StartPosition = FormStartPosition.CenterScreen;
            frmLocaciones.ShowDialog(this);
            frmLocaciones.Dispose();
            frmLocaciones = null;
            this.Close();
        }

        private void clientesToolStripMenuItem_Click(object sender, EventArgs e)
        {

            this.Hide();
            FrmCliente formClientes = new FrmCliente();
            formClientes.StartPosition = FormStartPosition.CenterScreen;
            formClientes.ShowDialog(this);
            formClientes.Dispose();
            formClientes = null;
            this.Close();
        }

        private void ventasToolStripMenuItem_Click(object sender, EventArgs e)
        {

            this.Hide();
            Ventas formVentas = new Ventas();
            formVentas.StartPosition = FormStartPosition.CenterScreen;
            formVentas.ShowDialog(this);
            formVentas.Dispose();
            formVentas = null;
            this.Close();
        }




    }
}
