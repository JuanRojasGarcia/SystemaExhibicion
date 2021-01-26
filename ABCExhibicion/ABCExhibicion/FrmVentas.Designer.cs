namespace ABCExhibicion
{
    partial class FrmVentas
    {
        /// <summary>
        /// Variable del diseñador requerida.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpiar los recursos que se estén utilizando.
        /// </summary>
        /// <param name="disposing">true si los recursos administrados se deben eliminar; false en caso contrario, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código generado por el Diseñador de Windows Forms

        /// <summary>
        /// Método necesario para admitir el Diseñador. No se puede modificar
        /// el contenido del método con el editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.menuStrip1 = new System.Windows.Forms.MenuStrip();
            this.inicioToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.ventasToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.clientesToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.articulosToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.locacionesToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.configuracionToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.label5 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.label8 = new System.Windows.Forms.Label();
            this.lbl_TAR = new System.Windows.Forms.Label();
            this.lbl_TCE = new System.Windows.Forms.Label();
            this.lbl_TCL = new System.Windows.Forms.Label();
            this.lbl_TVE = new System.Windows.Forms.Label();
            this.menuStrip1.SuspendLayout();
            this.SuspendLayout();
            // 
            // menuStrip1
            // 
            this.menuStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.inicioToolStripMenuItem});
            this.menuStrip1.Location = new System.Drawing.Point(0, 0);
            this.menuStrip1.Name = "menuStrip1";
            this.menuStrip1.Size = new System.Drawing.Size(656, 24);
            this.menuStrip1.TabIndex = 0;
            this.menuStrip1.Text = "menuStrip1";
            // 
            // inicioToolStripMenuItem
            // 
            this.inicioToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.ventasToolStripMenuItem,
            this.clientesToolStripMenuItem,
            this.articulosToolStripMenuItem,
            this.locacionesToolStripMenuItem,
            this.configuracionToolStripMenuItem});
            this.inicioToolStripMenuItem.Name = "inicioToolStripMenuItem";
            this.inicioToolStripMenuItem.Size = new System.Drawing.Size(50, 20);
            this.inicioToolStripMenuItem.Text = "Menu";
            // 
            // ventasToolStripMenuItem
            // 
            this.ventasToolStripMenuItem.Name = "ventasToolStripMenuItem";
            this.ventasToolStripMenuItem.Size = new System.Drawing.Size(150, 22);
            this.ventasToolStripMenuItem.Text = "Ventas";
            this.ventasToolStripMenuItem.Click += new System.EventHandler(this.ventasToolStripMenuItem_Click);
            // 
            // clientesToolStripMenuItem
            // 
            this.clientesToolStripMenuItem.Name = "clientesToolStripMenuItem";
            this.clientesToolStripMenuItem.Size = new System.Drawing.Size(150, 22);
            this.clientesToolStripMenuItem.Text = "Clientes";
            this.clientesToolStripMenuItem.Click += new System.EventHandler(this.clientesToolStripMenuItem_Click);
            // 
            // articulosToolStripMenuItem
            // 
            this.articulosToolStripMenuItem.Name = "articulosToolStripMenuItem";
            this.articulosToolStripMenuItem.Size = new System.Drawing.Size(150, 22);
            this.articulosToolStripMenuItem.Text = "Articulos";
            this.articulosToolStripMenuItem.Click += new System.EventHandler(this.articulosToolStripMenuItem_Click);
            // 
            // locacionesToolStripMenuItem
            // 
            this.locacionesToolStripMenuItem.Name = "locacionesToolStripMenuItem";
            this.locacionesToolStripMenuItem.Size = new System.Drawing.Size(150, 22);
            this.locacionesToolStripMenuItem.Text = "Locaciones";
            this.locacionesToolStripMenuItem.Click += new System.EventHandler(this.locacionesToolStripMenuItem_Click_1);
            // 
            // configuracionToolStripMenuItem
            // 
            this.configuracionToolStripMenuItem.Name = "configuracionToolStripMenuItem";
            this.configuracionToolStripMenuItem.Size = new System.Drawing.Size(150, 22);
            this.configuracionToolStripMenuItem.Text = "Configuracion";
            this.configuracionToolStripMenuItem.Click += new System.EventHandler(this.configuracionToolStripMenuItem_Click);
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(97, 51);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(47, 13);
            this.label5.TabIndex = 16;
            this.label5.Text = "Articulos";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(241, 51);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(62, 13);
            this.label6.TabIndex = 17;
            this.label6.Text = "Locaciones";
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(403, 51);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(44, 13);
            this.label7.TabIndex = 18;
            this.label7.Text = "Clientes";
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Location = new System.Drawing.Point(551, 51);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(40, 13);
            this.label8.TabIndex = 19;
            this.label8.Text = "Ventas";
            // 
            // lbl_TAR
            // 
            this.lbl_TAR.AutoSize = true;
            this.lbl_TAR.Location = new System.Drawing.Point(112, 69);
            this.lbl_TAR.Name = "lbl_TAR";
            this.lbl_TAR.Size = new System.Drawing.Size(29, 13);
            this.lbl_TAR.TabIndex = 20;
            this.lbl_TAR.Text = "TAR";
            // 
            // lbl_TCE
            // 
            this.lbl_TCE.AutoSize = true;
            this.lbl_TCE.Location = new System.Drawing.Point(256, 69);
            this.lbl_TCE.Name = "lbl_TCE";
            this.lbl_TCE.Size = new System.Drawing.Size(28, 13);
            this.lbl_TCE.TabIndex = 21;
            this.lbl_TCE.Text = "TLO";
            // 
            // lbl_TCL
            // 
            this.lbl_TCL.AutoSize = true;
            this.lbl_TCL.Location = new System.Drawing.Point(420, 69);
            this.lbl_TCL.Name = "lbl_TCL";
            this.lbl_TCL.Size = new System.Drawing.Size(27, 13);
            this.lbl_TCL.TabIndex = 22;
            this.lbl_TCL.Text = "TCL";
            // 
            // lbl_TVE
            // 
            this.lbl_TVE.AutoSize = true;
            this.lbl_TVE.Location = new System.Drawing.Point(563, 69);
            this.lbl_TVE.Name = "lbl_TVE";
            this.lbl_TVE.Size = new System.Drawing.Size(28, 13);
            this.lbl_TVE.TabIndex = 23;
            this.lbl_TVE.Text = "TVE";
            // 
            // FrmVentas
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(656, 489);
            this.Controls.Add(this.lbl_TVE);
            this.Controls.Add(this.lbl_TCL);
            this.Controls.Add(this.lbl_TCE);
            this.Controls.Add(this.lbl_TAR);
            this.Controls.Add(this.label8);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.menuStrip1);
            this.MainMenuStrip = this.menuStrip1;
            this.Name = "FrmVentas";
            this.Text = "ABCExhibicion";
            this.Load += new System.EventHandler(this.FrmAbcExhibicion_Load);
            this.menuStrip1.ResumeLayout(false);
            this.menuStrip1.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.MenuStrip menuStrip1;
        private System.Windows.Forms.ToolStripMenuItem inicioToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem ventasToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem clientesToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem articulosToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem locacionesToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem configuracionToolStripMenuItem;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label lbl_TAR;
        private System.Windows.Forms.Label lbl_TCE;
        private System.Windows.Forms.Label lbl_TCL;
        private System.Windows.Forms.Label lbl_TVE;
    }
}

