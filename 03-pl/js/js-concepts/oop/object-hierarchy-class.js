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

class Employee
{
    name = "roy"
    dept = "general"

    constructor (name, dept) {
        this.name = name || this.name
        this.dept = dept || this.dept
    }
}

let e1 = new Employee()
let e2 = new Employee("Jimmy")
let e3 = new Employee("", "guards")
let e4 = new Employee("Jenny Janos", "tetkice")


console.log(
    '\n',
    e1, '\n',
    e2, '\n',
    e3, '\n',
)
