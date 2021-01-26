namespace ABCExhibicion
{
    partial class FrmArticulos
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
            this.txt_Stock = new System.Windows.Forms.TextBox();
            this.lbl_Existencia = new System.Windows.Forms.Label();
            this.txt_Precio = new System.Windows.Forms.TextBox();
            this.lbl_Precio = new System.Windows.Forms.Label();
            this.txt_Marca = new System.Windows.Forms.TextBox();
            this.lbl_Articulos = new System.Windows.Forms.Label();
            this.dgvArticulos = new System.Windows.Forms.DataGridView();
            this.btn_Eliminar = new System.Windows.Forms.Button();
            this.btn_Modificar = new System.Windows.Forms.Button();
            this.btn_Agregar = new System.Windows.Forms.Button();
            this.txt_nombre = new System.Windows.Forms.TextBox();
            this.lbl_Marca = new System.Windows.Forms.Label();
            this.lbl_Nombre = new System.Windows.Forms.Label();
            this.lbl_IdeuArticulo = new System.Windows.Forms.Label();
            this.txt_iduarticulo = new System.Windows.Forms.TextBox();
            this.lbl_Modelo = new System.Windows.Forms.Label();
            this.txt_Modelo = new System.Windows.Forms.TextBox();
            this.btn_Consultar = new System.Windows.Forms.Button();
            this.rdb_Agregar = new System.Windows.Forms.RadioButton();
            this.rdb_Modificar = new System.Windows.Forms.RadioButton();
            this.rdb_Eliminar = new System.Windows.Forms.RadioButton();
            this.btn_ArticulosRegresar = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgvArticulos)).BeginInit();
            this.SuspendLayout();
            // 
            // txt_Stock
            // 
            this.txt_Stock.Location = new System.Drawing.Point(397, 161);
            this.txt_Stock.Name = "txt_Stock";
            this.txt_Stock.Size = new System.Drawing.Size(122, 20);
            this.txt_Stock.TabIndex = 27;
            this.txt_Stock.TextChanged += new System.EventHandler(this.txt_Stock_TextChanged);
            // 
            // lbl_Existencia
            // 
            this.lbl_Existencia.AutoSize = true;
            this.lbl_Existencia.Location = new System.Drawing.Point(336, 164);
            this.lbl_Existencia.Name = "lbl_Existencia";
            this.lbl_Existencia.Size = new System.Drawing.Size(55, 13);
            this.lbl_Existencia.TabIndex = 26;
            this.lbl_Existencia.Text = "Existencia";
            // 
            // txt_Precio
            // 
            this.txt_Precio.Location = new System.Drawing.Point(397, 108);
            this.txt_Precio.Name = "txt_Precio";
            this.txt_Precio.Size = new System.Drawing.Size(122, 20);
            this.txt_Precio.TabIndex = 25;
            this.txt_Precio.TextChanged += new System.EventHandler(this.txt_precio_TextChanged);
            // 
            // lbl_Precio
            // 
            this.lbl_Precio.AutoSize = true;
            this.lbl_Precio.Location = new System.Drawing.Point(354, 111);
            this.lbl_Precio.Name = "lbl_Precio";
            this.lbl_Precio.Size = new System.Drawing.Size(37, 13);
            this.lbl_Precio.TabIndex = 24;
            this.lbl_Precio.Text = "Precio";
            // 
            // txt_Marca
            // 
            this.txt_Marca.Location = new System.Drawing.Point(397, 58);
            this.txt_Marca.Name = "txt_Marca";
            this.txt_Marca.Size = new System.Drawing.Size(122, 20);
            this.txt_Marca.TabIndex = 23;
            this.txt_Marca.TextChanged += new System.EventHandler(this.txt_Marca_TextChanged);
            // 
            // lbl_Articulos
            // 
            this.lbl_Articulos.AutoSize = true;
            this.lbl_Articulos.Location = new System.Drawing.Point(297, 9);
            this.lbl_Articulos.Name = "lbl_Articulos";
            this.lbl_Articulos.Size = new System.Drawing.Size(68, 13);
            this.lbl_Articulos.TabIndex = 22;
            this.lbl_Articulos.Text = "ARTICULOS";
            // 
            // dgvArticulos
            // 
            this.dgvArticulos.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgvArticulos.BackgroundColor = System.Drawing.SystemColors.ActiveBorder;
            this.dgvArticulos.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.dgvArticulos.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvArticulos.Location = new System.Drawing.Point(31, 246);
            this.dgvArticulos.Name = "dgvArticulos";
            this.dgvArticulos.Size = new System.Drawing.Size(643, 231);
            this.dgvArticulos.TabIndex = 21;
            // 
            // btn_Eliminar
            // 
            this.btn_Eliminar.Location = new System.Drawing.Point(581, 154);
            this.btn_Eliminar.Name = "btn_Eliminar";
            this.btn_Eliminar.Size = new System.Drawing.Size(75, 23);
            this.btn_Eliminar.TabIndex = 20;
            this.btn_Eliminar.Text = "Eliminar";
            this.btn_Eliminar.UseVisualStyleBackColor = true;
            this.btn_Eliminar.Click += new System.EventHandler(this.btn_Eliminar_Click);
            // 
            // btn_Modificar
            // 
            this.btn_Modificar.Location = new System.Drawing.Point(581, 120);
            this.btn_Modificar.Name = "btn_Modificar";
            this.btn_Modificar.Size = new System.Drawing.Size(75, 23);
            this.btn_Modificar.TabIndex = 19;
            this.btn_Modificar.Text = "Modificar";
            this.btn_Modificar.UseVisualStyleBackColor = true;
            this.btn_Modificar.Click += new System.EventHandler(this.btn_Modificar_Click);
            // 
            // btn_Agregar
            // 
            this.btn_Agregar.Location = new System.Drawing.Point(581, 81);
            this.btn_Agregar.Name = "btn_Agregar";
            this.btn_Agregar.Size = new System.Drawing.Size(75, 23);
            this.btn_Agregar.TabIndex = 18;
            this.btn_Agregar.Text = "Grabar";
            this.btn_Agregar.UseVisualStyleBackColor = true;
            this.btn_Agregar.Click += new System.EventHandler(this.btn_Agregar_Click);
            // 
            // txt_nombre
            // 
            this.txt_nombre.Location = new System.Drawing.Point(146, 108);
            this.txt_nombre.Name = "txt_nombre";
            this.txt_nombre.Size = new System.Drawing.Size(122, 20);
            this.txt_nombre.TabIndex = 17;
            this.txt_nombre.TextChanged += new System.EventHandler(this.txt_nombre_TextChanged);
            // 
            // lbl_Marca
            // 
            this.lbl_Marca.AutoSize = true;
            this.lbl_Marca.Location = new System.Drawing.Point(354, 58);
            this.lbl_Marca.Name = "lbl_Marca";
            this.lbl_Marca.Size = new System.Drawing.Size(37, 13);
            this.lbl_Marca.TabIndex = 16;
            this.lbl_Marca.Text = "Marca";
            // 
            // lbl_Nombre
            // 
            this.lbl_Nombre.AutoSize = true;
            this.lbl_Nombre.Location = new System.Drawing.Point(96, 111);
            this.lbl_Nombre.Name = "lbl_Nombre";
            this.lbl_Nombre.Size = new System.Drawing.Size(44, 13);
            this.lbl_Nombre.TabIndex = 15;
            this.lbl_Nombre.Text = "Nombre";
            // 
            // lbl_IdeuArticulo
            // 
            this.lbl_IdeuArticulo.AutoSize = true;
            this.lbl_IdeuArticulo.Location = new System.Drawing.Point(99, 61);
            this.lbl_IdeuArticulo.Name = "lbl_IdeuArticulo";
            this.lbl_IdeuArticulo.Size = new System.Drawing.Size(40, 13);
            this.lbl_IdeuArticulo.TabIndex = 28;
            this.lbl_IdeuArticulo.Text = "Codigo";
            // 
            // txt_iduarticulo
            // 
            this.txt_iduarticulo.Location = new System.Drawing.Point(146, 61);
            this.txt_iduarticulo.Name = "txt_iduarticulo";
            this.txt_iduarticulo.Size = new System.Drawing.Size(122, 20);
            this.txt_iduarticulo.TabIndex = 29;
            this.txt_iduarticulo.TextChanged += new System.EventHandler(this.txt_iduarticulo_TextChanged);
            // 
            // lbl_Modelo
            // 
            this.lbl_Modelo.AutoSize = true;
            this.lbl_Modelo.Location = new System.Drawing.Point(99, 164);
            this.lbl_Modelo.Name = "lbl_Modelo";
            this.lbl_Modelo.Size = new System.Drawing.Size(42, 13);
            this.lbl_Modelo.TabIndex = 30;
            this.lbl_Modelo.Text = "Modelo";
            // 
            // txt_Modelo
            // 
            this.txt_Modelo.Location = new System.Drawing.Point(148, 164);
            this.txt_Modelo.Name = "txt_Modelo";
            this.txt_Modelo.Size = new System.Drawing.Size(120, 20);
            this.txt_Modelo.TabIndex = 31;
            this.txt_Modelo.TextChanged += new System.EventHandler(this.txt_Modelo_TextChanged);
            // 
            // btn_Consultar
            // 
            this.btn_Consultar.Location = new System.Drawing.Point(581, 23);
            this.btn_Consultar.Name = "btn_Consultar";
            this.btn_Consultar.Size = new System.Drawing.Size(75, 23);
            this.btn_Consultar.TabIndex = 34;
            this.btn_Consultar.Text = "Consultar";
            this.btn_Consultar.UseVisualStyleBackColor = true;
            this.btn_Consultar.Click += new System.EventHandler(this.btn_Consultar_Click);
            // 
            // rdb_Agregar
            // 
            this.rdb_Agregar.AutoSize = true;
            this.rdb_Agregar.Location = new System.Drawing.Point(189, 223);
            this.rdb_Agregar.Name = "rdb_Agregar";
            this.rdb_Agregar.Size = new System.Drawing.Size(62, 17);
            this.rdb_Agregar.TabIndex = 35;
            this.rdb_Agregar.TabStop = true;
            this.rdb_Agregar.Text = "Agregar";
            this.rdb_Agregar.UseVisualStyleBackColor = true;
            this.rdb_Agregar.CheckedChanged += new System.EventHandler(this.rdb_Agregar_CheckedChanged);
            // 
            // rdb_Modificar
            // 
            this.rdb_Modificar.AutoSize = true;
            this.rdb_Modificar.Location = new System.Drawing.Point(279, 223);
            this.rdb_Modificar.Name = "rdb_Modificar";
            this.rdb_Modificar.Size = new System.Drawing.Size(71, 17);
            this.rdb_Modificar.TabIndex = 36;
            this.rdb_Modificar.TabStop = true;
            this.rdb_Modificar.Text = "Actualizar";
            this.rdb_Modificar.UseVisualStyleBackColor = true;
            this.rdb_Modificar.CheckedChanged += new System.EventHandler(this.rdb_Modificar_CheckedChanged);
            // 
            // rdb_Eliminar
            // 
            this.rdb_Eliminar.AutoSize = true;
            this.rdb_Eliminar.Location = new System.Drawing.Point(380, 223);
            this.rdb_Eliminar.Name = "rdb_Eliminar";
            this.rdb_Eliminar.Size = new System.Drawing.Size(64, 17);
            this.rdb_Eliminar.TabIndex = 37;
            this.rdb_Eliminar.TabStop = true;
            this.rdb_Eliminar.Text = "Eliminar ";
            this.rdb_Eliminar.UseVisualStyleBackColor = true;
            this.rdb_Eliminar.CheckedChanged += new System.EventHandler(this.rdb_Eliminar_CheckedChanged);
            // 
            // btn_ArticulosRegresar
            // 
            this.btn_ArticulosRegresar.Location = new System.Drawing.Point(13, 489);
            this.btn_ArticulosRegresar.Name = "btn_ArticulosRegresar";
            this.btn_ArticulosRegresar.Size = new System.Drawing.Size(75, 23);
            this.btn_ArticulosRegresar.TabIndex = 38;
            this.btn_ArticulosRegresar.Text = "Regresar";
            this.btn_ArticulosRegresar.UseVisualStyleBackColor = true;
            this.btn_ArticulosRegresar.Click += new System.EventHandler(this.btn_ArticulosRegresar_Click);
            // 
            // FrmArticulos
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(719, 524);
            this.Controls.Add(this.btn_ArticulosRegresar);
            this.Controls.Add(this.rdb_Eliminar);
            this.Controls.Add(this.rdb_Modificar);
            this.Controls.Add(this.rdb_Agregar);
            this.Controls.Add(this.btn_Consultar);
            this.Controls.Add(this.txt_Modelo);
            this.Controls.Add(this.lbl_Modelo);
            this.Controls.Add(this.txt_iduarticulo);
            this.Controls.Add(this.lbl_IdeuArticulo);
            this.Controls.Add(this.txt_Stock);
            this.Controls.Add(this.lbl_Existencia);
            this.Controls.Add(this.txt_Precio);
            this.Controls.Add(this.lbl_Precio);
            this.Controls.Add(this.txt_Marca);
            this.Controls.Add(this.lbl_Articulos);
            this.Controls.Add(this.dgvArticulos);
            this.Controls.Add(this.btn_Eliminar);
            this.Controls.Add(this.btn_Modificar);
            this.Controls.Add(this.btn_Agregar);
            this.Controls.Add(this.txt_nombre);
            this.Controls.Add(this.lbl_Marca);
            this.Controls.Add(this.lbl_Nombre);
            this.Name = "FrmArticulos";
            this.Text = "Articulos";
            this.Load += new System.EventHandler(this.FrmArticulos_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dgvArticulos)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox txt_Stock;
        private System.Windows.Forms.Label lbl_Existencia;
        private System.Windows.Forms.TextBox txt_Precio;
        private System.Windows.Forms.Label lbl_Precio;
        private System.Windows.Forms.TextBox txt_Marca;
        private System.Windows.Forms.Label lbl_Articulos;
        private System.Windows.Forms.DataGridView dgvArticulos;
        private System.Windows.Forms.Button btn_Eliminar;
        private System.Windows.Forms.Button btn_Modificar;
        private System.Windows.Forms.Button btn_Agregar;
        private System.Windows.Forms.TextBox txt_nombre;
        private System.Windows.Forms.Label lbl_Marca;
        private System.Windows.Forms.Label lbl_Nombre;
        private System.Windows.Forms.Label lbl_IdeuArticulo;
        private System.Windows.Forms.TextBox txt_iduarticulo;
        private System.Windows.Forms.Label lbl_Modelo;
        private System.Windows.Forms.TextBox txt_Modelo;
        private System.Windows.Forms.Button btn_Consultar;
        private System.Windows.Forms.RadioButton rdb_Agregar;
        private System.Windows.Forms.RadioButton rdb_Modificar;
        private System.Windows.Forms.RadioButton rdb_Eliminar;
        private System.Windows.Forms.Button btn_ArticulosRegresar;
    }
}