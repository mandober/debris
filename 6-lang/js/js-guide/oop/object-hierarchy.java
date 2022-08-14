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

public class Employee
{
    public String name = "";
    public String dept = "general";

    function Employee(name, dept) {
        this.name = name;
        this.dept = dept;
    }
}

public class Manager extends Employee
{
   public Employee[] reports =
       new Employee[0];
}

public class WorkerBee extends Employee
{
   public String[] projects = new String[0];
}
