using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;

namespace FSREWebServices
{
    /// <summary>
    /// Summary description for WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {
        [WebMethod]
        public float konvertervaluta(float val, String valuta1, String valuta2)
        {
            if (valuta1 == valuta2)
            {
                return val;
            }
            if (valuta1 == "BAM")
            {
                if (valuta2 == "EUR")
                {
                    return (float)(val * 0.51);
                }
                if (valuta2 == "HRK")
                {
                    return (float)(val * 3.96);
                }
            }
            if (valuta1 == "EUR")
            {
                if (valuta2 == "BAM")
                {
                    return (float)(val * 1.95);
                }
                if (valuta2 == "HRK")
                {
                    return (float)(val * 7.95);
                }
            }
            if (valuta1 == "HRK")
            {
                if (valuta2 == "BAM")
                {
                    return (float)(val * 0.24);
                }
                if (valuta2 == "EUR")
                {
                    return (float)(val * 0.14);
                }
            }
            return -1;
        }



        [WebMethod]
        public string HelloWorld()
        {
            return "Hello World";
        }
    }
}
