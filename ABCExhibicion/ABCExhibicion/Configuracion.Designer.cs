namespace ABCExhibicion
{
    partial class Configuracion
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
            this.lbl_tasaFinanciamiento = new System.Windows.Forms.Label();
            this.txt_tasaFinanciamiento = new System.Windows.Forms.TextBox();
            this.lbl_enganche = new System.Windows.Forms.Label();
            this.txt_Enganche = new System.Windows.Forms.TextBox();
            this.lbl_PlazoMaximo = new System.Windows.Forms.Label();
            this.lbl_Configuracion = new System.Windows.Forms.Label();
            this.lbl_Actual = new System.Windows.Forms.Label();
            this.lbl_ConfPlazoActual = new System.Windows.Forms.Label();
            this.btn_ModificarConf = new System.Windows.Forms.Button();
            this.btn_ConfiguracionRegresar = new System.Windows.Forms.Button();
            this.numupdown_PlazoMaximo = new System.Windows.Forms.NumericUpDown();
            ((System.ComponentModel.ISupportInitialize)(this.numupdown_PlazoMaximo)).BeginInit();
            this.SuspendLayout();
            // 
            // lbl_tasaFinanciamiento
            // 
            this.lbl_tasaFinanciamiento.AutoSize = true;
            this.lbl_tasaFinanciamiento.Location = new System.Drawing.Point(58, 68);
            this.lbl_tasaFinanciamiento.Name = "lbl_tasaFinanciamiento";
            this.lbl_tasaFinanciamiento.Size = new System.Drawing.Size(105, 13);
            this.lbl_tasaFinanciamiento.TabIndex = 0;
            this.lbl_tasaFinanciamiento.Text = "Tasa Financiamiento";
            // 
            // txt_tasaFinanciamiento
            // 
            this.txt_tasaFinanciamiento.Location = new System.Drawing.Point(184, 65);
            this.txt_tasaFinanciamiento.Name = "txt_tasaFinanciamiento";
            this.txt_tasaFinanciamiento.Size = new System.Drawing.Size(100, 20);
            this.txt_tasaFinanciamiento.TabIndex = 1;
            // 
            // lbl_enganche
            // 
            this.lbl_enganche.AutoSize = true;
            this.lbl_enganche.Location = new System.Drawing.Point(96, 112);
            this.lbl_enganche.Name = "lbl_enganche";
            this.lbl_enganche.Size = new System.Drawing.Size(67, 13);
            this.lbl_enganche.TabIndex = 2;
            this.lbl_enganche.Text = "% Enganche";
            // 
            // txt_Enganche
            // 
            this.txt_Enganche.Location = new System.Drawing.Point(184, 109);
            this.txt_Enganche.Name = "txt_Enganche";
            this.txt_Enganche.Size = new System.Drawing.Size(100, 20);
            this.txt_Enganche.TabIndex = 3;
            // 
            // lbl_PlazoMaximo
            // 
            this.lbl_PlazoMaximo.AutoSize = true;
            this.lbl_PlazoMaximo.Location = new System.Drawing.Point(91, 161);
            this.lbl_PlazoMaximo.Name = "lbl_PlazoMaximo";
            this.lbl_PlazoMaximo.Size = new System.Drawing.Size(72, 13);
            this.lbl_PlazoMaximo.TabIndex = 4;
            this.lbl_PlazoMaximo.Text = "Plazo Maximo";
            // 
            // lbl_Configuracion
            // 
            this.lbl_Configuracion.AutoSize = true;
            this.lbl_Configuracion.Location = new System.Drawing.Point(167, 9);
            this.lbl_Configuracion.Name = "lbl_Configuracion";
            this.lbl_Configuracion.Size = new System.Drawing.Size(72, 13);
            this.lbl_Configuracion.TabIndex = 6;
            this.lbl_Configuracion.Text = "Configuracion";
            // 
            // lbl_Actual
            // 
            this.lbl_Actual.AutoSize = true;
            this.lbl_Actual.Location = new System.Drawing.Point(307, 139);
            this.lbl_Actual.Name = "lbl_Actual";
            this.lbl_Actual.Size = new System.Drawing.Size(37, 13);
            this.lbl_Actual.TabIndex = 7;
            this.lbl_Actual.Text = "Actual";
            // 
            // lbl_ConfPlazoActual
            // 
            this.lbl_ConfPlazoActual.AutoSize = true;
            this.lbl_ConfPlazoActual.Location = new System.Drawing.Point(314, 161);
            this.lbl_ConfPlazoActual.Name = "lbl_ConfPlazoActual";
            this.lbl_ConfPlazoActual.Size = new System.Drawing.Size(66, 13);
            this.lbl_ConfPlazoActual.TabIndex = 8;
            this.lbl_ConfPlazoActual.Text = "Plazo Actual";
            // 
            // btn_ModificarConf
            // 
            this.btn_ModificarConf.Location = new System.Drawing.Point(164, 221);
            this.btn_ModificarConf.Name = "btn_ModificarConf";
            this.btn_ModificarConf.Size = new System.Drawing.Size(75, 23);
            this.btn_ModificarConf.TabIndex = 9;
            this.btn_ModificarConf.Text = "Modificar";
            this.btn_ModificarConf.UseVisualStyleBackColor = true;
            this.btn_ModificarConf.Click += new System.EventHandler(this.btn_ModificarConf_Click);
            // 
            // btn_ConfiguracionRegresar
            // 
            this.btn_ConfiguracionRegresar.Location = new System.Drawing.Point(13, 274);
            this.btn_ConfiguracionRegresar.Name = "btn_ConfiguracionRegresar";
            this.btn_ConfiguracionRegresar.Size = new System.Drawing.Size(75, 23);
            this.btn_ConfiguracionRegresar.TabIndex = 10;
            this.btn_ConfiguracionRegresar.Text = "Regresar";
            this.btn_ConfiguracionRegresar.UseVisualStyleBackColor = true;
            this.btn_ConfiguracionRegresar.Click += new System.EventHandler(this.btn_ConfiguracionRegresar_Click);
            // 
            // numupdown_PlazoMaximo
            // 
            this.numupdown_PlazoMaximo.Increment = new decimal(new int[] {
            3,
            0,
            0,
            0});
            this.numupdown_PlazoMaximo.Location = new System.Drawing.Point(184, 161);
            this.numupdown_PlazoMaximo.Maximum = new decimal(new int[] {
            12,
            0,
            0,
            0});
            this.numupdown_PlazoMaximo.Minimum = new decimal(new int[] {
            3,
            0,
            0,
            0});
            this.numupdown_PlazoMaximo.Name = "numupdown_PlazoMaximo";
            this.numupdown_PlazoMaximo.ReadOnly = true;
            this.numupdown_PlazoMaximo.Size = new System.Drawing.Size(100, 20);
            this.numupdown_PlazoMaximo.TabIndex = 11;
            this.numupdown_PlazoMaximo.Value = new decimal(new int[] {
            3,
            0,
            0,
            0});
            // 
            // FrmConfiguracion
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(400, 309);
            this.Controls.Add(this.numupdown_PlazoMaximo);
            this.Controls.Add(this.btn_ConfiguracionRegresar);
            this.Controls.Add(this.btn_ModificarConf);
            this.Controls.Add(this.lbl_ConfPlazoActual);
            this.Controls.Add(this.lbl_Actual);
            this.Controls.Add(this.lbl_Configuracion);
            this.Controls.Add(this.lbl_PlazoMaximo);
            this.Controls.Add(this.txt_Enganche);
            this.Controls.Add(this.lbl_enganche);
            this.Controls.Add(this.txt_tasaFinanciamiento);
            this.Controls.Add(this.lbl_tasaFinanciamiento);
            this.Name = "FrmConfiguracion";
            this.Text = "Configuracion";
            this.Load += new System.EventHandler(this.FrmConfiguracion_Load);
            ((System.ComponentModel.ISupportInitialize)(this.numupdown_PlazoMaximo)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lbl_tasaFinanciamiento;
        private System.Windows.Forms.TextBox txt_tasaFinanciamiento;
        private System.Windows.Forms.Label lbl_enganche;
        private System.Windows.Forms.TextBox txt_Enganche;
        private System.Windows.Forms.Label lbl_PlazoMaximo;
        private System.Windows.Forms.Label lbl_Configuracion;
        private System.Windows.Forms.Label lbl_Actual;
        private System.Windows.Forms.Label lbl_ConfPlazoActual;
        private System.Windows.Forms.Button btn_ModificarConf;
        private System.Windows.Forms.Button btn_ConfiguracionRegresar;
        private System.Windows.Forms.NumericUpDown numupdown_PlazoMaximo;
    }
}