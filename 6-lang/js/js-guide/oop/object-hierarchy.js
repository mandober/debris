'use strict'

/*
 * Constructing an object hierarchy
 * Employee: name = "", dept = "general"
 * Manager extends Employee: Employee[] reports = []
 * Worker extends Employee: String[] projects = []
 * Seller extends Worker: quota = 100, <OR> dept="sales"
 * Engineer extends Worker: machine="", <OR> dept="engineering"

            Employee
            ↓      ↓
       Worker     Manager
       ↓    ↓
Engineer    Seller

*/

function Employee(name, dept) {
    //'use strict' // Illegal directive in function with default params
    this.name = name || "Emp Roy"
    this.dept = dept || "general"
}
