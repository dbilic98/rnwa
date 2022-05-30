﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace FSREWebServices
{
    public partial class WebFormKlijentApp : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void ConvertClick(object sender, EventArgs e)
        {
            ServiceReference1.WebService1SoapClient klijent = new ServiceReference1.WebService1SoapClient("WebService1Soap");
            float val = float.Parse(inputField.Text);
            String valuta1 = dropdownList.SelectedValue.ToString();
            String valuta2 = dropdownList1.SelectedValue.ToString();
            float response = klijent.konvertervaluta(val, valuta1, valuta2);
            ResultLabel.Text = val.ToString() + " " + valuta1 + " " + "iznosi" + " " + response.ToString() + " " + valuta2;
        }
        protected void inputField_TextChanged(object sender, EventArgs e)
        {

        }
    }
}