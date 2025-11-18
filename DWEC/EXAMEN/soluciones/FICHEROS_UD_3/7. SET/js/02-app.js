
/***********************************************
******************WeakSet*********************
************************************************/
console.log("------WeakSet----------")
const weakSet = new WeakSet();

const cliente = {
    nombre: 'Natalia',
    saldo: '200'
};

weakSet.add(cliente)
console.log(weakSet);

//weakSet.add(8);
//console.log(weakSet); DA ERROR!!!


//console.log(weakSet.size()) DA ERROR

//weakSet.forEach(i => console.log(i)); DA ERROR