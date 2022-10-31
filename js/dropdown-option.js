function onLoad() {
    var group1 = document.getElementById("group1");
    group1.classList.remove('hide');
    group1.classList.add('show');
    
    var group2 = document.getElementById("group2");
    group2.classList.remove('show');
    group2.classList.add('hide');
}


function onLoad2() {
    var group2 = document.getElementById("group2");
    group2.classList.remove('hide');
    group2.classList.add('show');

    var group1 = document.getElementById("group1");
    group1.classList.remove('show');
    group1.classList.add('hide');
}