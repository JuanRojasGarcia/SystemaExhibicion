namespace ABCExhibicion
{
    partial class FrmCliente
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
            this.lbl_ClienteNum = new System.Windows.Forms.Label();
            this.lbl_LocacionNom = new System.Windows.Forms.Label();
            this.lbl_ClienteNom = new System.Windows.Forms.Label();
            this.txt_ClienteNum = new System.Windows.Forms.TextBox();
            this.cmb_LocacionNom = new System.Windows.Forms.ComboBox();
            this.txt_ClienteNom = new System.Windows.Forms.TextBox();
            this.rdb_Agregar = new System.Windows.Forms.RadioButton();
            this.rdb_Modificar = new System.Windows.Forms.RadioButton();
            this.rdb_Eliminar = new System.Windows.Forms.RadioButton();
            this.btn_Agregar = new System.Windows.Forms.Button();
            this.btn_Modificar = new System.Windows.Forms.Button();
            this.btn_Eliminar = new System.Windows.Forms.Button();
            this.btn_Consultar = new System.Windows.Forms.Button();
            this.dgvCliente = new System.Windows.Forms.DataGridView();
            this.lbl_Cliente = new System.Windows.Forms.Label();
            this.btn_ClienteRegresar = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgvCliente)).BeginInit();
            this.SuspendLayout();
            // 
            // lbl_ClienteNum
            // 
            this.lbl_ClienteNum.AutoSize = true;
            this.lbl_ClienteNum.Location = new System.Drawing.Point(27, 51);
            this.lbl_ClienteNum.Name = "lbl_ClienteNum";
            this.lbl_ClienteNum.Size = new System.Drawing.Size(64, 13);
            this.lbl_ClienteNum.TabIndex = 0;
            this.lbl_ClienteNum.Text = "Cliente Num";
            // 
            // lbl_LocacionNom
            // 
            this.lbl_LocacionNom.AutoSize = true;
            this.lbl_LocacionNom.Location = new System.Drawing.Point(258, 50);
            this.lbl_LocacionNom.Name = "lbl_LocacionNom";
            this.lbl_LocacionNom.Size = new System.Drawing.Size(51, 13);
            this.lbl_LocacionNom.TabIndex = 1;
            this.lbl_LocacionNom.Text = "Locacion";
            // 
            // lbl_ClienteNom
            // 
            this.lbl_ClienteNom.AutoSize = true;
            this.lbl_ClienteNom.Location = new System.Drawing.Point(164, 98);
            this.lbl_ClienteNom.Name = "lbl_ClienteNom";
            this.lbl_ClienteNom.Size = new System.Drawing.Size(44, 13);
            this.lbl_ClienteNom.TabIndex = 2;
            this.lbl_ClienteNom.Text = "Nombre";
            // 
            // txt_ClienteNum
            // 
            this.txt_ClienteNum.Location = new System.Drawing.Point(97, 48);
            this.txt_ClienteNum.Name = "txt_ClienteNum";
            this.txt_ClienteNum.Size = new System.Drawing.Size(121, 20);
            this.txt_ClienteNum.TabIndex = 5;
            this.txt_ClienteNum.TextChanged += new System.EventHandler(this.txt_ClienteNum_TextChanged);
            // 
            // cmb_LocacionNom
            // 
            this.cmb_LocacionNom.FormattingEnabled = true;
            this.cmb_LocacionNom.Location = new System.Drawing.Point(315, 47);
            this.cmb_LocacionNom.Name = "cmb_LocacionNom";
            this.cmb_LocacionNom.Size = new System.Drawing.Size(121, 21);
            this.cmb_LocacionNom.TabIndex = 6;
            this.cmb_LocacionNom.SelectedIndexChanged += new System.EventHandler(this.cmb_LocacionNom_SelectedIndexChanged);
            // 
            // txt_ClienteNom
            // 
            this.txt_ClienteNom.Location = new System.Drawing.Point(214, 95);
            this.txt_ClienteNom.Name = "txt_ClienteNom";
            this.txt_ClienteNom.Size = new System.Drawing.Size(121, 20);
            this.txt_ClienteNom.TabIndex = 21;
            this.txt_ClienteNom.TextChanged += new System.EventHandler(this.txt_ClienteNom_TextChanged);
            // 
            // rdb_Agregar
            // 
            this.rdb_Agregar.AutoSize = true;
            this.rdb_Agregar.Location = new System.Drawing.Point(141, 165);
            this.rdb_Agregar.Name = "rdb_Agregar";
            this.rdb_Agregar.Size = new System.Drawing.Size(62, 17);
            this.rdb_Agregar.TabIndex = 10;
            this.rdb_Agregar.Text = "Agregar";
            this.rdb_Agregar.UseVisualStyleBackColor = true;
            this.rdb_Agregar.CheckedChanged += new System.EventHandler(this.rdb_Agregar_CheckedChanged);
            // 
            // rdb_Modificar
            // 
            this.rdb_Modificar.AutoSize = true;
            this.rdb_Modificar.Location = new System.Drawing.Point(231, 165);
            this.rdb_Modificar.Name = "rdb_Modificar";
            this.rdb_Modificar.Size = new System.Drawing.Size(68, 17);
            this.rdb_Modificar.TabIndex = 11;
            this.rdb_Modificar.Text = "Modificar";
            this.rdb_Modificar.UseVisualStyleBackColor = true;
            this.rdb_Modificar.CheckedChanged += new System.EventHandler(this.rdb_Modificar_CheckedChanged);
            // 
            // rdb_Eliminar
            // 
            this.rdb_Eliminar.AutoSize = true;
            this.rdb_Eliminar.Location = new System.Drawing.Point(334, 165);
            this.rdb_Eliminar.Name = "rdb_Eliminar";
            this.rdb_Eliminar.Size = new System.Drawing.Size(61, 17);
            this.rdb_Eliminar.TabIndex = 12;
            this.rdb_Eliminar.Text = "Eliminar";
            this.rdb_Eliminar.UseVisualStyleBackColor = true;
            this.rdb_Eliminar.CheckedChanged += new System.EventHandler(this.rdb_Eliminar_CheckedChanged);
            // 
            // btn_Agregar
            // 
            this.btn_Agregar.Location = new System.Drawing.Point(480, 64);
            this.btn_Agregar.Name = "btn_Agregar";
            this.btn_Agregar.Size = new System.Drawing.Size(75, 23);
            this.btn_Agregar.TabIndex = 13;
            this.btn_Agregar.Text = "Agregar";
            this.btn_Agregar.UseVisualStyleBackColor = true;
            this.btn_Agregar.Click += new System.EventHandler(this.btn_Agregar_Click);
            // 
            // btn_Modificar
            // 
            this.btn_Modificar.Location = new System.Drawing.Point(480, 93);
            this.btn_Modificar.Name = "btn_Modificar";
            this.btn_Modificar.Size = new System.Drawing.Size(75, 23);
            this.btn_Modificar.TabIndex = 14;
            this.btn_Modificar.Text = "Modificar";
            this.btn_Modificar.UseVisualStyleBackColor = true;
            this.btn_Modificar.Click += new System.EventHandler(this.btn_Modificar_Click);
            // 
            // btn_Eliminar
            // 
            this.btn_Eliminar.Location = new System.Drawing.Point(480, 122);
            this.btn_Eliminar.Name = "btn_Eliminar";
            this.btn_Eliminar.Size = new System.Drawing.Size(75, 23);
            this.btn_Eliminar.TabIndex = 15;
            this.btn_Eliminar.Text = "Eliminar";
            this.btn_Eliminar.UseVisualStyleBackColor = true;
            this.btn_Eliminar.Click += new System.EventHandler(this.btn_Eliminar_Click);
            // 
            // btn_Consultar
            // 
            this.btn_Consultar.Location = new System.Drawing.Point(480, 12);
            this.btn_Consultar.Name = "btn_Consultar";
            this.btn_Consultar.Size = new System.Drawing.Size(75, 23);
            this.btn_Consultar.TabIndex = 16;
            this.btn_Consultar.Text = "Consultar";
            this.btn_Consultar.UseVisualStyleBackColor = true;
            this.btn_Consultar.Click += new System.EventHandler(this.btn_Consultar_Click);
            // 
            // dgvCliente
            // 
            this.dgvCliente.BackgroundColor = System.Drawing.SystemColors.ActiveBorder;
            this.dgvCliente.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.dgvCliente.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvCliente.Location = new System.Drawing.Point(12, 188);
            this.dgvCliente.Name = "dgvCliente";
            this.dgvCliente.Size = new System.Drawing.Size(569, 228);
            this.dgvCliente.TabIndex = 17;
            // 
            // lbl_Cliente
            // 
            this.lbl_Cliente.AutoSize = true;
            this.lbl_Cliente.Location = new System.Drawing.Point(236, 9);
            this.lbl_Cliente.Name = "lbl_Cliente";
            this.lbl_Cliente.Size = new System.Drawing.Size(39, 13);
            this.lbl_Cliente.TabIndex = 18;
            this.lbl_Cliente.Text = "Cliente";
            // 
            // btn_ClienteRegresar
            // 
            this.btn_ClienteRegresar.Location = new System.Drawing.Point(12, 422);
            this.btn_ClienteRegresar.Name = "btn_ClienteRegresar";
            this.btn_ClienteRegresar.Size = new System.Drawing.Size(75, 23);
            this.btn_ClienteRegresar.TabIndex = 22;
            this.btn_ClienteRegresar.Text = "Regresar";
            this.btn_ClienteRegresar.UseVisualStyleBackColor = true;
            this.btn_ClienteRegresar.Click += new System.EventHandler(this.btn_ClienteRegresar_Click);
            // 
            // FrmCliente
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(593, 457);
            this.Controls.Add(this.btn_ClienteRegresar);
            this.Controls.Add(this.lbl_Cliente);
            this.Controls.Add(this.dgvCliente);
            this.Controls.Add(this.btn_Consultar);
            this.Controls.Add(this.btn_Eliminar);
            this.Controls.Add(this.btn_Modificar);
            this.Controls.Add(this.btn_Agregar);
            this.Controls.Add(this.rdb_Eliminar);
            this.Controls.Add(this.rdb_Modificar);
            this.Controls.Add(this.rdb_Agregar);
            this.Controls.Add(this.txt_ClienteNom);
            this.Controls.Add(this.cmb_LocacionNom);
            this.Controls.Add(this.txt_ClienteNum);
            this.Controls.Add(this.lbl_ClienteNom);
            this.Controls.Add(this.lbl_LocacionNom);
            this.Controls.Add(this.lbl_ClienteNum);
            this.Name = "FrmCliente";
            this.Text = "Cliente";
            this.Load += new System.EventHandler(this.FrmCliente_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dgvCliente)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lbl_ClienteNum;
        private System.Windows.Forms.Label lbl_LocacionNom;
        private System.Windows.Forms.Label lbl_ClienteNom;
        private System.Windows.Forms.TextBox txt_ClienteNum;
        private System.Windows.Forms.ComboBox cmb_LocacionNom;
        private System.Windows.Forms.TextBox txt_ClienteNom;
        private System.Windows.Forms.RadioButton rdb_Agregar;
        private System.Windows.Forms.RadioButton rdb_Modificar;
        private System.Windows.Forms.RadioButton rdb_Eliminar;
        private System.Windows.Forms.Button btn_Agregar;
        private System.Windows.Forms.Button btn_Modificar;
        private System.Windows.Forms.Button btn_Eliminar;
        private System.Windows.Forms.Button btn_Consultar;
        private System.Windows.Forms.DataGridView dgvCliente;
        private System.Windows.Forms.Label lbl_Cliente;
        private System.Windows.Forms.Button btn_ClienteRegresar;
    }
}