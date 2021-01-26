namespace ABCExhibicion
{
    partial class Ventas
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.lbl_Ventas = new System.Windows.Forms.Label();
            this.lbl_VentaCliente = new System.Windows.Forms.Label();
            this.lbl_VentaArticulo = new System.Windows.Forms.Label();
            this.cmb_VentaCliente = new System.Windows.Forms.ComboBox();
            this.cmb_VentaArticulo = new System.Windows.Forms.ComboBox();
            this.btn_AgregarArticulo = new System.Windows.Forms.Button();
            this.lbl_VentaEnganche = new System.Windows.Forms.Label();
            this.lbl_VentasBoniEng = new System.Windows.Forms.Label();
            this.lbl_VentaTotal = new System.Windows.Forms.Label();
            this.txt_VentasEnganche = new System.Windows.Forms.TextBox();
            this.txt_VentaBoniEng = new System.Windows.Forms.TextBox();
            this.txt_VentaTotal = new System.Windows.Forms.TextBox();
            this.lbl_VentasLocacion = new System.Windows.Forms.Label();
            this.lbl_VentasGetLocacion = new System.Windows.Forms.Label();
            this.btn_VentasGrabar = new System.Windows.Forms.Button();
            this.btn_VentasCancelar = new System.Windows.Forms.Button();
            this.btn_VentasSiguente = new System.Windows.Forms.Button();
            this.lbl_VentasAbonosMensuales = new System.Windows.Forms.Label();
            this.btn_VentasREgresar = new System.Windows.Forms.Button();
            this.btn_Eliminar = new System.Windows.Forms.Button();
            this.btn_Modificar = new System.Windows.Forms.Button();
            this.btn_Consultar = new System.Windows.Forms.Button();
            this.txt_FechaVenta = new System.Windows.Forms.TextBox();
            this.txt_TotalVenta = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.txt_Codigo = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.rdb_Eliminar = new System.Windows.Forms.RadioButton();
            this.rdb_Modificar = new System.Windows.Forms.RadioButton();
            this.menuStrip1 = new System.Windows.Forms.MenuStrip();
            this.nuevaVentaToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.modiElimVentaToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.contextMenuStrip1 = new System.Windows.Forms.ContextMenuStrip(this.components);
            this.contextMenuStrip2 = new System.Windows.Forms.ContextMenuStrip(this.components);
            this.contextMenuStrip3 = new System.Windows.Forms.ContextMenuStrip(this.components);
            this.cmb_VentaClienteFrm = new System.Windows.Forms.ComboBox();
            this.dgvAddArticulos = new System.Windows.Forms.DataGridView();
            this.dgvVentas = new System.Windows.Forms.DataGridView();
            this.dgvAbonosMensuales = new System.Windows.Forms.DataGridView();
            this.menuStrip1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvAddArticulos)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgvVentas)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgvAbonosMensuales)).BeginInit();
            this.SuspendLayout();
            // 
            // lbl_Ventas
            // 
            this.lbl_Ventas.AutoSize = true;
            this.lbl_Ventas.Location = new System.Drawing.Point(308, 9);
            this.lbl_Ventas.Name = "lbl_Ventas";
            this.lbl_Ventas.Size = new System.Drawing.Size(40, 13);
            this.lbl_Ventas.TabIndex = 0;
            this.lbl_Ventas.Text = "Ventas";
            // 
            // lbl_VentaCliente
            // 
            this.lbl_VentaCliente.AutoSize = true;
            this.lbl_VentaCliente.Location = new System.Drawing.Point(12, 121);
            this.lbl_VentaCliente.Name = "lbl_VentaCliente";
            this.lbl_VentaCliente.Size = new System.Drawing.Size(39, 13);
            this.lbl_VentaCliente.TabIndex = 1;
            this.lbl_VentaCliente.Text = "Cliente";
            // 
            // lbl_VentaArticulo
            // 
            this.lbl_VentaArticulo.AutoSize = true;
            this.lbl_VentaArticulo.Location = new System.Drawing.Point(12, 159);
            this.lbl_VentaArticulo.Name = "lbl_VentaArticulo";
            this.lbl_VentaArticulo.Size = new System.Drawing.Size(42, 13);
            this.lbl_VentaArticulo.TabIndex = 2;
            this.lbl_VentaArticulo.Text = "Articulo";
            // 
            // cmb_VentaCliente
            // 
            this.cmb_VentaCliente.FormattingEnabled = true;
            this.cmb_VentaCliente.Location = new System.Drawing.Point(59, 118);
            this.cmb_VentaCliente.Name = "cmb_VentaCliente";
            this.cmb_VentaCliente.Size = new System.Drawing.Size(171, 21);
            this.cmb_VentaCliente.TabIndex = 3;
            this.cmb_VentaCliente.SelectedIndexChanged += new System.EventHandler(this.cmb_VentaCliente_SelectedIndexChanged);
            // 
            // cmb_VentaArticulo
            // 
            this.cmb_VentaArticulo.FormattingEnabled = true;
            this.cmb_VentaArticulo.Location = new System.Drawing.Point(59, 156);
            this.cmb_VentaArticulo.Name = "cmb_VentaArticulo";
            this.cmb_VentaArticulo.Size = new System.Drawing.Size(121, 21);
            this.cmb_VentaArticulo.TabIndex = 4;
            // 
            // btn_AgregarArticulo
            // 
            this.btn_AgregarArticulo.Location = new System.Drawing.Point(191, 156);
            this.btn_AgregarArticulo.Name = "btn_AgregarArticulo";
            this.btn_AgregarArticulo.Size = new System.Drawing.Size(39, 21);
            this.btn_AgregarArticulo.TabIndex = 5;
            this.btn_AgregarArticulo.Text = "ADD";
            this.btn_AgregarArticulo.UseVisualStyleBackColor = true;
            this.btn_AgregarArticulo.Click += new System.EventHandler(this.btn_AgregarArticulo_Click);
            // 
            // lbl_VentaEnganche
            // 
            this.lbl_VentaEnganche.AutoSize = true;
            this.lbl_VentaEnganche.Location = new System.Drawing.Point(594, 400);
            this.lbl_VentaEnganche.Name = "lbl_VentaEnganche";
            this.lbl_VentaEnganche.Size = new System.Drawing.Size(56, 13);
            this.lbl_VentaEnganche.TabIndex = 7;
            this.lbl_VentaEnganche.Text = "Enganche";
            // 
            // lbl_VentasBoniEng
            // 
            this.lbl_VentasBoniEng.AutoSize = true;
            this.lbl_VentasBoniEng.Location = new System.Drawing.Point(533, 432);
            this.lbl_VentasBoniEng.Name = "lbl_VentasBoniEng";
            this.lbl_VentasBoniEng.Size = new System.Drawing.Size(117, 13);
            this.lbl_VentasBoniEng.TabIndex = 8;
            this.lbl_VentasBoniEng.Text = "Bonificacion Enganche";
            // 
            // lbl_VentaTotal
            // 
            this.lbl_VentaTotal.AutoSize = true;
            this.lbl_VentaTotal.Location = new System.Drawing.Point(619, 468);
            this.lbl_VentaTotal.Name = "lbl_VentaTotal";
            this.lbl_VentaTotal.Size = new System.Drawing.Size(31, 13);
            this.lbl_VentaTotal.TabIndex = 9;
            this.lbl_VentaTotal.Text = "Total";
            // 
            // txt_VentasEnganche
            // 
            this.txt_VentasEnganche.Location = new System.Drawing.Point(656, 397);
            this.txt_VentasEnganche.Name = "txt_VentasEnganche";
            this.txt_VentasEnganche.Size = new System.Drawing.Size(61, 20);
            this.txt_VentasEnganche.TabIndex = 10;
            // 
            // txt_VentaBoniEng
            // 
            this.txt_VentaBoniEng.Location = new System.Drawing.Point(656, 429);
            this.txt_VentaBoniEng.Name = "txt_VentaBoniEng";
            this.txt_VentaBoniEng.Size = new System.Drawing.Size(61, 20);
            this.txt_VentaBoniEng.TabIndex = 11;
            // 
            // txt_VentaTotal
            // 
            this.txt_VentaTotal.Location = new System.Drawing.Point(656, 465);
            this.txt_VentaTotal.Name = "txt_VentaTotal";
            this.txt_VentaTotal.Size = new System.Drawing.Size(61, 20);
            this.txt_VentaTotal.TabIndex = 12;
            // 
            // lbl_VentasLocacion
            // 
            this.lbl_VentasLocacion.AutoSize = true;
            this.lbl_VentasLocacion.Location = new System.Drawing.Point(255, 121);
            this.lbl_VentasLocacion.Name = "lbl_VentasLocacion";
            this.lbl_VentasLocacion.Size = new System.Drawing.Size(54, 13);
            this.lbl_VentasLocacion.TabIndex = 13;
            this.lbl_VentasLocacion.Text = "Locacion:";
            // 
            // lbl_VentasGetLocacion
            // 
            this.lbl_VentasGetLocacion.AutoSize = true;
            this.lbl_VentasGetLocacion.Location = new System.Drawing.Point(306, 121);
            this.lbl_VentasGetLocacion.Name = "lbl_VentasGetLocacion";
            this.lbl_VentasGetLocacion.Size = new System.Drawing.Size(0, 13);
            this.lbl_VentasGetLocacion.TabIndex = 14;
            // 
            // btn_VentasGrabar
            // 
            this.btn_VentasGrabar.Location = new System.Drawing.Point(513, 705);
            this.btn_VentasGrabar.Name = "btn_VentasGrabar";
            this.btn_VentasGrabar.Size = new System.Drawing.Size(64, 23);
            this.btn_VentasGrabar.TabIndex = 15;
            this.btn_VentasGrabar.Text = "Grabar";
            this.btn_VentasGrabar.UseVisualStyleBackColor = true;
            this.btn_VentasGrabar.Click += new System.EventHandler(this.btn_VentasGrabar_Click);
            // 
            // btn_VentasCancelar
            // 
            this.btn_VentasCancelar.Location = new System.Drawing.Point(583, 705);
            this.btn_VentasCancelar.Name = "btn_VentasCancelar";
            this.btn_VentasCancelar.Size = new System.Drawing.Size(64, 23);
            this.btn_VentasCancelar.TabIndex = 17;
            this.btn_VentasCancelar.Text = "Cancelar";
            this.btn_VentasCancelar.UseVisualStyleBackColor = true;
            this.btn_VentasCancelar.Click += new System.EventHandler(this.btn_VentasCancelar_Click);
            // 
            // btn_VentasSiguente
            // 
            this.btn_VentasSiguente.Location = new System.Drawing.Point(653, 705);
            this.btn_VentasSiguente.Name = "btn_VentasSiguente";
            this.btn_VentasSiguente.Size = new System.Drawing.Size(64, 23);
            this.btn_VentasSiguente.TabIndex = 18;
            this.btn_VentasSiguente.Text = "Siguiente";
            this.btn_VentasSiguente.UseVisualStyleBackColor = true;
            this.btn_VentasSiguente.Click += new System.EventHandler(this.btn_VentasSiguente_Click);
            // 
            // lbl_VentasAbonosMensuales
            // 
            this.lbl_VentasAbonosMensuales.AutoSize = true;
            this.lbl_VentasAbonosMensuales.Location = new System.Drawing.Point(308, 506);
            this.lbl_VentasAbonosMensuales.Name = "lbl_VentasAbonosMensuales";
            this.lbl_VentasAbonosMensuales.Size = new System.Drawing.Size(121, 13);
            this.lbl_VentasAbonosMensuales.TabIndex = 19;
            this.lbl_VentasAbonosMensuales.Text = "ABONOS MENSUALES";
            // 
            // btn_VentasREgresar
            // 
            this.btn_VentasREgresar.Location = new System.Drawing.Point(12, 705);
            this.btn_VentasREgresar.Name = "btn_VentasREgresar";
            this.btn_VentasREgresar.Size = new System.Drawing.Size(75, 23);
            this.btn_VentasREgresar.TabIndex = 20;
            this.btn_VentasREgresar.Text = "Regresar";
            this.btn_VentasREgresar.UseVisualStyleBackColor = true;
            this.btn_VentasREgresar.Click += new System.EventHandler(this.btn_VentasREgresar_Click);
            // 
            // btn_Eliminar
            // 
            this.btn_Eliminar.Location = new System.Drawing.Point(1387, 343);
            this.btn_Eliminar.Name = "btn_Eliminar";
            this.btn_Eliminar.Size = new System.Drawing.Size(75, 23);
            this.btn_Eliminar.TabIndex = 34;
            this.btn_Eliminar.Text = "Eliminar";
            this.btn_Eliminar.UseVisualStyleBackColor = true;
            this.btn_Eliminar.Click += new System.EventHandler(this.btn_Eliminar_Click);
            // 
            // btn_Modificar
            // 
            this.btn_Modificar.Location = new System.Drawing.Point(1387, 314);
            this.btn_Modificar.Name = "btn_Modificar";
            this.btn_Modificar.Size = new System.Drawing.Size(75, 23);
            this.btn_Modificar.TabIndex = 33;
            this.btn_Modificar.Text = "Modificar";
            this.btn_Modificar.UseVisualStyleBackColor = true;
            this.btn_Modificar.Click += new System.EventHandler(this.btn_Modificar_Click);
            // 
            // btn_Consultar
            // 
            this.btn_Consultar.Location = new System.Drawing.Point(1387, 259);
            this.btn_Consultar.Name = "btn_Consultar";
            this.btn_Consultar.Size = new System.Drawing.Size(75, 23);
            this.btn_Consultar.TabIndex = 32;
            this.btn_Consultar.Text = "Consultar";
            this.btn_Consultar.UseVisualStyleBackColor = true;
            this.btn_Consultar.Click += new System.EventHandler(this.btn_Consultar_Click);
            // 
            // txt_FechaVenta
            // 
            this.txt_FechaVenta.Location = new System.Drawing.Point(1243, 331);
            this.txt_FechaVenta.Name = "txt_FechaVenta";
            this.txt_FechaVenta.Size = new System.Drawing.Size(100, 20);
            this.txt_FechaVenta.TabIndex = 31;
            this.txt_FechaVenta.TextChanged += new System.EventHandler(this.txt_FechaVenta_TextChanged);
            // 
            // txt_TotalVenta
            // 
            this.txt_TotalVenta.Location = new System.Drawing.Point(1243, 285);
            this.txt_TotalVenta.Name = "txt_TotalVenta";
            this.txt_TotalVenta.Size = new System.Drawing.Size(100, 20);
            this.txt_TotalVenta.TabIndex = 30;
            this.txt_TotalVenta.TextChanged += new System.EventHandler(this.txt_TotalVenta_TextChanged);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(1160, 331);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(68, 13);
            this.label4.TabIndex = 29;
            this.label4.Text = "Fecha Venta";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(1157, 285);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(62, 13);
            this.label3.TabIndex = 28;
            this.label3.Text = "Total Venta";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(926, 331);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(39, 13);
            this.label2.TabIndex = 26;
            this.label2.Text = "Cliente";
            // 
            // txt_Codigo
            // 
            this.txt_Codigo.Location = new System.Drawing.Point(979, 285);
            this.txt_Codigo.Name = "txt_Codigo";
            this.txt_Codigo.Size = new System.Drawing.Size(100, 20);
            this.txt_Codigo.TabIndex = 25;
            this.txt_Codigo.TextChanged += new System.EventHandler(this.txt_Codigo_TextChanged);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(923, 285);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(40, 13);
            this.label1.TabIndex = 24;
            this.label1.Text = "Codigo";
            // 
            // rdb_Eliminar
            // 
            this.rdb_Eliminar.AutoSize = true;
            this.rdb_Eliminar.Location = new System.Drawing.Point(1160, 374);
            this.rdb_Eliminar.Name = "rdb_Eliminar";
            this.rdb_Eliminar.Size = new System.Drawing.Size(61, 17);
            this.rdb_Eliminar.TabIndex = 23;
            this.rdb_Eliminar.TabStop = true;
            this.rdb_Eliminar.Text = "Eliminar";
            this.rdb_Eliminar.UseVisualStyleBackColor = true;
            this.rdb_Eliminar.CheckedChanged += new System.EventHandler(this.rdb_Eliminar_CheckedChanged_1);
            // 
            // rdb_Modificar
            // 
            this.rdb_Modificar.AutoSize = true;
            this.rdb_Modificar.Location = new System.Drawing.Point(1059, 374);
            this.rdb_Modificar.Name = "rdb_Modificar";
            this.rdb_Modificar.Size = new System.Drawing.Size(68, 17);
            this.rdb_Modificar.TabIndex = 22;
            this.rdb_Modificar.TabStop = true;
            this.rdb_Modificar.Text = "Modificar";
            this.rdb_Modificar.UseVisualStyleBackColor = true;
            this.rdb_Modificar.CheckedChanged += new System.EventHandler(this.rdb_Modificar_CheckedChanged_1);
            // 
            // menuStrip1
            // 
            this.menuStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.nuevaVentaToolStripMenuItem,
            this.modiElimVentaToolStripMenuItem});
            this.menuStrip1.Location = new System.Drawing.Point(0, 0);
            this.menuStrip1.Name = "menuStrip1";
            this.menuStrip1.Size = new System.Drawing.Size(1474, 24);
            this.menuStrip1.TabIndex = 35;
            this.menuStrip1.Text = "menuStrip1";
            this.menuStrip1.ItemClicked += new System.Windows.Forms.ToolStripItemClickedEventHandler(this.menuStrip1_ItemClicked);
            // 
            // nuevaVentaToolStripMenuItem
            // 
            this.nuevaVentaToolStripMenuItem.Name = "nuevaVentaToolStripMenuItem";
            this.nuevaVentaToolStripMenuItem.Size = new System.Drawing.Size(85, 20);
            this.nuevaVentaToolStripMenuItem.Text = "Nueva Venta";
            // 
            // modiElimVentaToolStripMenuItem
            // 
            this.modiElimVentaToolStripMenuItem.Name = "modiElimVentaToolStripMenuItem";
            this.modiElimVentaToolStripMenuItem.Size = new System.Drawing.Size(113, 20);
            this.modiElimVentaToolStripMenuItem.Text = "Modi - Elim Venta";
            // 
            // contextMenuStrip1
            // 
            this.contextMenuStrip1.Name = "contextMenuStrip1";
            this.contextMenuStrip1.Size = new System.Drawing.Size(61, 4);
            // 
            // contextMenuStrip2
            // 
            this.contextMenuStrip2.Name = "contextMenuStrip2";
            this.contextMenuStrip2.Size = new System.Drawing.Size(61, 4);
            // 
            // contextMenuStrip3
            // 
            this.contextMenuStrip3.Name = "contextMenuStrip3";
            this.contextMenuStrip3.Size = new System.Drawing.Size(61, 4);
            // 
            // cmb_VentaClienteFrm
            // 
            this.cmb_VentaClienteFrm.FormattingEnabled = true;
            this.cmb_VentaClienteFrm.Location = new System.Drawing.Point(979, 328);
            this.cmb_VentaClienteFrm.Name = "cmb_VentaClienteFrm";
            this.cmb_VentaClienteFrm.Size = new System.Drawing.Size(156, 21);
            this.cmb_VentaClienteFrm.TabIndex = 39;
            this.cmb_VentaClienteFrm.SelectedIndexChanged += new System.EventHandler(this.cmb_VentaClienteFrm_SelectedIndexChanged);
            // 
            // dgvAddArticulos
            // 
            this.dgvAddArticulos.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgvAddArticulos.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvAddArticulos.Location = new System.Drawing.Point(15, 197);
            this.dgvAddArticulos.Name = "dgvAddArticulos";
            this.dgvAddArticulos.Size = new System.Drawing.Size(702, 194);
            this.dgvAddArticulos.TabIndex = 40;
            this.dgvAddArticulos.CellLeave += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgvAddArticulos_CellLeave);
            this.dgvAddArticulos.CellEnter += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgvAddArticulos_CellEnter);
            this.dgvAddArticulos.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgvAddArticulos_CellContentClick_1);
            // 
            // dgvVentas
            // 
            this.dgvVentas.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgvVentas.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvVentas.Location = new System.Drawing.Point(785, 411);
            this.dgvVentas.Name = "dgvVentas";
            this.dgvVentas.Size = new System.Drawing.Size(677, 210);
            this.dgvVentas.TabIndex = 41;
            this.dgvVentas.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgvVentas_CellContentClick);
            // 
            // dgvAbonosMensuales
            // 
            this.dgvAbonosMensuales.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgvAbonosMensuales.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvAbonosMensuales.Location = new System.Drawing.Point(15, 535);
            this.dgvAbonosMensuales.Name = "dgvAbonosMensuales";
            this.dgvAbonosMensuales.Size = new System.Drawing.Size(702, 150);
            this.dgvAbonosMensuales.TabIndex = 42;
            this.dgvAbonosMensuales.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgvAbonosMensuales_CellContentClick_1);
            // 
            // Ventas
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.AutoSize = true;
            this.ClientSize = new System.Drawing.Size(1474, 823);
            this.Controls.Add(this.dgvAbonosMensuales);
            this.Controls.Add(this.dgvVentas);
            this.Controls.Add(this.dgvAddArticulos);
            this.Controls.Add(this.btn_VentasREgresar);
            this.Controls.Add(this.lbl_VentasAbonosMensuales);
            this.Controls.Add(this.btn_VentasSiguente);
            this.Controls.Add(this.btn_Eliminar);
            this.Controls.Add(this.txt_FechaVenta);
            this.Controls.Add(this.btn_Modificar);
            this.Controls.Add(this.btn_Consultar);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.cmb_VentaClienteFrm);
            this.Controls.Add(this.txt_TotalVenta);
            this.Controls.Add(this.btn_VentasCancelar);
            this.Controls.Add(this.btn_VentasGrabar);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.rdb_Eliminar);
            this.Controls.Add(this.lbl_VentasGetLocacion);
            this.Controls.Add(this.txt_Codigo);
            this.Controls.Add(this.rdb_Modificar);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.lbl_VentasLocacion);
            this.Controls.Add(this.txt_VentaTotal);
            this.Controls.Add(this.txt_VentaBoniEng);
            this.Controls.Add(this.txt_VentasEnganche);
            this.Controls.Add(this.lbl_VentaTotal);
            this.Controls.Add(this.lbl_VentasBoniEng);
            this.Controls.Add(this.lbl_VentaEnganche);
            this.Controls.Add(this.btn_AgregarArticulo);
            this.Controls.Add(this.cmb_VentaArticulo);
            this.Controls.Add(this.cmb_VentaCliente);
            this.Controls.Add(this.lbl_VentaArticulo);
            this.Controls.Add(this.lbl_VentaCliente);
            this.Controls.Add(this.lbl_Ventas);
            this.Controls.Add(this.menuStrip1);
            this.Name = "Ventas";
            this.Text = "Ventas";
            this.Load += new System.EventHandler(this.FrmVentas_Load);
            this.menuStrip1.ResumeLayout(false);
            this.menuStrip1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvAddArticulos)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgvVentas)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgvAbonosMensuales)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lbl_Ventas;
        private System.Windows.Forms.Label lbl_VentaCliente;
        private System.Windows.Forms.Label lbl_VentaArticulo;
        private System.Windows.Forms.ComboBox cmb_VentaCliente;
        private System.Windows.Forms.ComboBox cmb_VentaArticulo;
        private System.Windows.Forms.Button btn_AgregarArticulo;
        private System.Windows.Forms.Label lbl_VentaEnganche;
        private System.Windows.Forms.Label lbl_VentasBoniEng;
        private System.Windows.Forms.Label lbl_VentaTotal;
        private System.Windows.Forms.TextBox txt_VentasEnganche;
        private System.Windows.Forms.TextBox txt_VentaBoniEng;
        private System.Windows.Forms.TextBox txt_VentaTotal;
        private System.Windows.Forms.Label lbl_VentasLocacion;
        private System.Windows.Forms.Label lbl_VentasGetLocacion;
        private System.Windows.Forms.Button btn_VentasGrabar;
        private System.Windows.Forms.Button btn_VentasCancelar;
        private System.Windows.Forms.Button btn_VentasSiguente;
        private System.Windows.Forms.Label lbl_VentasAbonosMensuales;
        private System.Windows.Forms.DataGridViewCheckBoxColumn Column1;
        private System.Windows.Forms.Button btn_VentasREgresar;
        private System.Windows.Forms.Button btn_Eliminar;
        private System.Windows.Forms.Button btn_Modificar;
        private System.Windows.Forms.Button btn_Consultar;
        private System.Windows.Forms.TextBox txt_FechaVenta;
        private System.Windows.Forms.TextBox txt_TotalVenta;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox txt_Codigo;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.RadioButton rdb_Eliminar;
        private System.Windows.Forms.RadioButton rdb_Modificar;
        private System.Windows.Forms.MenuStrip menuStrip1;
        private System.Windows.Forms.ToolStripMenuItem nuevaVentaToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem modiElimVentaToolStripMenuItem;
        private System.Windows.Forms.ContextMenuStrip contextMenuStrip1;
        private System.Windows.Forms.ContextMenuStrip contextMenuStrip2;
        private System.Windows.Forms.ContextMenuStrip contextMenuStrip3;
        private System.Windows.Forms.ComboBox cmb_VentaClienteFrm;
        private System.Windows.Forms.DataGridView dgvAddArticulos;
        private System.Windows.Forms.DataGridView dgvVentas;
        private System.Windows.Forms.DataGridView dgvAbonosMensuales;
    }
}