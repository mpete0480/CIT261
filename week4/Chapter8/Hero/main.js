const form = document.forms['hero'];
form.addEventListener('submit',makeHero,false);
form.addEventListener('submit',validate,false);

function makeHero(event) {
    event.preventDefault();
    const hero = {};
    hero.name = form.heroName.value;
    hero.realName = form.realName.value;
    hero.powers = [...form.powers].filter(box=>box.checked).map(box=>box.value);
    hero.category = form.category.value;
    hero.age = form.age.value;
    alert(JSON.stringify(hero));
    return hero;
}

function validate(event){
    const firstLetter = form.heroName.value[0];
    if(firstLetter.toUpperCase() === 'X'){
        event.preventDefault();
        alert(`You can't have a name that starts with 'X'`);
    }
}