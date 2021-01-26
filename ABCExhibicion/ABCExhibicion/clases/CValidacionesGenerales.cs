using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace ABCExhibicion
{
    class CValidacionesGenerales
    {
        public static String ValidarNumero(string caracter, System.Windows.Forms.Control control)
        {
            bool bRegresa = false;

            for (int i = 0; i < caracter.Length; )
            {
                bRegresa = false;

                char cChar = caracter[i];
                // || (cChar >= 65 && cChar <= 90) || (cChar >= 97 && cChar <= 122) || cChar == 95 || cChar == 46
                if ((cChar >= 48 && cChar <= 57) )
                {
                    bRegresa = true;
                }
                else
                {
                    ToolTip x = new ToolTip();
                    x.ToolTipIcon = ToolTipIcon.Error;
                    x.ToolTipTitle = "Carácter no admitido";
                    x.Show("Solo puede escribir numeros", control, 0, control.Size.Height, 2000);
                }

                if (bRegresa)
                {
                    i++;
                }
                else
                {
                    caracter = caracter.Remove(i, 1);
                }
            }
            return caracter;
        }

        public static String ValidarString(string caracter, System.Windows.Forms.Control control)
        {
            bool bRegresa = false;

            for (int i = 0; i < caracter.Length; )
            {
                bRegresa = false;

                char cChar = caracter[i];
                // || (cChar >= 65 && cChar <= 90) || (cChar >= 97 && cChar <= 122) || cChar == 95 || cChar == 46
                if ((cChar >= 65 && cChar <= 90) || (cChar >= 97 && cChar <= 122) || cChar == 32 )
                {
                    bRegresa = true;
                }
                else
                {
                    ToolTip x = new ToolTip();
                    x.ToolTipIcon = ToolTipIcon.Error;
                    x.ToolTipTitle = "Carácter no admitido";
                    x.Show("Solo puedes escirbir letras", control, 0, control.Size.Height, 2000);
                }

                if (bRegresa)
                {
                    i++;
                }
                else
                {
                    caracter = caracter.Remove(i, 1);
                }
            }
            return caracter;
        }

        public static String ValidarDecimal(string caracter, System.Windows.Forms.Control control)
        {
            bool bRegresa = false;

            for (int i = 0; i < caracter.Length; )
            {
                bRegresa = false;

                char cChar = caracter[i];
                // || (cChar >= 65 && cChar <= 90) || (cChar >= 97 && cChar <= 122) || cChar == 95 || cChar == 46
                if ((cChar >= 48 && cChar <= 57) || cChar == 46)
                {
                    bRegresa = true;
                }
                else
                {
                    ToolTip x = new ToolTip();
                    x.ToolTipIcon = ToolTipIcon.Error;
                    x.ToolTipTitle = "Carácter no admitido";
                    x.Show("Solo puede escribir caracteres admitidos", control, 0, control.Size.Height, 2000);
                }

                if (bRegresa)
                {
                    i++;
                }
                else
                {
                    caracter = caracter.Remove(i, 1);
                }
            }
            return caracter;
        }

        public static String ValidarStringNum(string caracter, System.Windows.Forms.Control control)
        {
            bool bRegresa = false;

            for (int i = 0; i < caracter.Length; )
            {
                bRegresa = false;

                char cChar = caracter[i];
                // || (cChar >= 65 && cChar <= 90) || (cChar >= 97 && cChar <= 122) || cChar == 95 || cChar == 46
                if ((cChar >= 65 && cChar <= 90) || (cChar >= 97 && cChar <= 122) || (cChar >= 48 && cChar <= 57) || cChar == 32 )
                {
                    bRegresa = true;
                }
                else
                {
                    ToolTip x = new ToolTip();
                    x.ToolTipIcon = ToolTipIcon.Error;
                    x.ToolTipTitle = "Carácter no admitido";
                    x.Show("Solo puedes escirbir letras", control, 0, control.Size.Height, 2000);
                }

                if (bRegresa)
                {
                    i++;
                }
                else
                {
                    caracter = caracter.Remove(i, 1);
                }
            }
            return caracter;
        }

        
    }
}
