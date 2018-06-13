function ready(fn) {
  if (document.readyState != 'loading') {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

ready(choices);

var content =
[
  {question: 'Carbohidratii ingrasa:', choices: ['Adevarat', 'Fals', 'Nu stiu'], correct: 1},
  {question: 'Excesul de proteine poate cauza probleme la rinichi:', choices: ['Adevarat', 'Fals', 'Nu stiu'], correct: 1},
  {question: 'Cafeina accelereaza arderea grasimilor:', choices: ['Adevarat', 'Fals', 'Nu stiu'], correct: 0}, 
  {question: 'Untul este mai sanatos decat margarina: ', choices: ['Adevarat', 'Fals', 'Poate'], correct: 0},
  {question: 'Vitaminele hidrosolubile sunt: ', choices: ['Vitaminele B si C', 'Vitaminele A,D,E si K', 'Vitaminele B,E,K'], correct: 0},
  {question: 'Cel mai sanatos ulei este:', choices: ['Uleiul de canola', 'Uleiul de masline', 'Niciunul'], correct: 1},
  {question: 'Pentru a slabi 1/2 kg pe saptamana, trebuie sa scazi din dieta ta zilnica:', choices: ['150 calorii', '300 calorii', '500 calorii'], correct: 2},
  {question: 'Consumul de alcool afecteaza circulatia catre muschi si scade rezistenta musculara:', choices: ['Adevarat', 'Fals', 'Poate'], correct: 0},
  {question: 'Lipsa de energie, schimbarile de dispozitie, dificultatea de concentrare, amorteaza in maini si/sau picioare, inflamarea/craparea limbii sunt simptome ale deficientei de: ', choices: ['Vitamina B12', 'Vitamina K', 'Magneziu'], correct: 0},
  {question: 'Cel mai abundent nutrient din corp este proteina:', choices: ['Adevarat', 'Fals', 'Nu stiu'], correct: 0},
  {question: 'Argina este un aminoacid:', choices: ['Esential', 'Neesential', 'Nu stiu'], correct: 1},
  {question: 'Care dintre urmatoarele este gresita:', choices: ['1g proteine = 4 calorii', '1g de carbohidrati = 10 calorii', ' 1g de grasimi = 9 calorii'], correct: 1},
  {question: 'Ce procent din aportul caloric trebuie sa reprezinte carbohidratii?', choices: ['30-40%', '40-50%', '50-60%'], correct: 2},
  {question: 'Care este ultimul nutrient care se digera in stomac:', choices: ['Proteinele', 'Grasimile', 'Carbohidratii'], correct: 1},
  {question: 'Care este cantitatea maxima de colesterol/ zi pentru a nu periclita sanatatea inimii?', choices: ['200mg/ zi', '300mg/ zi', '500mg/ zi'], correct: 1},

];

var x = 0;
var y = 1;
var score = 0;

function choices() {
  if (content[x] === undefined) {
    document.querySelector('.score').textContent = 'Score: ' + score;
    document.form1.style.visibility = 'hidden';
    document.querySelector('.header').style.visibility = 'visibility';

  } else {
    var questionNumber = document.querySelector('.questionNumber');
    questionNumber.textContent = 'Intrebarea#' + y;

    var question = document.querySelector('.question');
    question.textContent = content[x]['question'];

    var choices = document.querySelectorAll('label');
    for (var i = 0; i < choices.length; i++) {
      choices[i].textContent = content[x]['choices'][i];
    }
  }
}

function next() {
  var inputs = document.querySelectorAll('input');

  if (content[x] === undefined) {
    return false;
  }

  else if (inputs[0].checked !== true && inputs[1].checked !== true && inputs[2].checked !== true && inputs[3].checked !== true) {
    alert('Please select an answer');

  } else {
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].checked === true && i === content[x]['correct']) {
        score++;
      }
    inputs[i].checked = false;
  }

  x++;
  y++;
  choices();
  }
}

function back() {
  var inputs = document.querySelectorAll('input');

  if (x === 0) {
    return false;

  } else {
    x--;
    y--;
    choices();
  }
}