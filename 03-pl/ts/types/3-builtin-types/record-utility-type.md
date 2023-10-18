# Record Utility Type - constrained keys

```ts
interface Incomes {
  [key: string]: number
}

type Revenue = 'salary' | 'bonus' | 'sidehustle'

type Incomes = Record<Revenue, number>

const monthlyIncomes: Incomes = {
  salary: 500,
  bonus: 100,
  sidehustle: 250
}

for (const revenue in monthlyIncomes) {
  console.log(monthlyIncomes[revenue as keyof Incomes])
}
```
