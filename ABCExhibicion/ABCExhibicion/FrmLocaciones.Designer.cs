namespace ABCExhibicion
{
    partial class FrmLocaciones
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
            this.lbl_Locaciones = new System.Windows.Forms.Label();
            this.lbl_LocacionMunicipio = new System.Windows.Forms.Label();
            this.txt_LocacionMunicipio = new System.Windows.Forms.TextBox();
            this.lbl_LocacionNum = new System.Windows.Forms.Label();
            this.txt_LocacionNum = new System.Windows.Forms.TextBox();
            this.rdb_AgregarCentro = new System.Windows.Forms.RadioButton();
            this.rdb_ModificarCentro = new System.Windows.Forms.RadioButton();
            this.rdb_EliminarCentro = new System.Windows.Forms.RadioButton();
            this.btn_Agregar = new System.Windows.Forms.Button();
            this.btn_Modificar = new System.Windows.Forms.Button();
            this.btn_Eliminar = new System.Windows.Forms.Button();
            this.btn_Consultar = new System.Windows.Forms.Button();
            this.dgvLocacion = new System.Windows.Forms.DataGridView();
            this.btn_CentrosRegresar = new System.Windows.Forms.Button();
            this.lbl_Locacion = new System.Windows.Forms.Label();
            this.txt_Locacion = new System.Windows.Forms.TextBox();
            ((System.ComponentModel.ISupportInitialize)(this.dgvLocacion)).BeginInit();
            this.SuspendLayout();
            // 
            // lbl_Locaciones
            // 
            this.lbl_Locaciones.AutoSize = true;
            this.lbl_Locaciones.Location = new System.Drawing.Point(167, 9);
            this.lbl_Locaciones.Name = "lbl_Locaciones";
            this.lbl_Locaciones.Size = new System.Drawing.Size(62, 13);
            this.lbl_Locaciones.TabIndex = 0;
            this.lbl_Locaciones.Text = "Locaciones";
            // 
            // lbl_LocacionMunicipio
            // 
            this.lbl_LocacionMunicipio.AutoSize = true;
            this.lbl_LocacionMunicipio.Location = new System.Drawing.Point(58, 97);
            this.lbl_LocacionMunicipio.Name = "lbl_LocacionMunicipio";
            this.lbl_LocacionMunicipio.Size = new System.Drawing.Size(52, 13);
            this.lbl_LocacionMunicipio.TabIndex = 1;
            this.lbl_LocacionMunicipio.Text = "Municipio";
            // 
            // txt_LocacionMunicipio
            // 
            this.txt_LocacionMunicipio.Location = new System.Drawing.Point(127, 94);
            this.txt_LocacionMunicipio.Name = "txt_LocacionMunicipio";
            this.txt_LocacionMunicipio.Size = new System.Drawing.Size(100, 20);
            this.txt_LocacionMunicipio.TabIndex = 2;
            this.txt_LocacionMunicipio.TextChanged += new System.EventHandler(this.txt_LocacionMunicipio_TextChanged);
            // 
            // lbl_LocacionNum
            // 
            this.lbl_LocacionNum.AutoSize = true;
            this.lbl_LocacionNum.Location = new System.Drawing.Point(63, 55);
            this.lbl_LocacionNum.Name = "lbl_LocacionNum";
            this.lbl_LocacionNum.Size = new System.Drawing.Size(29, 13);
            this.lbl_LocacionNum.TabIndex = 3;
            this.lbl_LocacionNum.Text = "Num";
            // 
            // txt_LocacionNum
            // 
            this.txt_LocacionNum.Location = new System.Drawing.Point(128, 52);
            this.txt_LocacionNum.Name = "txt_LocacionNum";
            this.txt_LocacionNum.Size = new System.Drawing.Size(100, 20);
            this.txt_LocacionNum.TabIndex = 4;
            this.txt_LocacionNum.TextChanged += new System.EventHandler(this.txt_LocacionNum_TextChanged);
            // 
            // rdb_AgregarCentro
            // 
            this.rdb_AgregarCentro.AutoSize = true;
            this.rdb_AgregarCentro.Location = new System.Drawing.Point(58, 180);
            this.rdb_AgregarCentro.Name = "rdb_AgregarCentro";
            this.rdb_AgregarCentro.Size = new System.Drawing.Size(62, 17);
            this.rdb_AgregarCentro.TabIndex = 5;
            this.rdb_AgregarCentro.Text = "Agregar";
            this.rdb_AgregarCentro.UseVisualStyleBackColor = true;
            this.rdb_AgregarCentro.CheckedChanged += new System.EventHandler(this.rdb_AgregarCentro_CheckedChanged);
            // 
            // rdb_ModificarCentro
            // 
            this.rdb_ModificarCentro.AutoSize = true;
            this.rdb_ModificarCentro.Location = new System.Drawing.Point(126, 180);
            this.rdb_ModificarCentro.Name = "rdb_ModificarCentro";
            this.rdb_ModificarCentro.Size = new System.Drawing.Size(68, 17);
            this.rdb_ModificarCentro.TabIndex = 6;
            this.rdb_ModificarCentro.Text = "Modificar";
            this.rdb_ModificarCentro.UseVisualStyleBackColor = true;
            this.rdb_ModificarCentro.CheckedChanged += new System.EventHandler(this.rdb_ModificarCentro_CheckedChanged);
            // 
            // rdb_EliminarCentro
            // 
            this.rdb_EliminarCentro.AutoSize = true;
            this.rdb_EliminarCentro.Location = new System.Drawing.Point(200, 180);
            this.rdb_EliminarCentro.Name = "rdb_EliminarCentro";
            this.rdb_EliminarCentro.Size = new System.Drawing.Size(61, 17);
            this.rdb_EliminarCentro.TabIndex = 7;
            this.rdb_EliminarCentro.Text = "Eliminar";
            this.rdb_EliminarCentro.UseVisualStyleBackColor = true;
            this.rdb_EliminarCentro.CheckedChanged += new System.EventHandler(this.rdb_EliminarCentro_CheckedChanged);
            // 
            // btn_Agregar
            // 
            this.btn_Agregar.Location = new System.Drawing.Point(17, 245);
            this.btn_Agregar.Name = "btn_Agregar";
            this.btn_Agregar.Size = new System.Drawing.Size(75, 23);
            this.btn_Agregar.TabIndex = 8;
            this.btn_Agregar.Text = "Grabar";
            this.btn_Agregar.UseVisualStyleBackColor = true;
            this.btn_Agregar.Click += new System.EventHandler(this.btn_Agregar_Click);
            // 
            // btn_Modificar
            // 
            this.btn_Modificar.Location = new System.Drawing.Point(113, 245);
            this.btn_Modificar.Name = "btn_Modificar";
            this.btn_Modificar.Size = new System.Drawing.Size(75, 23);
            this.btn_Modificar.TabIndex = 9;
            this.btn_Modificar.Text = "Modificar";
            this.btn_Modificar.UseVisualStyleBackColor = true;
            this.btn_Modificar.Click += new System.EventHandler(this.btn_Modificar_Click);
            // 
            // btn_Eliminar
            // 
            this.btn_Eliminar.Location = new System.Drawing.Point(224, 245);
            this.btn_Eliminar.Name = "btn_Eliminar";
            this.btn_Eliminar.Size = new System.Drawing.Size(75, 23);
            this.btn_Eliminar.TabIndex = 10;
            this.btn_Eliminar.Text = "Eliminar";
            this.btn_Eliminar.UseVisualStyleBackColor = true;
            this.btn_Eliminar.Click += new System.EventHandler(this.btn_Eliminar_Click);
            // 
            // btn_Consultar
            // 
            this.btn_Consultar.Location = new System.Drawing.Point(258, 74);
            this.btn_Consultar.Name = "btn_Consultar";
            this.btn_Consultar.Size = new System.Drawing.Size(75, 23);
            this.btn_Consultar.TabIndex = 11;
            this.btn_Consultar.Text = "Consultar";
            this.btn_Consultar.UseVisualStyleBackColor = true;
            this.btn_Consultar.Click += new System.EventHandler(this.btn_Consultar_Click);
            // 
            // dgvLocacion
            // 
            this.dgvLocacion.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgvLocacion.BackgroundColor = System.Drawing.SystemColors.ActiveBorder;
            this.dgvLocacion.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.dgvLocacion.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvLocacion.Location = new System.Drawing.Point(352, 12);
            this.dgvLocacion.Name = "dgvLocacion";
            this.dgvLocacion.Size = new System.Drawing.Size(244, 255);
            this.dgvLocacion.TabIndex = 12;
            // 
            // btn_CentrosRegresar
            // 
            this.btn_CentrosRegresar.Location = new System.Drawing.Point(13, 295);
            this.btn_CentrosRegresar.Name = "btn_CentrosRegresar";
            this.btn_CentrosRegresar.Size = new System.Drawing.Size(75, 23);
            this.btn_CentrosRegresar.TabIndex = 13;
            this.btn_CentrosRegresar.Text = "Regresar";
            this.btn_CentrosRegresar.UseVisualStyleBackColor = true;
            this.btn_CentrosRegresar.Click += new System.EventHandler(this.btn_CentrosRegresar_Click);
            // 
            // lbl_Locacion
            // 
            this.lbl_Locacion.AutoSize = true;
            this.lbl_Locacion.Location = new System.Drawing.Point(58, 137);
            this.lbl_Locacion.Name = "lbl_Locacion";
            this.lbl_Locacion.Size = new System.Drawing.Size(51, 13);
            this.lbl_Locacion.TabIndex = 14;
            this.lbl_Locacion.Text = "Locacion";
            // 
            // txt_Locacion
            // 
            this.txt_Locacion.Location = new System.Drawing.Point(126, 134);
            this.txt_Locacion.Name = "txt_Locacion";
            this.txt_Locacion.Size = new System.Drawing.Size(100, 20);
            this.txt_Locacion.TabIndex = 15;
            this.txt_Locacion.TextChanged += new System.EventHandler(this.txt_Locacion_TextChanged);
            // 
            // FrmLocaciones
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(620, 330);
            this.Controls.Add(this.txt_Locacion);
            this.Controls.Add(this.lbl_Locacion);
            this.Controls.Add(this.btn_CentrosRegresar);
            this.Controls.Add(this.dgvLocacion);
            this.Controls.Add(this.btn_Consultar);
            this.Controls.Add(this.btn_Eliminar);
            this.Controls.Add(this.btn_Modificar);
            this.Controls.Add(this.btn_Agregar);
            this.Controls.Add(this.rdb_EliminarCentro);
            this.Controls.Add(this.rdb_ModificarCentro);
            this.Controls.Add(this.rdb_AgregarCentro);
            this.Controls.Add(this.txt_LocacionNum);
            this.Controls.Add(this.lbl_LocacionNum);
            this.Controls.Add(this.txt_LocacionMunicipio);
            this.Controls.Add(this.lbl_LocacionMunicipio);
            this.Controls.Add(this.lbl_Locaciones);
            this.Name = "FrmLocaciones";
            this.Text = "Locaciones";
            this.Load += new System.EventHandler(this.FrmLocaciones_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dgvLocacion)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lbl_Locaciones;
        private System.Windows.Forms.Label lbl_LocacionMunicipio;
        private System.Windows.Forms.TextBox txt_LocacionMunicipio;
        private System.Windows.Forms.Label lbl_LocacionNum;
        private System.Windows.Forms.TextBox txt_LocacionNum;
        private System.Windows.Forms.RadioButton rdb_AgregarCentro;
        private System.Windows.Forms.RadioButton rdb_ModificarCentro;
        private System.Windows.Forms.RadioButton rdb_EliminarCentro;
        private System.Windows.Forms.Button btn_Agregar;
        private System.Windows.Forms.Button btn_Modificar;
        private System.Windows.Forms.Button btn_Eliminar;
        private System.Windows.Forms.Button btn_Consultar;
        private System.Windows.Forms.DataGridView dgvLocacion;
        private System.Windows.Forms.Button btn_CentrosRegresar;
        private System.Windows.Forms.Label lbl_Locacion;
        private System.Windows.Forms.TextBox txt_Locacion;
    }
}