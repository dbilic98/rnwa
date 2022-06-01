using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace dz5._2.Controllers
{
    public class EMPLOYEEsController : Controller
    {
        private learningsql db = new learningsql();

        // GET: EMPLOYEEs
        public ActionResult Index()
        {
            var eMPLOYEE = db.EMPLOYEE.Include(e => e.BRANCH).Include(e => e.DEPARTMENT).Include(e => e.EMPLOYEE2);
            return View(eMPLOYEE.ToList());
        }

        // GET: EMPLOYEEs/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            EMPLOYEE eMPLOYEE = db.EMPLOYEE.Find(id);
            if (eMPLOYEE == null)
            {
                return HttpNotFound();
            }
            return View(eMPLOYEE);
        }

        // GET: EMPLOYEEs/Create
        public ActionResult Create()
        {
            ViewBag.ASSIGNED_BRANCH_ID = new SelectList(db.BRANCH, "BRANCH_ID", "ADDRESS");
            ViewBag.DEPT_ID = new SelectList(db.DEPARTMENT, "DEPT_ID", "NAME");
            ViewBag.SUPERIOR_EMP_ID = new SelectList(db.EMPLOYEE, "EMP_ID", "FIRST_NAME");
            return View();
        }

        // POST: EMPLOYEEs/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "EMP_ID,END_DATE,FIRST_NAME,LAST_NAME,START_DATE,TITLE,ASSIGNED_BRANCH_ID,DEPT_ID,SUPERIOR_EMP_ID")] EMPLOYEE eMPLOYEE)
        {
            if (ModelState.IsValid)
            {
                db.EMPLOYEE.Add(eMPLOYEE);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.ASSIGNED_BRANCH_ID = new SelectList(db.BRANCH, "BRANCH_ID", "ADDRESS", eMPLOYEE.ASSIGNED_BRANCH_ID);
            ViewBag.DEPT_ID = new SelectList(db.DEPARTMENT, "DEPT_ID", "NAME", eMPLOYEE.DEPT_ID);
            ViewBag.SUPERIOR_EMP_ID = new SelectList(db.EMPLOYEE, "EMP_ID", "FIRST_NAME", eMPLOYEE.SUPERIOR_EMP_ID);
            return View(eMPLOYEE);
        }

        // GET: EMPLOYEEs/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            EMPLOYEE eMPLOYEE = db.EMPLOYEE.Find(id);
            if (eMPLOYEE == null)
            {
                return HttpNotFound();
            }
            ViewBag.ASSIGNED_BRANCH_ID = new SelectList(db.BRANCH, "BRANCH_ID", "ADDRESS", eMPLOYEE.ASSIGNED_BRANCH_ID);
            ViewBag.DEPT_ID = new SelectList(db.DEPARTMENT, "DEPT_ID", "NAME", eMPLOYEE.DEPT_ID);
            ViewBag.SUPERIOR_EMP_ID = new SelectList(db.EMPLOYEE, "EMP_ID", "FIRST_NAME", eMPLOYEE.SUPERIOR_EMP_ID);
            return View(eMPLOYEE);
        }

        // POST: EMPLOYEEs/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "EMP_ID,END_DATE,FIRST_NAME,LAST_NAME,START_DATE,TITLE,ASSIGNED_BRANCH_ID,DEPT_ID,SUPERIOR_EMP_ID")] EMPLOYEE eMPLOYEE)
        {
            if (ModelState.IsValid)
            {
                db.Entry(eMPLOYEE).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.ASSIGNED_BRANCH_ID = new SelectList(db.BRANCH, "BRANCH_ID", "ADDRESS", eMPLOYEE.ASSIGNED_BRANCH_ID);
            ViewBag.DEPT_ID = new SelectList(db.DEPARTMENT, "DEPT_ID", "NAME", eMPLOYEE.DEPT_ID);
            ViewBag.SUPERIOR_EMP_ID = new SelectList(db.EMPLOYEE, "EMP_ID", "FIRST_NAME", eMPLOYEE.SUPERIOR_EMP_ID);
            return View(eMPLOYEE);
        }

        // GET: EMPLOYEEs/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            EMPLOYEE eMPLOYEE = db.EMPLOYEE.Find(id);
            if (eMPLOYEE == null)
            {
                return HttpNotFound();
            }
            return View(eMPLOYEE);
        }

        // POST: EMPLOYEEs/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            EMPLOYEE eMPLOYEE = db.EMPLOYEE.Find(id);
            db.EMPLOYEE.Remove(eMPLOYEE);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
