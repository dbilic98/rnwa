using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace dz5._2.Controllers
{
    public class ACC_TRANSACTIONController : Controller
    {
        private learningsql db = new learningsql();

        // GET: ACC_TRANSACTION
        public ActionResult Index()
        {
            var aCC_TRANSACTION = db.ACC_TRANSACTION.Include(a => a.ACCOUNT).Include(a => a.BRANCH).Include(a => a.EMPLOYEE);
            return View(aCC_TRANSACTION.ToList());
        }

        // GET: ACC_TRANSACTION/Details/5
        public ActionResult Details(decimal id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            ACC_TRANSACTION aCC_TRANSACTION = db.ACC_TRANSACTION.Find(id);
            if (aCC_TRANSACTION == null)
            {
                return HttpNotFound();
            }
            return View(aCC_TRANSACTION);
        }

        // GET: ACC_TRANSACTION/Create
        public ActionResult Create()
        {
            ViewBag.ACCOUNT_ID = new SelectList(db.ACCOUNT, "ACCOUNT_ID", "STATUS");
            ViewBag.EXECUTION_BRANCH_ID = new SelectList(db.BRANCH, "BRANCH_ID", "ADDRESS");
            ViewBag.TELLER_EMP_ID = new SelectList(db.EMPLOYEE, "EMP_ID", "FIRST_NAME");
            return View();
        }

        // POST: ACC_TRANSACTION/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "TXN_ID,AMOUNT,FUNDS_AVAIL_DATE,TXN_DATE,TXN_TYPE_CD,ACCOUNT_ID,EXECUTION_BRANCH_ID,TELLER_EMP_ID")] ACC_TRANSACTION aCC_TRANSACTION)
        {
            if (ModelState.IsValid)
            {
                db.ACC_TRANSACTION.Add(aCC_TRANSACTION);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.ACCOUNT_ID = new SelectList(db.ACCOUNT, "ACCOUNT_ID", "STATUS", aCC_TRANSACTION.ACCOUNT_ID);
            ViewBag.EXECUTION_BRANCH_ID = new SelectList(db.BRANCH, "BRANCH_ID", "ADDRESS", aCC_TRANSACTION.EXECUTION_BRANCH_ID);
            ViewBag.TELLER_EMP_ID = new SelectList(db.EMPLOYEE, "EMP_ID", "FIRST_NAME", aCC_TRANSACTION.TELLER_EMP_ID);
            return View(aCC_TRANSACTION);
        }

        // GET: ACC_TRANSACTION/Edit/5
        public ActionResult Edit(decimal id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            ACC_TRANSACTION aCC_TRANSACTION = db.ACC_TRANSACTION.Find(id);
            if (aCC_TRANSACTION == null)
            {
                return HttpNotFound();
            }
            ViewBag.ACCOUNT_ID = new SelectList(db.ACCOUNT, "ACCOUNT_ID", "STATUS", aCC_TRANSACTION.ACCOUNT_ID);
            ViewBag.EXECUTION_BRANCH_ID = new SelectList(db.BRANCH, "BRANCH_ID", "ADDRESS", aCC_TRANSACTION.EXECUTION_BRANCH_ID);
            ViewBag.TELLER_EMP_ID = new SelectList(db.EMPLOYEE, "EMP_ID", "FIRST_NAME", aCC_TRANSACTION.TELLER_EMP_ID);
            return View(aCC_TRANSACTION);
        }

        // POST: ACC_TRANSACTION/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "TXN_ID,AMOUNT,FUNDS_AVAIL_DATE,TXN_DATE,TXN_TYPE_CD,ACCOUNT_ID,EXECUTION_BRANCH_ID,TELLER_EMP_ID")] ACC_TRANSACTION aCC_TRANSACTION)
        {
            if (ModelState.IsValid)
            {
                db.Entry(aCC_TRANSACTION).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.ACCOUNT_ID = new SelectList(db.ACCOUNT, "ACCOUNT_ID", "STATUS", aCC_TRANSACTION.ACCOUNT_ID);
            ViewBag.EXECUTION_BRANCH_ID = new SelectList(db.BRANCH, "BRANCH_ID", "ADDRESS", aCC_TRANSACTION.EXECUTION_BRANCH_ID);
            ViewBag.TELLER_EMP_ID = new SelectList(db.EMPLOYEE, "EMP_ID", "FIRST_NAME", aCC_TRANSACTION.TELLER_EMP_ID);
            return View(aCC_TRANSACTION);
        }

        // GET: ACC_TRANSACTION/Delete/5
        public ActionResult Delete(decimal id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            ACC_TRANSACTION aCC_TRANSACTION = db.ACC_TRANSACTION.Find(id);
            if (aCC_TRANSACTION == null)
            {
                return HttpNotFound();
            }
            return View(aCC_TRANSACTION);
        }

        // POST: ACC_TRANSACTION/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(decimal id)
        {
            ACC_TRANSACTION aCC_TRANSACTION = db.ACC_TRANSACTION.Find(id);
            db.ACC_TRANSACTION.Remove(aCC_TRANSACTION);
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

