
const NICKEL = 0.05;
const DIME = 0.1;
const QUARTER = 0.25;


const A = 'A';
const B = 'B';
const C = 'C';
const ONE = '1';
const TWO = '2';
const THREE = '3';
const FOUR = '4';
const FIVE = '5';


const A_ITEM = 0.5;
const B_ITEM = 0.75;
const C_ITEM = 1.0;


let moneyInserted = 0.0;
let itemCode = '';


const outputWindow_div = document.getElementById('output-window');
const moneyWindow_div = document.getElementById('money-window');
const codeWindow_div = document.getElementById('code-window');

const a_button = document.getElementById('letter-a');
const b_button = document.getElementById('letter-b');
const c_button = document.getElementById('letter-c');
const one_button = document.getElementById('number-1');
const two_button = document.getElementById('number-2');
const three_button = document.getElementById('number-3');
const four_button = document.getElementById('number-4');
const five_button = document.getElementById('number-5');
const purchase_button = document.getElementById('purchase');
const clear_button = document.getElementById('clear');


const nickel_button = document.getElementById('money-0.05');
const dime_button = document.getElementById('money-0.10');
const quarter_button = document.getElementById('money-0.25');
const return_button = document.getElementById('money-return');


nickel_button.addEventListener('click', function () {
  console.log('nickel inserted');
  addMoney(NICKEL);
});

dime_button.addEventListener('click', function () {
  console.log('dime inserted');
  addMoney(DIME);
});

quarter_button.addEventListener('click', function () {
  console.log('quarter inserted');
  addMoney(QUARTER);
});

return_button.addEventListener('click', function () {
  console.log('money returned');
  returnMoney();
});


a_button.addEventListener('click', function () {
  console.log(A + ' pressed');
  addToItemCode(A);
});

b_button.addEventListener('click', function () {
  console.log(B + ' pressed');
  addToItemCode(B);
});

c_button.addEventListener('click', function () {
  console.log(C + ' pressed');
  addToItemCode(C);
});

one_button.addEventListener('click', function () {
  console.log(ONE + ' pressed');
  addToItemCode(ONE);
});

two_button.addEventListener('click', function () {
  console.log(TWO + ' pressed');
  addToItemCode(TWO);
});

three_button.addEventListener('click', function () {
  console.log(THREE + ' pressed');
  addToItemCode(THREE);
});

four_button.addEventListener('click', function () {
  console.log(FOUR + ' pressed');
  addToItemCode(FOUR);
});

five_button.addEventListener('click', function () {
  console.log(FIVE + ' pressed');
  addToItemCode(FIVE);
});

purchase_button.addEventListener('click', function () {
  console.log('purchase pressed');
  purchaseItem();
});

clear_button.addEventListener('click', function () {
  console.log('clear pressed');
  itemCode = '';
  printItemCode();
});


function addMoney(value) {
  moneyInserted = roundTo2Decimals(moneyInserted + value);
  console.log('total money inserted: ' + moneyInserted);
  printMoneyInserted();
}



function returnMoney() {
  printOutput(returnMoneyMessage());
  moneyInserted = 0.0;
  printMoneyInserted();
}


function printMoneyInserted() {
  moneyWindow_div.innerHTML = '$ ' + moneyInserted;
}


function roundTo2Decimals(num) {
  return +(Math.round(num * 100) / 100).toFixed(2);
}



function addToItemCode(char) {
  if (itemCode.length < 2) {
    if (itemCode.length < 1 && isLetter(char)) {
      itemCode = itemCode + char;
    }
    if (itemCode.length == 1 && !isLetter(char)) {
      itemCode = itemCode + char;
    }
  }
  console.log('current item code ' + itemCode);
  printItemCode();
  if (itemCode.length == 2) {
    printOutput(itemCode + ' selected, price: $' + getItemPrice());
  }
}

function isLetter(char) {
  return char.match(/[a-z]/i);
}


function purchaseItem() {
  let purchaseMessage = '';
  if (itemCode.length == 2) {
    let cost = getItemPrice();
    if (moneyInserted >= cost) {
      purchaseMessage += 'Dispensing ' + itemCode + '...<br/>';
      moneyInserted = roundTo2Decimals(moneyInserted - cost);
      purchaseMessage += returnMoneyMessage() + '<br/>';
      moneyInserted = 0;
      printMoneyInserted();
    } else {
      purchaseMessage += 'Not enough money need $' + cost + '<br/>';
    }
  } else {
    purchaseMessage += 'Select a valid Item' + '<br/>';
  }
  printOutput(purchaseMessage);
}


function getItemPrice() {
  switch (itemCode[0]) {
    case A:
      return A_ITEM;
    case B:
      return B_ITEM;
    case C:
      return C_ITEM;
    default:
      return 0.0;
  }
}


function printOutput(message) {
  outputWindow_div.innerHTML = message;
}


function printItemCode() {
  codeWindow_div.innerHTML = itemCode;
}


function returnMoneyMessage() {
  return '$ ' + moneyInserted + ' returned.';
}sc
