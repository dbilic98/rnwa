﻿using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace dz5._2.Models
{
    public class ProductModel : Controller
    {
        public IActionResult Index()
        {
            return View();
        }
    }
}